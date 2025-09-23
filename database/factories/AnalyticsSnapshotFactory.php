<?php

namespace Database\Factories;

use App\Models\AnalyticsSnapshot;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnalyticsSnapshot>
 */
class AnalyticsSnapshotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'metric' => $metric = $this->faker->randomElement([
                'listings.active',
                'subscriptions.active',
                'blogs.featured',
                'traffic.visits',
            ]),
            'value' => $metric === 'traffic.visits'
                ? $this->faker->numberBetween(100, 5000)
                : $this->faker->randomFloat(2, 0, 1000),
            'captured_at' => Carbon::now()->subHours($this->faker->numberBetween(1, 72)),
            'dimensions' => [
                'region' => $this->faker->randomElement(['Mugla', 'Antalya', 'Istanbul']),
            ],
            'metadata' => null,
        ];
    }
}
