<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\PlaceType;
use App\Models\User;
use App\Models\ListingMedia;
use Illuminate\Database\Seeder;

class MuglaListingSeeder extends Seeder
{
    public function run(): void
    {
        $placeTypes = PlaceType::all()->keyBy('slug');
        $owners = User::whereHas('ownerProfile')->get();

        if ($owners->isEmpty()) {
            $this->command->warn('No owner users found. Please run DatabaseSeeder first.');
            return;
        }

        $listings = [
            // KONAKLAMA (Accommodations)
            [
                'place_type' => 'konaklama',
                'title' => 'Hilton Dalaman Sarıgerme Resort & Spa',
                'summary' => 'Sarıgerme sahilinde lüks resort otel deneyimi',
                'description' => 'Muğla\'nın en güzel sahillerinden Sarıgerme\'de konumlanmış lüks resort otel. Spa, aquapark ve özel plaj imkanları.',
                'city' => 'Dalaman',
                'region' => 'Muğla',
                'address_line1' => 'Sarıgerme Mahallesi',
                'contact_phone' => '+90 252 286 8000',
                'website_url' => 'https://hilton.com',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800',
                    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800'
                ]
            ],
            [
                'place_type' => 'konaklama',
                'title' => 'Casa De Maris Spa & Resort Hotel',
                'summary' => 'Marmaris\'te deniz manzaralı lüks konaklama',
                'description' => 'Marmaris körfezinin eşsiz manzarasına sahip beş yıldızlı otel. Spa merkezi ve aquapark ile unutulmaz bir tatil.',
                'city' => 'Marmaris',
                'region' => 'Muğla',
                'address_line1' => 'Siteler Mahallesi',
                'contact_phone' => '+90 252 417 4950',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800'
                ]
            ],
            [
                'place_type' => 'konaklama',
                'title' => 'Six Senses Kaplankaya',
                'summary' => 'Bodrum\'da ultra lüks wellness resort',
                'description' => 'Bodrum\'un sakin bir koyunda konumlanmış dünya standartlarında wellness resort. Özel plaj ve spa imkanları.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Kaplankaya Mevkii',
                'contact_phone' => '+90 252 311 1888',
                'website_url' => 'https://sixsenses.com',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=800'
                ]
            ],
            [
                'place_type' => 'konaklama',
                'title' => 'Mandarin Oriental Bodrum',
                'summary' => 'Bodrum\'da Cennet Koyu\'nda lüks resort',
                'description' => 'Türkbükü\'nde Cennet Koyu\'nun muhteşem manzarasına sahip ultra lüks resort otel.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Cennet Koyu, Türkbükü',
                'contact_phone' => '+90 252 311 1888',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=800'
                ]
            ],

            // RESTORAN (Restaurants)
            [
                'place_type' => 'restoran',
                'title' => 'Orfoz Restaurant',
                'summary' => 'Bodrum\'da deniz ürünleri uzmanı',
                'description' => 'Bodrum marina\'da konumlanmış deniz ürünleri restoranı. Taze balık ve Ege lezzetleri.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Neyzen Tevfik Caddesi',
                'contact_phone' => '+90 252 316 1228',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800'
                ]
            ],
            [
                'place_type' => 'restoran',
                'title' => 'Liman Restaurant',
                'summary' => 'Marmaris\'te balık ve mezeler',
                'description' => 'Marmaris marina\'sında deniz manzaralı balık restoranı. Taze deniz ürünleri ve Ege mezeleri.',
                'city' => 'Marmaris',
                'region' => 'Muğla',
                'address_line1' => 'Barbaros Caddesi',
                'contact_phone' => '+90 252 412 5484',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1559339352-11d035aa65de?w=800'
                ]
            ],
            [
                'place_type' => 'restoran',
                'title' => 'Kocadon Restaurant',
                'summary' => 'Datça\'da otantik Ege mutfağı',
                'description' => 'Datça merkezde geleneksel Ege mutfağının en güzel örnekleri. Yerel ürünler ve ev yapımı lezzetler.',
                'city' => 'Datça',
                'region' => 'Muğla',
                'address_line1' => 'İskele Mahallesi',
                'contact_phone' => '+90 252 712 3456',
                'images' => [
                    'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800'
                ]
            ],
            [
                'place_type' => 'restoran',
                'title' => 'Mezgit Restaurant',
                'summary' => 'Fethiye\'de balık ve deniz ürünleri',
                'description' => 'Fethiye balık pazarında taze balık ve deniz ürünleri. Geleneksel pişirme teknikleri.',
                'city' => 'Fethiye',
                'region' => 'Muğla',
                'address_line1' => 'Balık Pazarı',
                'contact_phone' => '+90 252 614 2547',
                'images' => [
                    'https://images.unsplash.com/photo-1544148103-0773bf10d330?w=800'
                ]
            ],

            // AKTİVİTE (Activities)
            [
                'place_type' => 'aktivite',
                'title' => 'Kaş Diving Center',
                'summary' => 'Kaş\'ta dalış eğitimi ve turları',
                'description' => 'Akdeniz\'in en berrak sularında dalış deneyimi. PADI sertifikalı eğitmenler eşliğinde.',
                'city' => 'Kaş',
                'region' => 'Muğla',
                'address_line1' => 'Liman Sokak',
                'contact_phone' => '+90 242 836 3737',
                'website_url' => 'https://kasdiving.com',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800'
                ]
            ],
            [
                'place_type' => 'aktivite',
                'title' => 'Ölüdeniz Paraşüt',
                'summary' => 'Babadağ\'dan yamaç paraşütü',
                'description' => 'Dünya\'nın en güzel yamaç paraşütü destinasyonlarından biri. 2000m yükseklikten muhteşem manzara.',
                'city' => 'Fethiye',
                'region' => 'Muğla',
                'address_line1' => 'Ölüdeniz Mahallesi',
                'contact_phone' => '+90 252 617 0511',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800'
                ]
            ],
            [
                'place_type' => 'aktivite',
                'title' => 'Bodrum Su Sporları',
                'summary' => 'Bodrum\'da jet ski ve banana boat',
                'description' => 'Bodrum körfezinde su sporları. Jet ski, banana boat, parasailing ve daha fazlası.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Bardakçı Koyu',
                'contact_phone' => '+90 252 316 7788',
                'images' => [
                    'https://images.unsplash.com/photo-1530549387789-4c1017266635?w=800'
                ]
            ],
            [
                'place_type' => 'aktivite',
                'title' => 'Dalyan Nehir Turu',
                'summary' => 'Dalyan\'da tekne turu ve kaplıca',
                'description' => 'Dalyan çayında tekne turu, Kaunos antik kenti ve İztuzu plajı ziyareti.',
                'city' => 'Dalyan',
                'region' => 'Muğla',
                'address_line1' => 'Dalyan İskelesi',
                'contact_phone' => '+90 252 284 2194',
                'images' => [
                    'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=800'
                ]
            ],

            // EĞLENCE (Entertainment)
            [
                'place_type' => 'eglence',
                'title' => 'Halikarnas Disco',
                'summary' => 'Bodrum\'da efsanevi gece kulübü',
                'description' => 'Bodrum\'un en ünlü gece kulübü. Dünya çapında DJ\'ler ve muhteşem show\'lar.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Cumhuriyet Caddesi',
                'contact_phone' => '+90 252 316 8000',
                'website_url' => 'https://halikarnas.com.tr',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800'
                ]
            ],
            [
                'place_type' => 'eglence',
                'title' => 'Nikki Beach Bodrum',
                'summary' => 'Bodrum\'da beach club',
                'description' => 'Lux bir beach club deneyimi. Havuz başı partiler ve gün boyu eğlence.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Torba Mahallesi',
                'contact_phone' => '+90 252 311 5000',
                'images' => [
                    'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800'
                ]
            ],

            // ALIŞVERİŞ (Shopping)
            [
                'place_type' => 'alisveris',
                'title' => 'Marmaris Grand Bazaar',
                'summary' => 'Marmaris\'te geleneksel çarşı',
                'description' => 'Marmaris\'in kalbi sayılan çarşı. Tekstil, takı, hediyelik eşya ve yerel ürünler.',
                'city' => 'Marmaris',
                'region' => 'Muğla',
                'address_line1' => 'Tepe Mahallesi',
                'contact_phone' => '+90 252 412 1034',
                'images' => [
                    'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800'
                ]
            ],
            [
                'place_type' => 'alisveris',
                'title' => 'Bodrum Marina AVM',
                'summary' => 'Bodrum\'da modern alışveriş merkezi',
                'description' => 'Bodrum marina yanında modern alışveriş merkezi. Markalı mağazalar ve restoranlar.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Neyzen Tevfik Caddesi',
                'contact_phone' => '+90 252 313 1860',
                'images' => [
                    'https://images.unsplash.com/photo-1555529902-d5a4fdb83eac?w=800'
                ]
            ],

            // SAĞLIK & SPA (Health & Wellness)
            [
                'place_type' => 'saglik-spa',
                'title' => 'Köyceğiz Sultaniye Kaplıcaları',
                'summary' => 'Doğal termal kaplıcalar',
                'description' => 'Antik çağlardan beri bilinen şifalı sularıyla termal kaplıca. Cilt hastalıkları ve romatizma için şifalı.',
                'city' => 'Köyceğiz',
                'region' => 'Muğla',
                'address_line1' => 'Sultaniye Mahallesi',
                'contact_phone' => '+90 252 522 2345',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800'
                ]
            ],

            // ULAŞIM (Transportation)
            [
                'place_type' => 'ulasim',
                'title' => 'Bodrum Rent A Car',
                'summary' => 'Bodrum\'da araç kiralama',
                'description' => 'Bodrum ve çevresini keşfetmek için geniş araç filosu. Ekonomik ve lüks seçenekler.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Milas Bodrum Havalimanı',
                'contact_phone' => '+90 252 523 0101',
                'images' => [
                    'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=800'
                ]
            ],

            // KÜLTÜR & MÜZE (Culture & Museums)
            [
                'place_type' => 'kultur-muze',
                'title' => 'Bodrum Sualtı Arkeoloji Müzesi',
                'summary' => 'Bodrum Kalesi\'nde tarihi müze',
                'description' => 'Dünyaca ünlü Bodrum Kalesi\'nde yer alan sualtı arkeoloji müzesi. Antik dönem eserleri.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Kale Mahallesi',
                'contact_phone' => '+90 252 316 2516',
                'website_url' => 'https://bodrum-museum.com',
                'is_featured' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1594736797933-d0b22084e7c5?w=800'
                ]
            ],
            [
                'place_type' => 'kultur-muze',
                'title' => 'Myndos Antik Kenti',
                'summary' => 'Bodrum\'da antik şehir kalıntıları',
                'description' => 'M.Ö. 4. yüzyıldan kalma antik kent kalıntıları. Tarihi surlar ve kalıntılar.',
                'city' => 'Bodrum',
                'region' => 'Muğla',
                'address_line1' => 'Gümüşlük Mahallesi',
                'contact_phone' => '+90 252 394 3022',
                'images' => [
                    'https://images.unsplash.com/photo-1539650116574-75c0c6d73f6e?w=800'
                ]
            ]
        ];

        foreach ($listings as $listingData) {
            $placeType = $placeTypes->get($listingData['place_type']);
            if (!$placeType) {
                continue;
            }

            $listing = Listing::create([
                'owner_id' => $owners->random()->id,
                'place_type_id' => $placeType->id,
                'title' => $listingData['title'],
                'slug' => \Str::slug($listingData['title']),
                'summary' => $listingData['summary'],
                'description' => $listingData['description'],
                'city' => $listingData['city'],
                'region' => $listingData['region'],
                'country' => 'Türkiye',
                'address_line1' => $listingData['address_line1'],
                'contact_phone' => $listingData['contact_phone'] ?? null,
                'website_url' => $listingData['website_url'] ?? null,
                'status' => Listing::STATUS_APPROVED,
                'visibility' => Listing::VISIBILITY_PUBLIC,
                'primary_language' => 'tr',
                'is_featured' => $listingData['is_featured'] ?? false,
                'published_at' => now(),
                'metadata' => [
                    'source' => 'mugla_seeder',
                    'verified' => true
                ]
            ]);

            // Add media for each listing
            if (isset($listingData['images'])) {
                foreach ($listingData['images'] as $index => $imageUrl) {
                    ListingMedia::create([
                        'listing_id' => $listing->id,
                        'type' => 'image',
                        'path' => $imageUrl,
                        'sort_order' => $index + 1,
                        'alt_text' => $listing->title . ' - Fotoğraf ' . ($index + 1),
                        'caption' => $listing->title,
                        'is_primary' => $index === 0
                    ]);
                }
            }
        }

        $this->command->info('Muğla listings seeded successfully with ' . count($listings) . ' listings!');
    }
}