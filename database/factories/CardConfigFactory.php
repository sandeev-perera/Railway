<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardConfig>
 */
class CardConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'route_id' => Route::factory(),
            'Class_Type' => $this->faker->randomElement(["1", "2", "3"]),
            'Price' => $this->faker->randomFloat(2, 100, 5000), // Random price between 100 and 5000
        ];
    }
}
