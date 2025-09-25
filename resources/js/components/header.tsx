import { HamburgerMenuIcon, GlobeIcon, PersonIcon, MagnifyingGlassIcon } from '@radix-ui/react-icons';
import { useState, useEffect } from 'react';

export function Header() {
    const [isScrolled, setIsScrolled] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            const scrollTop = window.scrollY;
            setIsScrolled(scrollTop > 80);
        };

        window.addEventListener('scroll', handleScroll);
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    return (
        <header className="sticky top-0 z-50 w-full bg-white transition-all duration-200">
            {/* Top Navigation - Hidden when scrolled */}
            <div className={`border-b border-gray-200 transition-all duration-200 ${isScrolled ? 'h-0 overflow-hidden opacity-0' : 'h-auto opacity-100'}`}>
                <div className="mx-auto max-w-7xl px-6 lg:px-10">
                    <div className="flex h-16 items-center justify-between">
                        {/* Logo */}
                        <div className="flex items-center">
                            <a href="/" className="flex items-center">
                                <svg
                                    width="32"
                                    height="32"
                                    viewBox="0 0 32 32"
                                    className="text-red-500"
                                    fill="currentColor"
                                >
                                    <path d="M16 1C7.16 1 0 8.16 0 17s7.16 16 16 16 16-7.16 16-16S24.84 1 16 1zm0 28c-6.627 0-12-5.373-12-12S9.373 5 16 5s12 5.373 12 12-5.373 12-12 12z"/>
                                    <path d="M20.5 11.5c0-2.5-2-4.5-4.5-4.5s-4.5 2-4.5 4.5c0 3 4.5 8.5 4.5 8.5s4.5-5.5 4.5-8.5z"/>
                                    <circle cx="16" cy="11.5" r="2"/>
                                </svg>
                                <span className="ml-2 text-xl font-bold text-red-500">tatil</span>
                            </a>
                        </div>

                        {/* Navigation Tabs */}
                        <div className="hidden lg:flex lg:items-center lg:space-x-8">
                            <button className="border-b-2 border-gray-900 pb-4 text-sm font-medium text-gray-900">
                                Konaklama
                            </button>
                            <button className="pb-4 text-sm font-medium text-gray-600 hover:text-gray-900">
                                Restoran
                            </button>
                            <button className="pb-4 text-sm font-medium text-gray-600 hover:text-gray-900">
                                Aktivite
                            </button>
                            <button className="pb-4 text-sm font-medium text-gray-600 hover:text-gray-900">
                                Diğer
                            </button>
                        </div>

                        {/* Right side navigation */}
                        <div className="flex items-center space-x-4">
                            {/* Become a host */}
                            <button className="hidden text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-full px-3 py-2 md:block">
                                İşletmenizi Ekleyin
                            </button>

                            {/* Language/Region */}
                            <button className="p-2 text-gray-700 hover:bg-gray-50 rounded-full">
                                <GlobeIcon className="h-4 w-4" />
                            </button>

                            {/* User menu */}
                            <div className="flex items-center space-x-2 rounded-full border border-gray-300 p-1 hover:shadow-md transition-shadow">
                                <button className="p-2">
                                    <HamburgerMenuIcon className="h-4 w-4 text-gray-700" />
                                </button>
                                <button className="p-2">
                                    <PersonIcon className="h-5 w-5 text-gray-700" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* Compact Header - Shown when scrolled */}
            <div className={`border-b border-gray-200 transition-all duration-200 ${isScrolled ? 'h-auto opacity-100' : 'h-0 overflow-hidden opacity-0'}`}>
                <div className="mx-auto max-w-7xl px-6 lg:px-10">
                    <div className="flex h-16 items-center justify-between">
                        {/* Logo */}
                        <div className="flex items-center">
                            <a href="/" className="flex items-center">
                                <svg
                                    width="32"
                                    height="32"
                                    viewBox="0 0 32 32"
                                    className="text-red-500"
                                    fill="currentColor"
                                >
                                    <path d="M16 1C7.16 1 0 8.16 0 17s7.16 16 16 16 16-7.16 16-16S24.84 1 16 1zm0 28c-6.627 0-12-5.373-12-12S9.373 5 16 5s12 5.373 12 12-5.373 12-12 12z"/>
                                    <path d="M20.5 11.5c0-2.5-2-4.5-4.5-4.5s-4.5 2-4.5 4.5c0 3 4.5 8.5 4.5 8.5s4.5-5.5 4.5-8.5z"/>
                                    <circle cx="16" cy="11.5" r="2"/>
                                </svg>
                                <span className="ml-2 text-xl font-bold text-red-500">tatil</span>
                            </a>
                        </div>

                        {/* Compact Search Bar */}
                        <div className="flex flex-1 justify-center">
                            <button className="flex items-center space-x-3 rounded-full border border-gray-300 bg-white px-6 py-2 shadow-sm hover:shadow-md transition-shadow">
                                <span className="text-sm font-medium text-gray-900">Herhangi bir yer</span>
                                <span className="text-sm text-gray-600">Herhangi bir zaman</span>
                                <span className="text-sm text-gray-600">Misafir ekleyin</span>
                                <div className="flex h-8 w-8 items-center justify-center rounded-full bg-red-500 text-white">
                                    <MagnifyingGlassIcon className="h-4 w-4" />
                                </div>
                            </button>
                        </div>

                        {/* Right side navigation */}
                        <div className="flex items-center space-x-4">
                            {/* Become a host */}
                            <button className="hidden text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-full px-3 py-2 md:block">
                                İşletmenizi Ekleyin
                            </button>

                            {/* Language/Region */}
                            <button className="p-2 text-gray-700 hover:bg-gray-50 rounded-full">
                                <GlobeIcon className="h-4 w-4" />
                            </button>

                            {/* User menu */}
                            <div className="flex items-center space-x-2 rounded-full border border-gray-300 p-1 hover:shadow-md transition-shadow">
                                <button className="p-2">
                                    <HamburgerMenuIcon className="h-4 w-4 text-gray-700" />
                                </button>
                                <button className="p-2">
                                    <PersonIcon className="h-5 w-5 text-gray-700" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    );
}
