<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
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

</body>
</html>
