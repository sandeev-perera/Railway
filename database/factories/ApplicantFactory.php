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
            'nic' => $this->faker->unique()->regexify('[0-9]{9}[Vv]'), // Fake NIC format
            'admin_id' => rand(0,1) ? Admin::factory(): null, // Creates a related Admin or NULL
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'date_of_birth' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'), // Ensures 18+ age
            'address' => $this->faker->streetName,
            'district' => $this->faker->state,
            'province' => $this->faker->state,
            'occupation' => $this->faker->jobTitle,
            'occupation_address' => $this->faker->address,
            'occupation_sector' => rand(0,1) ? "private": "government",
            'home_station' => $this->faker->city,
            'work_station' => $this->faker->city,
            'photo' => 'uploads/photos/' . $this->faker->uuid . '.jpg',
            'source_of_proof' => 'uploads/proofs/' . $this->faker->uuid . '.pdf',
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            "status" => "pending"
        ];
    }
}
