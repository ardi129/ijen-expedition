<x-layouts.app>
    <x-slot:title>{{ $tourPackage->title }}</x-slot:title>
    
    <!-- Header / Hero Image -->
    <div class="relative pt-20 sm:pt-24 pb-36 sm:pb-44 lg:pb-56 bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ Storage::url($tourPackage->image) }}');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
        
        <div class="relative z-10 container-custom mt-8 sm:mt-12 text-center md:text-left">
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 mb-3 sm:mb-4">
                <span class="px-3 py-1 rounded-full text-[10px] sm:text-xs font-semibold bg-primary-500 text-white shadow-sm uppercase tracking-wider">
                    {{ $tourPackage->category->name }}
                </span>
                <span class="px-3 py-1 rounded-full text-[10px] sm:text-xs font-semibold bg-white/20 text-white backdrop-blur-sm shadow-sm flex items-center">
                    <svg class="w-3 h-3 sm:w-4 sm:h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $tourPackage->formattedDuration() }}
                </span>
            </div>
            <h1 class="text-2xl sm:text-3xl md:text-5xl font-bold text-white mb-4 sm:mb-6 leading-tight max-w-4xl">{{ $tourPackage->title }}</h1>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container-custom -mt-28 sm:-mt-24 lg:-mt-32 relative z-20 pb-16 sm:pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
            
            <!-- Left Column: Details -->
            <div class="lg:col-span-2 space-y-6 sm:space-y-8">
                <!-- Tabs Container -->
                <div class="card bg-white dark:bg-gray-800 shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <!-- Tabs Navigation -->
                    <div class="flex border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 overflow-x-auto scrollbar-hide" id="package-tabs">
                        <button class="tab-btn active px-4 sm:px-6 py-3 sm:py-4 text-xs sm:text-sm font-bold text-primary-600 border-b-2 border-primary-500 whitespace-nowrap" data-target="tab-overview">Ikhtisar</button>
                        @if(!empty($tourPackage->itinerary))
                            <button class="tab-btn px-4 sm:px-6 py-3 sm:py-4 text-xs sm:text-sm font-bold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 border-b-2 border-transparent whitespace-nowrap" data-target="tab-itinerary">Itinerary</button>
                        @endif
                        @if(!empty($tourPackage->includes) || !empty($tourPackage->excludes))
                            <button class="tab-btn px-4 sm:px-6 py-3 sm:py-4 text-xs sm:text-sm font-bold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 border-b-2 border-transparent whitespace-nowrap" data-target="tab-facility">Fasilitas</button>
                        @endif
                    </div>
                    
                    <div class="p-4 sm:p-6 md:p-8">
                        <!-- Tab Content: Overview -->
                        <div class="tab-pane block" id="tab-overview">
                            <h2 class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white mb-3 sm:mb-4 border-b pb-2 dark:border-gray-700">Cerita Perjalanan</h2>
                            <div class="prose prose-sm sm:prose-base prose-primary max-w-none dark:prose-invert text-gray-700 dark:text-gray-300 leading-relaxed">
                                {!! nl2br(e($tourPackage->description)) !!}
                            </div>
        
                            @if(!empty($tourPackage->highlights))
                                <div class="mt-6 sm:mt-8">
                                    <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mb-3 sm:mb-4">Highlights</h3>
                                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3">
                                        @foreach($tourPackage->highlights as $highlight)
                                            <li class="flex items-start text-sm sm:text-base">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-accent-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                <span class="text-gray-700 dark:text-gray-300">{{ $highlight }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Tab Content: Itinerary -->
                        @if(!empty($tourPackage->itinerary))
                        <div class="tab-pane hidden" id="tab-itinerary">
                            <h2 class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6 border-b pb-2 dark:border-gray-700">Itinerary</h2>
                            <div class="relative border-l-2 border-primary-300 dark:border-primary-700 ml-2 sm:ml-3 md:ml-4 space-y-6 sm:space-y-8">
                                @foreach($tourPackage->itinerary as $item)
                                    <div class="relative pl-5 sm:pl-6 md:pl-8">
                                        <span class="absolute -left-[5px] sm:-left-[3px] top-1.5 w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-primary-600 ring-4 ring-white dark:ring-gray-800"></span>
                                        <h4 class="font-bold text-sm sm:text-lg text-primary-700 dark:text-primary-300 mb-1">{{ $item['time'] ?? '' }}</h4>
                                        <p class="text-gray-700 dark:text-gray-300 text-sm sm:text-base">{{ $item['activity'] ?? '' }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
        
                        <!-- Tab Content: Include & Exclude -->
                        @if(!empty($tourPackage->includes) || !empty($tourPackage->excludes))
                        <div class="tab-pane hidden" id="tab-facility">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-8">
                                @if(!empty($tourPackage->includes))
                                <div>
                                    <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mb-3 sm:mb-4 flex items-center">
                                        <span class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </span>
                                        Termasuk
                                    </h3>
                                    <ul class="space-y-2 sm:space-y-3">
                                        @foreach($tourPackage->includes as $include)
                                            <li class="flex items-start text-xs sm:text-sm text-gray-700 dark:text-gray-300">
                                                <span class="text-green-500 mr-2">•</span>
                                                {{ $include }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
        
                                @if(!empty($tourPackage->excludes))
                                <div>
                                    <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mb-3 sm:mb-4 flex items-center">
                                        <span class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </span>
                                        Tidak Termasuk
                                    </h3>
                                    <ul class="space-y-2 sm:space-y-3">
                                        @foreach($tourPackage->excludes as $exclude)
                                            <li class="flex items-start text-xs sm:text-sm text-gray-700 dark:text-gray-300">
                                                <span class="text-red-500 mr-2">•</span>
                                                {{ $exclude }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- FAQ Section from Database -->
                @if($faqs->isNotEmpty())
                <div class="card p-4 sm:p-6 md:p-8">
                    <h2 class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6 border-b pb-2 dark:border-gray-700">Pertanyaan Umum (FAQ)</h2>
                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($faqs as $faq)
                            <x-faq-accordion :faq="$faq" />
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Reviews Section -->
                <div class="card p-4 sm:p-6 md:p-8" id="reviews">
                    <h2 class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-6 border-b pb-2 dark:border-gray-700">Ulasan Pengunjung</h2>

                    @php $avgRating = $tourPackage->averageRating(); @endphp

                    @if($tourPackage->approvedReviews->isNotEmpty())
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100 dark:border-gray-700">
                            <div class="flex items-center gap-0.5">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 {{ $i <= $avgRating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $avgRating }}</span>
                            <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">({{ $tourPackage->approvedReviews->count() }} ulasan)</span>
                        </div>

                        <div class="space-y-4 sm:space-y-6">
                            @foreach($tourPackage->approvedReviews as $review)
                                <div class="pb-4 sm:pb-6 border-b border-gray-100 dark:border-gray-700 last:border-0">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-2">
                                            <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center text-primary-600 font-bold text-xs sm:text-sm">
                                                {{ substr($review->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <span class="font-semibold text-gray-900 dark:text-white text-xs sm:text-sm">{{ $review->name }}</span>
                                                <span class="text-[10px] sm:text-xs text-gray-400 block">{{ $review->created_at->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-0.5">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-3.5 h-3.5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm leading-relaxed">{{ $review->comment }}</p>
                                    @if($review->admin_feedback)
                                        <div class="mt-3 pl-3 sm:pl-4 border-l-2 border-primary-300 dark:border-primary-600 bg-primary-50/50 dark:bg-primary-900/10 rounded-r-lg py-2 px-3">
                                            <p class="text-[10px] sm:text-xs font-semibold text-primary-700 dark:text-primary-300 mb-1">Ijen Expedition Trip</p>
                                            <p class="text-gray-600 dark:text-gray-400 text-xs sm:text-sm leading-relaxed">{{ $review->admin_feedback }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 text-gray-500">
                            <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto mb-3 text-gray-300 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                            <p class="text-sm">Belum ada ulasan. Jadilah yang pertama memberi ulasan!</p>
                        </div>
                    @endif

                    <!-- Review Form -->
                    <div class="mt-6 sm:mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 dark:text-white mb-4">Tulis Ulasan</h3>
                        <form action="{{ route('reviews.store', $tourPackage) }}" method="POST">
                            @csrf
                            <div class="mb-4" x-data="{ rating: 0, hover: 0 }">
                                <label class="form-label block mb-2">Rating</label>
                                <div class="flex gap-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <button type="button"
                                            @click="rating = {{ $i }}"
                                            @mouseenter="hover = {{ $i }}"
                                            @mouseleave="hover = 0"
                                            class="p-1 transition-colors focus:outline-none">
                                            <svg class="w-6 h-6 sm:w-8 sm:h-8 transition-colors"
                                                :class="(hover || rating) >= {{ $i }} ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600'"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        </button>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" x-model="rating">
                                @error('rating')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="name" class="form-label block mb-1 sm:mb-2">Nama</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="form-input w-full"
                                    placeholder="Nama Anda" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label block mb-1 sm:mb-2">Email <span class="text-gray-400 font-normal">(opsional)</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="form-input w-full"
                                    placeholder="email@contoh.com">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="comment" class="form-label block mb-1 sm:mb-2">Ulasan</label>
                                <textarea id="comment" name="comment" rows="4"
                                    class="form-input w-full"
                                    placeholder="Bagikan pengalaman Anda..."
                                    required>{{ old('comment') }}</textarea>
                                @error('comment')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn-primary">Kirim Ulasan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Booking Box -->
            <div class="lg:col-span-1">
                <div class="card sticky top-24 p-4 sm:p-6 border-t-4 border-t-primary-500">
                    <div class="text-center pb-4 sm:pb-6 border-b border-gray-100 dark:border-gray-700 mb-4 sm:mb-6">
                        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mb-1">Harga Mulai Dari</p>
                        <h3 class="text-xl sm:text-3xl font-bold text-primary-600 dark:text-primary-400">
                            {{ $tourPackage->formattedPrice() }}
                        </h3>
                        <p class="text-[10px] sm:text-xs text-gray-400 mt-2">Harga dapat menyesuaikan tergantung tanggal dan jumlah peserta.</p>
                    </div>

                    <a href="{{ route('booking.create', $tourPackage) }}" class="btn-primary w-full text-sm sm:text-lg shadow-lg shadow-primary-500/30">
                        Pesan Paket Ini
                    </a>

                    <div class="mt-4 sm:mt-6 text-center">
                        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mb-2 sm:mb-3">Ada pertanyaan? Hubungi kami via WhatsApp</p>
                        <a href="https://api.whatsapp.com/send?phone=6285748711646&text=Halo,%20saya%20tertarik%20dengan%20{{ urlencode($tourPackage->title) }}" target="_blank" class="inline-flex items-center justify-center px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-300 dark:border-gray-600 rounded-full text-xs sm:text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 w-full transition-colors touch-target">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1 sm:mr-2 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1.129-16.732c-2.45-.043-5.07.665-6.837 2.115-1.922 1.577-2.923 3.935-2.83 6.365.074 1.954.912 3.864 2.378 5.253a6.5 6.5 0 001.385.992c-.172.585-.453 1.25-.972 1.996l-.16.23h1.83c1.385 0 2.457-.36 3.195-1.042 1.155.334 2.392.42 3.612.228 2.26-.356 4.314-1.744 5.37-3.798C19.041 15.3 19 12.872 17.772 10.99 16.324 8.766 13.684 5.33 10.871 5.268z" clip-rule="evenodd" /></svg>
                            Tanya via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Related Packages -->
        @if($relatedPackages->isNotEmpty())
        <div class="mt-16 sm:mt-24">
            <h3 class="text-lg sm:text-2xl font-bold text-gray-900 dark:text-white mb-6 sm:mb-8 border-l-4 border-primary-500 pl-4">Paket Serupa</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach($relatedPackages as $related)
                    <x-package-card :package="$related" />
                @endforeach
            </div>
        </div>
        @endif
    </div>
</x-layouts.app>
