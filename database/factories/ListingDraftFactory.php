<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\ListingDraft;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingDraft>
 */
class ListingDraftFactory extends Factory
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
            'listing_id' => null,
            'owner_id' => User::factory(),
            'status' => ListingDraft::STATUS_EDITING,
            'payload' => [
                'title' => $title,
                'summary' => $this->faker->sentence(12),
            ],
            'submitted_at' => null,
            'metadata' => null,
        ];
    }
}
