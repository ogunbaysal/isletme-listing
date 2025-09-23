import { HeartIcon, StarFilledIcon } from '@radix-ui/react-icons';

// Extended interface for display purposes
interface DisplayListing {
    id: number;
    title: string;
    location: string;
    price: number;
    rating: number;
    images: string[];
    type: string;
    distance?: string;
}

interface SimpleListingGridProps {
    listings: DisplayListing[];
    variant?: 'horizontal' | 'grid';
}

export function ListingGrid({ listings, variant = 'grid' }: SimpleListingGridProps) {
    if (!listings || listings.length === 0) {
        return (
            <div className="text-center py-12">
                <p className="text-gray-500">Henüz ilan bulunmuyor.</p>
            </div>
        );
    }

    if (variant === 'horizontal') {
        return (
            <div className="flex overflow-x-auto space-x-4 pb-4 scrollbar-hide">
                {listings.map((listing) => (
                    <ListingCard key={listing.id} listing={listing} />
                ))}
            </div>
        );
    }

    return (
        <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            {listings.map((listing) => (
                <ListingCard key={listing.id} listing={listing} />
            ))}
        </div>
    );
}

function ListingCard({ listing }: { listing: DisplayListing }) {
    return (
        <div className="group cursor-pointer flex-shrink-0 w-72 sm:w-auto">
            {/* Image Container */}
            <div className="relative aspect-square overflow-hidden rounded-xl bg-gray-200">
                <img
                    src={listing.images[0] || '/placeholder-image.jpg'}
                    alt={listing.title}
                    className="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                />

                {/* Favorite Button */}
                <button className="absolute right-3 top-3 p-2 text-white hover:scale-110 transition-transform">
                    <HeartIcon className="h-6 w-6" />
                </button>

                {/* Service Type Badge */}
                <div className="absolute left-3 top-3 rounded-full bg-white px-3 py-1 text-xs font-semibold text-gray-900 shadow-sm">
                    {listing.type}
                </div>
            </div>

            {/* Content */}
            <div className="mt-3">
                {/* Location and Rating */}
                <div className="flex items-center justify-between">
                    <p className="font-semibold text-gray-900 truncate">{listing.location}</p>
                    <div className="flex items-center space-x-1">
                        <StarFilledIcon className="h-3 w-3 text-gray-900" />
                        <span className="text-sm text-gray-900">{listing.rating}</span>
                    </div>
                </div>

                {/* Distance */}
                {listing.distance && (
                    <p className="text-sm text-gray-600">{listing.distance}</p>
                )}

                {/* Type */}
                <p className="text-sm text-gray-600">{listing.type}</p>

                {/* Date Range */}
                <p className="text-sm text-gray-600">12-14 Nis</p>

                {/* Price */}
                <div className="mt-1">
                    <span className="font-semibold text-gray-900">₺{listing.price.toLocaleString()}</span>
                    <span className="text-sm text-gray-600"> / gece</span>
                </div>
            </div>
        </div>
    );
}

// Muğla'daki gerçek yerler - Otantik Türk içeriği
export const sampleListings: DisplayListing[] = [
    // Konaklama
    {
        id: 1,
        title: 'Six Senses Kaplankaya',
        location: 'Bodrum, Muğla',
        price: 8500,
        rating: 4.95,
        images: ['https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=400'],
        type: 'Konaklama',
        distance: '25 km uzaklıkta'
    },
    {
        id: 2,
        title: 'Mandarin Oriental Bodrum',
        location: 'Cennet Koyu, Bodrum',
        price: 12000,
        rating: 4.92,
        images: ['https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=400'],
        type: 'Konaklama',
        distance: '35 km uzaklıkta'
    },
    {
        id: 3,
        title: 'Hilton Dalaman Sarıgerme Resort',
        location: 'Dalaman, Muğla',
        price: 4200,
        rating: 4.88,
        images: ['https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=400'],
        type: 'Konaklama',
        distance: '85 km uzaklıkta'
    },
    // Restoranlar
    {
        id: 4,
        title: 'Orfoz Restaurant',
        location: 'Bodrum Marina, Bodrum',
        price: 320,
        rating: 4.87,
        images: ['https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400'],
        type: 'Restoran',
        distance: '15 km uzaklıkta'
    },
    {
        id: 5,
        title: 'Liman Restaurant',
        location: 'Marmaris Marina, Marmaris',
        price: 280,
        rating: 4.76,
        images: ['https://images.unsplash.com/photo-1559339352-11d035aa65de?w=400'],
        type: 'Restoran',
        distance: '55 km uzaklıkta'
    },
    {
        id: 6,
        title: 'Kocadon Restaurant',
        location: 'Datça Merkez, Datça',
        price: 195,
        rating: 4.83,
        images: ['https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400'],
        type: 'Restoran',
        distance: '75 km uzaklıkta'
    },
    // Aktiviteler
    {
        id: 7,
        title: 'Kaş Diving Center',
        location: 'Kaş Liman, Kaş',
        price: 350,
        rating: 4.94,
        images: ['https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400'],
        type: 'Aktivite',
        distance: '120 km uzaklıkta'
    },
    {
        id: 8,
        title: 'Ölüdeniz Paraşüt',
        location: 'Babadağ, Fethiye',
        price: 450,
        rating: 4.98,
        images: ['https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400'],
        type: 'Aktivite',
        distance: '95 km uzaklıkta'
    },
    {
        id: 9,
        title: 'Dalyan Nehir Turu',
        location: 'Dalyan, Ortaca',
        price: 180,
        rating: 4.79,
        images: ['https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?w=400'],
        type: 'Aktivite',
        distance: '45 km uzaklıkta'
    },
    // Eğlence
    {
        id: 10,
        title: 'Halikarnas Disco',
        location: 'Bodrum Merkez, Bodrum',
        price: 500,
        rating: 4.71,
        images: ['https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=400'],
        type: 'Eğlence',
        distance: '20 km uzaklıkta'
    },
    {
        id: 11,
        title: 'Nikki Beach Bodrum',
        location: 'Torba, Bodrum',
        price: 850,
        rating: 4.82,
        images: ['https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400'],
        type: 'Eğlence',
        distance: '28 km uzaklıkta'
    },
    // Alışveriş
    {
        id: 12,
        title: 'Marmaris Grand Bazaar',
        location: 'Marmaris Merkez, Marmaris',
        price: 75,
        rating: 4.42,
        images: ['https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400'],
        type: 'Alışveriş',
        distance: '60 km uzaklıkta'
    },
    {
        id: 13,
        title: 'Bodrum Marina AVM',
        location: 'Bodrum Marina, Bodrum',
        price: 120,
        rating: 4.58,
        images: ['https://images.unsplash.com/photo-1555529902-d5a4fdb83eac?w=400'],
        type: 'Alışveriş',
        distance: '18 km uzaklıkta'
    },
    // Sağlık & Spa
    {
        id: 14,
        title: 'Köyceğiz Sultaniye Kaplıcaları',
        location: 'Sultaniye, Köyceğiz',
        price: 95,
        rating: 4.65,
        images: ['https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400'],
        type: 'Sağlık & SPA',
        distance: '38 km uzaklıkta'
    },
    // Kültür & Müze
    {
        id: 15,
        title: 'Bodrum Sualtı Arkeoloji Müzesi',
        location: 'Bodrum Kalesi, Bodrum',
        price: 45,
        rating: 4.89,
        images: ['https://images.unsplash.com/photo-1594736797933-d0b22084e7c5?w=400'],
        type: 'Kültür & Müze',
        distance: '22 km uzaklıkta'
    },
    {
        id: 16,
        title: 'Myndos Antik Kenti',
        location: 'Gümüşlük, Bodrum',
        price: 25,
        rating: 4.73,
        images: ['https://images.unsplash.com/photo-1539650116574-75c0c6d73f6e?w=400'],
        type: 'Kültür & Müze',
        distance: '35 km uzaklıkta'
    }
];