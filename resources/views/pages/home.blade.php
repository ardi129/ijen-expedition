@php
    $destSection = $contentBlocks->get('destinations-section');
    $aboutIntro = $contentBlocks->get('about-intro');
    $visi = $contentBlocks->get('visi');
    $misi = $contentBlocks->get('misi');
    $cta = $contentBlocks->get('cta-banner');
    $articlesSection = $contentBlocks->get('articles-section');
@endphp

<x-layouts.app>
    <x-slot:title>Paket Wisata Banyuwangi, Privat Trip, Open Trip</x-slot:title>

    <x-hero-slider :hero-slides="$heroSlides" />

    <!-- Destinations -->
    <section class="py-16 sm:py-20 bg-white dark:bg-gray-900">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-16 animate-on-scroll">
                <span class="text-primary-600 font-semibold tracking-wider uppercase mb-2 block text-xs sm:text-sm">Destinasi Unggulan</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 sm:mb-4">{{ $destSection?->title ?? 'Jelajahi Keindahan Banyuwangi' }}</h2>
                @if($destSection?->subtitle)
                    <p class="text-gray-600 dark:text-gray-400 text-sm sm:text-lg">{{ $destSection->subtitle }}</p>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach($destinations as $dest)
                    <a href="{{ route('destinations.show', $dest) }}" class="card group overflow-hidden animate-on-scroll block">
                        <div class="aspect-[16/10] overflow-hidden">
                            <img src="{{ $dest->image_url }}"
                                 alt="{{ $dest->name }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                 loading="lazy">
                        </div>
                        <div class="p-4 sm:p-6">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-600 transition-colors">
                                {{ $dest->name }}
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mb-3 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $dest->location }}
                            </p>
                            <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm leading-relaxed line-clamp-3">
                                {{ $dest->description }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="text-center mt-10 sm:mt-12">
                <a href="{{ route('destinations.index') }}" class="btn-outline">Jelajahi Semua Destinasi</a>
            </div>
        </div>
    </section>

    <!-- Package Groups -->
    @foreach($packageGroups as $groupName => $data)
        @php
            $group = $data['meta'];
            $packages = $data['packages'];
            $params = [];
            if ($group->filter_type === 'duration') {
                $params['duration'] = $group->filter_value;
            } elseif ($group->filter_type === 'category') {
                $params['category'] = $group->filter_value;
            }
        @endphp
        <section class="py-12 sm:py-16 {{ $loop->even ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800/50' }}">
            <div class="container-custom">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-6 sm:mb-10 animate-on-scroll gap-3">
                    <div>
                        <a href="{{ route('packages.index', $params) }}" class="group">
                            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 dark:text-white group-hover:text-primary-600 transition-colors">{{ $groupName }}</h2>
                        </a>
                        @if($group->description)
                            <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm mt-1">{{ $group->description }}</p>
                        @endif
                    </div>
                    <a href="{{ route('packages.index', $params) }}" class="hidden sm:inline-flex items-center text-primary-600 hover:text-primary-700 font-medium group transition-colors text-sm">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                    @foreach($packages as $package)
                        <div class="animate-on-scroll">
                            <x-package-card :package="$package" />
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 sm:hidden text-center">
                    <a href="{{ route('packages.index', $params) }}" class="btn-outline w-full">Lihat Semua {{ $groupName }}</a>
                </div>
            </div>
        </section>
    @endforeach

    <!-- Tentang Kami -->
    <section class="py-16 sm:py-24 bg-white dark:bg-gray-900">
        <div class="container-custom">
            @if($aboutIntro)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12 items-center mb-16">
                <div class="animate-on-scroll order-2 lg:order-1">
                    @if($aboutIntro->image)
                        <img src="{{ asset($aboutIntro->image) }}" alt="Ijen Expedition Trip" class="w-48 sm:w-64 h-auto mx-auto lg:mx-0">
                    @endif
                </div>
                <div class="animate-on-scroll order-1 lg:order-2">
                    <span class="text-primary-600 font-semibold tracking-wider uppercase mb-2 block text-xs sm:text-sm">Tentang Kami</span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6">{{ $aboutIntro->title ?? 'Mitra Perjalanan Terpercaya Sejak 2020' }}</h2>
                    <div class="text-sm sm:text-base text-gray-600 dark:text-gray-300 leading-relaxed prose prose-gray max-w-none">
                        {!! $aboutIntro->content !!}
                    </div>
                </div>
            </div>
            @endif

            @if($homeStats->isNotEmpty())
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-6 mb-16 animate-on-scroll text-center">
                @foreach($homeStats as $stat)
                    <div class="p-4 sm:p-6 rounded-xl border {{ $stat->color === 'accent' ? 'bg-accent-50 border-accent-200' : 'bg-primary-50 border-primary-200' }}">
                        <div class="text-2xl sm:text-4xl font-bold {{ $stat->color === 'accent' ? 'text-accent-700' : 'text-primary-900' }} mb-1 sm:mb-2">{{ $stat->value }}</div>
                        <div class="text-[10px] sm:text-sm text-primary-500">{{ $stat->label }}</div>
                    </div>
                @endforeach
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 animate-on-scroll">
                @if($visi)
                <div class="bg-primary-900 text-white rounded-2xl p-6 sm:p-8">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold mb-3">{{ $visi->title ?? 'Visi Kami' }}</h3>
                    <div class="text-primary-100 text-sm sm:text-base leading-relaxed prose prose-invert max-w-none">
                        {!! $visi->content !!}
                    </div>
                </div>
                @endif
                @if($misi)
                <div class="bg-accent-500 text-white rounded-2xl p-6 sm:p-8">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold mb-3">{{ $misi->title ?? 'Misi Kami' }}</h3>
                    <div class="text-accent-50 text-sm sm:text-base leading-relaxed prose prose-invert max-w-none">
                        {!! $misi->content !!}
                    </div>
                </div>
                @endif
            </div>

            <div class="mt-10 sm:mt-16 text-center animate-on-scroll">
                <a href="{{ route('about') }}" class="btn-primary">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    @if($cta)
    <section class="relative py-16 sm:py-24 bg-primary-900 overflow-hidden rounded-2xl sm:rounded-[2.5rem] mx-3 sm:mx-6 lg:mx-8 my-12 sm:my-24 shadow-soft">
        @if($cta->image)
            <div class="absolute inset-0 bg-[url('{{ asset($cta->image) }}')] bg-cover bg-center opacity-30 mix-blend-overlay"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-primary-900/95 to-primary-800/80"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold text-white mb-4 sm:mb-6 leading-tight">{{ $cta->title ?? 'Rencanakan Petualangan Eksklusif Anda' }}</h2>
            @if($cta->content)
                <p class="text-sm sm:text-lg text-gray-100 mb-6 sm:mb-10 leading-relaxed px-2">{{ strip_tags($cta->content) }}</p>
            @endif
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center px-4 sm:px-0">
                <a href="https://api.whatsapp.com/send?phone=6285748711646&text=Halo,%20customer%20service%20Ijen%20Expedition..." target="_blank" class="btn-accent">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1.129-16.732c-2.45-.043-5.07.665-6.837 2.115-1.922 1.577-2.923 3.935-2.83 6.365.074 1.954.912 3.864 2.378 5.253a6.5 6.5 0 001.385.992c-.172.585-.453 1.25-.972 1.996l-.16.23h1.83c1.385 0 2.457-.36 3.195-1.042 1.155.334 2.392.42 3.612.228 2.26-.356 4.314-1.744 5.37-3.798C19.041 15.3 19 12.872 17.772 10.99 16.324 8.766 13.684 5.33 10.871 5.268z" clip-rule="evenodd" /></svg>
                    Chat WhatsApp
                </a>
                <a href="{{ route('contact') }}" class="btn-outline text-white border-white hover:bg-white hover:text-primary-900">Hubungi Kami</a>
            </div>
        </div>
    </section>
    @endif

    <!-- Latest Articles -->
    <section class="py-16 sm:py-20 bg-white dark:bg-gray-900">
        <div class="container-custom">
            <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-12 animate-on-scroll">
                <span class="text-primary-600 font-semibold tracking-wider uppercase mb-2 block text-xs sm:text-sm">Artikel Terkini</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">{{ $articlesSection?->title ?? 'Panduan & Informasi Wisata' }}</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach($latestArticles as $index => $article)
                    <div class="card group animate-on-scroll stagger-{{ ($index % 3) + 1 }}">
                        <a href="{{ route('articles.show', $article) }}" class="block overflow-hidden aspect-[4/3] sm:aspect-[3/2]">
                            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                        </a>
                        <div class="p-4 sm:p-6">
                            <div class="flex items-center text-xs text-gray-500 mb-2 sm:mb-3 flex-wrap gap-1">
                                <span class="text-primary-600 font-medium">{{ $article->category }}</span>
                                <span class="mx-2 hidden sm:inline">•</span>
                                <span class="sm:inline">{{ $article->published_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-base sm:text-xl font-bold mb-2 sm:mb-3 group-hover:text-primary-600 transition-colors line-clamp-2">
                                <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm line-clamp-3 mb-3 sm:mb-4">
                                {{ $article->excerpt }}
                            </p>
                            <a href="{{ route('articles.show', $article) }}" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium text-xs sm:text-sm transition-colors group/link">
                                Baca Selengkapnya
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 ml-1 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 sm:mt-12 text-center animate-on-scroll">
                <a href="{{ route('articles.index') }}" class="btn-outline">Lihat Semua Artikel</a>
            </div>
        </div>
    </section>
</x-layouts.app>
