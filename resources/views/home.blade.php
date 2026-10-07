@extends('layouts.app')

@section('title', App\Models\Setting::get('site_title', 'Cleaning Services Dubai | Pure Drop Building Cleaning Services LLC'))
@section('meta_description', 'Professional cleaning services in Dubai by Pure Drop Building Cleaning Services LLC. In-house trained cleaners for deep cleaning, maid services, sofa, carpet and villa cleaning.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-white overflow-hidden" id="hero-section">
    <div class="w-full flex flex-col-reverse lg:flex-row items-stretch min-h-[500px] sm:min-h-[560px] lg:min-h-[600px] xl:min-h-[660px] 2xl:min-h-[720px] relative">
        <!-- Left Content Column with Wave Overlay strictly behind content -->
        <div class="w-full lg:w-[54%] xl:w-[52%] 2xl:w-[50%] flex items-center px-5 sm:px-8 md:px-12 lg:pl-[165px] xl:pl-[185px] 2xl:pl-[195px] lg:pr-6 py-10 sm:py-14 lg:py-16 relative overflow-hidden">
            <!-- Soft Blue Abstract Wave Overlay Behind Left Content -->
            <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden select-none">
                <img src="{{ asset('hero-wave-overlay.png') }}" 
                     alt="" 
                     class="w-full h-full object-cover object-left-top pointer-events-none select-none">
            </div>

            <div class="max-w-xl relative z-10">
                <!-- Top Badge/Line -->
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-8 sm:w-10 h-[3px] bg-accent rounded-full inline-block flex-shrink-0"></span>
                    <span class="text-xs sm:text-[13px] font-bold uppercase tracking-widest text-[#1e4b8e]">
                        {{ App\Models\Setting::get('hero_badge', 'Professional Cleaning Services') }}
                    </span>
                </div>

                <!-- Headline matching mockup -->
                <h1 class="text-3xl sm:text-5xl lg:text-[44px] xl:text-[54px] 2xl:text-[62px] font-extrabold text-[#0d2d5a] tracking-tight leading-[1.08] mb-4 sm:mb-5">
                    Spotless spaces,<br>
                    <span class="text-accent">simplified.</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-sm sm:text-base lg:text-lg text-gray-600 mb-6 sm:mb-8 leading-relaxed max-w-lg font-normal">
                    {{ App\Models\Setting::get('hero_subtitle', 'Reliable, professional cleaning services for healthier, brighter spaces.') }}
                </p>

                <!-- Action CTA Buttons -->
                <div class="flex flex-row items-center gap-3 sm:gap-4">
                    <a href="{{ route('contact') }}" 
                       class="inline-flex items-center gap-2 px-5 sm:px-7 py-3 sm:py-3.5 bg-gradient-to-r from-accent to-accent-light text-slate-900 font-bold text-xs sm:text-sm md:text-base rounded-2xl shadow-lg shadow-accent/25 hover:shadow-accent/40 hover:-translate-y-0.5 active:scale-95 transition-all duration-200">
                        <span>Get a Quote</span>
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('services') }}" 
                       class="inline-flex items-center px-5 sm:px-7 py-3 sm:py-3.5 bg-white text-primary border-2 border-primary/20 hover:border-primary hover:bg-primary/5 font-bold text-xs sm:text-sm md:text-base rounded-2xl hover:-translate-y-0.5 active:scale-95 transition-all duration-200 shadow-sm">
                        <span>Our Services</span>
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="flex flex-wrap items-center gap-4 sm:gap-6 mt-8 sm:mt-10 pt-6 border-t border-gray-100 text-xs sm:text-sm text-gray-500 font-medium">
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>Customer Focused</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>Quality Materials</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>Trained Cleaners</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Hero Image (Fills same height as hero section) -->
        <div class="w-full lg:w-[46%] xl:w-[48%] 2xl:w-[50%] relative flex items-center justify-end self-stretch overflow-hidden bg-white h-72 sm:h-96 lg:h-auto">
            <img src="{{ asset('hero-new-image.png') }}" 
                 alt="PureDrop Professional Cleaning Services Dubai" 
                 class="w-full h-full object-cover object-center lg:object-left xl:object-center select-none pointer-events-none">
        </div>
    </div>
</section>

<!-- Services Section -->
@include('partials.services-grid')

<!-- Real Pure Drop Cleaning Team Section -->
@include('partials.team-showcase')

<!-- Real Before & After Gallery: See the Pure Drop Difference -->
@include('partials.before-after-gallery')

<!-- Why Choose Us Section -->
@include('partials.why-choose-us')

<!-- Areas We Serve Interactive Map Section (Notes 02, 03 & 05) -->
@include('partials.areas-map', ['isHomepage' => true])

<!-- Testimonials Section -->
@include('partials.testimonials')

<!-- CTA Section -->
@include('partials.cta-section')
@endsection
