<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnlinePaymentRequest;
use App\Mail\SuspendPassenger;
use App\Mail\UnsuspendPassenger;
use App\Models\Applicant;
use App\Models\BarCodeCard;
use App\Models\Journey;
use App\Models\Passenger;
use App\Models\Payment;
use App\Services\JourneyTrackingService;
use App\Services\PassengerRegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PassengerController extends Controller
{
    public function showpassenger()
{
    $passenger = session('user');
    if (!$passenger) {
        return redirect()->route('show.login')->with('error', 'Please login first.');
    }
    $user = Applicant::with('passenger')->find(session('user'));
    return view("passenger.passenger_dashboard", compact('user'));
    }

    public function loadPage($page)
    {
        Log::info('message');
        // List of valid pages to prevent unauthorized access
        $validPages = ['dashboard', 'renew_ticket', 'support', 'view_ticket', 'cancel_season', 'edit_profile', "passenger_journeys"];

        // Check if the requested page is valid
        if (in_array($page, $validPages)) {
            $journeys = "";
            if($page== "passenger_journeys"){
                $journeys = Journey::with([
                    'startstation:id,station_name',
                    'endstation:id,station_name',
                    'passenger'])->where('passenger_id', session('passengerID'))->orderBy('created_at', 'desc')->limit(50)->get();
            }
            $user = Applicant::with('passenger')->find(session('user'));
            if($page == "edit_profile"){
                $numbers = $user->contacts->keyBy('type');
                $personal_contact = $numbers['personal']->contact_value ?? '';
                $lan_contact = $numbers['lan']->contact_value ?? '';
                $work_contact = $numbers['work']->contact_value ?? '';
                return view('passenger.' . $page,compact('user', 'lan_contact', 'personal_contact', 'work_contact'));
            }
            return view('passenger.' . $page,compact('user', 'journeys'));
        }
        
        return response('Page not found', 404);
    }

    public function renewPassenger(Passenger $passenger, OnlinePaymentRequest $request){
        $data = $request->validated();
        $passenger = Passenger::with('Applicant', 'BarCodeCard', 'route')->find($passenger->id);
    $price = PassengerRegistrationService::calculatePrice($passenger->route->distance, $data["class"], $passenger->Applicant->occupation_sector);
    if($data['ticket_duration'] =="Q"){
        $price *=3;
    }
    
    //payment logic goes here.
        $passenger->BarcodeCard->update([
            'start_date' => now(),
            'expire_date' => $data["ticket_duration"] == "M"? now()->addMonth(): now()->addMonths(3)
        ]);

        $passenger->update([
            'status' => 'active',]);
        
    
        Payment::create([
            'passenger_id' => $passenger->id,
            'Amount' => $price,
            'payment_type' => 'renewal',
            'payment_mode' => 'Debit'
        ]);
        
        return $this->redirectWithSuccess('show.passenger.dashboard',"You card has been Renewed");
    }

    public function fetchByID($id)
    {
        $passenger = Passenger::with(['Applicant', 'Payments', 'BarcodeCard', 'journeys' => function ($query) {
        $query->orderBy('created_at', 'desc');
    },
    'journeys.startstation',
    'journeys.endstation'])->findOrFail($id);

        return view('admin.singlepassenger', ['passenger' => $passenger]);
    }

    public function fetchByToken(Request $request, $stationID =-1)
    {
        $token = trim($request->token);
        if (strlen($token) !== 36) {
            return response()->json(['error' => 'Invalid token length'], 400);
        }

        $passenger = Passenger::with('Applicant', 'BarcodeCard', 'route', 'latestJourney')->where('passenger_token', $token)->first();
        if (!$passenger) {
            return response()->json(['error' => 'Passenger not found'], 404);
        }

        $validity = $this->getJourneyValidity($passenger->route->allowed_stations, $stationID);
        $status = "";
        if($stationID > 0){
            if($passenger->status == "Active"){
                if($request->action == "checkin"){
                    if($validity == "VALID"){
                        $status = JourneyTrackingService::checkin($passenger, $stationID);

                    }
                    else if($validity == "OUT OF BOUND"){

                        $status = "Invalid Journey";
                    }
                }
                else if($request->action =="checkout"){
                    $status = JourneyTrackingService::checkout($passenger, $stationID, $validity);
                    
                }
            }
            else{
                $status = "This Passenger is not active";
            }
            
        }

        return response()->json(['passenger' => [
            'id' => $passenger->id,
            'status' => $passenger->status,
            'full_name' => $passenger->Applicant->full_name,
            'sector' => $passenger->Applicant->occupation_sector,
            'home_station' => $passenger->Applicant->home_station,
            'work_station' =>$passenger->Applicant->work_station,
            'photo' =>  asset('storage/'.$passenger->Applicant->photo),
            'class' => $passenger->BarcodeCard->class,
            'expire_date' =>$passenger->BarCodeCard->expire_date,
            'validity' =>$validity
            ], 

            'status'=>$status,

            "latest_journey" =>[
                "id" => $passenger->latestJourney?->id,
                "checked_in_station" =>$passenger->latestJourney?->startstation->station_name,
                "checked_out_station" =>$passenger->latestJourney?->endstation?->station_name,
                "checked_in_time" => $passenger->latestJourney?->created_at?->format('H:i:s d-m'),
                "checked_out_time" => $passenger->latestJourney?->checked_out_time?->format('H:i:s d-m')
            ],
]);
    }  
    
    public function suspendPassenger(Passenger $passenger, Request $request){
        $reasons = $request->input('reasons', []);
        $otherReason = $request->input('other_reason');

        if(empty($reasons) && empty($otherReason)){
            // return redirect()->route('admin.applications.show',[$applicant->id])->with('error', 'Please select a valid Reason');
            return back()->with('error', 'Please select a Valid Reason.');
        }

        if (!empty($otherReason)) {
            $reasons[] = $otherReason;
        }

        $passenger->update(['status' => 'Suspended']);
        Mail::to($passenger->Applicant->email)->send(new SuspendPassenger($passenger, $reasons));
        return back()->with('success', 'Passenger Suspended. Email sent'); 
    }

    public function unsuspendPassenger(Passenger $passenger){
        $sendmail = false;
        if($passenger->BarcodeCard->expire_date < now()){
            $passenger->update(['status' => 'Expired']);  
            $sendmail = true;
        }
        else{
            $passenger->update(['status' => 'Active']);  
            $sendmail = true;
        }
        if($sendmail){
            Mail::to($passenger->Applicant->email)->send(new UnsuspendPassenger());
        }

        return back()->with('success', 'Passenger Unsuspended'); 

    }


    public function cancelPassenger($applicantID, Request $request)
    {
        if ($request->confirmation_string === 'CANCEL') {
            Applicant::destroy($applicantID);
            return redirect()->route('user.logout')
                ->with('success', 'You have cancelled your season ticket.');
        }
            return $this->redirectWithError('show.passenger.dashboard',"Confirmation failed. Please type CANCEL to proceed.");
    }

}