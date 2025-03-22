<?php

namespace Database\Factories;

use App\Models\BarCodeCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bar_code_card_id' => BarCodeCard::factory(), // Can be null or a valid BarcodeCard
            'Amount' => $this->faker->randomFloat(2, 100, 10000), // Amount between 100 and 10,000
            'Payment_Date' => now(), // Current date and time
            'Payment_Mode' => $this->faker->randomElement(["Debit", "Credit", "On Cash"]),
       
        ];
    }
}
