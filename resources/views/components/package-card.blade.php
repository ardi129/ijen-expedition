@props(['package'])

<div class="card flex flex-col h-full group">
    <div class="relative overflow-hidden aspect-[4/3] sm:aspect-video bg-gray-100 dark:bg-gray-800">
        <img src="{{ Storage::url($package->image) }}" alt="{{ $package->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">

        <div class="absolute top-3 sm:top-4 left-3 sm:left-4 flex gap-1.5 sm:gap-2 flex-wrap">
            <span class="inline-flex items-center px-2 sm:px-2.5 py-0.5 rounded-full text-[10px] sm:text-xs font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200 shadow-sm">
                {{ $package->category->name }}
            </span>
            @if($package->is_featured)
            <span class="inline-flex items-center px-2 sm:px-2.5 py-0.5 rounded-full text-[10px] sm:text-xs font-medium bg-accent-100 text-accent-800 dark:bg-accent-900 dark:text-accent-200 shadow-sm">
                Populer
            </span>
            @endif
        </div>

        <div class="absolute bottom-0 inset-x-0 h-1/2 bg-gradient-to-t from-gray-900/90 dark:from-gray-950/90 to-transparent"></div>
        <div class="absolute bottom-2 sm:bottom-3 left-3 sm:left-4 text-white text-xs sm:text-sm font-medium flex items-center">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1 sm:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ $package->formattedDuration() }}
        </div>
    </div>

    <div class="p-4 sm:p-5 lg:p-6 flex flex-col flex-grow bg-white dark:bg-gray-900">
        <h3 class="text-base sm:text-lg lg:text-xl font-heading font-bold text-gray-900 dark:text-white mb-1.5 sm:mb-2 line-clamp-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
            <a href="{{ route('packages.show', $package) }}" class="focus:outline-none focus:ring-2 focus:ring-primary-500 rounded-sm">{{ $package->title }}</a>
        </h3>

        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mb-3 sm:mb-4 line-clamp-2 sm:line-clamp-3">
            {{ $package->short_description }}
        </p>

        <div class="mt-auto mb-3 sm:mb-5 flex flex-wrap gap-1 sm:gap-1.5">
            @foreach($package->destinations->take(3) as $dest)
                <span class="inline-flex items-center text-[10px] sm:text-xs text-gray-500 dark:text-gray-400">
                    <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 mr-0.5 sm:mr-1 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $dest->name }}
                </span>
            @endforeach
            @if($package->destinations->count() > 3)
                <span class="text-[10px] sm:text-xs text-gray-400 dark:text-gray-500">+{{ $package->destinations->count() - 3 }} lagi</span>
            @endif
        </div>

        <div class="flex items-end justify-between mt-auto pt-3 sm:pt-4 border-t border-gray-100 dark:border-gray-800">
            <div>
                @if($package->price > 0)
                    <p class="text-[10px] sm:text-xs text-gray-500 dark:text-gray-400 mb-0.5">Mulai dari</p>
                @else
                    <p class="text-[10px] sm:text-xs text-gray-500 dark:text-gray-400 mb-0.5">Info Harga</p>
                @endif
                <p class="text-sm sm:text-base lg:text-lg font-bold text-primary-600 dark:text-primary-400">
                    {{ $package->formattedPrice() }}
                </p>
            </div>
            <a href="{{ route('packages.show', $package) }}" class="touch-target inline-flex items-center justify-center p-2 rounded-full bg-primary-50 text-primary-900 hover:bg-primary-900 hover:text-white transition-colors dark:bg-gray-800 dark:text-primary-300 dark:hover:bg-primary-700 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-primary-500" title="Lihat Detail">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</div>
