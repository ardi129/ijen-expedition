<x-layouts.app>
    <x-slot:title>Tanya Jawab (FAQ) | Ijen Expedition Trip</x-slot:title>
    
    <div class="bg-gray-50 dark:bg-gray-950 pt-16 sm:pt-24 pb-10 sm:pb-16 lg:pb-20">
        <div class="container-custom max-w-4xl">
            
            <div class="text-center mb-8 sm:mb-16 animate-on-scroll">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2 sm:mb-4">Tanya Jawab (FAQ)</h1>
                <p class="text-sm sm:text-base lg:text-lg text-gray-600 dark:text-gray-400">Temukan jawaban untuk pertanyaan yang paling sering diajukan terkait layanan kami.</p>
            </div>

            <!-- FAQ Categories -->
            <div class="space-y-6 sm:space-y-12">
                @forelse($faqsByCategory as $category => $faqs)
                    <div class="animate-on-scroll">
                        <h2 class="text-base sm:text-xl md:text-2xl font-bold text-primary-900 dark:text-primary-400 mb-3 sm:mb-6 flex items-center">
                            <span class="w-6 h-6 sm:w-8 sm:h-8 rounded-lg bg-primary-100 dark:bg-primary-900/30 text-primary-900 dark:text-primary-400 flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </span>
                            {{ $category }}
                        </h2>
                        <div class="card bg-white dark:bg-gray-900 p-3 sm:p-6 md:p-8">
                            @foreach($faqs as $faq)
                                <x-faq-accordion :faq="$faq" />
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 dark:text-gray-400 py-12 text-sm sm:text-base">Belum ada FAQ yang ditambahkan.</div>
                @endforelse
            </div>
            
            <!-- Contact Box if not answered -->
            <div class="mt-10 sm:mt-16 bg-primary-50 dark:bg-primary-900/20 border border-primary-100 dark:border-primary-800 rounded-xl sm:rounded-2xl p-5 sm:p-8 md:p-10 text-center animate-on-scroll shadow-soft">
                <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-900 dark:text-white mb-2">Masih punya pertanyaan?</h3>
                <p class="text-[10px] sm:text-sm lg:text-base text-gray-600 dark:text-gray-400 mb-4 sm:mb-6">Jangan ragu untuk menghubungi tim Customer Service kami.</p>
                <a href="{{ route('contact') }}" class="btn-primary w-full sm:w-auto">Hubungi Kami</a>
            </div>

        </div>
    </div>
</x-layouts.app>
