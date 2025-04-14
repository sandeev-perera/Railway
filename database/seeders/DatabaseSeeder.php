<?php

namespace Database\Seeders;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\Applicant;
use App\Models\BarCodeCard;
use App\Models\BarcodeScanner;
use App\Models\CardConfig;
use App\Models\Contact;
use App\Models\Passenger;
use App\Models\Payment;
use App\Models\Route;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StationSeeder::class,
            AdminRoleSeeder::class,
            AdminSeeder::class,
            RoutesSeeder::class
        ]);
        // AdminRole::factory(10)->create();
        // Contact::factory(10)->create();
        // BarcodeScanner::factory(10)->create();
        // Admin::factory(10)->create();
        // Applicant::factory(10)->create();
        // Passenger::factory(10)->create();
        // Route::factory(10)->create();
        // CardConfig::factory(10)->create();
        // BarCodeCard::factory(10)->create();
        // Payment::factory(10)->create();
        
    }
}
