import { Head } from '@inertiajs/react';
import { Header } from '../components/header';
import { SearchBar } from '../components/search-bar';
import { ListingGrid, sampleListings } from '../components/listing-grid';
import { Footer } from '../components/footer';

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

interface HomeProps {
    featuredListings?: DisplayListing[];
    nearbyListings?: DisplayListing[];
    popularDestinations?: DisplayListing[];
}

export default function Home({ featuredListings = [], nearbyListings = [], popularDestinations = [] }: HomeProps) {
    // Use database data if available, otherwise fall back to sample data
    const accommodations = featuredListings.length > 0 ? featuredListings : sampleListings.filter(listing => listing.type === 'Konaklama');
    const restaurants = nearbyListings.length > 0 ? nearbyListings : sampleListings.filter(listing => listing.type === 'Restoran');
    const activities = popularDestinations.length > 0 ? popularDestinations : sampleListings.filter(listing => listing.type === 'Aktivite');

    return (
        <>
            <Head title="Discover amazing places in Türkiye" />

            <div className="min-h-screen bg-white">
                <Header />

                <main>
                    {/* Hero Section with Search */}
                    <section className="relative px-6 pt-6 pb-16 lg:px-10 lg:pt-10">
                        <div className="mx-auto max-w-7xl">
                            <SearchBar />
                        </div>
                    </section>

                    {/* Featured Accommodations Section */}
                    <section className="px-6 pb-12 lg:px-10">
                        <div className="mx-auto max-w-7xl">
                            <div className="mb-6 flex items-center justify-between">
                                <h2 className="text-lg font-semibold text-gray-900">
                                    🏠 Popüler Konaklama Seçenekleri
                                </h2>
                                <button className="text-sm font-semibold text-gray-900 hover:underline">
                                    Tümünü Görüntüle
                                </button>
                            </div>
                            <ListingGrid listings={accommodations} variant="horizontal" />
                        </div>
                    </section>

                    {/* Featured Restaurants Section */}
                    <section className="px-6 pb-12 lg:px-10">
                        <div className="mx-auto max-w-7xl">
                            <div className="mb-6 flex items-center justify-between">
                                <h2 className="text-lg font-semibold text-gray-900">
                                    🍽️ Muğla'nın En İyi Restoranları
                                </h2>
                                <button className="text-sm font-semibold text-gray-900 hover:underline">
                                    Tümünü Görüntüle
                                </button>
                            </div>
                            <ListingGrid listings={restaurants} variant="horizontal" />
                        </div>
                    </section>

                    {/* Featured Activities Section */}
                    <section className="px-6 pb-12 lg:px-10">
                        <div className="mx-auto max-w-7xl">
                            <div className="mb-6 flex items-center justify-between">
                                <h2 className="text-lg font-semibold text-gray-900">
                                    🎯 Heyecan Verici Aktiviteler
                                </h2>
                                <button className="text-sm font-semibold text-gray-900 hover:underline">
                                    Tümünü Görüntüle
                                </button>
                            </div>
                            <ListingGrid listings={popularDestinations} variant="horizontal" />
                        </div>
                    </section>

                    {/* Service Categories Overview */}
                    <section className="px-6 pb-12 lg:px-10">
                        <div className="mx-auto max-w-7xl">
                            <div className="mb-8 text-center">
                                <h2 className="text-2xl font-bold text-gray-900 mb-4">
                                    Muğla'da Her İhtiyacınız İçin
                                </h2>
                                <p className="text-gray-600 max-w-2xl mx-auto">
                                    Konaklama, yemek, eğlence ve daha fazlası için Türkiye'nin en güzel destinasyonlarından birinde aradığınız her şeyi keşfedin.
                                </p>
                            </div>
                            <div className="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-4">
                                <div className="group cursor-pointer rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow">
                                    <div className="text-3xl mb-3">🏠</div>
                                    <h3 className="font-semibold text-gray-900 mb-1">Konaklama</h3>
                                    <p className="text-sm text-gray-600">Oteller, villalar ve benzersiz yerler</p>
                                </div>
                                <div className="group cursor-pointer rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow">
                                    <div className="text-3xl mb-3">🍽️</div>
                                    <h3 className="font-semibold text-gray-900 mb-1">Restoran</h3>
                                    <p className="text-sm text-gray-600">Lezzetli yemekler ve yerel tatlar</p>
                                </div>
                                <div className="group cursor-pointer rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow">
                                    <div className="text-3xl mb-3">🎯</div>
                                    <h3 className="font-semibold text-gray-900 mb-1">Aktivite</h3>
                                    <p className="text-sm text-gray-600">Dalış, paraşüt ve macera sporları</p>
                                </div>
                                <div className="group cursor-pointer rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow">
                                    <div className="text-3xl mb-3">🎵</div>
                                    <h3 className="font-semibold text-gray-900 mb-1">Eğlence</h3>
                                    <p className="text-sm text-gray-600">Gece hayatı ve müzik mekanları</p>
                                </div>
                                <div className="group cursor-pointer rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow">
                                    <div className="text-3xl mb-3">🛍️</div>
                                    <h3 className="font-semibold text-gray-900 mb-1">Alışveriş</h3>
                                    <p className="text-sm text-gray-600">Yerel pazarlar ve butik mağazalar</p>
                                </div>
                                <div className="group cursor-pointer rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow">
                                    <div className="text-3xl mb-3">💆</div>
                                    <h3 className="font-semibold text-gray-900 mb-1">Sağlık & SPA</h3>
                                    <p className="text-sm text-gray-600">Rahatlama ve sağlık hizmetleri</p>
                                </div>
                                <div className="group cursor-pointer rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow">
                                    <div className="text-3xl mb-3">🚗</div>
                                    <h3 className="font-semibold text-gray-900 mb-1">Ulaşım</h3>
                                    <p className="text-sm text-gray-600">Araç kiralama ve transfer hizmetleri</p>
                                </div>
                                <div className="group cursor-pointer rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow">
                                    <div className="text-3xl mb-3">🏛️</div>
                                    <h3 className="font-semibold text-gray-900 mb-1">Kültür & Müze</h3>
                                    <p className="text-sm text-gray-600">Tarihi yerler ve kültürel mekanlar</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    {/* Mixed Grid Section */}
                    <section className="px-6 pb-12 lg:px-10">
                        <div className="mx-auto max-w-7xl">
                            <div className="mb-6">
                                <h2 className="text-lg font-semibold text-gray-900">
                                    🌟 Öne Çıkan Yerler
                                </h2>
                            </div>
                            <ListingGrid listings={activities} variant="grid" />
                        </div>
                    </section>
                </main>

                <Footer />
            </div>
        </>
    );
}
