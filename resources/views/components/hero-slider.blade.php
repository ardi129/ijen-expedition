@php
    $slides = $heroSlides ?? collect();
@endphp

@if($slides->isNotEmpty())
<div class="relative w-full h-screen min-h-[600px] overflow-hidden group" id="hero-slider-wrapper">
    <div class="slider-container w-full h-full">
        @foreach($slides as $index => $slide)
            <div class="hero-slide slide absolute inset-0 {{ $loop->first ? 'active' : '' }}">
                <div class="slide-bg absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $slide->image_url }}');"></div>
                <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(15,23,42,0.7) 0%, rgba(15,23,42,0.05) 40%, rgba(15,23,42,0.15) 60%, rgba(15,23,42,0.8) 100%);"></div>
                <div class="relative z-10 flex flex-col items-center justify-center text-center px-4 sm:px-6 w-full h-full">
                    @if($slide->subtitle)
                        <span class="text-accent-400 font-semibold uppercase mb-4 sm:mb-5 tracking-[0.25em] text-[10px] sm:text-[12px] drop-shadow-lg">{{ $slide->subtitle }}</span>
                    @endif
                    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-5 sm:mb-7 max-w-4xl leading-tight [text-shadow:0_2px_6px_rgba(0,0,0,0.5)]">{{ $slide->title }}</h1>
                    @if($slide->description)
                        <p class="text-xs sm:text-sm md:text-base text-gray-100 mb-8 sm:mb-10 max-w-2xl [text-shadow:0_1px_3px_rgba(0,0,0,0.4)] px-2 leading-relaxed">{{ $slide->description }}</p>
                    @endif
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto px-4 sm:px-0">
                        @if($slide->cta_text && $slide->cta_link)
                            <a href="{{ $slide->cta_link }}" class="inline-flex items-center justify-center px-10 py-3 border-2 border-white text-sm font-medium rounded-full text-white bg-transparent hover:bg-white hover:text-primary-900 transition-all duration-300 min-h-11">{{ $slide->cta_text }}</a>
                        @endif
                        @if($slide->cta_text_2 && $slide->cta_link_2)
                            <a href="{{ $slide->cta_link_2 }}" class="inline-flex items-center justify-center px-10 py-3 text-sm font-medium rounded-full text-primary-900 bg-white hover:bg-primary-50 transition-all duration-300 min-h-11">{{ $slide->cta_text_2 }}</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button id="hero-prev" class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/10 hover:bg-white/25 text-white flex items-center justify-center backdrop-blur-sm transition-all duration-200 opacity-0 group-hover:opacity-100 z-20 border border-white/20">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    <button id="hero-next" class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/10 hover:bg-white/25 text-white flex items-center justify-center backdrop-blur-sm transition-all duration-200 opacity-0 group-hover:opacity-100 z-20 border border-white/20">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>

    <button id="hero-play-pause" class="absolute bottom-6 sm:bottom-8 right-6 sm:right-8 w-10 h-10 rounded-full bg-white/10 hover:bg-white/25 text-white flex items-center justify-center backdrop-blur-sm transition-all duration-200 opacity-0 group-hover:opacity-100 z-20 border border-white/20" title="Jeda/Putar slideshow">
        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    </button>

    <div class="absolute bottom-6 sm:bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-20">
        @foreach($slides as $index => $slide)
            <button class="hero-dot w-3 h-3 rounded-full transition-all duration-200 hover:scale-125 ring-2 ring-white/30 {{ $loop->first ? 'bg-white' : 'bg-white/40' }}" aria-label="Slide {{ $loop->iteration }}"></button>
        @endforeach
    </div>
</div>
@endif
