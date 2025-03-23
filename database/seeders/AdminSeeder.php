<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            // Role ID 1 - System Administrator
            ['full_name' => 'Nimal Perera', 'Admin_Role_ID' => 1, 'email' => 'admin1@gmail.com'],
            ['full_name' => 'Sanduni Fernando', 'Admin_Role_ID' => 1, 'email' => 'admin2@gmail.com'],

            // Eastern Admins
            ['full_name' => 'Kavindi Jayasinghe', 'Admin_Role_ID' => 2, 'email' => 'admineastern@gmail.com'],
            ['full_name' => 'Dinesh Rathnayake', 'Admin_Role_ID' => 2, 'email' => 'admineastern2@gmail.com'],

            // Northern Admins
            ['full_name' => 'Sachini Rajapaksha', 'Admin_Role_ID' => 3, 'email' => 'adminnorthern@gmail.com'],
            ['full_name' => 'Tharindu Silva', 'Admin_Role_ID' => 3, 'email' => 'adminnorthern2@gmail.com'],

            // Southern Admins
            ['full_name' => 'Isuru Gunawardena', 'Admin_Role_ID' => 4, 'email' => 'adminsouthern@gmail.com'],
            ['full_name' => 'Dilani Herath', 'Admin_Role_ID' => 4, 'email' => 'adminsouthern2@gmail.com'],

            // Western Admins
            ['full_name' => 'Chamari Senanayake', 'Admin_Role_ID' => 5, 'email' => 'adminwestern@gmail.com'],
            ['full_name' => 'Kusal Wijesinghe', 'Admin_Role_ID' => 5, 'email' => 'adminwestern2@gmail.com'],

            // North Western Admins
            ['full_name' => 'Nadeesha Lakmali', 'Admin_Role_ID' => 6, 'email' => 'adminnorthwestern@gmail.com'],
            ['full_name' => 'Supun Madushanka', 'Admin_Role_ID' => 6, 'email' => 'adminnorthwestern2@gmail.com'],

            // North Central Admins
            ['full_name' => 'Dinithi Abeysekara', 'Admin_Role_ID' => 7, 'email' => 'adminnorthcentral@gmail.com'],
            ['full_name' => 'Janith Liyanage', 'Admin_Role_ID' => 7, 'email' => 'adminnorthcentral2@gmail.com'],

            // Uva Admins
            ['full_name' => 'Harsha Bandara', 'Admin_Role_ID' => 8, 'email' => 'adminuva@gmail.com'],
            ['full_name' => 'Madushani Ekanayake', 'Admin_Role_ID' => 8, 'email' => 'adminuva2@gmail.com'],

            // Sabaragamuwa Admins
            ['full_name' => 'Thisara Ranasinghe', 'Admin_Role_ID' => 9, 'email' => 'adminsabaragamuwa@gmail.com'],
            ['full_name' => 'Sithara Jayalath', 'Admin_Role_ID' => 9, 'email' => 'adminsabaragamuwa2@gmail.com'],

            // Central Admins
            ['full_name' => 'Dilshan Pathirana', 'Admin_Role_ID' => 10, 'email' => 'admincentral@gmail.com'],
            ['full_name' => 'Nilakshi Nadeeka', 'Admin_Role_ID' => 10, 'email' => 'admincentral2@gmail.com'],

            // Revenue Officer 
            ['full_name' => 'Pasindu Nirmal', 'Admin_Role_ID' => 11, 'email' => 'adminrevenue@gmail.com'],
            ['full_name' => 'Sandali Dilhara', 'Admin_Role_ID' => 11, 'email' => 'adminrevenue2@gmail.com'],

            // Ticket Validator 
            ['full_name' => 'Sanjeewa Kumara', 'Admin_Role_ID' => 12, 'email' => 'adminticket@gmail.com'],
            ['full_name' => 'Thilini Wijeratne', 'Admin_Role_ID' => 12, 'email' => 'adminticket2@gmail.com'],
        ];

        foreach ($admins as &$admin) {
            $admin['Station_id'] = null;
            $admin['password'] = bcrypt('1234567');
            $admin['created_at'] = now();
            $admin['updated_at'] = now();
        }

        DB::table('admins')->insert($admins);
    }
}
