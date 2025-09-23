<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\ListingView;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingView>
 */
class ListingViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'listing_id' => Listing::factory(),
            'viewer_id' => User::factory(),
            'viewed_at' => Carbon::now()->subMinutes($this->faker->numberBetween(1, 720)),
            'source' => $this->faker->randomElement(['search', 'map', 'collection', 'direct']),
            'metadata' => [
                'device' => $this->faker->randomElement(['desktop', 'mobile']),
            ],
        ];
    }
}
