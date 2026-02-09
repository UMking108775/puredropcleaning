@extends('layouts.app')

@section('title', $service->title . ' - PureDropCleaning')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary to-primary-dark py-10 sm:py-14 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3">{{ $service->title }}</h1>
        @if($service->meta_description)
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto">{{ $service->meta_description }}</p>
        @else
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto">{{ Str::limit($service->description, 150) }}</p>
        @endif
        <nav class="mt-4 sm:mt-6">
            <ol class="flex items-center justify-center space-x-2 text-white/60 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                <li>/</li>
                <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">Services</a></li>
                <li>/</li>
                <li class="text-accent">{{ $service->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Service Content -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Service Image -->
                <div class="rounded-2xl overflow-hidden mb-6 sm:mb-8">
                    <img src="{{ $service->image_url }}" 
                         alt="{{ $service->title }}" 
                         class="w-full h-64 sm:h-80 lg:h-96 object-cover">
                </div>

                <!-- Description -->
                <div class="mb-6 sm:mb-8">
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-dark mb-3 sm:mb-4">About This Service</h2>
                    <p class="text-gray text-sm sm:text-base leading-relaxed">{{ $service->description }}</p>
                </div>

                <!-- Full Content (if available) -->
                @if($service->full_content)
                <div class="content-html mb-6 sm:mb-8">
                    {!! $service->full_content !!}
                </div>
                @endif

                <!-- Features List -->
                @if($service->features && count($service->features) > 0)
                <div class="bg-light rounded-2xl p-5 sm:p-6 lg:p-8">
                    <h3 class="text-base sm:text-lg lg:text-xl font-bold text-dark mb-4">What's Included</h3>
                    <ul class="grid sm:grid-cols-2 gap-3">
                        @foreach($service->features as $feature)
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-accent mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray text-sm sm:text-base">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Booking Card -->
                <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-5 sm:p-6 text-white sticky top-24">
                    <h3 class="text-lg sm:text-xl font-bold mb-4">Ready to Book?</h3>
                    <p class="text-white/80 text-sm mb-6">Get a free quote for {{ $service->title }} and experience the PureDropCleaning difference.</p>
                    
                    <a href="{{ route('contact') }}?service={{ $service->id }}" class="btn bg-accent text-dark hover:bg-accent/90 w-full mb-3 text-sm sm:text-base">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Get Free Quote
                    </a>
                    
                    <a href="https://wa.me/971551018837?text=Hi! I'm interested in {{ urlencode($service->title) }} service." target="_blank" class="btn bg-green-500 hover:bg-green-600 text-white w-full text-sm sm:text-base">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        WhatsApp Us
                    </a>

                    <div class="mt-6 pt-6 border-t border-white/20">
                        <div class="flex items-center text-sm text-white/80 mb-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +971 55 101 8837
                        </div>
                        <div class="flex items-center text-sm text-white/80">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Open Daily: 8AM - 9PM
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Other Services -->
<section class="py-12 sm:py-16 lg:py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-dark text-center mb-6 sm:mb-10">Other Services</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            @foreach($otherServices as $other)
            <a href="{{ route('service.show', ['slug' => $other->slug ?? Str::slug($other->title)]) }}" class="bg-white rounded-xl overflow-hidden group hover:shadow-lg transition-shadow">
                <div class="aspect-[4/3] overflow-hidden">
                    <img src="{{ $other->image_url }}" 
                         alt="{{ $other->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-3 sm:p-4">
                    <h3 class="text-sm sm:text-base font-semibold text-dark group-hover:text-primary transition-colors line-clamp-1">{{ $other->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
@include('partials.cta-section')
@endsection
