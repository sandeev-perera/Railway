<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnlinePaymentRequest;
use App\Models\Applicant;
use App\Models\BarCodeCard;
use App\Models\Passenger;
use Illuminate\Http\Request;

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

    //payment logic goes here.
        $passengerCard->update([
            'start_date' => now(),
            'expire_date' => $data["ticket_duration"] == "M"? now()->addMonth(): now()->addMonths(3)
        ]);

        $passenger->update([
            'status' => 'active',]);
        
        return $this->redirectWithSuccess('show.passenger.dashboard',"You card has been Renewed");
    }

    public function fetchByToken(Request $request)
    {
    $token = trim($request->token);

    if (strlen($token) !== 36) {
        return response()->json(['error' => 'Invalid token length'], 400);
    }

    $passenger = Passenger::where('passenger_token', $token)->first();

    if (!$passenger) {
        return response()->json(['error' => 'Passenger not found'], 404);
    }


    return response()->json(['passenger' => [

            'id' => $passenger->id,
            'status' => $passenger->status,
            'full_name' => $passenger->applicant->full_name,
            'sector' => $passenger->applicant->occupation_sector,
            'home_station' => $passenger->applicant->home_station,
            'work_station' =>$passenger->applicant->work_station,
            'photo' =>  asset('storage/'.$passenger->applicant->photo),
            'class' => $passenger->BarcodeCard->class,
            'expire_date' =>$passenger->BarCodeCard->expire_date

        ]]);
    }



}