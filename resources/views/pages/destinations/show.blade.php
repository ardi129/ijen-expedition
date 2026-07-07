<x-layouts.app>
    <x-slot:title>{{ $destination->name }} | Destinasi Banyuwangi</x-slot:title>

    <!-- Hero -->
    <div class="relative min-h-[50vh] sm:min-h-[60vh] flex items-end">
        <div class="absolute inset-0">
            <img src="{{ $destination->image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-primary-900 via-primary-900/50 to-transparent"></div>
        </div>
        <div class="relative z-10 container-custom pb-10 sm:pb-14">
            <a href="{{ route('destinations.index') }}" class="inline-flex items-center text-white/70 hover:text-white text-sm mb-4 transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Semua Destinasi
            </a>
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold text-white mb-3">{{ $destination->name }}</h1>
            <div class="flex flex-wrap items-center gap-3 text-sm text-white/70">
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $destination->location }}
                </span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-custom py-12 sm:py-16">
        <div class="max-w-4xl mx-auto">
            @if($destination->content)
                <div class="prose prose-sm sm:prose-base lg:prose-lg prose-primary max-w-none">
                    {!! nl2br(e($destination->content)) !!}
                </div>
            @else
                <p class="text-primary-500 text-lg leading-relaxed">{{ $destination->description }}</p>
            @endif

            <!-- Related Paket -->
            @if($destination->tourPackages->isNotEmpty())
                <div class="mt-16 pt-10 border-t border-primary-200">
                    <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mb-6">Paket Wisata ke {{ $destination->name }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        @foreach($destination->tourPackages as $package)
                            <x-package-card :package="$package" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Related Destinations -->
    @if($relatedDestinations->isNotEmpty())
        <div class="bg-primary-50 py-16 sm:py-20">
            <div class="container-custom">
                <h2 class="text-2xl sm:text-3xl font-bold text-primary-900 mb-8">Destinasi Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach($relatedDestinations as $related)
                        <a href="{{ route('destinations.show', $related) }}" class="card group block">
                            <div class="aspect-[16/9] overflow-hidden">
                                <img src="{{ $related->image_url }}" alt="{{ $related->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>
                            <div class="p-5 sm:p-6">
                                <h3 class="text-lg sm:text-xl font-bold text-primary-900 mb-2 group-hover:text-primary-700 transition-colors">{{ $related->name }}</h3>
                                <p class="text-sm text-primary-500 line-clamp-2">{{ $related->description }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

</x-layouts.app>
