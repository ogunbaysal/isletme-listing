<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = 'Collection ' . $this->faker->words(2, true);

        return [
            'title' => ucwords($title),
            'slug' => Str::slug($title . '-' . $this->faker->unique()->numerify('###')),
            'description' => $this->faker->optional()->sentence(12),
            'collection_type' => $this->faker->randomElement([
                Collection::TYPE_LISTING,
                Collection::TYPE_BLOG,
                Collection::TYPE_MIXED,
            ]),
            'status' => $this->faker->randomElement([
                Collection::STATUS_DRAFT,
                Collection::STATUS_PUBLISHED,
            ]),
            'is_featured' => $this->faker->boolean(15),
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'metadata' => null,
        ];
    }
}
