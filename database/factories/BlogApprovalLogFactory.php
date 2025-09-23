<?php

namespace Database\Factories;

use App\Models\BlogApprovalLog;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogApprovalLog>
 */
class BlogApprovalLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blog_post_id' => BlogPost::factory(),
            'admin_id' => User::factory(),
            'status' => $this->faker->randomElement([
                BlogApprovalLog::STATUS_PENDING,
                BlogApprovalLog::STATUS_APPROVED,
                BlogApprovalLog::STATUS_REJECTED,
            ]),
            'notes' => $this->faker->optional()->sentence(10),
            'metadata' => null,
        ];
    }
}
