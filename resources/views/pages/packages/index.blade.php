<x-layouts.app>
    <x-slot:title>Daftar Paket Wisata Banyuwangi</x-slot:title>
    
    <!-- Header Page -->
    <div class="bg-primary-900 pt-20 sm:pt-24 pb-20 sm:pb-28 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('{{ asset('images/djawatan_forest.png') }}')] bg-cover bg-center opacity-20 mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-50 dark:from-gray-900 to-transparent bottom-0 h-16"></div>
        <div class="relative z-10 container-custom text-center">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-bold text-white mb-3 sm:mb-4">Paket Wisata Banyuwangi</h1>
            <p class="text-sm sm:text-lg text-primary-100 max-w-2xl mx-auto">Pilih paket perjalanan yang sesuai dengan kebutuhan Anda. Nikmati kemudahan eksplorasi Banyuwangi bersama kami.</p>
        </div>
    </div>

    <!-- Search & Filter -->
    <x-search-filter :categories="$categories" />

    <div class="container-custom py-12 sm:py-16">
        
        <!-- Results Info -->
        <div class="mb-6 sm:mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
            <h2 class="text-base sm:text-xl font-bold text-gray-900 dark:text-white">
                @if(request('q'))
                    Hasil pencarian untuk "{{ request('q') }}"
                @elseif(request('category'))
                    Menampilkan kategori "{{ $categories->firstWhere('slug', request('category'))->name ?? request('category') }}"
                @else
                    Semua Paket Wisata
                @endif
            </h2>
            <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">{{ $packages->total() }} paket ditemukan</span>
        </div>

        <!-- Packages Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-12">
            @forelse($packages as $package)
                <div class="h-full flex">
                    <x-package-card :package="$package" />
                </div>
            @empty
                <div class="col-span-full py-16 sm:py-20 text-center">
                    <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-lg sm:text-xl font-medium text-gray-900 dark:text-white mb-2">Paket tidak ditemukan</h3>
                    <p class="text-sm sm:text-base text-gray-500 dark:text-gray-400 mb-6">Paket tidak ditemukan. Coba ubah pencarian Anda.</p>
                    <a href="{{ route('packages.index') }}" class="btn-primary">Tampilkan Semua Paket</a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($packages->hasPages())
            <div class="mt-8">
                {{ $packages->links() }}
            </div>
        @endif
    </div>

</x-layouts.app>
