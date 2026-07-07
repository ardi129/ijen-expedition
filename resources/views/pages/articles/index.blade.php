<x-layouts.app>
    <x-slot:title>Artikel & Panduan Wisata Banyuwangi</x-slot:title>
    
    <!-- Header -->
    <div class="bg-gray-900 pt-20 sm:pt-24 pb-16 sm:pb-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-primary-900/80 mix-blend-overlay z-0"></div>
        <div class="relative z-10 container-custom text-center">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-bold text-white mb-3 sm:mb-4">Artikel & Tips Wisata</h1>
            <p class="text-sm sm:text-lg text-gray-300 max-w-2xl mx-auto">Temukan inspirasi perjalanan, panduan destinasi, dan informasi terbaru seputar pariwisata Banyuwangi.</p>
        </div>
    </div>

    <!-- Content -->
    <div class="container-custom py-12 sm:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-12">
            @forelse($articles as $article)
                <div class="card group flex flex-col h-full">
                    <a href="{{ route('articles.show', $article) }}" class="block overflow-hidden aspect-[4/3] sm:aspect-[3/2]">
                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                    </a>
                    <div class="p-4 sm:p-6 flex flex-col flex-grow">
                        <div class="flex items-center text-[10px] sm:text-xs text-gray-500 mb-2 sm:mb-3 flex-wrap gap-1">
                            <span class="text-primary-600 font-medium">{{ $article->category }}</span>
                            <span class="mx-1 hidden sm:inline">•</span>
                            <span class="">{{ $article->published_at->format('d M Y') }}</span>
                        </div>
                        <h2 class="text-base sm:text-xl font-bold mb-2 sm:mb-3 group-hover:text-primary-600 transition-colors line-clamp-2">
                            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm line-clamp-3 mb-3 sm:mb-4">
                            {{ $article->excerpt }}
                        </p>
                        <div class="mt-auto pt-3 sm:pt-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
                            <a href="{{ route('articles.show', $article) }}" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium text-xs sm:text-sm transition-colors group/link">
                                Baca 
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 ml-1 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                            <span class="text-[10px] sm:text-xs text-gray-400 flex items-center">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                {{ $article->view_count }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-gray-500">
                    Belum ada artikel yang dipublikasikan.
                </div>
            @endforelse
        </div>

        @if($articles->hasPages())
            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</x-layouts.app>
