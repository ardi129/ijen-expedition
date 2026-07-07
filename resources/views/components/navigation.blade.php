<header
    id="main-header"
    @class([
        'fixed w-full top-0 z-50 transition-all duration-300',
        'text-white' => request()->routeIs('home'),
        'bg-white/90 dark:bg-gray-900/90 backdrop-blur-md shadow-sm text-gray-900 dark:text-white' => !request()->routeIs('home'),
    ])
    data-transparent="{{ request()->routeIs('home') ? 'true' : 'false' }}"
>
    <div class="container-custom">
        <div class="flex justify-between items-center h-14 md:h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/Ijen-expedition-logo.png') }}" alt="Ijen Expedition" class="h-6 sm:h-7 md:h-9 w-auto object-contain transition-all duration-300" id="navbar-logo">
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
                        class="relative px-2.5 py-1.5 text-xs font-medium rounded-md transition-colors duration-200 group min-h-[44px] flex items-center
                            {{ $isActive
                                ? 'nav-link-active'
                                : 'nav-link' }}"
                    >
                        {{ $link['label'] }}
                        <span class="absolute bottom-1 left-2.5 right-2.5 h-0.5 rounded-full transition-all duration-200 nav-link-indicator
                            {{ $isActive ? 'opacity-100' : 'opacity-0 group-hover:opacity-50' }}">
                        </span>
                    </a>
                @endforeach
            </nav>

            <!-- Desktop CTA & Actions -->
            <div class="hidden md:flex items-center gap-3 lg:gap-4">
                <!-- Dark Mode Toggle Desktop -->
                <button @click="darkMode = !darkMode" class="touch-target inline-flex items-center justify-center p-2 rounded-md hover:bg-gray-100/20 dark:hover:bg-gray-800/50 transition-colors focus:outline-none" aria-label="Toggle Dark Mode">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-show="darkMode" class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>
                
                <a href="{{ route('contact') }}" class="btn-primary py-1.5 px-4 text-xs nav-cta">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile actions -->
            <div class="flex items-center gap-1 md:hidden">
                <!-- Dark Mode Toggle Mobile -->
                <button @click="darkMode = !darkMode" class="touch-target inline-flex items-center justify-center p-2.5 rounded-md hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none transition-colors nav-mobile-btn" aria-label="Toggle Dark Mode">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-show="darkMode" class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>

                <button type="button" id="mobile-menu-button" class="touch-target inline-flex items-center justify-center p-2.5 rounded-md hover:text-primary-500 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none transition-colors nav-mobile-btn" aria-expanded="false">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


</header>
