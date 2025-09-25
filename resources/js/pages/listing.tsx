import { Head } from '@inertiajs/react';
import { Header } from '../components/header';
import { HeartIcon, Share1Icon, StarFilledIcon, CheckCircledIcon } from '@radix-ui/react-icons';
import { useState } from 'react';

interface ListingMedia {
    id: number;
    path: string;
    alt_text?: string;
    caption?: string;
    is_primary: boolean;
}

interface PlaceType {
    id: number;
    name: string;
    slug: string;
    icon: string;
}

interface User {
    id: number;
    name: string;
}

interface Listing {
    id: number;
    title: string;
    summary?: string;
    description: string;
    city: string;
    region: string;
    country: string;
    address_line1?: string;
    contact_phone?: string;
    website_url?: string;
    status: string;
    is_featured: boolean;
    place_type: PlaceType;
    media: ListingMedia[];
    owner: User;
    created_at: string;
}

interface ListingPageProps {
    listing: Listing;
    price: number;
    rating: number;
    reviewCount: number;
}

export default function ListingPage({ listing, price, rating, reviewCount }: ListingPageProps) {
    const [selectedImageIndex, setSelectedImageIndex] = useState(0);
    const [showAllPhotos, setShowAllPhotos] = useState(false);

    const primaryImage = listing.media.find(m => m.is_primary) || listing.media[0];
    const otherImages = listing.media.filter(m => !m.is_primary).slice(0, 4);

    return (
        <>
            <Head title={`${listing.title} • ${listing.city}, ${listing.region}`} />

            <div className="min-h-screen bg-white">
                <Header />

                <main className="mx-auto max-w-7xl px-6 py-6 lg:px-10">
                    {/* Title and Actions */}
                    <div className="mb-6">
                        <div className="flex items-start justify-between">
                            <div>
                                <h1 className="text-2xl font-semibold text-gray-900 mb-2">
                                    {listing.title}
                                </h1>
                                <div className="flex items-center space-x-4 text-sm">
                                    <div className="flex items-center space-x-1">
                                        <StarFilledIcon className="h-4 w-4 text-gray-900" />
                                        <span className="font-medium">{rating}</span>
                                        <span className="text-gray-600">({reviewCount} değerlendirme)</span>
                                    </div>
                                    <span className="text-gray-600">•</span>
                                    <span className="font-medium underline cursor-pointer">
                                        {listing.city}, {listing.region}, {listing.country}
                                    </span>
                                </div>
                            </div>

                            <div className="flex items-center space-x-3">
                                <button className="flex items-center space-x-2 rounded-lg px-3 py-2 text-sm font-medium hover:bg-gray-50">
                                    <Share1Icon className="h-4 w-4" />
                                    <span>Paylaş</span>
                                </button>
                                <button className="flex items-center space-x-2 rounded-lg px-3 py-2 text-sm font-medium hover:bg-gray-50">
                                    <HeartIcon className="h-4 w-4" />
                                    <span>Kaydet</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    {/* Image Gallery */}
                    <div className="mb-8">
                        <div className="grid grid-cols-1 md:grid-cols-4 gap-2 rounded-xl overflow-hidden">
                            {/* Main Image */}
                            <div className="md:col-span-2 md:row-span-2 relative">
                                <img
                                    src={primaryImage?.path || '/placeholder-image.jpg'}
                                    alt={primaryImage?.alt_text || listing.title}
                                    className="w-full h-64 md:h-full object-cover cursor-pointer hover:brightness-110 transition-all"
                                    onClick={() => setShowAllPhotos(true)}
                                />
                            </div>

                            {/* Secondary Images */}
                            {otherImages.map((image, index) => (
                                <div key={image.id} className="relative">
                                    <img
                                        src={image.path}
                                        alt={image.alt_text || listing.title}
                                        className="w-full h-32 md:h-40 object-cover cursor-pointer hover:brightness-110 transition-all"
                                        onClick={() => setShowAllPhotos(true)}
                                    />
                                    {index === 3 && listing.media.length > 5 && (
                                        <div className="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                            <button
                                                className="text-white font-medium text-sm border border-white rounded-lg px-4 py-2 hover:bg-white hover:text-black transition-colors"
                                                onClick={() => setShowAllPhotos(true)}
                                            >
                                                Tüm fotoğrafları göster
                                            </button>
                                        </div>
                                    )}
                                </div>
                            ))}
                        </div>
                    </div>

                    <div className="grid grid-cols-1 lg:grid-cols-3 gap-12">
                        {/* Main Content */}
                        <div className="lg:col-span-2">
                            {/* Host Info */}
                            <div className="border-b border-gray-200 pb-6 mb-6">
                                <div className="flex items-center justify-between">
                                    <div>
                                        <h2 className="text-xl font-medium text-gray-900 mb-1">
                                            {listing.place_type.name} • {listing.owner.name} tarafından
                                        </h2>
                                        <p className="text-gray-600">
                                            {listing.city}, {listing.region}
                                        </p>
                                    </div>
                                    <div className="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span className="text-lg font-medium text-gray-600">
                                            {listing.owner.name.charAt(0).toUpperCase()}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {/* Features */}
                            <div className="border-b border-gray-200 pb-6 mb-6">
                                <div className="space-y-4">
                                    <div className="flex items-start space-x-4">
                                        <div className="w-6 h-6 flex items-center justify-center">
                                            <span className="text-lg">{listing.place_type.icon}</span>
                                        </div>
                                        <div>
                                            <p className="font-medium text-gray-900">Müsaitliklerin fiyatında</p>
                                            <p className="text-gray-600 text-sm">En sevilen konumlardan biri.</p>
                                        </div>
                                    </div>
                                    <div className="flex items-start space-x-4">
                                        <div className="w-6 h-6 flex items-center justify-center">
                                            <CheckCircledIcon className="w-5 h-5 text-gray-600" />
                                        </div>
                                        <div>
                                            <p className="text-gray-600 text-sm">En sevilen ev sahiplerinden biri.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {/* Description */}
                            <div className="border-b border-gray-200 pb-6 mb-6">
                                <div className="space-y-4">
                                    {listing.summary && (
                                        <p className="text-gray-900 font-medium">{listing.summary}</p>
                                    )}
                                    <p className="text-gray-600 leading-relaxed">{listing.description}</p>
                                    <button className="font-medium underline text-gray-900">
                                        Daha fazla göster &gt;
                                    </button>
                                </div>
                            </div>

                            {/* Location */}
                            <div className="border-b border-gray-200 pb-6 mb-6">
                                <h3 className="text-xl font-medium text-gray-900 mb-4">Konum</h3>
                                <div className="bg-gray-100 rounded-lg h-64 flex items-center justify-center mb-4">
                                    <p className="text-gray-600">Harita buraya gelecek</p>
                                </div>
                                <p className="text-gray-900 font-medium mb-1">{listing.city}, {listing.region}</p>
                                <p className="text-gray-600">{listing.address_line1}</p>
                            </div>

                            {/* Host Details */}
                            <div className="border-b border-gray-200 pb-6 mb-6">
                                <div className="flex items-center space-x-4 mb-4">
                                    <div className="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span className="text-xl font-medium text-gray-600">
                                            {listing.owner.name.charAt(0).toUpperCase()}
                                        </span>
                                    </div>
                                    <div>
                                        <h3 className="text-xl font-medium text-gray-900">
                                            Ev sahibi: {listing.owner.name}
                                        </h3>
                                        <p className="text-gray-600">3 yıldır ev sahibi</p>
                                    </div>
                                </div>
                                <div className="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                    <div>
                                        <p className="font-medium text-gray-900">117</p>
                                        <p className="text-gray-600">Değerlendirme</p>
                                    </div>
                                    <div>
                                        <p className="font-medium text-gray-900">4,97</p>
                                        <p className="text-gray-600">Derecelendirme</p>
                                    </div>
                                    <div>
                                        <p className="font-medium text-gray-900">3 yıl</p>
                                        <p className="text-gray-600">Kayıt süresi</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Booking Card */}
                        <div className="lg:col-span-1">
                            <div className="sticky top-6">
                                <div className="border border-gray-300 rounded-xl p-6 shadow-lg">
                                    <div className="flex items-center justify-between mb-4">
                                        <div className="flex items-baseline space-x-1">
                                            <span className="text-2xl font-semibold">₺{price.toLocaleString()}</span>
                                            <span className="text-gray-600">gece</span>
                                        </div>
                                        <div className="flex items-center space-x-1 text-sm">
                                            <StarFilledIcon className="h-4 w-4 text-gray-900" />
                                            <span className="font-medium">{rating}</span>
                                            <span className="text-gray-600">({reviewCount})</span>
                                        </div>
                                    </div>

                                    <div className="space-y-3 mb-4">
                                        <div className="grid grid-cols-2 border border-gray-300 rounded-lg overflow-hidden">
                                            <div className="p-3 border-r border-gray-300">
                                                <label className="block text-xs font-semibold text-gray-900 uppercase">
                                                    Giriş
                                                </label>
                                                <input
                                                    type="date"
                                                    className="w-full border-0 p-0 text-sm focus:ring-0"
                                                    defaultValue="2025-01-31"
                                                />
                                            </div>
                                            <div className="p-3">
                                                <label className="block text-xs font-semibold text-gray-900 uppercase">
                                                    Çıkış
                                                </label>
                                                <input
                                                    type="date"
                                                    className="w-full border-0 p-0 text-sm focus:ring-0"
                                                    defaultValue="2025-02-03"
                                                />
                                            </div>
                                        </div>

                                        <div className="border border-gray-300 rounded-lg p-3">
                                            <label className="block text-xs font-semibold text-gray-900 uppercase mb-1">
                                                Misafirler
                                            </label>
                                            <select className="w-full border-0 p-0 text-sm focus:ring-0">
                                                <option>1 misafir</option>
                                                <option>2 misafir</option>
                                                <option>3 misafir</option>
                                                <option>4 misafir</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button className="w-full bg-red-500 text-white font-medium py-3 rounded-lg hover:bg-red-600 transition-colors mb-4">
                                        Rezervasyon yap
                                    </button>

                                    <p className="text-center text-sm text-gray-600 mb-4">
                                        Henüz ücretlendirilmeyeceksiniz
                                    </p>

                                    <div className="space-y-2 text-sm">
                                        <div className="flex justify-between">
                                            <span className="underline">₺{price.toLocaleString()} x 3 gece</span>
                                            <span>₺{(price * 3).toLocaleString()}</span>
                                        </div>
                                        <div className="flex justify-between">
                                            <span className="underline">Temizlik ücreti</span>
                                            <span>₺186</span>
                                        </div>
                                        <div className="flex justify-between">
                                            <span className="underline">Hizmet bedeli</span>
                                            <span>₺351</span>
                                        </div>
                                        <hr className="my-3" />
                                        <div className="flex justify-between font-medium text-base">
                                            <span>Toplam</span>
                                            <span>₺{(price * 3 + 186 + 351).toLocaleString()}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </>
    );
}
