<?php

namespace Database\Factories;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(4, true)),
            'body' => $this->faker->paragraphs(2, true),
            'audience' => $this->faker->randomElement([
                Announcement::AUDIENCE_ALL,
                Announcement::AUDIENCE_OWNERS,
                Announcement::AUDIENCE_ADMINS,
            ]),
            'status' => $this->faker->randomElement([
                Announcement::STATUS_DRAFT,
                Announcement::STATUS_SCHEDULED,
                Announcement::STATUS_PUBLISHED,
            ]),
            'starts_at' => Carbon::now()->addDay(),
            'ends_at' => Carbon::now()->addDays(7),
            'is_sticky' => $this->faker->boolean(20),
            'metadata' => null,
        ];
    }
}
