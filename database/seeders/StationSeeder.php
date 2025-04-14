<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        $mainLine = array_reverse([
            // ['station_name' => 'Badulla', 'location' => 'Badulla'],
            // ['station_name' => 'Hali Ela', 'location' => 'Badulla'],
            // ['station_name' => 'Uduwara', 'location' => 'Badulla'],
            // ['station_name' => 'Demodara', 'location' => 'Badulla'],
            // ['station_name' => 'Ella', 'location' => 'Badulla'],
            // ['station_name' => 'Kithal Ella', 'location' => 'Badulla'],
            // ['station_name' => 'Heel Oya', 'location' => 'Badulla'],
            // ['station_name' => 'Kinigama', 'location' => 'Badulla'],
            // ['station_name' => 'Bandarawela', 'location' => 'Badulla'],
            // ['station_name' => 'Diyatalawa', 'location' => 'Badulla'],
            // ['station_name' => 'Haputale', 'location' => 'Badulla'],
            // ['station_name' => 'Glenonare', 'location' => 'Badulla'],
            // ['station_name' => 'Idalgashinna', 'location' => 'Badulla'],
            // ['station_name' => 'Ohiya', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Pattipola', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Ambewela', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Nanu Oya', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Radella', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Great Western', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Watagoda', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Thalawakele', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'St.Clair', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Kotagala', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Hatton', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Rozella', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Watawala', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Galboda', 'location' => 'Nuwara Eliya'],
            // ['station_name' => 'Nawalapitiya', 'location' => 'Kandy'],
            // ['station_name' => 'Ulapane', 'location' => 'Kandy'],
            // ['station_name' => 'Gampola', 'location' => 'Kandy'],
            // ['station_name' => 'Peradeniya Junction', 'location' => 'Kandy'],
            // ['station_name' => 'Kadugannawa', 'location' => 'Kandy'],
            // ['station_name' => 'Balana', 'location' => 'Kandy'],
            // ['station_name' => 'Ihala Kotte', 'location' => 'Kandy'],
            // ['station_name' => 'Gangoda', 'location' => 'Kandy'],
            // ['station_name' => 'Rambukkana', 'location' => 'Kegalle'],
            // ['station_name' => 'Yatagama', 'location' => 'Kurunegala'],
            // ['station_name' => 'Korossa', 'location' => 'Kurunegala'],
            // ['station_name' => 'Tismalpola', 'location' => 'Kurunegala'],
            // ['station_name' => 'Panaliya', 'location' => 'Kurunegala'],
            // ['station_name' => 'Polgahawela Junction', 'location' => 'Kurunegala'],
            // ['station_name' => 'Walakumbura', 'location' => 'Kurunegala'],
            // ['station_name' => 'Alawwa', 'location' => 'Kurunegala'],
            // ['station_name' => 'Bujjomuwa', 'location' => 'Kurunegala'],
            // ['station_name' => 'Yattalgoda', 'location' => 'Kurunegala'],
            // ['station_name' => 'Ambepussa', 'location' => 'Gampaha'],
            // ['station_name' => 'Botale', 'location' => 'Gampaha'],
            // ['station_name' => 'Wilawata', 'location' => 'Gampaha'],
            // ['station_name' => 'Mirigama', 'location' => 'Gampaha'],
            // ['station_name' => 'Wijaya Rajadahana', 'location' => 'Gampaha'],
            // ['station_name' => 'Ganegoda', 'location' => 'Gampaha'],
            // ['station_name' => 'Pallewela', 'location' => 'Gampaha'],
            // ['station_name' => 'Keenawala', 'location' => 'Gampaha'],
            // ['station_name' => 'Wadurawa', 'location' => 'Gampaha'],
            ['station_name' => 'Veyangoda', 'location' => 'Gampaha'],
            ['station_name' => 'Heendeniya Pattiyagoda', 'location' => 'Gampaha'],
            ['station_name' => 'Magalegoda', 'location' => 'Gampaha'],
            ['station_name' => 'Bemmulla', 'location' => 'Gampaha'],
            ['station_name' => 'Daraluwa', 'location' => 'Gampaha'],
            ['station_name' => 'Gampaha', 'location' => 'Gampaha'],
            ['station_name' => 'Attanagalu Oya', 'location' => 'Gampaha'],
            ['station_name' => 'Yagoda', 'location' => 'Gampaha'],
            ['station_name' => 'Ganemulla', 'location' => 'Gampaha'],
            ['station_name' => 'Bulugahagoda', 'location' => 'Gampaha'],
            ['station_name' => 'Batuwaththa', 'location' => 'Gampaha'],
            ['station_name' => 'Walpola', 'location' => 'Gampaha'],
            ['station_name' => 'Horape', 'location' => 'Gampaha'],
            ['station_name' => 'Ederamulla', 'location' => 'Gampaha'],
            ['station_name' => 'Hunupitiya', 'location' => 'Gampaha'],
            ['station_name' => 'Wanawasala', 'location' => 'Colombo'],
            ['station_name' => 'Kelaniya', 'location' => 'Colombo'],
            ['station_name' => 'Dematagoda', 'location' => 'Colombo'],
            ['station_name' => 'Maradana', 'location' => 'Colombo'],
            ['station_name' => 'Colombo Fort', 'location' => 'Colombo'],
        ]);

        DB::table('stations')->insert($mainLine);
    }
    
}
