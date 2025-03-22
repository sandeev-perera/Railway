<?php

namespace Database\Factories;

use App\Models\AdminRole;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'station_id' => rand(0, 1) ? Station::factory(): null,
            'Full_Name' => $this->faker->name,
            'Admin_Role_id' => AdminRole::factory(),
            'email' => $this->faker->unique()->safeEmail,
            'Password' => bcrypt('password')
        ];
    }
}
