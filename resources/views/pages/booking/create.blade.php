<x-layouts.app>
    <x-slot:title>Pemesanan: {{ $tourPackage->title }}</x-slot:title>
    
    <div class="bg-gray-50 dark:bg-gray-900 pt-20 sm:pt-24 pb-16 sm:pb-20">
        <div class="container-custom max-w-4xl">
            
            <div class="mb-6 sm:mb-8">
                <a href="{{ route('packages.show', $tourPackage) }}" class="inline-flex items-center text-xs sm:text-sm font-medium text-gray-500 hover:text-primary-600 transition-colors">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Detail Paket
                </a>
            </div>

            <div class="card overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    
                    <!-- Sidebar: Trip Summary -->
                    <div class="bg-primary-900 text-white p-4 sm:p-6 md:p-8 col-span-1 border-b md:border-b-0 md:border-r border-primary-700">
                        <h2 class="font-heading text-[10px] sm:text-xs font-bold text-primary-300 uppercase tracking-[0.15em] mb-2 sm:mb-3">Ringkasan Pesanan</h2>
                        <h3 class="text-base sm:text-lg font-bold text-white leading-snug mb-4 sm:mb-6">{{ $tourPackage->title }}</h3>
                        
                        <div class="space-y-3 sm:space-y-4 text-xs sm:text-sm text-gray-200">
                            <div class="flex items-start">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 sm:mr-3 flex-shrink-0 mt-0.5 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span>{{ $tourPackage->formattedDuration() }}</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 sm:mr-3 flex-shrink-0 mt-0.5 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                <span>Kategori: {{ $tourPackage->category->name }}</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 sm:mr-3 flex-shrink-0 mt-0.5 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>{{ $tourPackage->destinations->count() }} Destinasi Utama</span>
                            </div>
                        </div>

                        <div class="mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-white/20">
                            <p class="text-[10px] sm:text-xs font-medium text-gray-400 uppercase tracking-wider mb-1 sm:mb-2">Harga Mulai Dari</p>
                            <p class="text-xl sm:text-2xl font-bold text-white">{{ $tourPackage->formattedPrice() }}</p>
                        </div>
                    </div>

                    <!-- Main Form Area -->
                    <div class="p-4 sm:p-6 md:p-8 col-span-1 md:col-span-2">
                        <h2 class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6">Lengkapi Data Pemesanan</h2>
                        
                        <!-- Include booking form component -->
                        <x-booking-form :tourPackage="$tourPackage" />
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
