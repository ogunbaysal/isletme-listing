<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true);
        $context = $this->faker->randomElement(['listing', 'blog', 'collection']);

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name . '-' . $this->faker->unique()->numerify('###')),
            'context' => $context,
            'description' => $this->faker->optional()->sentence(),
            'is_active' => true,
            'metadata' => null,
        ];
    }
}
