<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $issuedAt = Carbon::now()->subDays($this->faker->numberBetween(0, 10));

        return [
            'subscription_id' => Subscription::factory(),
            'number' => 'INV-' . Str::upper($this->faker->bothify('????-####')),
            'status' => $this->faker->randomElement([
                Invoice::STATUS_OPEN,
                Invoice::STATUS_PAID,
                Invoice::STATUS_DRAFT,
            ]),
            'amount' => $this->faker->randomFloat(2, 199, 1599),
            'currency' => 'TRY',
            'issued_at' => $issuedAt,
            'due_at' => (clone $issuedAt)->addDays(7),
            'paid_at' => $this->faker->optional()->dateTimeBetween($issuedAt, 'now'),
            'metadata' => null,
        ];
    }
}
