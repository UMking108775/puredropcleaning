@extends('layouts.app')

@section('title', ($page->title ?? 'About Us') . ' - PureDropCleaning')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary to-primary-dark py-10 sm:py-14 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3">{{ $page->title ?? 'About PureDropCleaning' }}</h1>
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto">{{ $page->meta_description ?? 'Discover our story, mission, and the dedicated team behind your spotless spaces.' }}</p>
        <nav class="mt-4 sm:mt-6">
            <ol class="flex items-center justify-center space-x-2 text-white/60 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                <li>/</li>
                <li class="text-accent">About Us</li>
            </ol>
        </nav>
    </div>
</section>

@if($page && $page->content)
<!-- Dynamic Content from Admin -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="content-html">
            {!! $page->content !!}
        </div>
    </div>
</section>
@else
<!-- Default Hardcoded Content -->
<!-- Our Story -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div>
                <span class="inline-block px-3 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">Our Story</span>
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark mb-3 sm:mb-4">A Decade of <span class="text-primary">Excellence</span></h2>
                <p class="text-gray text-sm sm:text-base mb-3 sm:mb-4">Founded in 2014, PureDropCleaning started with a simple mission: to provide exceptional cleaning services that transform spaces and exceed expectations.</p>
                <p class="text-gray text-sm sm:text-base mb-3 sm:mb-4">What began as a small family operation has grown into a trusted cleaning company serving thousands of homes and businesses. Our commitment to quality, eco-friendly practices, and customer satisfaction has been the cornerstone of our success.</p>
                <p class="text-gray text-sm sm:text-base">Today, we're proud to have a team of 15+ professionally trained cleaners who share our passion for creating pristine, healthy environments for our clients.</p>
            </div>
            <div class="bg-gradient-to-br from-light to-white rounded-2xl sm:rounded-3xl p-6 sm:p-8">
                <img src="{{ asset('logo.png') }}" alt="PureDropCleaning" class="w-full max-w-[200px] sm:max-w-sm mx-auto">
            </div>
        </div>
    </div>
</section>

<!-- Mission & Values -->
<section class="py-12 sm:py-16 lg:py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 sm:mb-12">
            <span class="inline-block px-3 py-1.5 bg-accent/10 text-accent rounded-full text-xs sm:text-sm font-semibold mb-3">Our Values</span>
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark">What <span class="text-primary">Drives Us</span></h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
            <div class="card p-5 sm:p-6 lg:p-8 text-center">
                <div class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-primary/10 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-4 sm:mb-6">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-base sm:text-lg lg:text-xl font-bold text-dark mb-2 sm:mb-3">Quality First</h3>
                <p class="text-gray text-xs sm:text-sm">We never compromise on quality. Every cleaning job is done with precision and attention to detail.</p>
            </div>
            
            <div class="card p-5 sm:p-6 lg:p-8 text-center">
                <div class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-accent/10 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-4 sm:mb-6">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="text-base sm:text-lg lg:text-xl font-bold text-dark mb-2 sm:mb-3">Eco-Friendly</h3>
                <p class="text-gray text-xs sm:text-sm">We use environmentally responsible products that are safe for your family, pets, and the planet.</p>
            </div>
            
            <div class="card p-5 sm:p-6 lg:p-8 text-center">
                <div class="w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-sky/10 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-4 sm:mb-6">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 lg:w-8 lg:h-8 text-sky" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-base sm:text-lg lg:text-xl font-bold text-dark mb-2 sm:mb-3">Customer Focus</h3>
                <p class="text-gray text-xs sm:text-sm">Your satisfaction is our priority. We listen, adapt, and go above and beyond to meet your needs.</p>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Stats -->
<section class="py-10 sm:py-12 lg:py-16 bg-gradient-to-r from-primary via-primary-dark to-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 text-center">
            <div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-accent mb-1">10+</div>
                <div class="text-white/80 text-xs sm:text-sm">Years Experience</div>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-accent mb-1">5000+</div>
                <div class="text-white/80 text-xs sm:text-sm">Happy Clients</div>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-accent mb-1">15+</div>
                <div class="text-white/80 text-xs sm:text-sm">Expert Cleaners</div>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-accent mb-1">98%</div>
                <div class="text-white/80 text-xs sm:text-sm">Satisfaction Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
@include('partials.cta-section')
@endsection
