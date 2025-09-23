<?php

namespace Database\Factories;

use App\Models\OwnerProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OwnerProfile>
 */
class OwnerProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company = $this->faker->company();

        return [
            'user_id' => User::factory(),
            'business_name' => $company,
            'legal_name' => $company . ' ' . strtoupper($this->faker->companySuffix()),
            'tax_id' => $this->faker->optional()->bothify('TAX-####'),
            'verification_status' => OwnerProfile::VERIFICATION_PENDING,
            'verification_notes' => null,
            'metadata' => [
                'primary_contact' => $this->faker->name(),
            ],
        ];
    }
}
