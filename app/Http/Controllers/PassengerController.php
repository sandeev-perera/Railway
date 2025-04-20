<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnlinePaymentRequest;
use App\Mail\SuspendPassenger;
use App\Models\Applicant;
use App\Models\BarCodeCard;
use App\Models\Passenger;
use App\Models\Payment;
use App\Services\PassengerRegistrationService;
use Illuminate\Http\Request;
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
        // List of valid pages to prevent unauthorized access
        $validPages = ['dashboard', 'renew_ticket', 'support', 'view_ticket', 'cancel_season', 'edit_profile'];

        // Check if the requested page is valid
        if (in_array($page, $validPages)) {
            $user = Applicant::with('passenger')->find(session('user'));
            if($page == "edit_profile"){
                $numbers = $user->contacts->keyBy('type');
                $personal_contact = $numbers['personal']->contact_value ?? '';
                $lan_contact = $numbers['lan']->contact_value ?? '';
                $work_contact = $numbers['work']->contact_value ?? '';
                return view('passenger.' . $page,compact('user', 'lan_contact', 'personal_contact', 'work_contact'));
            }
            return view('passenger.' . $page,compact('user'));
        }
        
        return response('Page not found', 404);
    }

    public function renewPassenger(Passenger $passenger, OnlinePaymentRequest $request){
        $data = $request->validated();
        $passengerCard = BarCodeCard::wherePassengerId($passenger->id)->first();

    if (!$passengerCard) {
        return back()->with('error', 'No barcode card found for this passenger.');
    }
    $price = PassengerRegistrationService::calculatePrice($passengerCard->route->distance, $data["class"], $passenger->Applicant->ocupation_sector);
    if($data['ticket_duration'] =="Q"){
        $price *=3;
    }

    //payment logic goes here.
        $passengerCard->update([
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
        $passenger = Passenger::with(['Applicant', 'Payments', 'BarcodeCard'])->findOrFail($id);
    
        return view('admin.singlepassenger', ['passenger' => $passenger]);
    }


    public function fetchByToken(Request $request, $stationID =null)
    {
    $token = trim($request->token);

    if (strlen($token) !== 36) {
        return response()->json(['error' => 'Invalid token length'], 400);
    }

    $passenger = Passenger::with('Applicant', 'BarcodeCard', 'route')->where('passenger_token', $token)->first();

    if (!$passenger) {
        return response()->json(['error' => 'Passenger not found'], 404);
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
            'validity' =>$this->getJourneyValidity($passenger->route->allowed_stations, $stationID)
            
        ]]);
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
}