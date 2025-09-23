<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6);

        return [
            'author_id' => User::factory(),
            'owner_id' => User::factory(),
            'category_id' => BlogCategory::factory(),
            'title' => $title,
            'slug' => Str::slug($title . '-' . $this->faker->unique()->numerify('###')),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect(range(1, 3))->map(fn () => '<p>' . $this->faker->paragraph(5) . '</p>')->implode(''),
            'language' => $this->faker->randomElement(['tr', 'en']),
            'status' => $this->faker->randomElement([
                BlogPost::STATUS_DRAFT,
                BlogPost::STATUS_PENDING,
                BlogPost::STATUS_PUBLISHED,
            ]),
            'is_featured' => $this->faker->boolean(10),
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'approved_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'featured_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'meta' => [
                'reading_time' => $this->faker->numberBetween(3, 10),
            ],
            'metadata' => null,
        ];
    }
}
