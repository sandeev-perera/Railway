<?php

namespace Database\Factories;

use App\Models\CardConfig;
use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarCodeCard>
 */
class BarCodeCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = now();
        $endDate = $startDate->copy()->addMonths($this->faker->randomElement([1, 3]));
        return [

        ];
    }
}
