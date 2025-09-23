import { MagnifyingGlassIcon } from '@radix-ui/react-icons';
import { useState } from 'react';

export function SearchBar() {
    const [activeTab, setActiveTab] = useState('konaklama');
    const [location, setLocation] = useState('');
    const [checkIn, setCheckIn] = useState('');
    const [checkOut, setCheckOut] = useState('');
    const [guests, setGuests] = useState('');

    const tabs = [
        { id: 'konaklama', label: 'Konaklama', icon: '🏠' },
        { id: 'restoran', label: 'Restoran', icon: '🍽️' },
        { id: 'aktivite', label: 'Aktivite', icon: '🎯' },
        { id: 'eglence', label: 'Eğlence', icon: '🎵' },
        { id: 'alisveris', label: 'Alışveriş', icon: '🛍️' },
    ];

    return (
        <div className="w-full">
            {/* Tab Navigation */}
            <div className="mb-8 flex justify-center">
                <div className="flex rounded-full bg-gray-100 p-1">
                    {tabs.map((tab) => (
                        <button
                            key={tab.id}
                            onClick={() => setActiveTab(tab.id)}
                            className={`flex items-center space-x-2 rounded-full px-4 py-2 text-sm font-medium transition-colors ${
                                activeTab === tab.id
                                    ? 'bg-white text-gray-900 shadow-sm'
                                    : 'text-gray-600 hover:text-gray-900'
                            }`}
                        >
                            <span>{tab.icon}</span>
                            <span>{tab.label}</span>
                        </button>
                    ))}
                </div>
            </div>

            {/* Search Form */}
            <div className="mx-auto max-w-4xl">
                <div className="flex flex-col rounded-2xl border border-gray-300 bg-white shadow-lg lg:flex-row">
                    {/* Location */}
                    <div className="flex-1 p-4 lg:border-r lg:border-gray-300">
                        <label className="block text-xs font-semibold text-gray-900 uppercase tracking-wide">
                            Yer
                        </label>
                        <input
                            type="text"
                            placeholder="Gideceğin yerleri keşfet"
                            value={location}
                            onChange={(e) => setLocation(e.target.value)}
                            className="mt-1 w-full border-0 bg-transparent text-sm text-gray-900 placeholder-gray-500 focus:outline-none"
                        />
                    </div>

                    {/* Check-in */}
                    <div className="flex-1 p-4 lg:border-r lg:border-gray-300">
                        <label className="block text-xs font-semibold text-gray-900 uppercase tracking-wide">
                            Giriş tarihi
                        </label>
                        <input
                            type="text"
                            placeholder="Tarih ekleyin"
                            value={checkIn}
                            onChange={(e) => setCheckIn(e.target.value)}
                            className="mt-1 w-full border-0 bg-transparent text-sm text-gray-900 placeholder-gray-500 focus:outline-none"
                        />
                    </div>

                    {/* Check-out */}
                    <div className="flex-1 p-4 lg:border-r lg:border-gray-300">
                        <label className="block text-xs font-semibold text-gray-900 uppercase tracking-wide">
                            Çıkış tarihi
                        </label>
                        <input
                            type="text"
                            placeholder="Tarih ekleyin"
                            value={checkOut}
                            onChange={(e) => setCheckOut(e.target.value)}
                            className="mt-1 w-full border-0 bg-transparent text-sm text-gray-900 placeholder-gray-500 focus:outline-none"
                        />
                    </div>

                    {/* Guests */}
                    <div className="flex items-center p-4">
                        <div className="flex-1">
                            <label className="block text-xs font-semibold text-gray-900 uppercase tracking-wide">
                                Kimler
                            </label>
                            <input
                                type="text"
                                placeholder="Misafir ekleyin"
                                value={guests}
                                onChange={(e) => setGuests(e.target.value)}
                                className="mt-1 w-full border-0 bg-transparent text-sm text-gray-900 placeholder-gray-500 focus:outline-none"
                            />
                        </div>
                        <button className="ml-4 flex h-12 w-12 items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600 transition-colors">
                            <MagnifyingGlassIcon className="h-4 w-4" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
}