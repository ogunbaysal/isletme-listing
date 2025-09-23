<?php

namespace Database\Factories;

use App\Models\Collection;
use App\Models\CollectionItem;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CollectionItem>
 */
class CollectionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'collection_id' => Collection::factory(),
            'item_type' => Listing::class,
            'item_id' => Listing::factory(),
            'sort_order' => $this->faker->numberBetween(1, 10),
            'meta' => [
                'highlight' => $this->faker->boolean(),
            ],
        ];
    }
}
