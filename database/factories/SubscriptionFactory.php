<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = Carbon::now()->subDays($this->faker->numberBetween(0, 30));
        $renewsAt = (clone $startsAt)->addMonth();

        return [
            'owner_id' => User::factory(),
            'plan_id' => SubscriptionPlan::factory(),
            'status' => $this->faker->randomElement([
                Subscription::STATUS_ACTIVE,
                Subscription::STATUS_TRIALING,
                Subscription::STATUS_PAST_DUE,
            ]),
            'starts_at' => $startsAt,
            'ends_at' => null,
            'renews_at' => $renewsAt,
            'canceled_at' => null,
            'trial_ends_at' => $this->faker->optional()->dateTimeBetween('now', '+14 days'),
            'metadata' => null,
        ];
    }
}
