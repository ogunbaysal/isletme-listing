<?php

namespace Database\Factories;

use App\Models\PlaceType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlaceType>
 */
class PlaceTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucwords($this->faker->words(2, true));

        return [
            'name' => $name,
            'slug' => Str::slug($name . '-' . $this->faker->unique()->numerify('###')),
            'description' => $this->faker->sentence(),
            'icon' => $this->faker->optional()->randomElement(['hotel', 'villa', 'restaurant', 'activity']),
            'is_active' => true,
            'metadata' => null,
        ];
    }
}
