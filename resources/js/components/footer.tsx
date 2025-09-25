import { GlobeIcon } from '@radix-ui/react-icons';

export function Footer() {
    return (
        <footer className="border-t border-gray-200 bg-gray-50">
            <div className="mx-auto max-w-7xl px-6 py-12 lg:px-10">
                {/* Three Column Layout */}
                <div className="grid grid-cols-1 gap-8 md:grid-cols-3">
                    {/* Destek Column */}
                    <div>
                        <h4 className="mb-4 font-medium text-gray-900">Destek</h4>
                        <ul className="space-y-3 text-sm text-gray-600">
                            <li><a href="#" className="hover:underline">Yardım Merkezi</a></li>
                            <li><a href="#" className="hover:underline">Güvenlik sorunuyla ilgili yardım alın</a></li>
                            <li><a href="#" className="hover:underline">AirCover</a></li>
                            <li><a href="#" className="hover:underline">Ayrımcılık yapmama</a></li>
                            <li><a href="#" className="hover:underline">Engelllik desteği</a></li>
                            <li><a href="#" className="hover:underline">İptal seçenekleri</a></li>
                            <li><a href="#" className="hover:underline">Semtinizdeki sorunu bildirin</a></li>
                        </ul>
                    </div>

                    {/* İşletme Column */}
                    <div>
                        <h4 className="mb-4 font-medium text-gray-900">İşletmenizi Ekleyin</h4>
                        <ul className="space-y-3 text-sm text-gray-600">
                            <li><a href="#" className="hover:underline">İşletmenizi Ekleyin</a></li>
                            <li><a href="#" className="hover:underline">İşletmenizi Ekleyin</a></li>
                            <li><a href="#" className="hover:underline">İşletmenizi Ekleyin</a></li>
                            <li><a href="#" className="hover:underline">Topluluk forumu</a></li>
                            <li><a href="#" className="hover:underline">Sorumlu İşletme</a></li>
                            <li><a href="#" className="hover:underline">Ücretsiz bir işletmenizi ekleyin dersine katılın</a></li>
                            <li><a href="#" className="hover:underline">Yardımcı işletmenizi ekleyin bulun</a></li>
                        </ul>
                    </div>

                    {/* Tatil Column */}
                    <div>
                        <h4 className="mb-4 font-medium text-gray-900">İşletme</h4>
                        <ul className="space-y-3 text-sm text-gray-600">
                            <li><a href="#" className="hover:underline">2025 Yaz Sürümü</a></li>
                            <li><a href="#" className="hover:underline">Basın odası</a></li>
                            <li><a href="#" className="hover:underline">Kariyer</a></li>
                            <li><a href="#" className="hover:underline">Yatırımcılar</a></li>
                        </ul>
                    </div>
                </div>

                {/* Bottom Section */}
                <div className="mt-12 flex flex-col items-start justify-between space-y-4 border-t border-gray-200 pt-8 lg:flex-row lg:items-center lg:space-y-0">
                    {/* Left side - Copyright and legal links */}
                    <div className="flex flex-col space-y-2 text-sm text-gray-600 lg:flex-row lg:items-center lg:space-x-4 lg:space-y-0">
                        <span>© 2025 Tatil, Inc.</span>
                        <span className="hidden lg:inline">·</span>
                        <a href="#" className="hover:underline">Gizlilik</a>
                        <span className="hidden lg:inline">·</span>
                        <a href="#" className="hover:underline">Şartlar</a>
                        <span className="hidden lg:inline">·</span>
                        <a href="#" className="hover:underline">Site haritası</a>
                    </div>

                    {/* Right side - Language/Currency and Social Links */}
                    <div className="flex items-center space-x-6">
                        {/* Language and Currency */}
                        <button className="flex items-center space-x-2 text-sm font-medium text-gray-900 hover:underline">
                            <GlobeIcon className="h-4 w-4" />
                            <span>Türkçe (TR)</span>
                            <span>₺ TRY</span>
                        </button>

                        {/* Social Links */}
                        <div className="flex items-center space-x-4">
                            <a href="#" className="text-gray-600 hover:text-gray-900" aria-label="Facebook">
                                <svg className="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" className="text-gray-600 hover:text-gray-900" aria-label="Twitter">
                                <svg className="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                            <a href="#" className="text-gray-600 hover:text-gray-900" aria-label="Instagram">
                                <svg className="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path fillRule="evenodd" d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.162-1.499-.698-2.436-2.888-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.357-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 23.994 12.017 24c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001 12.017.001z" clipRule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    );
}
