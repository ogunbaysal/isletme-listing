<?php

namespace Database\Seeders;

use App\Models\PlaceType;
use Illuminate\Database\Seeder;

class PlaceTypeSeeder extends Seeder
{
    public function run(): void
    {
        $placeTypes = [
            // Accommodations
            [
                'name' => 'Konaklama',
                'slug' => 'konaklama',
                'description' => 'Oteller, pansiyon, villa ve ev konaklama seçenekleri',
                'icon' => '🏠',
                'is_active' => true,
                'metadata' => [
                    'category' => 'accommodation',
                    'subcategories' => ['hotel', 'villa', 'apartment', 'pension', 'boutique']
                ]
            ],
            // Restaurants
            [
                'name' => 'Restoran',
                'slug' => 'restoran',
                'description' => 'Restoranlar, kafeler ve yemek mekanları',
                'icon' => '🍽️',
                'is_active' => true,
                'metadata' => [
                    'category' => 'dining',
                    'subcategories' => ['restaurant', 'cafe', 'bar', 'fast-food', 'fine-dining']
                ]
            ],
            // Activities
            [
                'name' => 'Aktivite',
                'slug' => 'aktivite',
                'description' => 'Dalış, paraşüt, golf ve diğer aktiviteler',
                'icon' => '🎯',
                'is_active' => true,
                'metadata' => [
                    'category' => 'activity',
                    'subcategories' => ['scuba-diving', 'paragliding', 'golf', 'water-sports', 'hiking', 'tours']
                ]
            ],
            // Entertainment
            [
                'name' => 'Eğlence',
                'slug' => 'eglence',
                'description' => 'Gece hayatı, müzik ve eğlence mekanları',
                'icon' => '🎵',
                'is_active' => true,
                'metadata' => [
                    'category' => 'entertainment',
                    'subcategories' => ['nightclub', 'live-music', 'theater', 'casino', 'beach-club']
                ]
            ],
            // Shopping
            [
                'name' => 'Alışveriş',
                'slug' => 'alisveris',
                'description' => 'Mağazalar, çarşılar ve alışveriş merkezi',
                'icon' => '🛍️',
                'is_active' => true,
                'metadata' => [
                    'category' => 'shopping',
                    'subcategories' => ['mall', 'boutique', 'market', 'souvenir', 'local-crafts']
                ]
            ],
            // Wellness & Spa
            [
                'name' => 'Sağlık & SPA',
                'slug' => 'saglik-spa',
                'description' => 'SPA, masaj ve sağlık merkezleri',
                'icon' => '💆',
                'is_active' => true,
                'metadata' => [
                    'category' => 'wellness',
                    'subcategories' => ['spa', 'massage', 'thermal', 'fitness', 'yoga']
                ]
            ],
            // Transportation
            [
                'name' => 'Ulaşım',
                'slug' => 'ulasim',
                'description' => 'Araç kiralama, transfer ve ulaşım hizmetleri',
                'icon' => '🚗',
                'is_active' => true,
                'metadata' => [
                    'category' => 'transportation',
                    'subcategories' => ['car-rental', 'transfer', 'taxi', 'boat-rental', 'bicycle']
                ]
            ],
            // Culture & Museums
            [
                'name' => 'Kültür & Müze',
                'slug' => 'kultur-muze',
                'description' => 'Müzeler, tarihi yerler ve kültürel mekanlar',
                'icon' => '🏛️',
                'is_active' => true,
                'metadata' => [
                    'category' => 'culture',
                    'subcategories' => ['museum', 'historical-site', 'gallery', 'cultural-center', 'monument']
                ]
            ]
        ];

        foreach ($placeTypes as $placeType) {
            PlaceType::updateOrCreate(
                ['slug' => $placeType['slug']],
                $placeType
            );
        }
    }
}