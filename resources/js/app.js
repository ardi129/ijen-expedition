import './bootstrap';

// Alpine.js for lightweight interactions (dropdowns, modals, tabs)
// We'll let users add Alpine via CDN in the layout or install it if they want.
// For now, we'll write vanilla JS for the core functionality to keep it simple and dependency-free.

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Navigation Toggle
    const setupMobileNav = () => {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuButton = document.getElementById('close-menu-button');
        const overlay = document.getElementById('mobile-menu-overlay');

        if (mobileMenuButton && mobileMenu) {
            const toggleMenu = () => {
                const isOpen = mobileMenu.classList.toggle('translate-x-full');
                const nowOpen = !isOpen;
                if (overlay) {
                    overlay.classList.toggle('opacity-0');
                    overlay.classList.toggle('pointer-events-none');
                }
                if (nowOpen) {
                    document.documentElement.style.overflow = 'hidden';
                    document.body.style.overflow = 'hidden';
                    document.body.style.position = 'fixed';
                    document.body.style.width = '100%';
                    document.body.style.top = `-${window.scrollY}px`;
                } else {
                    const scrollY = Math.abs(parseInt(document.body.style.top || '0'));
                    document.documentElement.style.overflow = '';
                    document.body.style.overflow = '';
                    document.body.style.position = '';
                    document.body.style.width = '';
                    document.body.style.top = '';
                    window.scrollTo(0, scrollY);
                }
            };

            mobileMenuButton.addEventListener('click', toggleMenu);
            if (closeMenuButton) closeMenuButton.addEventListener('click', toggleMenu);
            if (overlay) overlay.addEventListener('click', toggleMenu);
        }
    };

    // 2. Scroll Effects
    const setupScrollEffects = () => {
        const backToTopBtn = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            // Back to top button visibility (HE03)
            if (backToTopBtn) {
                if (window.scrollY > 500) {
                    backToTopBtn.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
                    backToTopBtn.classList.add('opacity-100', 'translate-y-0');
                } else {
                    backToTopBtn.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
                    backToTopBtn.classList.remove('opacity-100', 'translate-y-0');
                }
            }
        });
    };

    // 3. Hero Slider with Controls (HE03)
    const setupHeroSlider = () => {
        const slides = document.querySelectorAll('.hero-slide');
        const nextBtn = document.getElementById('hero-next');
        const prevBtn = document.getElementById('hero-prev');
        const playPauseBtn = document.getElementById('hero-play-pause');
        const dots = document.querySelectorAll('.hero-dot');
        
        if (slides.length === 0) return;

        let currentSlide = 0;
        let isPlaying = true;
        let slideInterval;

        const goToSlide = (index) => {
            slides[currentSlide].classList.remove('active', 'opacity-100', 'z-10');
            slides[currentSlide].classList.add('opacity-0', 'z-0');
            if (dots[currentSlide]) dots[currentSlide].classList.remove('bg-white');
            if (dots[currentSlide]) dots[currentSlide].classList.add('bg-white/50');

            currentSlide = (index + slides.length) % slides.length;

            slides[currentSlide].classList.add('active', 'opacity-100', 'z-10');
            slides[currentSlide].classList.remove('opacity-0', 'z-0');
            if (dots[currentSlide]) dots[currentSlide].classList.add('bg-white');
            if (dots[currentSlide]) dots[currentSlide].classList.remove('bg-white/50');
        };

        const nextSlide = () => goToSlide(currentSlide + 1);
        const prevSlide = () => goToSlide(currentSlide - 1);

        const startSlider = () => {
            isPlaying = true;
            slideInterval = setInterval(nextSlide, 5000);
            if (playPauseBtn) {
                playPauseBtn.innerHTML = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
            }
        };

        const pauseSlider = () => {
            isPlaying = false;
            clearInterval(slideInterval);
            if (playPauseBtn) {
                playPauseBtn.innerHTML = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
            }
        };

        if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); pauseSlider(); });
        if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); pauseSlider(); });
        
        if (playPauseBtn) {
            playPauseBtn.addEventListener('click', () => {
                if (isPlaying) pauseSlider();
                else startSlider();
            });
        }

        // E2-HE03: Pause on Hover
        const sliderWrapper = document.getElementById('hero-slider-wrapper');
        if (sliderWrapper) {
            sliderWrapper.addEventListener('mouseenter', pauseSlider);
            sliderWrapper.addEventListener('mouseleave', () => {
                if(isPlaying) startSlider(); // Lanjutkan jika state asli adalah playing
                else startSlider(); // Atau selalu autostart saat mouse keluar
            });
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
                pauseSlider();
            });
        });

        // Initialize
        slides[0].classList.add('active', 'opacity-100', 'z-10');
        startSlider();
    };

    // 4. FAQ Accordion (HE10)
    const setupFaqAccordion = () => {
        // Support both old class .faq-button and new .accordion-btn
        const faqButtons = document.querySelectorAll('.faq-button, .accordion-btn');
        
        faqButtons.forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('svg');
                
                // Close all other open FAQs in the same container
                const container = button.closest('.accordion-container') || document;
                const otherButtons = container.querySelectorAll('.faq-button, .accordion-btn');
                
                otherButtons.forEach(otherBtn => {
                    if (otherBtn !== button) {
                        const otherContent = otherBtn.nextElementSibling;
                        if(otherContent.style.maxHeight || !otherContent.classList.contains('hidden')) {
                            otherContent.style.maxHeight = null;
                            otherContent.classList.add('hidden');
                            otherBtn.classList.remove('text-primary-600', 'dark:text-primary-400');
                            if(otherBtn.querySelector('svg')) otherBtn.querySelector('svg').classList.remove('rotate-180');
                        }
                    }
                });

                // Toggle current FAQ
                if (content.style.maxHeight || !content.classList.contains('hidden')) {
                    content.style.maxHeight = null;
                    content.classList.add('hidden');
                    button.classList.remove('text-primary-600', 'dark:text-primary-400');
                    if(icon) icon.classList.remove('rotate-180');
                } else {
                    content.classList.remove('hidden');
                    content.style.maxHeight = content.scrollHeight + "px";
                    button.classList.add('text-primary-600', 'dark:text-primary-400');
                    if(icon) icon.classList.add('rotate-180');
                }
            });
        });
    };

    // 4.5. Tabs Logic (HE06)
    const setupTabs = () => {
        const tabContainer = document.getElementById('package-tabs');
        if (!tabContainer) return;

        const tabButtons = tabContainer.querySelectorAll('.tab-btn');
        const tabPanes = document.querySelectorAll('.tab-pane');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-target');

                // Reset all tabs
                tabButtons.forEach(btn => {
                    btn.classList.remove('active', 'text-primary-600', 'border-primary-500');
                    btn.classList.add('text-gray-500', 'border-transparent');
                });
                tabPanes.forEach(pane => {
                    pane.classList.add('hidden');
                    pane.classList.remove('block');
                });

                // Activate selected
                button.classList.add('active', 'text-primary-600', 'border-primary-500');
                button.classList.remove('text-gray-500', 'border-transparent');
                
                const targetPane = document.getElementById(targetId);
                if(targetPane) {
                    targetPane.classList.remove('hidden');
                    targetPane.classList.add('block');
                }
            });
        });
    };

    // 5. Scroll Animations (Intersection Observer)
    const setupScrollAnimations = () => {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    entry.target.classList.remove('opacity-0');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            el.classList.add('opacity-0'); // Hide initially
            observer.observe(el);
        });
    };

    // 6. Number Input Controls for Booking Form (HE05)
    const setupNumberInputs = () => {
        const numberInputs = document.querySelectorAll('.number-input-group');
        
        numberInputs.forEach(group => {
            const input = group.querySelector('input[type="number"]');
            const minusBtn = group.querySelector('.btn-minus');
            const plusBtn = group.querySelector('.btn-plus');
            
            if (input && minusBtn && plusBtn) {
                minusBtn.addEventListener('click', () => {
                    if (input.value > parseInt(input.min || 1)) {
                        input.value = parseInt(input.value) - 1;
                    }
                });
                
                plusBtn.addEventListener('click', () => {
                    if (input.value < parseInt(input.max || 50)) {
                        input.value = parseInt(input.value) + 1;
                    }
                });
            }
        });
    };

    // 7. Transparent Navbar Scroll Handler
    const setupNavbarScroll = () => {
        const header = document.getElementById('main-header');
        if (!header || header.dataset.transparent !== 'true') return;

        const handleScroll = () => {
            if (window.scrollY > 80) {
                header.classList.add('navbar-scrolled');
            } else {
                header.classList.remove('navbar-scrolled');
            }
        };

        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    };

    // Run setups
    setupMobileNav();
    setupNavbarScroll();
    setupScrollEffects();
    setupHeroSlider();
    setupFaqAccordion();
    setupTabs(); // Tambahan setup tab
    setupScrollAnimations();
    setupNumberInputs();
});
