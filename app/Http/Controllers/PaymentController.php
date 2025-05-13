<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnlinePaymentRequest;
use App\Models\Applicant;
use App\Models\Station;
use App\Services\PassengerRegistrationService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($type, OnlinePaymentRequest $request){
        $applicant = Applicant::findOrFail(session("user"));
        $data = $request->validated();
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
            $price = PassengerRegistrationService::calculatePrice($routeDetails['distance'], $data["class"], $applicant->occupation_sector);
            if($data['ticket_duration'] =="Q"){
                $price *=3;
            }
        
        $data['price'] = $price;
        $data['start_station'] = $startStationName;
        $data['end_station'] = $endStationName;
        $data['type'] = $type;
        $data['sector'] = $applicant->occupation_sector;

        return view('passenger.payment', compact('data'));
    }
}
