<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maxStations = 20;
        $routes = [];

        for ($start = 1; $start <= $maxStations - 1; $start++) {
            for ($end = $start + 1; $end <= $maxStations; $end++) {
                $allowedStations = range($start, $end);
                $distance = ($end - $start) * 5.0;

                $routes[] = [
                    'start_station_id' => $start,
                    'end_station_id' => $end,
                    'allowed_stations' => json_encode($allowedStations),
                    'distance' => $distance,
                ];
            }
        }

        Route::insert($routes);
        // function randomFloat($min, $max, $decimals = 2) {
        //     $float = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        //     return round($float, $decimals);
        // }

        // $stationIds = Station::pluck('id')->toArray();
        // $routes = [];

        // for($i=0 ; $i < count($stationIds)-1; $i++){
        //     $start_station_id = $stationIds[$i];
        //     $end_station_id = $stationIds[$i+1];
        //     $distance = randomFloat(1,6);
        //     $routes[] = [
        //         "start_station_id" => $start_station_id,
        //         "end_station_id" => $end_station_id,
        //         "distance" => $distance
        //     ];
        // }
        // Route::insert($routes);
    }
}
