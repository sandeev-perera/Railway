<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contactable_id' => rand(1, 10), // Assuming random IDs from related models
            'contactable_type' => $this->faker->randomElement(['Station', 'Admin', 'Applicant']),
            'type' => $this->faker->randomElement(['home', 'work', 'mobile', 'station']),
            'contact_value' => $this->faker->phoneNumber
        ];
    }
}
