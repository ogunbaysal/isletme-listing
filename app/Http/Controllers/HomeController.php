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
            'konaklama' => 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=400',
            'restoran' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=400',
            'aktivite' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400',
            'eglence' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=400',
            'alisveris' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400',
        ];

        return $defaultImages[$placeTypeSlug] ?? 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=400';
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
}