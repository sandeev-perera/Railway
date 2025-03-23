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
        $stations = [
            ['Station_Name' => 'Fort Railway Station', 'Location' => 'Colombo'],
            ['Station_Name' => 'Maradana Railway Station', 'Location' => 'Maradan'],
            ['Station_Name' => 'Galle Railway Station', 'Location' => 'Galle'],
            ['Station_Name' => 'Matara Railway Station', 'Location' => 'Matara'],
            ['Station_Name' => 'Anuradhapura Railway Station', 'Location' => 'Anuradhapura'],
            ['Station_Name' => 'Jaffna Railway Station', 'Location' => 'Jaffna'],
            ['Station_Name' => 'Badulla Railway Station', 'Location' => 'Badulla'],
            ['Station_Name' => 'Kandy Railway Station', 'Location' => 'Kandy'],
            ['Station_Name' => 'Peradeniya Railway Station', 'Location' => 'Peradeniya'],
            ['Station_Name' => 'Hatton Railway Station', 'Location' => 'Hatton'],
            ['Station_Name' => 'Nanu Oya Railway Station', 'Location' => 'Nuwara Eliya'],
            ['Station_Name' => 'Polonnaruwa Railway Station', 'Location' => 'Polonnaruwa'],
            ['Station_Name' => 'Kurunegala Railway Station', 'Location' => 'Kurunegala'],
            ['Station_Name' => 'Avissawella Railway Station', 'Location' => 'Avissawella'],
            ['Station_Name' => 'Ambalangoda Railway Station', 'Location' => 'Ambalangoda'],
            ['Station_Name' => 'Aluthgama Railway Station', 'Location' => 'Aluthgama'],
            ['Station_Name' => 'Panadura Railway Station', 'Location' => 'Panadura'],
            ['Station_Name' => 'Kalutara South Railway Station', 'Location' => 'Kalutara'],
            ['Station_Name' => 'Negombo Railway Station', 'Location' => 'Negombo'],
            ['Station_Name' => 'Vavuniya Railway Station', 'Location' => 'Vavuniya'],
            ['Station_Name' => 'Trincomalee Railway Station', 'Location' => 'Trincomalee'],
            ['Station_Name' => 'Batticaloa Railway Station', 'Location' => 'Batticaloa'],
            ['Station_Name' => 'Gampaha Railway Station', 'Location' => 'Gampaha'],
            ['Station_Name' => 'Ragama Railway Station', 'Location' => 'Ragama'],
            ['Station_Name' => 'Chilaw Railway Station', 'Location' => 'Chilaw'],
            ['Station_Name' => 'Puttalam Railway Station', 'Location' => 'Puttalam'],
            ['Station_Name' => 'Mahawa Railway Station', 'Location' => 'Mahawa'],
            ['Station_Name' => 'Maho Junction Railway Station', 'Location' => 'Maho'],
            ['Station_Name' => 'Omanthai Railway Station', 'Location' => 'Omanthai'],
            ['Station_Name' => 'Medawachchiya Railway Station', 'Location' => 'Medawachchiya'],
            ['Station_Name' => 'Kilinochchi Railway Station', 'Location' => 'Kilinochchi'],
            ['Station_Name' => 'Mallakam Railway Station', 'Location' => 'Mallakam'],
            ['Station_Name' => 'Dematagoda Railway Station', 'Location' => 'Dematagoda'],
            ['Station_Name' => 'Moratuwa Railway Station', 'Location' => 'Moratuwa'],
            ['Station_Name' => 'Wadduwa Railway Station', 'Location' => 'Wadduwa'],
            ['Station_Name' => 'Beruwala Railway Station', 'Location' => 'Beruwala'],
            ['Station_Name' => 'Hikkaduwa Railway Station', 'Location' => 'Hikkaduwa'],
            ['Station_Name' => 'Bentota Railway Station', 'Location' => 'Bentota'],
            ['Station_Name' => 'Koggala Railway Station', 'Location' => 'Koggala'],
            ['Station_Name' => 'Haputale Railway Station', 'Location' => 'Haputale'],
            ['Station_Name' => 'Ella Railway Station', 'Location' => 'Ella'],
            ['Station_Name' => 'Bandarawela Railway Station', 'Location' => 'Bandarawela'],
            ['Station_Name' => 'Talawakele Railway Station', 'Location' => 'Talawakele'],
            ['Station_Name' => 'Watawala Railway Station', 'Location' => 'Watawala'],
            ['Station_Name' => 'Gampola Railway Station', 'Location' => 'Gampola'],
            ['Station_Name' => 'Naula Railway Station', 'Location' => 'Naula'],
            ['Station_Name' => 'Matale Railway Station', 'Location' => 'Matale'],
            ['Station_Name' => 'Galoya Junction Railway Station', 'Location' => 'Gal Oya'],
            ['Station_Name' => 'Habarana Railway Station', 'Location' => 'Habarana'],
        ];

        DB::table('stations')->insert($stations);
    }
    
}
