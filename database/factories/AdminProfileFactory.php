<?php

namespace Database\Factories;

use App\Models\AdminProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminProfile>
 */
class AdminProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = $this->faker->randomElement([
            AdminProfile::ROLE_MANAGER,
            AdminProfile::ROLE_MODERATOR,
            AdminProfile::ROLE_SUPPORT,
        ]);

        return [
            'user_id' => User::factory(),
            'role' => $role,
            'department' => $this->faker->optional()->randomElement(['operations', 'support', 'content', 'sales']),
            'permissions' => [
                'listings' => $this->faker->boolean(80),
                'blogs' => $this->faker->boolean(70),
                'subscriptions' => $role === AdminProfile::ROLE_MANAGER,
            ],
            'metadata' => null,
        ];
    }
}
