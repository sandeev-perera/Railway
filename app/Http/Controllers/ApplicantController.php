<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Services\ContactService;
use Illuminate\Validation\Rule;

class ApplicantController extends Controller
{
    private $route = "application";
    private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $stations = Station::pluck("Location");
        return view("applicants.application", compact("stations"));
    }

    private function getProvince(string $district): ?string
    {
        $map = [

            'Colombo' => 'Western',
            'Gampaha' => 'Western',
            'Kalutara' => 'Western',
    
            'Kandy' => 'Central',
            'Matale' => 'Central',
            'Nuwara Eliya' => 'Central',
    
            'Galle' => 'Southern',
            'Matara' => 'Southern',
            'Hambantota' => 'Southern',
    
            'Badulla' => 'Uva',
            'Monaragala' => 'Uva',
    
            'Ratnapura' => 'Sabaragamuwa',
            'Kegalle' => 'Sabaragamuwa',
    
            'Kurunegala' => 'North Western',
            'Puttalam' => 'North Western',
    
            'Anuradhapura' => 'North Central',
            'Polonnaruwa' => 'North Central',
    
            'Jaffna' => 'Northern',
            'Kilinochchi' => 'Northern',
            'Mannar' => 'Northern',
            'Mullaitivu' => 'Northern',
            'Vavuniya' => 'Northern',
    
            'Batticaloa' => 'Eastern',
            'Ampara' => 'Eastern',
            'Trincomalee' => 'Eastern',
        ];
    
        return $map[$district] ?? null;
    }
    

    private function validationRules()
    {
        $stationLocations = Station::pluck('location')->toArray();
        return [
            'full_name' => 'required|string|max:255',
            'nic' => 'required|string|max:13',
            'gender' => 'required|string',
            'date_of_birth' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')] ,
            'address' => 'required|string|max:50',       
            'district' => ['required', Rule::in([
                'Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Colombo', 'Galle', 'Gampaha',
                'Hambantota', 'Jaffna', 'Kalutara', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunegala',
                'Mannar', 'Matale', 'Matara', 'Monaragala', 'Mullaitivu', 'Nuwara Eliya', 'Polonnaruwa',
                'Puttalam', 'Ratnapura', 'Trincomalee', 'Vavuniya'
            ])],                    
            'occupation' => 'required|string|max:50',
            'occupation_sector' =>['required' , Rule::in(["government", "private"])] ,
            'occupation_address' => 'required|string|max:250',
            'home_station' => ['required','string','max:50',Rule::in($stationLocations)] ,
            'work_station' => ['required','string','max:50',Rule::in($stationLocations),'different:home_station'] ,
            'photo' => 'required|image|max:2048|mimes:png,jpeg,jpg',
            'source_of_proof' => 'required|mimes:pdf|max:2048',
            'email' => 'required|email|unique:applicants',
            'password' => 'required|confirmed|min:6',
        ];
    }

    private function validationMessages()
    {
        return [
            'full_name.required' => 'The full name field is required.',
            'nic.required' => 'NIC is required.',
            'nic.max' => 'NIC cannot exceed 13 characters.',
            'gender.required' => 'Please select a gender.',
            'date_of_birth.required' => 'Date of birth is required.',
            'date_of_birth.date' => 'Invalid date format.',
            'date_of_birth.before_or_equal' => 'You must be at least 18 years old to register.',
            'photo.required' => 'Profile photo is required.',
            'photo.image' => 'Profile photo must be an image.',
            'photo.mimes' => 'Profile photo must be a PNG, JPEG, or JPG file.',
            'photo.max' => 'Profile photo size cannot exceed 2MB.',
            'home_station.in' => 'Please select a valid home station.',
            'work_station.in' => 'Please select a valid work station.',
            'work_station.different' => 'Work station must be different from home station.',
            'source_of_proof.required' => 'Source of proof document is required.',
            'source_of_proof.mimes' => 'Only PDF files are allowed for proof documents.',
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password must be at least 6 characters long.',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules(), $this->validationMessages());
        $data['password'] = bcrypt($data['password']);
    
        $contacts = $this->contactService->validateContacts($request);

    // Handle Image Upload
   
        if ($request->hasFile('photo')) {

            $image = $request->file("photo");
            $imagepath = $this->getfilepath($image, "profileImages");
            $data['photo'] = $imagepath; 
        }
        
        if($request->hasFile("source_of_proof")){
            $file = $request->file("source_of_proof");
            $filepath = $this->getfilepath($file, "pdfs");
            $data['source_of_proof'] = $filepath; 
        }

        $data["province"] = $this->getProvince($data["district"]);


        try {
            $applicant = Applicant::create($data);
            $this->contactService->createContacts($applicant, $contacts);

            $this->storeFile($image, "profileImages", $imagepath);
            $this->storeFile($file, "pdfs", $filepath);
    
            return $this->redirectWithSuccess('show.index', "The form submitted Successfully");   
        } 

        catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return $this->redirectWithError($this->route, 'Duplicate entry! Please check your email or NIC.');
            }
            return $this->redirectWithError($this->route, 'Database Error This');
        } 

        catch (\Exception $e) {
            return $this->redirectWithError($this->route, 'Unexpected Error Happened');
        }
    }
}
