<header
    id="main-header"
    @class([
        'fixed w-full top-0 z-50 transition-all duration-300',
        'text-white' => request()->routeIs('home'),
        'bg-white/90 backdrop-blur-md shadow-sm text-gray-900' => !request()->routeIs('home'),
    ])
    data-transparent="{{ request()->routeIs('home') ? 'true' : 'false' }}"
>
    <div class="container-custom">
        <div class="flex justify-between items-center h-14 md:h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/Ijen-expedition-logo.png') }}" alt="Ijen Expedition" class="h-8 md:h-9 w-auto object-contain" id="navbar-logo">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-0.5">
                @php
                    $navLinks = [
                        ['route' => 'home',           'label' => 'Beranda',       'match' => 'home'],
                        ['route' => 'packages.index', 'label' => 'Paket Wisata',  'match' => 'packages.*'],
                        ['route' => 'destinations.index', 'label' => 'Destinasi',  'match' => 'destinations.*'],
                        ['route' => 'articles.index', 'label' => 'Artikel',       'match' => 'articles.*'],
                        ['route' => 'about',          'label' => 'Tentang Kami',  'match' => 'about'],
                        ['route' => 'faq',            'label' => 'FAQ',           'match' => 'faq'],
                    ];
                @endphp

                @foreach($navLinks as $link)
                    @php $isActive = request()->routeIs($link['match']); @endphp
                    <a
                        href="{{ route($link['route']) }}"
                        class="relative px-2.5 py-1.5 text-xs font-medium rounded-md transition-colors duration-200 group
                            {{ $isActive
                                ? 'nav-link-active'
                                : 'nav-link' }}"
                    >
                        {{ $link['label'] }}
                        <span class="absolute bottom-0 left-2.5 right-2.5 h-0.5 rounded-full transition-all duration-200 nav-link-indicator
                            {{ $isActive ? 'opacity-100' : 'opacity-0 group-hover:opacity-50' }}">
                        </span>
                    </a>
                @endforeach
            </nav>

            <!-- Desktop CTA -->
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ route('contact') }}" class="btn-primary py-1.5 px-4 text-xs nav-cta">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button type="button" id="mobile-menu-button" class="touch-target inline-flex items-center justify-center p-2.5 rounded-md hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none transition-colors nav-mobile-btn" aria-expanded="false">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-40 opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"></div>

    <!-- Mobile Navigation Panel -->
    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-full sm:w-80 max-w-sm bg-white dark:bg-gray-900 shadow-xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out md:hidden flex flex-col">
        <div class="flex items-center justify-between p-4 border-b dark:border-gray-800">
            <span class="font-bold text-xl text-gray-900 dark:text-white">Menu</span>
            <button id="close-menu-button" class="touch-target p-2.5 text-gray-500 hover:text-primary-500 rounded-md">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="flex-1 p-4 flex flex-col gap-1 overflow-y-auto">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-lg text-base font-medium min-h-[48px] {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-600 border-l-4 border-primary-500' : 'text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('home') ? 'text-primary-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Beranda
            </a>
            <a href="{{ route('packages.index') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-lg text-base font-medium min-h-[48px] {{ request()->routeIs('packages.*') ? 'bg-primary-50 text-primary-600 border-l-4 border-primary-500' : 'text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('packages.*') ? 'text-primary-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Paket Wisata
            </a>
            <a href="{{ route('destinations.index') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-lg text-base font-medium min-h-[48px] {{ request()->routeIs('destinations.*') ? 'bg-primary-50 text-primary-600 border-l-4 border-primary-500' : 'text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('destinations.*') ? 'text-primary-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                Destinasi
            </a>
            <a href="{{ route('articles.index') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-lg text-base font-medium min-h-[48px] {{ request()->routeIs('articles.*') ? 'bg-primary-50 text-primary-600 border-l-4 border-primary-500' : 'text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('articles.*') ? 'text-primary-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Artikel
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-lg text-base font-medium min-h-[48px] {{ request()->routeIs('about') ? 'bg-primary-50 text-primary-600 border-l-4 border-primary-500' : 'text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('about') ? 'text-primary-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Tentang Kami
            </a>
            <a href="{{ route('faq') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-lg text-base font-medium min-h-[48px] {{ request()->routeIs('faq') ? 'bg-primary-50 text-primary-600 border-l-4 border-primary-500' : 'text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('faq') ? 'text-primary-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                FAQ
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-lg text-base font-medium min-h-[48px] {{ request()->routeIs('contact') ? 'bg-primary-50 text-primary-600 border-l-4 border-primary-500' : 'text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('contact') ? 'text-primary-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Hubungi Kami
            </a>

            <div class="mt-4 pt-4 border-t dark:border-gray-800">
                <a href="{{ route('packages.index') }}" class="btn-primary w-full text-center">Pesan Sekarang</a>
            </div>
        </nav>
    </div>
</header>
