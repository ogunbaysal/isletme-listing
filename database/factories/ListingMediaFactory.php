<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\ListingMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingMedia>
 */
class ListingMediaFactory extends Factory
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
            'disk' => 'public',
            'path' => 'listings/' . $this->faker->uuid() . '.jpg',
            'type' => ListingMedia::TYPE_IMAGE,
            'caption' => $this->faker->optional()->sentence(6),
            'alt_text' => $this->faker->sentence(4),
            'sort_order' => $this->faker->numberBetween(0, 5),
            'is_primary' => $this->faker->boolean(20),
            'metadata' => null,
        ];
    }
}
