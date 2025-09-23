<?php

namespace Database\Factories;

use App\Models\AuditLog;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuditLog>
 */
class AuditLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'action' => $this->faker->randomElement(['listing.approved', 'blog.rejected', 'subscription.updated']),
            'auditable_type' => Listing::class,
            'auditable_id' => Listing::factory(),
            'changes' => [
                'before' => ['status' => 'pending'],
                'after' => ['status' => 'approved'],
            ],
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
            'context' => [
                'request_id' => Str::uuid()->toString(),
            ],
        ];
    }
}
