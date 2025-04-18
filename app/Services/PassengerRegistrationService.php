<?php

namespace App\Services;

use App\Models\Route;

class PassengerRegistrationService
{
    public static function getRouteDetails($station1, $station2)
    {
        return Route::where(function ($query) use ($station1, $station2) {
                    $query->where('start_station_id', $station1)
                          ->where('end_station_id', $station2);
                })
                ->orWhere(function ($query) use ($station1, $station2) {
                    $query->where('start_station_id', $station2)
                          ->where('end_station_id', $station1);
                })
                ->first(['id', 'distance']);
    }

    public static function calculatePrice($distance, $class, $sector)
    {
        $base_price = config('ticket.base_price');
        $pricePerKM = config('ticket.price_per_km');

        $class_multiplyer = match($class) {
            '1st' => 1.5,
            '2nd' => 1.2,
            default => 1,
        };

        $sector_multiplyer = $sector === 'GOV' ? 0.5 : 1;

        $price = ($base_price + $distance * $pricePerKM) * $class_multiplyer * $sector_multiplyer;
        return $price;
    }
}
