@extends('layouts.app')

@section('title', App\Models\Setting::get('services_page_title', 'Our Services') . ' - PureDropCleaning')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary to-primary-dark py-10 sm:py-14 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3">{{ App\Models\Setting::get('services_page_title', 'Our Cleaning Services') }}</h1>
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto">{{ App\Models\Setting::get('services_page_subtitle', 'Professional cleaning solutions tailored to your needs. From homes to offices, we make every space sparkle.') }}</p>
        <nav class="mt-4 sm:mt-6">
            <ol class="flex items-center justify-center space-x-2 text-white/60 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                <li>/</li>
                <li class="text-accent">Services</li>
            </ol>
        </nav>
    </div>
</section>

@php
    $brandName    = \App\Models\Setting::get('brand_name', 'Pure Drop Building Cleaning Services LLC');
    $whatsappBase = rtrim(\App\Models\Setting::get('social_whatsapp', 'https://wa.me/971562170386'), '/');
@endphp

<!-- Services Grid -->
<section class="py-12 sm:py-16 lg:py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
            @foreach($services as $service)
            @php
                $bookMessage = urlencode(
                    "Hello {$brandName},\n\n"
                    . "I'd like to book the following service:\n\n"
                    . "🧹 Service: {$service->title}\n"
                    . "📅 Preferred Date: \n"
                    . "⏰ Preferred Time: \n"
                    . "📍 Location / Address: \n"
                    . "🏠 Property Type (Villa / Apartment / Office): \n"
                    . "📐 Size (sqft / rooms): \n"
                    . "📝 Additional Notes: \n\n"
                    . "Please share availability and a quotation.\n\nThank you!"
                );
            @endphp
            <div class="card p-4 sm:p-5 lg:p-6 hover:shadow-xl transition-all duration-300">
                <div class="flex flex-row items-start gap-3 sm:gap-4 lg:gap-6">
                    <!-- Service Image -->
                    <a href="{{ route('service.show', ['slug' => $service->slug ?? Str::slug($service->title)]) }}" class="w-24 sm:w-28 lg:w-36 aspect-square rounded-lg sm:rounded-xl overflow-hidden flex-shrink-0 bg-light block">
                        <img src="{{ $service->image_url }}" 
                             alt="{{ $service->title }}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </a>
                    <!-- Service Content -->
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('service.show', ['slug' => $service->slug ?? Str::slug($service->title)]) }}">
                            <h3 class="text-sm sm:text-base lg:text-lg font-bold text-dark mb-1 sm:mb-2 hover:text-primary transition-colors">{{ $service->title }}</h3>
                        </a>
                        <p class="text-gray text-xs sm:text-sm mb-2 sm:mb-3 line-clamp-2">{{ $service->description }}</p>
                        @if($service->features && count($service->features) > 0)
                        <ul class="hidden sm:grid grid-cols-2 gap-1.5 sm:gap-2 mb-3 sm:mb-4">
                            @foreach(array_slice($service->features, 0, 4) as $feature)
                            <li class="flex items-center text-xs text-gray">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-accent mr-1.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="truncate">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('service.show', ['slug' => $service->slug ?? Str::slug($service->title)]) }}" class="btn btn-outline text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2">More Details</a>
                            <a href="{{ $whatsappBase }}?text={{ $bookMessage }}" target="_blank" rel="noopener" class="btn btn-primary text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pricing & Subscription Plans -->
@include('partials.pricing')

<!-- CTA Section -->
@include('partials.cta-section')
@endsection
