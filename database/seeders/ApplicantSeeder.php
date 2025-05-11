<?php

namespace Database\Seeders;

use App\Models\Applicant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Applicant::create([
            'full_name'          => 'Sandeev Perera',
            'nic'                => '200306910034',
            'admin_id'           => null,
            'gender'             => 'Male',
            'date_of_birth'      => '1999-01-01',
            'address'            => '123 Main Street, Colombo',
            'district'           => 'Colombo',
            'province'           => 'Western',
            'occupation'         => 'Software Engineer',
            'occupation_address' => '123 Work Street, Colombo',
            'occupation_sector'  => 'GOV',
            'home_station'       => 'Maradana',
            'work_station'       => 'Yagoda',
            'photo'              => 'uploads/profileImages/3ac27dc5-0db3-4330-ae6d-fa44c8349759.png',
            'source_of_proof'    => 'uploads/pdfs/5de6b919-0c5f-48ec-9bc4-cc840bb5dcf3.pdf',
            'email'              => 'sandeev.perera@gmail.com',
            'password'           => Hash::make('1234567'),
            'status'             => 'Approved',
        ]);
        
    }
}
