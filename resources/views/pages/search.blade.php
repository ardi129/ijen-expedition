<x-layouts.app>
    <x-slot:title>Hasil Pencarian: {{ $query }} | Ijen Expedition Trip</x-slot:title>
    
    <div class="bg-gray-50 dark:bg-gray-950 pt-16 sm:pt-24 pb-10 sm:pb-16 lg:pb-20 min-h-screen">
        <div class="container-custom">
            
            <div class="mb-8 sm:mb-12 border-b border-gray-200 dark:border-gray-800 pb-6">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2 sm:mb-4">Hasil Pencarian</h1>
                @if($query)
                    <p class="text-sm sm:text-base text-gray-500 dark:text-gray-400">Menampilkan hasil untuk: <span class="font-semibold text-gray-900 dark:text-white">"{{ $query }}"</span></p>
                @else
                    <p class="text-sm sm:text-base text-gray-500 dark:text-gray-400">Silakan masukkan kata kunci pencarian.</p>
                @endif
            </div>

            @if($query)
                @if($packages->isEmpty() && $destinations->isEmpty() && $articles->isEmpty())
                    <div class="bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-sm">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Tidak ada hasil ditemukan</h3>
                        <p class="text-gray-500 dark:text-gray-400">Coba gunakan kata kunci lain yang lebih umum.</p>
                    </div>
                @else
                    
                    @if($packages->isNotEmpty())
                        <div class="mb-12">
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                                <span class="w-8 h-8 rounded-lg bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </span>
                                Paket Wisata ({{ $packages->count() }})
                            </h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
                                @foreach($packages as $package)
                                    <x-package-card :package="$package" />
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($destinations->isNotEmpty())
                        <div class="mb-12">
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                                <span class="w-8 h-8 rounded-lg bg-accent-100 dark:bg-accent-900/30 text-accent-600 dark:text-accent-400 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </span>
                                Destinasi ({{ $destinations->count() }})
                            </h2>
                            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 md:gap-6 lg:gap-8">
                                @foreach($destinations as $dest)
                                    <a href="{{ route('destinations.show', $dest) }}" class="card group overflow-hidden block focus:outline-none focus:ring-2 focus:ring-primary-500 rounded-xl">
                                        <div class="aspect-square sm:aspect-[16/10] overflow-hidden bg-gray-100 dark:bg-gray-800">
                                            <img src="{{ $dest->image_url }}" alt="{{ $dest->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                                        </div>
                                        <div class="p-3 sm:p-5">
                                            <h3 class="text-sm sm:text-base md:text-lg lg:text-xl font-bold text-gray-900 dark:text-white mb-1 sm:mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors line-clamp-1">{{ $dest->name }}</h3>
                                            <p class="text-[10px] sm:text-xs md:text-sm text-gray-500 dark:text-gray-400 mb-2 sm:mb-3 flex items-center gap-1">
                                                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                <span class="truncate">{{ $dest->location }}</span>
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($articles->isNotEmpty())
                        <div class="mb-12">
                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                                <span class="w-8 h-8 rounded-lg bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                </span>
                                Artikel Blog ({{ $articles->count() }})
                            </h2>
                            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6 lg:gap-8">
                                @foreach($articles as $article)
                                    <div class="card group h-full flex flex-col focus-within:ring-2 focus-within:ring-primary-500 rounded-xl">
                                        <a href="{{ route('articles.show', $article) }}" class="block overflow-hidden aspect-square sm:aspect-[3/2] focus:outline-none">
                                            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                                        </a>
                                        <div class="p-3 sm:p-5 flex flex-col flex-grow bg-white dark:bg-gray-900">
                                            <h3 class="text-sm sm:text-base md:text-xl font-bold mb-1.5 sm:mb-2 group-hover:text-primary-600 dark:text-white dark:group-hover:text-primary-400 transition-colors line-clamp-2">
                                                <a href="{{ route('articles.show', $article) }}" class="focus:outline-none">{{ $article->title }}</a>
                                            </h3>
                                            <p class="text-gray-600 dark:text-gray-400 text-[10px] sm:text-xs md:text-sm line-clamp-2 sm:line-clamp-3 mb-3 sm:mb-4 flex-grow">
                                                {{ $article->excerpt }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                @endif
            @endif

        </div>
    </div>
</x-layouts.app>
