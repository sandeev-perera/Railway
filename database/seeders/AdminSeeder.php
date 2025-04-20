<?php

namespace Database\Seeders;

use App\Models\Admin;
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
            ['full_name' => 'Nimal Perera','Station_id'=> 9 , 'admin_role_id' => 1, 'email' => 'admin1@gmail.com',],
            ['full_name' => 'Sanduni Fernando', 'Station_id'=> 13 , 'admin_role_id' => 1, 'email' => 'admin2@gmail.com'],

            // Eastern Admins
            ['full_name' => 'Kavindi Jayasinghe', 'admin_role_id' => 2, 'email' => 'admineastern@gmail.com'],
            ['full_name' => 'Dinesh Rathnayake', 'admin_role_id' => 2, 'email' => 'admineastern2@gmail.com'],

            // Northern Admins
            ['full_name' => 'Sachini Rajapaksha', 'admin_role_id' => 3, 'email' => 'adminnorthern@gmail.com'],
            ['full_name' => 'Tharindu Silva', 'admin_role_id' => 3, 'email' => 'adminnorthern2@gmail.com'],

            // Southern Admins
            ['full_name' => 'Isuru Gunawardena', 'admin_role_id' => 4, 'email' => 'adminsouthern@gmail.com'],
            ['full_name' => 'Dilani Herath', 'admin_role_id' => 4, 'email' => 'adminsouthern2@gmail.com'],

            // Western Admins
            ['full_name' => 'Chamari Senanayake', 'admin_role_id' => 5, 'email' => 'adminwestern@gmail.com'],
            ['full_name' => 'Kusal Wijesinghe', 'admin_role_id' => 5, 'email' => 'adminwestern2@gmail.com'],

            // North Western Admins
            ['full_name' => 'Nadeesha Lakmali', 'admin_role_id' => 6, 'email' => 'adminnorthwestern@gmail.com'],
            ['full_name' => 'Supun Madushanka', 'admin_role_id' => 6, 'email' => 'adminnorthwestern2@gmail.com'],

            // North Central Admins
            ['full_name' => 'Dinithi Abeysekara', 'admin_role_id' => 7, 'email' => 'adminnorthcentral@gmail.com'],
            ['full_name' => 'Janith Liyanage', 'admin_role_id' => 7, 'email' => 'adminnorthcentral2@gmail.com'],

            // Uva Admins
            ['full_name' => 'Harsha Bandara', 'admin_role_id' => 8, 'email' => 'adminuva@gmail.com'],
            ['full_name' => 'Madushani Ekanayake', 'admin_role_id' => 8, 'email' => 'adminuva2@gmail.com'],

            // Sabaragamuwa Admins
            ['full_name' => 'Thisara Ranasinghe', 'admin_role_id' => 9, 'email' => 'adminsabaragamuwa@gmail.com'],
            ['full_name' => 'Sithara Jayalath', 'admin_role_id' => 9, 'email' => 'adminsabaragamuwa2@gmail.com'],

            // Central Admins
            ['full_name' => 'Dilshan Pathirana', 'admin_role_id' => 10, 'email' => 'admincentral@gmail.com'],
            ['full_name' => 'Nilakshi Nadeeka', 'admin_role_id' => 10, 'email' => 'admincentral2@gmail.com'],

            // Revenue Officer 
            ['full_name' => 'Pasindu Nirmal', 'admin_role_id' => 11, 'email' => 'adminrevenue@gmail.com'],
            ['full_name' => 'Sandali Dilhara', 'admin_role_id' => 11, 'email' => 'adminrevenue2@gmail.com'],

            // Ticket Validator 
            ['full_name' => 'Sanjeewa Kumara',      'Station_id'=> 1,  'admin_role_id' => 12, 'email' => 'adminticket1@gmail.com'],
        ['full_name' => 'Thilini Wijeratne',    'Station_id'=> 2,  'admin_role_id' => 12, 'email' => 'adminticket2@gmail.com'],
        ['full_name' => 'Nuwan Perera',         'Station_id'=> 3,  'admin_role_id' => 12, 'email' => 'adminticket3@gmail.com'],
        ['full_name' => 'Dulani Tharuka',       'Station_id'=> 4,  'admin_role_id' => 12, 'email' => 'adminticket4@gmail.com'],
        ['full_name' => 'Chaminda Silva',       'Station_id'=> 5,  'admin_role_id' => 12, 'email' => 'adminticket5@gmail.com'],
        ['full_name' => 'Isuru Madushan',       'Station_id'=> 6,  'admin_role_id' => 12, 'email' => 'adminticket6@gmail.com'],
        ['full_name' => 'Anusha Rajapaksha',    'Station_id'=> 7,  'admin_role_id' => 12, 'email' => 'adminticket7@gmail.com'],
        ['full_name' => 'Malith Fernando',      'Station_id'=> 8,  'admin_role_id' => 12, 'email' => 'adminticket8@gmail.com'],
        ['full_name' => 'Kavindi Dissanayake',  'Station_id'=> 9,  'admin_role_id' => 12, 'email' => 'adminticket9@gmail.com'],
        ['full_name' => 'Ravindu Jayasuriya',   'Station_id'=> 10, 'admin_role_id' => 12, 'email' => 'adminticket10@gmail.com'],
        ['full_name' => 'Dinesh Hettiarachchi', 'Station_id'=> 11, 'admin_role_id' => 12, 'email' => 'adminticket11@gmail.com'],
        ['full_name' => 'Nadeesha Peris',       'Station_id'=> 12, 'admin_role_id' => 12, 'email' => 'adminticket12@gmail.com'],
        ['full_name' => 'Tharindu Lakshan',     'Station_id'=> 13, 'admin_role_id' => 12, 'email' => 'adminticket13@gmail.com'],
        ['full_name' => 'Nipuni Ranasinghe',    'Station_id'=> 14, 'admin_role_id' => 12, 'email' => 'adminticket14@gmail.com'],
        ['full_name' => 'Pubudu Senanayake',    'Station_id'=> 15, 'admin_role_id' => 12, 'email' => 'adminticket15@gmail.com'],
        ['full_name' => 'Hiruni Jayawardena',   'Station_id'=> 16, 'admin_role_id' => 12, 'email' => 'adminticket16@gmail.com'],
        ['full_name' => 'Sasindu Rathnayake',   'Station_id'=> 17, 'admin_role_id' => 12, 'email' => 'adminticket17@gmail.com'],
        ['full_name' => 'Manori Ekanayake',     'Station_id'=> 18, 'admin_role_id' => 12, 'email' => 'adminticket18@gmail.com'],
        ['full_name' => 'Dinuka Abeysekara',    'Station_id'=> 19, 'admin_role_id' => 12, 'email' => 'adminticket19@gmail.com'],
        ['full_name' => 'Gayanthi Kalubowila',  'Station_id'=> 20, 'admin_role_id' => 12, 'email' => 'adminticket20@gmail.com'],
        ];

        foreach ($admins as &$admin) {
            if(empty($admin['Station_id'])){
                $admin['Station_id'] = null;
            }
            $admin['password'] = bcrypt('1234567');
            $admin['created_at'] = now();
            $admin['updated_at'] = now();
        }
        Admin::insert($admins);
    }
}
