<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\PaymentTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentTransaction>
 */
class PaymentTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id' => Invoice::factory(),
            'provider' => $provider = $this->faker->randomElement(['stripe', 'iyzico', 'manual']),
            'reference' => Str::upper($provider) . '-' . $this->faker->unique()->numerify('########'),
            'status' => $this->faker->randomElement([
                PaymentTransaction::STATUS_COMPLETED,
                PaymentTransaction::STATUS_PENDING,
                PaymentTransaction::STATUS_FAILED,
            ]),
            'amount' => $this->faker->randomFloat(2, 199, 1599),
            'currency' => 'TRY',
            'processed_at' => Carbon::now()->subMinutes($this->faker->numberBetween(1, 120)),
            'payload' => [
                'channel' => $this->faker->randomElement(['web', 'admin']),
            ],
            'metadata' => null,
        ];
    }
}
