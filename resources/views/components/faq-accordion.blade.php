@props(['faq'])

<div class="border-b border-gray-200 dark:border-gray-700 last:border-0">
    <button class="faq-button w-full py-5 flex items-center justify-between text-left focus:outline-none transition-colors group">
        <span class="text-base font-semibold text-gray-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400">{{ $faq->question }}</span>
        <span class="ml-6 flex items-center">
            <svg class="faq-icon h-5 w-5 text-gray-400 group-hover:text-primary-500 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </span>
    </button>
    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
        <div class="pb-5 pr-12 text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
            {{ $faq->answer }}
        </div>
    </div>
</div>
