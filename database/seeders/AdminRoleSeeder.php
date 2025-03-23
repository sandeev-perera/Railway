<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'role_name' => 'Higher Administrator',
                'description' => 'Has full access to all system features and settings.',
            ],
            [
                'id' => 2,
                'role_name' => 'Application Inspector - Eastern',
                'description' => 'Manages and inspects season ticket applications for the Eastern Province.',
            ],
            [
                'id' => 3,
                'role_name' => 'Application Inspector - Northern',
                'description' => 'Manages and inspects season ticket applications for the Northern Province.',
            ],
            [
                'id' => 4,
                'role_name' => 'Application Inspector - Southern',
                'description' => 'Manages and inspects season ticket applications for the Southern Province.',
            ],
            [
                'id' => 5,
                'role_name' => 'Application Inspector - Western',
                'description' => 'Manages and inspects season ticket applications for the Western Province.',
            ],
            [
                'id' => 6,
                'role_name' => 'Application Inspector - North Western',
                'description' => 'Manages and inspects season ticket applications for the North Western Province.',
            ],
            [
                'id' => 7,
                'role_name' => 'Application Inspector - North Central',
                'description' => 'Manages and inspects season ticket applications for the North Central Province.',
            ],
            [
                'id' => 8,
                'role_name' => 'Application Inspector - Uva',
                'description' => 'Manages and inspects season ticket applications for the Uva Province.',
            ],
            [
                'id' => 9,
                'role_name' => 'Application Inspector - Sabaragamuwa',
                'description' => 'Manages and inspects season ticket applications for the Sabaragamuwa Province.',
            ],
            [
                'id' => 10,
                'role_name' => 'Application Inspector - Central',
                'description' => 'Manages and inspects season ticket applications for the Central Province.',
            ],
            [
                'id' => 11,
                'role_name' => 'Revenue Officer',
                'description' => 'Handles all revenue and financial records related to season ticketing.',
            ],
            [
                'id' => 12,
                'role_name' => 'Ticket Validator',
                'description' => 'Responsible for validating season tickets during passenger travel.',
            ],
            [
                'id' => 13,
                'role_name' => 'Support Staff',
                'description' => 'Provides technical or administrative support within the system.',
            ],
            [
                'id' => 14,
                'role_name' => 'Station Manager',
                'description' => 'Oversees station-level operations and reporting.',
            ],
            [
                'id' => 15,
                'role_name' => 'Auditor',
                'description' => 'Reviews system and financial logs for compliance and audits.',
            ],
        ];
        DB::table('admin_roles')->insert($roles);  
    }
}
