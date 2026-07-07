<x-layouts.app>
    <x-slot:title>Destinasi Wisata Banyuwangi</x-slot:title>

    <!-- Hero Banner -->
    <div class="relative bg-primary-900 pt-32 pb-20 sm:pb-24 overflow-hidden">
        <div class="absolute inset-0 bg-[url('{{ asset('images/ijen_crater.png') }}')] bg-cover bg-center opacity-30"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-primary-900/80 via-primary-900/60 to-primary-900"></div>
        <div class="relative z-10 container-custom text-center">
            <h1 class="text-3xl sm:text-5xl font-bold text-white mb-4">Destinasi Wisata Banyuwangi</h1>
            <p class="text-sm sm:text-lg text-primary-200 max-w-2xl mx-auto">Jelajahi keindahan alam, budaya, dan pesona tersembunyi dari setiap sudut Banyuwangi.</p>
        </div>
    </div>

    <div class="container-custom py-16 sm:py-20">
        @if($featuredDestination)
        <section class="mb-16 sm:mb-20">
            <div class="relative rounded-xl overflow-hidden">
                <img src="{{ $featuredDestination->image_url }}" alt="{{ $featuredDestination->name }}" class="w-full h-[40vh] sm:h-[50vh] object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-primary-900/90 via-primary-900/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-10">
                    <span class="badge-accent mb-3 inline-block">Destinasi Unggulan</span>
                    <h2 class="text-2xl sm:text-4xl font-bold text-white mb-2">{{ $featuredDestination->name }}</h2>
                    <p class="text-sm sm:text-base text-primary-200 max-w-2xl">{{ Str::limit($featuredDestination->description, 200) }}</p>
                    <a href="{{ route('destinations.show', $featuredDestination) }}" class="btn-secondary text-white border-white bg-transparent hover:bg-white hover:text-primary-900 mt-4 inline-flex">Jelajahi</a>
                </div>
            </div>
        </section>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @forelse($destinations as $destination)
                <a href="{{ route('destinations.show', $destination) }}" class="card group block">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img src="{{ $destination->image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-1 text-[11px] text-primary-500 mb-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $destination->location }}
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-primary-900 mb-2 group-hover:text-primary-700 transition-colors">{{ $destination->name }}</h3>
                        <p class="text-sm text-primary-500 line-clamp-2">{{ $destination->description }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-16 text-primary-500">
                    Belum ada destinasi yang ditambahkan.
                </div>
            @endforelse
        </div>

        @if($destinations->hasPages())
            <div class="mt-12">
                {{ $destinations->links() }}
            </div>
        @endif
    </div>

</x-layouts.app>
