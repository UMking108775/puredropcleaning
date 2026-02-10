@extends('layouts.app')

@section('title', App\Models\Setting::get('contact_page_title', 'Contact Us') . ' - PureDropCleaning')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary to-primary-dark py-10 sm:py-14 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3">{{ App\Models\Setting::get('contact_page_title', 'Contact Us') }}</h1>
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto">{{ App\Models\Setting::get('contact_page_subtitle', 'Get in touch for a free quote or any questions about our services.') }}</p>
        <nav class="mt-4 sm:mt-6">
            <ol class="flex items-center justify-center space-x-2 text-white/60 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                <li>/</li>
                <li class="text-accent">Contact</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Contact Section -->
<section class="py-12 sm:py-16 lg:py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 sm:mb-8 p-3 sm:p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-center text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Contact Form -->
            <div class="card p-5 sm:p-6 lg:p-8">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-dark mb-4 sm:mb-6">Get a Free Quote</h2>
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 sm:space-y-5">
                    @csrf
                    <div class="grid grid-cols-2 gap-3 sm:gap-4">
                        <div>
                            <label for="name" class="block text-xs sm:text-sm font-medium text-dark mb-1.5 sm:mb-2">Full Name *</label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm border border-gray-light rounded-lg sm:rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-xs sm:text-sm font-medium text-dark mb-1.5 sm:mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm border border-gray-light rounded-lg sm:rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-xs sm:text-sm font-medium text-dark mb-1.5 sm:mb-2">Email Address *</label>
                        <input type="email" id="email" name="email" required value="{{ old('email') }}"
                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm border border-gray-light rounded-lg sm:rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="service_id" class="block text-xs sm:text-sm font-medium text-dark mb-1.5 sm:mb-2">Select Service</label>
                        <select id="service_id" name="service_id" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm border border-gray-light rounded-lg sm:rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors">
                            <option value="">Choose a service...</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="message" class="block text-xs sm:text-sm font-medium text-dark mb-1.5 sm:mb-2">Message *</label>
                        <textarea id="message" name="message" rows="3" required
                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm border border-gray-light rounded-lg sm:rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none"
                            placeholder="Tell us about your cleaning needs...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Captcha -->
                    <div>
                        <label class="block text-xs sm:text-sm font-medium text-dark mb-1.5 sm:mb-2">Security Check *</label>
                        <div class="bg-gradient-to-r from-gray-50 to-blue-50 border border-gray-200 rounded-xl p-3 sm:p-4">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-2 bg-white rounded-lg px-3 py-2 shadow-sm border border-gray-100">
                                    <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    <span class="text-sm font-semibold text-dark" id="captcha-question">Loading...</span>
                                </div>
                                <span class="text-gray text-sm">=</span>
                                <input type="number" id="captcha_answer" name="captcha_answer" required
                                    class="w-20 px-3 py-2 text-sm text-center font-semibold border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="?">
                                <input type="hidden" id="captcha_hash" name="captcha_hash">
                                <button type="button" onclick="generateCaptcha()" class="p-2 text-gray hover:text-primary transition-colors" title="New question">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                            </div>
                            <p class="text-[10px] sm:text-xs text-gray mt-2">Solve the math problem to verify you're human</p>
                        </div>
                        @error('captcha_answer')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-full py-2.5 sm:py-3 text-sm sm:text-base">
                        Send Message
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                    </button>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="space-y-6 sm:space-y-8">
                <div>
                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-dark mb-3 sm:mb-4">Get In Touch</h2>
                    <p class="text-gray text-sm sm:text-base">Have questions? We'd love to hear from you. Contact us through any of the methods below.</p>
                </div>
                
                <div class="space-y-4 sm:space-y-5">
                    <div class="flex items-start">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 bg-primary/10 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-dark mb-0.5 sm:mb-1">Our Location</h3>
                            <p class="text-gray text-xs sm:text-sm">Al Jafiliya, Dubai<br>United Arab Emirates</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 bg-accent/10 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-dark mb-0.5 sm:mb-1">Phone</h3>
                            <a href="tel:+971551018837" class="text-primary hover:text-accent transition-colors text-sm sm:text-base">+971 55 101 8837</a>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 bg-sky/10 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7 text-sky" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-dark mb-0.5 sm:mb-1">Email</h3>
                            <a href="mailto:info.puredropcleaning@gmail.com" class="text-primary hover:text-accent transition-colors text-xs sm:text-sm break-all">info.puredropcleaning@gmail.com</a>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 bg-primary/10 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-7 lg:h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-dark mb-0.5 sm:mb-1">Working Hours</h3>
                            <p class="text-gray text-xs sm:text-sm">Open Daily: 8:00 AM - 9:00 PM<br>Monday to Sunday</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function simpleHash(str) {
        var hash = 0;
        for (var i = 0; i < str.length; i++) {
            var char = str.charCodeAt(i);
            hash = ((hash << 5) - hash) + char;
            hash = hash & hash;
        }
        return Math.abs(hash).toString();
    }

    function generateCaptcha() {
        var a = Math.floor(Math.random() * 15) + 1;
        var b = Math.floor(Math.random() * 15) + 1;
        var answer = a + b;
        document.getElementById('captcha-question').textContent = a + ' + ' + b;
        document.getElementById('captcha_hash').value = simpleHash('captcha_' + answer + '_puredrop');
        document.getElementById('captcha_answer').value = '';
    }

    generateCaptcha();
</script>
@endpush
