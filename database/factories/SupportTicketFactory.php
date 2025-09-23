<?php

namespace Database\Factories;

use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupportTicket>
 */
class SupportTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $openedAt = Carbon::now()->subDays($this->faker->numberBetween(0, 7));

        return [
            'owner_id' => User::factory(),
            'assigned_admin_id' => User::factory(),
            'subject' => ucfirst($this->faker->words(4, true)),
            'status' => $this->faker->randomElement([
                SupportTicket::STATUS_OPEN,
                SupportTicket::STATUS_PENDING,
                SupportTicket::STATUS_RESOLVED,
            ]),
            'priority' => $this->faker->randomElement([
                SupportTicket::PRIORITY_LOW,
                SupportTicket::PRIORITY_MEDIUM,
                SupportTicket::PRIORITY_HIGH,
            ]),
            'opened_at' => $openedAt,
            'closed_at' => $this->faker->optional()->dateTimeBetween($openedAt, '+2 days'),
            'last_reply_at' => $this->faker->optional()->dateTimeBetween($openedAt, 'now'),
            'context' => [
                'channel' => $this->faker->randomElement(['email', 'phone', 'whatsapp']),
            ],
            'metadata' => null,
        ];
    }
}
