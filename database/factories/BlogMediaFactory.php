<?php

namespace Database\Factories;

use App\Models\BlogMedia;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogMedia>
 */
class BlogMediaFactory extends Factory
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
            'disk' => 'public',
            'path' => 'blogs/' . $this->faker->uuid() . '.jpg',
            'type' => BlogMedia::TYPE_IMAGE,
            'caption' => $this->faker->optional()->sentence(6),
            'alt_text' => $this->faker->sentence(4),
            'sort_order' => $this->faker->numberBetween(0, 5),
            'metadata' => null,
        ];
    }
}
