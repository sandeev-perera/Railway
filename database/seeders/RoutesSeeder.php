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
        
    }
}
