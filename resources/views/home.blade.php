@extends('layouts.app')

@section('title', 'PureDropCleaning - Professional Building Cleaning Services')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-primary via-primary-dark to-dark overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-72 h-72 bg-accent rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-sky rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16 lg:py-24 relative z-10">
        <div class="grid lg:grid-cols-2 gap-6 lg:gap-12 items-center">
            <div class="text-center lg:text-left order-2 lg:order-1">
                <span class="inline-block px-3 py-1 bg-accent/20 text-accent rounded-full text-xs font-semibold mb-3 sm:mb-4">
                    ✨ Professional Cleaning Services
                </span>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white leading-tight mb-3 sm:mb-5">
                    Spotless Spaces, <span class="text-accent">Happy Faces</span>
                </h1>
                <p class="text-sm sm:text-base md:text-lg text-white/80 mb-5 sm:mb-6 max-w-xl mx-auto lg:mx-0">
                    Experience the difference with PureDropCleaning. We transform your spaces into pristine environments using eco-friendly products.
                </p>
                <!-- Buttons - Always in row -->
                <div class="flex flex-row gap-2 sm:gap-3 justify-center lg:justify-start">
                    <a href="{{ route('contact') }}" class="btn btn-accent text-xs sm:text-sm md:text-base px-4 py-2 sm:px-5 sm:py-2.5 md:px-6 md:py-3">Get Free Quote</a>
                    <a href="{{ route('services') }}" class="btn btn-outline border-white text-white hover:bg-white hover:text-primary text-xs sm:text-sm md:text-base px-4 py-2 sm:px-5 sm:py-2.5 md:px-6 md:py-3">Our Services</a>
                </div>
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3 sm:gap-5 mt-5 sm:mt-8">
                    <div class="flex items-center text-white/80">
                        <svg class="w-4 h-4 text-accent mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-xs sm:text-sm">100% Satisfaction</span>
                    </div>
                    <div class="flex items-center text-white/80">
                        <svg class="w-4 h-4 text-accent mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-xs sm:text-sm">Eco-Friendly</span>
                    </div>
                    <div class="flex items-center text-white/80">
                        <svg class="w-4 h-4 text-accent mr-1.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-xs sm:text-sm">Trained Staff</span>
                    </div>
                </div>
            </div>
            <!-- Hero Image - Better sizing on mobile -->
            <div class="relative order-1 lg:order-2 mb-[-30px] sm:mb-[-50px] lg:mb-[-100px] z-20">
                <div class="relative z-10 mx-auto max-w-[260px] sm:max-w-[300px] md:max-w-[360px] lg:max-w-[420px]">
                    <img src="{{ asset('heroimage.png') }}" alt="Professional Cleaning Services" class="w-full h-auto rounded-2xl lg:rounded-3xl">
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H0Z" fill="#f8fafc"/>
        </svg>
    </div>
</section>

<!-- Services Section -->
@include('partials.services-grid')

<!-- Why Choose Us Section -->
@include('partials.why-choose-us')

<!-- Testimonials Section -->
@include('partials.testimonials')

<!-- CTA Section -->
@include('partials.cta-section')
@endsection
