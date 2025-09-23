<?php

namespace Database\Factories;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubscriptionPlan>
 */
class SubscriptionPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->randomElement(['Starter', 'Growth', 'Pro', 'Premium']);

        return [
            'code' => Str::upper(Str::slug($name)) . '-' . $this->faker->unique()->numerify('###'),
            'name' => $name,
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->randomFloat(2, 199, 1599),
            'currency' => 'TRY',
            'billing_interval' => $this->faker->randomElement([
                SubscriptionPlan::INTERVAL_MONTH,
                SubscriptionPlan::INTERVAL_YEAR,
            ]),
            'billing_interval_count' => 1,
            'listing_limit' => $this->faker->optional()->numberBetween(3, 25),
            'features' => [
                'highlighted_listing' => $this->faker->boolean(),
                'support_level' => $this->faker->randomElement(['email', 'phone', 'priority']),
            ],
            'is_active' => true,
            'metadata' => null,
        ];
    }
}
