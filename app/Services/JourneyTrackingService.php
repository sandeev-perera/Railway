<?php

namespace App\Services;

use App\Models\Journey;
use App\Models\Passenger;
use Illuminate\Support\Facades\Log;

class JourneyTrackingService{

    
    public static function checkin(Passenger $passenger, $stationID=-1){
        $latest_journey = $passenger->latestJourney;

        if($latest_journey){
            if($latest_journey->status == "Ongoing"){
                return "This passenger has an ongoing journey";
            }    
        }
        Journey::create([
                "passenger_id" => $passenger->id, 
                "start_station_id" => $stationID,
                'status' => "Ongoing"
            ]);
        return "Journey recorded";
    }

    public static function checkout(Passenger $passenger, $stationID, $validity){
        if($stationID < 0){
            return "You are not autharized to complete this Process";
        }
        $latest_journey = $passenger->latestJourney;
        if(!$latest_journey){
            return "This passenger does not have an ongoing journey";
        }
        if($latest_journey->status != "Ongoing"){
            return "this passenger does not have an Ongoing journey";
        }

        $journey_status = "Completed";

        if($latest_journey->created_at->lt(now()->subHours(8)) || $stationID == $latest_journey->start_station_id){
            $journey_status = "Suspecious";
        }

        if($validity == "OUT OF BOUND"){
            $journey_status = "Illegal";
        }

        if($latest_journey->update([
            "end_station_id" => $stationID,
            'checked_out_time' => now(),
            'status'=>$journey_status
        ])){
            return "Record Updated, Status: " .$journey_status;
        }

    }
}