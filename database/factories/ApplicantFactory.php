<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'nic' => rand(0, 999999999999),
            'admin_id' => null,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'date_of_birth' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'), 
            'address' => $this->faker->streetName,
            'district' => "Anuradhapura",
            'province' => "North Central",
            'occupation' => $this->faker->jobTitle,
            'occupation_address' => $this->faker->address,
            'occupation_sector' => rand(0,1) ? "PVT": "GOV",
            'home_station' => "Anuradhapura",
            'work_station' => "North Central",
            'photo' => 'uploads/profileImages/ac6562b9-5a28-45f3-9722-c25a62126ba0.jpg',
            'source_of_proof' => 'uploads/pdfs/e125fc7f-749a-43af-bb40-1cb3bf450b54.pdf',
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('1234567'),
            "status" => "Pending"
        ];
    }
}
