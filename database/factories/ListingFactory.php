<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\PlaceType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'owner_id' => User::factory(),
            'place_type_id' => PlaceType::factory(),
            'title' => $title,
            'slug' => Str::slug($title . '-' . $this->faker->unique()->numerify('###')),
            'summary' => $this->faker->sentence(12),
            'description' => $this->faker->paragraphs(4, true),
            'location' => [
                'address' => $this->faker->streetAddress(),
                'city' => $this->faker->city(),
            ],
            'coordinates' => [
                'lat' => $this->faker->latitude(36.0, 37.0),
                'lng' => $this->faker->longitude(27.0, 29.0),
            ],
            'address_line1' => $this->faker->streetAddress(),
            'address_line2' => $this->faker->optional()->secondaryAddress(),
            'city' => $this->faker->city(),
            'region' => $this->faker->state(),
            'country' => 'TR',
            'postal_code' => $this->faker->postcode(),
            'contact_email' => $this->faker->companyEmail(),
            'contact_phone' => $this->faker->phoneNumber(),
            'website_url' => $this->faker->optional()->url(),
            'status' => Listing::STATUS_PENDING,
            'visibility' => Listing::VISIBILITY_PUBLIC,
            'primary_language' => 'tr',
            'is_featured' => $this->faker->boolean(10),
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'expires_at' => $this->faker->optional()->dateTimeBetween('now', '+6 months'),
            'seo' => [
                'title' => $title,
                'description' => $this->faker->sentence(20),
            ],
            'metadata' => [
                'amenities_source' => 'factory',
            ],
        ];
    }
}
