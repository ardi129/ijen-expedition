<x-layouts.app>
    <x-slot:title>{{ $article->title }} | Ijen Expedition Trip</x-slot:title>
    
    <article class="pt-20 sm:pt-24 pb-16 sm:pb-20">
        <header class="container-custom max-w-4xl text-center mb-8 sm:mb-10">
            <div class="flex flex-wrap items-center justify-center gap-2 text-xs sm:text-sm text-primary-600 mb-3 sm:mb-4">
                <span class="font-medium px-2 sm:px-3 py-1 bg-primary-50 dark:bg-primary-900/30 rounded-full">{{ $article->category }}</span>
                <span class="text-gray-400">•</span>
                <span class="text-gray-500 dark:text-gray-400">{{ $article->published_at->format('d M Y') }}</span>
            </div>
            
            <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6 leading-tight">
                {{ $article->title }}
            </h1>
            
            <p class="text-sm sm:text-base md:text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                {{ $article->excerpt }}
            </p>
        </header>

        <div class="container-custom max-w-5xl mb-8 sm:mb-12">
            <div class="aspect-video rounded-xl sm:rounded-2xl overflow-hidden shadow-lg">
                @if($article->image)
                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover" loading="eager">
                @else
                    <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                        <span class="text-gray-400 text-sm">Tidak ada gambar</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="container-custom max-w-3xl">
            <div class="prose prose-sm sm:prose-base md:prose-lg prose-primary dark:prose-invert max-w-none mb-8 sm:mb-12 text-justify">
                {!! nl2br(e($article->body)) !!}
            </div>
            
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between py-4 sm:py-6 border-t border-b border-gray-100 dark:border-gray-800 gap-3">
                <span class="text-sm sm:text-base font-medium text-gray-900 dark:text-white">Bagikan Artikel:</span>
                <div class="flex gap-2 sm:gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-600 hover:text-white hover:bg-[#1877F2] transition-colors touch-target">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" target="_blank" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-600 hover:text-white hover:bg-[#1DA1F2] transition-colors touch-target">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . request()->fullUrl()) }}" target="_blank" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center text-gray-600 hover:text-white hover:bg-[#25D366] transition-colors touch-target">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1.129-16.732c-2.45-.043-5.07.665-6.837 2.115-1.922 1.577-2.923 3.935-2.83 6.365.074 1.954.912 3.864 2.378 5.253a6.5 6.5 0 001.385.992c-.172.585-.453 1.25-.972 1.996l-.16.23h1.83c1.385 0 2.457-.36 3.195-1.042 1.155.334 2.392.42 3.612.228 2.26-.356 4.314-1.744 5.37-3.798C19.041 15.3 19 12.872 17.772 10.99 16.324 8.766 13.684 5.33 10.871 5.268z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </article>

    @if($latestArticles->isNotEmpty())
    <div class="bg-gray-50 dark:bg-gray-800/50 py-12 sm:py-16">
        <div class="container-custom">
            <h3 class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white mb-6 sm:mb-8 border-l-4 border-primary-500 pl-4">Artikel Lainnya</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach($latestArticles as $related)
                    <div class="card group flex flex-col h-full">
                        <a href="{{ route('articles.show', $related) }}" class="block overflow-hidden aspect-[4/3] sm:aspect-[3/2]">
                            @if($related->image)
                                <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                            @else
                                <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center transition-transform duration-500 group-hover:scale-110">
                                    <span class="text-gray-400 text-xs sm:text-sm">Tidak ada gambar</span>
                                </div>
                            @endif
                        </a>
                        <div class="p-4 sm:p-6 flex flex-col flex-grow">
                            <h4 class="text-sm sm:text-lg font-bold mb-1 sm:mb-2 group-hover:text-primary-600 transition-colors line-clamp-2">
                                <a href="{{ route('articles.show', $related) }}">{{ $related->title }}</a>
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm line-clamp-2 mb-3 sm:mb-4">
                                {{ $related->excerpt }}
                            </p>
                            <a href="{{ route('articles.show', $related) }}" class="mt-auto text-primary-600 font-medium text-xs sm:text-sm hover:underline">
                                Baca artikel
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</x-layouts.app>
