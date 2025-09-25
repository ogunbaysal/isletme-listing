<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Collection;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // Get accommodation listings (Konaklama)
        $featuredListings = Listing::where('status', Listing::STATUS_APPROVED)
            ->where('visibility', Listing::VISIBILITY_PUBLIC)
            ->whereHas('placeType', function ($query) {
                $query->where('slug', 'konaklama');
            })
            ->with(['placeType', 'media', 'owner'])
            ->take(8)
            ->get()
            ->map(function ($listing) {
                return $this->formatListingData($listing, [2000, 8000]); // Higher price range for accommodations
            });

        // Get restaurant listings (Restoran)
        $nearbyListings = Listing::where('status', Listing::STATUS_APPROVED)
            ->where('visibility', Listing::VISIBILITY_PUBLIC)
            ->whereHas('placeType', function ($query) {
                $query->where('slug', 'restoran');
            })
            ->with(['placeType', 'media', 'owner'])
            ->take(8)
            ->get()
            ->map(function ($listing) {
                return $this->formatListingData($listing, [100, 300]); // Lower price range for restaurants
            });

        // Get activity listings (Aktivite)
        $popularDestinations = Listing::where('status', Listing::STATUS_APPROVED)
            ->where('visibility', Listing::VISIBILITY_PUBLIC)
            ->whereHas('placeType', function ($query) {
                $query->where('slug', 'aktivite');
            })
            ->with(['placeType', 'media', 'owner'])
            ->take(8)
            ->get()
            ->map(function ($listing) {
                return $this->formatListingData($listing, [200, 500]); // Medium price range for activities
            });

        return Inertia::render('home', [
            'featuredListings' => $featuredListings,
            'nearbyListings' => $nearbyListings,
            'popularDestinations' => $popularDestinations,
        ]);
    }

    private function formatListingData($listing, $priceRange = [100, 1000])
    {
        // Generate appropriate price based on place type
        $minPrice = $priceRange[0];
        $maxPrice = $priceRange[1];

        return [
            'id' => $listing->id,
            'title' => $listing->title,
            'location' => $listing->city . ', ' . $listing->region,
            'price' => rand($minPrice, $maxPrice),
            'rating' => round(rand(400, 500) / 100, 2), // Random rating 4.00-5.00
            'images' => $listing->media->map(fn($media) => $media->path)->toArray() ?: [
                $this->getDefaultImageForType($listing->placeType?->slug)
            ],
            'type' => $listing->placeType?->name ?? 'Genel',
            'distance' => rand(10, 100) . ' km uzaklıkta'
        ];
    }

    private function getDefaultImageForType($placeTypeSlug)
    {
        $defaultImages = [
            'konaklama' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
            'restoran' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
            'aktivite' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
            'eglence' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
            'alisveris' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
            'saglik-spa' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
            'ulasim' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
            'kultur-muze' => 'https://images.unsplash.com/photo-1594736797933-d0b22084e7c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80',
        ];

        return $defaultImages[$placeTypeSlug] ?? 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80';
    }

    public function search(Request $request)
    {
        $query = Listing::where('status', Listing::STATUS_APPROVED)
            ->where('visibility', Listing::VISIBILITY_PUBLIC)
            ->with(['placeType', 'media', 'owner']);

        // Apply search filters
        if ($request->filled('location')) {
            $query->where(function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->location . '%')
                  ->orWhere('region', 'like', '%' . $request->location . '%')
                  ->orWhere('title', 'like', '%' . $request->location . '%');
            });
        }

        if ($request->filled('place_type')) {
            $query->whereHas('placeType', function ($q) use ($request) {
                $q->where('slug', $request->place_type);
            });
        }

        $listings = $query->paginate(20);

        return Inertia::render('search', [
            'listings' => $listings,
            'filters' => $request->only(['location', 'check_in', 'check_out', 'guests', 'place_type']),
        ]);
    }

    public function show($id)
    {
        $listing = Listing::where('id', $id)
            ->where('status', Listing::STATUS_APPROVED)
            ->where('visibility', Listing::VISIBILITY_PUBLIC)
            ->with(['placeType', 'media', 'owner'])
            ->firstOrFail();

        // Generate realistic pricing and rating based on place type and features
        $basePrice = $this->generatePriceForListing($listing);
        $rating = round(rand(450, 498) / 100, 2); // 4.50-4.98
        $reviewCount = rand(15, 250);

        return Inertia::render('listing', [
            'listing' => [
                'id' => $listing->id,
                'title' => $listing->title,
                'summary' => $listing->summary,
                'description' => $listing->description,
                'city' => $listing->city,
                'region' => $listing->region,
                'country' => $listing->country,
                'address_line1' => $listing->address_line1,
                'contact_phone' => $listing->contact_phone,
                'website_url' => $listing->website_url,
                'status' => $listing->status,
                'is_featured' => $listing->is_featured,
                'place_type' => [
                    'id' => $listing->placeType->id,
                    'name' => $listing->placeType->name,
                    'slug' => $listing->placeType->slug,
                    'icon' => $listing->placeType->icon,
                ],
                'media' => $listing->media->map(function ($media) {
                    return [
                        'id' => $media->id,
                        'path' => $media->path,
                        'alt_text' => $media->alt_text,
                        'caption' => $media->caption,
                        'is_primary' => $media->is_primary,
                    ];
                }),
                'owner' => [
                    'id' => $listing->owner->id,
                    'name' => $listing->owner->name,
                ],
                'created_at' => $listing->created_at->format('Y-m-d'),
            ],
            'price' => $basePrice,
            'rating' => $rating,
            'reviewCount' => $reviewCount,
        ]);
    }

    private function generatePriceForListing($listing)
    {
        $basePrices = [
            'konaklama' => [2000, 12000],
            'restoran' => [100, 400],
            'aktivite' => [150, 600],
            'eglence' => [200, 1000],
            'alisveris' => [50, 300],
            'saglik-spa' => [80, 500],
            'ulasim' => [100, 800],
            'kultur-muze' => [20, 150],
        ];

        $priceRange = $basePrices[$listing->placeType->slug] ?? [100, 1000];
        $basePrice = rand($priceRange[0], $priceRange[1]);

        // Adjust for featured listings
        if ($listing->is_featured) {
            $basePrice = (int)($basePrice * 1.2);
        }

        return $basePrice;
    }
}