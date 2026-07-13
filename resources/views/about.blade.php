@extends('layouts.app')

@section('title', ($page->title ?? 'About Us') . ' - PureDropCleaning')

@php
    $brandName    = \App\Models\Setting::get('brand_name', 'Pure Drop Building Cleaning Services LLC');
    $whatsappBase = rtrim(\App\Models\Setting::get('social_whatsapp', 'https://wa.me/971562170386'), '/');
    $generalMsg   = urlencode("Hello {$brandName},\n\nI'd like to know more about your cleaning services. Please share the details and pricing.\n\nThank you!");
@endphp

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary to-primary-dark py-10 sm:py-14 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3">{{ $page->title ?? 'About ' . $brandName }}</h1>
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto">{{ $page->meta_description ?? 'Reliable, professional and high-quality cleaning solutions for homes and businesses across Dubai.' }}</p>
        <nav class="mt-4 sm:mt-6">
            <ol class="flex items-center justify-center space-x-2 text-white/60 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                <li>/</li>
                <li class="text-accent">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Welcome / Intro -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div>
                <span class="inline-block px-3 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">Who We Are</span>
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark mb-3 sm:mb-4">
                    Welcome to <span class="text-primary">{{ $brandName }}</span>
                </h2>
                <p class="text-gray text-sm sm:text-base mb-3 sm:mb-4 leading-relaxed">
                    At {{ $brandName }}, we are committed to providing reliable, professional, and high-quality cleaning solutions for homes and businesses across Dubai. Our goal is simple: to create cleaner, healthier, and more comfortable living and working environments for our clients.
                </p>
                <p class="text-gray text-sm sm:text-base mb-4 sm:mb-6 leading-relaxed">
                    With a team of trained and dedicated cleaning professionals, we offer a wide range of cleaning services tailored to meet the unique needs of homeowners, tenants, property managers, and businesses. Whether you need a one-time deep cleaning service or regular scheduled cleaning, Pure Drop is here to deliver exceptional results every time.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('services') }}" class="btn btn-primary text-sm sm:text-base">Explore Services</a>
                    <a href="{{ $whatsappBase }}?text={{ $generalMsg }}" target="_blank" rel="noopener" class="btn bg-green-500 hover:bg-green-600 text-white text-sm sm:text-base">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        WhatsApp Us
                    </a>
                </div>
            </div>
            <div class="bg-gradient-to-br from-light to-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 border border-gray-100">
                <img src="{{ asset('logo.png') }}" alt="{{ $brandName }}" class="w-full max-w-[200px] sm:max-w-sm mx-auto">
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-12 sm:py-16 lg:py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 sm:mb-12 max-w-2xl mx-auto">
            <span class="inline-block px-3 py-1.5 bg-accent/10 text-accent rounded-full text-xs sm:text-sm font-semibold mb-3">Our Purpose</span>
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark mb-3">Mission &amp; <span class="text-primary">Vision</span></h2>
            <p class="text-gray text-sm sm:text-base">What drives us forward, every single day.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-5 sm:gap-6 lg:gap-8">
            <div class="bg-white rounded-2xl p-6 sm:p-8 border-t-4 border-primary shadow-sm">
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-primary/10 rounded-2xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-dark mb-2 sm:mb-3">Our Mission</h3>
                <p class="text-gray text-sm sm:text-base leading-relaxed">
                    To provide dependable, affordable, and professional cleaning services that exceed customer expectations while building long-term relationships based on trust, quality, and customer satisfaction.
                </p>
            </div>
            <div class="bg-white rounded-2xl p-6 sm:p-8 border-t-4 border-accent shadow-sm">
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-accent/10 rounded-2xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-dark mb-2 sm:mb-3">Our Vision</h3>
                <p class="text-gray text-sm sm:text-base leading-relaxed">
                    To become one of the most trusted and preferred cleaning service providers in the UAE by consistently delivering outstanding service and creating spotless environments for our clients.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-10 sm:py-12 lg:py-16 bg-gradient-to-r from-primary via-primary-dark to-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 text-center">
            @for($i = 1; $i <= 4; $i++)
            <div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-accent mb-1">
                    {{ App\Models\Setting::get('wcu_stat'.$i.'_value', ['10+', '5000+', '15+', '98%'][$i-1]) }}
                </div>
                <div class="text-white/80 text-xs sm:text-sm">
                    {{ App\Models\Setting::get('wcu_stat'.$i.'_label', ['Years Experience', 'Happy Clients', 'Expert Cleaners', 'Satisfaction Rate'][$i-1]) }}
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- CTA Section -->
@include('partials.cta-section')
@endsection
