<?php

namespace Database\Factories;

use App\Models\SupportTicket;
use App\Models\TicketAssignment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketAssignment>
 */
class TicketAssignmentFactory extends Factory
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
            'admin_id' => User::factory(),
            'assigned_at' => Carbon::now()->subMinutes($this->faker->numberBetween(1, 120)),
            'notes' => $this->faker->optional()->sentence(),
            'metadata' => null,
        ];
    }
}
