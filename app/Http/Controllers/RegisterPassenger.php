<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\BarCodeCard;
use App\Models\Passenger;
use App\Models\Station;
use App\Services\PassengerRegistrationService;
use Illuminate\Support\Str;
use App\Http\Requests\OnlinePaymentRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class RegisterPassenger extends Controller
{
    public function RegisterPassengerWithOnlinePayment(Applicant $applicant, OnlinePaymentRequest $request){
        $data = $request->validated();
        try{
            DB::beginTransaction();
            if ($applicant->passenger) {
                return back()->with('error', 'This applicant is already a registered passenger.');
            }
            $passenger = Passenger::create([
                'applicant_id' => $applicant->id,
                'passenger_token' => Str::uuid(),
                'status'=>"active"
            ]);
            $passengerID = $passenger->id; 
            $startStationName = $applicant->home_station;
            $endStationName = $applicant->work_station;

            
            $stations = Station::select('id', 'station_name')->
                whereIn('station_name', [$startStationName, $endStationName])
                ->get();
            
            if ($stations->count() < 2) {
                return redirect()->back()->with('error', 'One or both train stations were not found.');
            }

            
            $startStationId = $stations->firstWhere('station_name', $startStationName)?->id;
            $endStationId = $stations->firstWhere('station_name', $endStationName)?->id;
            $routeDetails = PassengerRegistrationService::getRouteDetails($startStationId, $endStationId);
            $price = PassengerRegistrationService::calculatePrice($routeDetails['distance'], $data["class"], $applicant->ocupation_sector);
            if($data['ticket_duration'] =="Q"){
                $price *=3;
            }
            
            //payment gateway service goes here 

            Payment::create([
                'passenger_id' => $passengerID,
                'Amount' => $price,
                'payment_type' => 'registration',
                'payment_mode' => 'Debit'
            ]);

            //create card for the passenger
            BarCodeCard::create([
                'passenger_id' => $passengerID,
                'route_id' => $routeDetails["id"],
                'class' => $data["class"],
                'ticket_duration' => $data["ticket_duration"],
                'price' => $price,
                'expire_date' => $data["ticket_duration"] == "M"? now()->addMonth(): now()->addMonths(3),
            ]);
            
            DB::commit();
            // $user = Applicant::where("id", $applicant->id)->first();
            session(['role' => "passenger", "passengerID" => $passengerID, "user"=>$applicant->id]);
            
            return $this->redirectWithSuccess('show.passenger.dashboard', "You are now a Passenger");

        }
     catch (\Exception) {

        DB::rollBack();
        dd("Error Happens");
        return back()->with("error", "Something Went Wrong");
    }
    }

}
