<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Paket Wisata Banyuwangi, Privat Trip, Open Trip' }} | Ijen Expedition Trip</title>
    
    <!-- SEO Meta Tags (HE01 - SEO) -->
    <meta name="description" content="{{ $meta_description ?? 'Temukan paket wisata Banyuwangi terbaik bersama Ijen Expedition Trip. Private trip & open trip ke destinasi eksotis, fleksibel sesuai kebutuhan Anda.' }}">
    
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-gray-800 bg-gray-50 dark:bg-gray-900 dark:text-gray-100 antialiased flex flex-col min-h-screen">
    
    <x-navigation />

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" class="fixed top-24 left-1/2 transform -translate-x-1/2 z-50 w-[90%] max-w-md animate-fade-in-up">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl shadow-lg relative" role="alert">
                <span class="block sm:inline font-medium">{{ session('success') }}</span>
                <button @click="show = false" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700 hover:text-green-900">
                    <svg class="fill-current h-5 w-5" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Tutup</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </button>
            </div>
        </div>
    @endif

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <x-footer />
    
    <x-back-to-top />
    <x-whatsapp-float />

    {{-- Mobile Menu Overlay --}}
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-gray-900/50 dark:bg-gray-950/70 backdrop-blur-sm z-[9998] opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"></div>

    {{-- Mobile Navigation Panel --}}
    <div id="mobile-menu" class="fixed top-0 right-0 h-dvh w-[80vw] sm:w-80 max-w-[288px] sm:max-w-sm bg-white dark:bg-gray-900 shadow-xl z-[9999] translate-x-full transition-transform duration-300 ease-in-out md:hidden flex flex-col">
        <div class="flex items-center justify-between p-4 border-b border-gray-100 dark:border-gray-800">
            <span class="font-bold text-lg text-gray-900 dark:text-white">Menu</span>
            <button id="close-menu-button" class="touch-target p-2.5 text-gray-500 dark:text-gray-400 hover:text-primary-500 dark:hover:text-primary-400 rounded-md">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="flex-1 p-3 flex flex-col gap-1 overflow-y-auto">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium min-h-[44px] {{ request()->routeIs('home') ? 'bg-primary-50 dark:bg-gray-800 text-primary-600 dark:text-primary-400 border-l-4 border-primary-500' : 'text-gray-900 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('home') ? 'text-primary-500' : 'text-gray-400 dark:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Beranda
            </a>
            <a href="{{ route('packages.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium min-h-[44px] {{ request()->routeIs('packages.*') ? 'bg-primary-50 dark:bg-gray-800 text-primary-600 dark:text-primary-400 border-l-4 border-primary-500' : 'text-gray-900 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('packages.*') ? 'text-primary-500' : 'text-gray-400 dark:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Paket Wisata
            </a>
            <a href="{{ route('destinations.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium min-h-[44px] {{ request()->routeIs('destinations.*') ? 'bg-primary-50 dark:bg-gray-800 text-primary-600 dark:text-primary-400 border-l-4 border-primary-500' : 'text-gray-900 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('destinations.*') ? 'text-primary-500' : 'text-gray-400 dark:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                Destinasi
            </a>
            <a href="{{ route('articles.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium min-h-[44px] {{ request()->routeIs('articles.*') ? 'bg-primary-50 dark:bg-gray-800 text-primary-600 dark:text-primary-400 border-l-4 border-primary-500' : 'text-gray-900 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('articles.*') ? 'text-primary-500' : 'text-gray-400 dark:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Artikel
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium min-h-[44px] {{ request()->routeIs('about') ? 'bg-primary-50 dark:bg-gray-800 text-primary-600 dark:text-primary-400 border-l-4 border-primary-500' : 'text-gray-900 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('about') ? 'text-primary-500' : 'text-gray-400 dark:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Tentang Kami
            </a>
            <a href="{{ route('faq') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium min-h-[44px] {{ request()->routeIs('faq') ? 'bg-primary-50 dark:bg-gray-800 text-primary-600 dark:text-primary-400 border-l-4 border-primary-500' : 'text-gray-900 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('faq') ? 'text-primary-500' : 'text-gray-400 dark:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                FAQ
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium min-h-[44px] {{ request()->routeIs('contact') ? 'bg-primary-50 dark:bg-gray-800 text-primary-600 dark:text-primary-400 border-l-4 border-primary-500' : 'text-gray-900 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('contact') ? 'text-primary-500' : 'text-gray-400 dark:text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Hubungi Kami
            </a>

            <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-800">
                <a href="{{ route('packages.index') }}" class="btn-primary w-full text-center">Pesan Sekarang</a>
            </div>
        </nav>
    </div>

</body>
</html>
