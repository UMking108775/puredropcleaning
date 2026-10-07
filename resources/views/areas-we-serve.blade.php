@extends('layouts.app')

@section('title', 'Areas We Serve in Dubai | Pure Drop Building Cleaning Services LLC')

@section('content')
@php
    $brandPhone = \App\Models\Setting::get('brand_phone', '+971 56 217 0386');
    $cleanPhone = preg_replace('/[^0-9+]/', '', $brandPhone);
    $waDigits = preg_replace('/[^0-9]/', '', $cleanPhone) ?: '971562170386';
@endphp

<!-- Page Hero -->
<section class="relative bg-gradient-to-br from-primary via-primary-dark to-dark py-12 sm:py-16 md:py-20 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute top-0 right-0 w-96 h-96 bg-accent rounded-full blur-3xl translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-sky rounded-full blur-3xl -translate-x-1/3 translate-y-1/3"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 bg-accent/20 text-accent rounded-full text-xs sm:text-sm font-semibold mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>Dubai-Wide Coverage</span>
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-4">
            Areas We Serve in <span class="text-accent">Dubai</span>
        </h1>
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto mb-6 leading-relaxed">
            Professional residential and commercial cleaning services across Dubai communities with trained in-house staff and prompt dispatch.
        </p>

        <!-- Breadcrumbs -->
        <nav class="flex items-center justify-center space-x-2 text-white/70 text-xs sm:text-sm">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-accent font-semibold">Areas We Serve</span>
        </nav>
    </div>
</section>

<!-- Interactive Map Section (Notes 02, 03 & 05) -->
@include('partials.areas-map', ['isHomepage' => false])

<!-- Expandable & Collapsible Q&A / FAQ Section -->
<section class="py-12 sm:py-16 lg:py-20 bg-slate-50 border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-10 sm:mb-12">
            <span class="inline-block px-3.5 py-1 bg-primary/10 text-primary rounded-full text-xs font-semibold mb-2">Q&amp;A</span>
            <h2 class="text-2xl sm:text-3xl font-bold text-dark mb-2">Coverage Questions &amp; Answers</h2>
            <p class="text-gray text-xs sm:text-sm">Click any question to view full details about our service dispatch in Dubai.</p>
        </div>

        <div class="space-y-3.5" id="faq-accordion">
            <!-- Question 1 (Open by default) -->
            <div class="faq-card bg-white rounded-2xl border border-gray-200/90 shadow-sm overflow-hidden transition-all duration-200">
                <button type="button" 
                        class="faq-btn w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-dark text-sm sm:text-base hover:text-primary transition-colors focus:outline-none"
                        onclick="toggleFaqAccordion(this)">
                    <span>How fast can a cleaning team reach my community in Dubai?</span>
                    <svg class="faq-arrow w-5 h-5 text-primary transform transition-transform duration-300 flex-shrink-0 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content px-5 pb-5 pt-0 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-50">
                    <p class="pt-3">
                        With multiple dispatch teams stationed strategically across Dubai, we typically offer same-day service or scheduled arrival within your preferred 2-hour window.
                    </p>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="faq-card bg-white rounded-2xl border border-gray-200/90 shadow-sm overflow-hidden transition-all duration-200">
                <button type="button" 
                        class="faq-btn w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-dark text-sm sm:text-base hover:text-primary transition-colors focus:outline-none"
                        onclick="toggleFaqAccordion(this)">
                    <span>Do your cleaners bring their own cleaning materials and vacuum machines?</span>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transform transition-transform duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-5 pb-5 pt-0 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-50">
                    <p class="pt-3">
                        Yes! For all deep cleaning and package bookings, our teams arrive fully equipped with professional industrial vacuums, steam machines, microfiber cloths, ladders, and professional cleaning solutions.
                    </p>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="faq-card bg-white rounded-2xl border border-gray-200/90 shadow-sm overflow-hidden transition-all duration-200">
                <button type="button" 
                        class="faq-btn w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-dark text-sm sm:text-base hover:text-primary transition-colors focus:outline-none"
                        onclick="toggleFaqAccordion(this)">
                    <span>What if my community is not explicitly listed?</span>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transform transition-transform duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-5 pb-5 pt-0 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-50">
                    <p class="pt-3">
                        We cover the entire Emirate of Dubai! If your building or community isn't shown on the list, simply send us a message on WhatsApp or call <a href="tel:{{ $cleanPhone }}" class="text-primary font-semibold hover:underline">{{ $brandPhone }}</a>, and we will gladly arrange service for your address.
                    </p>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="faq-card bg-white rounded-2xl border border-gray-200/90 shadow-sm overflow-hidden transition-all duration-200">
                <button type="button" 
                        class="faq-btn w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-dark text-sm sm:text-base hover:text-primary transition-colors focus:outline-none"
                        onclick="toggleFaqAccordion(this)">
                    <span>Do your staff have gate pass clearance for gated Dubai communities?</span>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transform transition-transform duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-5 pb-5 pt-0 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-50">
                    <p class="pt-3">
                        Yes, all PureDrop staff are company-sponsored, background-verified, and carry valid UAE work IDs. We routinely provide services in gated communities such as Arabian Ranches, Mudon, The Villa, Villanova, and DAMAC Hills without any access delays.
                    </p>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="faq-card bg-white rounded-2xl border border-gray-200/90 shadow-sm overflow-hidden transition-all duration-200">
                <button type="button" 
                        class="faq-btn w-full p-5 text-left flex items-center justify-between gap-4 font-bold text-dark text-sm sm:text-base hover:text-primary transition-colors focus:outline-none"
                        onclick="toggleFaqAccordion(this)">
                    <span>What is your 100% Satisfaction Re-clean Guarantee?</span>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transform transition-transform duration-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-5 pb-5 pt-0 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-50">
                    <p class="pt-3">
                        If any cleaned area does not meet your complete satisfaction, simply report it to our team within 24 hours of service completion, and we will send a cleaning crew to re-clean those specific areas completely free of charge.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- CTA Section -->
@include('partials.cta-section')

<script>
    function toggleFaqAccordion(btn) {
        const currentCard = btn.closest('.faq-card');
        const currentContent = currentCard.querySelector('.faq-content');
        const currentArrow = btn.querySelector('.faq-arrow');
        const isCurrentlyHidden = currentContent.classList.contains('hidden');

        // Close all FAQ items
        document.querySelectorAll('.faq-card').forEach(card => {
            card.querySelector('.faq-content').classList.add('hidden');
            const arrow = card.querySelector('.faq-arrow');
            arrow.classList.remove('rotate-180', 'text-primary');
            arrow.classList.add('text-gray-400');
        });

        // If clicked item was closed, open it
        if (isCurrentlyHidden) {
            currentContent.classList.remove('hidden');
            currentArrow.classList.add('rotate-180', 'text-primary');
            currentArrow.classList.remove('text-gray-400');
        }
    }
</script>
@endsection
