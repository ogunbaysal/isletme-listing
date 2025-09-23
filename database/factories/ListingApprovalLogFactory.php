<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\ListingApprovalLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ListingApprovalLog>
 */
class ListingApprovalLogFactory extends Factory
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
            'admin_id' => User::factory(),
            'status' => $this->faker->randomElement([
                ListingApprovalLog::STATUS_PENDING,
                ListingApprovalLog::STATUS_APPROVED,
                ListingApprovalLog::STATUS_REJECTED,
            ]),
            'notes' => $this->faker->optional()->sentence(10),
            'metadata' => null,
        ];
    }
}
