<?php

namespace Database\Factories;

use App\Models\SupportMessage;
use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupportMessage>
 */
class SupportMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_id' => SupportTicket::factory(),
            'sender_id' => User::factory(),
            'message' => $this->faker->paragraph(2),
            'is_internal' => $this->faker->boolean(20),
            'sent_at' => Carbon::now()->subMinutes($this->faker->numberBetween(1, 240)),
            'attachments' => null,
            'metadata' => null,
        ];
    }
}
