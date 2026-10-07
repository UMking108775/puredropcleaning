@extends('layouts.app')

@section('title', 'Book Cleaning Services in Dubai | Get Free Quote - Pure Drop LLC')
@section('meta_description', 'Book trusted cleaning services across Dubai. Get a free quote for apartment, villa deep cleaning and maid services from Pure Drop Building Cleaning Services LLC.')

@section('content')
@php
    $brandPhone   = \App\Models\Setting::get('brand_phone', '+971 56 217 0386');
    $cleanPhone   = preg_replace('/[^0-9+]/', '', $brandPhone);
    $waDigits     = preg_replace('/[^0-9]/', '', $cleanPhone) ?: '971562170386';
    $communities  = \App\Services\AreasData::getCommunities();
@endphp

<!-- Page Header -->
<section class="bg-gradient-to-br from-primary to-primary-dark py-10 sm:py-14 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3">
            {{ App\Models\Setting::get('contact_page_title', 'Get a Free Cleaning Quote') }}
        </h1>
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto">
            {{ App\Models\Setting::get('contact_page_subtitle', 'Fast, transparent quotations for homes, villas, and commercial spaces across Dubai.') }}
        </p>
        <nav class="mt-4 sm:mt-6">
            <ol class="flex items-center justify-center space-x-2 text-white/60 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                <li>/</li>
                <li class="text-accent">Contact &amp; Quote</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Contact & Quote Section -->
<section class="py-12 sm:py-16 lg:py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 sm:mb-8 p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-2xl flex items-center gap-3 shadow-xs">
                <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div class="text-sm sm:text-base font-semibold">
                    {{ session('success') }}
                </div>
            </div>
            <script>
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    'event': 'quote_form_submit',
                    'conversion_type': 'lead'
                });
                if (typeof window.gtag === 'function') {
                    window.gtag('event', 'generate_lead', {
                        'event_category': 'Quote',
                        'event_label': 'Enquiry Form Submission',
                        'value': 1
                    });
                }
            </script>
        @endif
        
        <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Upgraded Quotation & Booking Form (8 Cols) -->
            <div class="lg:col-span-8 bg-white rounded-3xl p-6 sm:p-8 lg:p-10 border border-slate-200/90 shadow-lg">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6 pb-5 border-b border-slate-100">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-wider text-primary block">Fast Response Guarantee</span>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-[#0d2d5a]">Enquiry &amp; Quotation Form</h2>
                    </div>
                    <a href="https://wa.me/{{ $waDigits }}?text={{ urlencode('Hello Pure Drop, I would like to get a quick cleaning quote on WhatsApp.') }}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full border border-emerald-200 transition-colors self-start sm:self-auto">
                        <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="" class="w-4 h-4">
                        <span>Prefer WhatsApp? Instant Quote</span>
                    </a>
                </div>

                <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    
                    <!-- 1. Client Identity -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Full Name <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white"
                                placeholder="Your full name">
                            @error('name')
                                <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Mobile / WhatsApp <span class="text-rose-500">*</span>
                            </label>
                            <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}"
                                class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white"
                                placeholder="+971 50 123 4567">
                            @error('phone')
                                <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Email Address <span class="text-slate-400 font-normal">(Optional)</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white"
                                placeholder="name@example.com">
                            @error('email')
                                <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Area / Community in Dubai -->
                        <div>
                            <label for="area" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Area / Community in Dubai <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="area" name="area" list="dubai-areas-list" required value="{{ old('area') }}"
                                class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white"
                                placeholder="e.g. Dubai Silicon Oasis, Mirdif, The Villa">
                            <datalist id="dubai-areas-list">
                                @foreach($communities as $comm)
                                    <option value="{{ $comm['name'] }}">
                                @endforeach
                                <option value="Dubai Creek Harbour">
                                <option value="California Village">
                                <option value="Business Bay">
                                <option value="Downtown Dubai">
                                <option value="Dubai Marina">
                            </datalist>
                            @error('area')
                                <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- 2. Service & Property Details -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                        <div>
                            <label for="service_id" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Required Service <span class="text-rose-500">*</span>
                            </label>
                            <select id="service_id" name="service_id" required class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white">
                                <option value="">Choose service...</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="property_type" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Property Type
                            </label>
                            <select id="property_type" name="property_type" class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white">
                                <option value="Apartment" {{ old('property_type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                                <option value="Villa" {{ old('property_type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                                <option value="Townhouse" {{ old('property_type') == 'Townhouse' ? 'selected' : '' }}>Townhouse</option>
                                <option value="Office / Commercial" {{ old('property_type') == 'Office / Commercial' ? 'selected' : '' }}>Office / Commercial</option>
                            </select>
                        </div>

                        <div>
                            <label for="bedrooms" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Bedrooms / Size
                            </label>
                            <select id="bedrooms" name="bedrooms" class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white">
                                <option value="Studio" {{ old('bedrooms') == 'Studio' ? 'selected' : '' }}>Studio</option>
                                <option value="1 Bedroom" {{ old('bedrooms') == '1 Bedroom' ? 'selected' : '' }}>1 Bedroom</option>
                                <option value="2 Bedrooms" {{ old('bedrooms') == '2 Bedrooms' ? 'selected' : '' }}>2 Bedrooms</option>
                                <option value="3 Bedrooms" {{ old('bedrooms') == '3 Bedrooms' ? 'selected' : '' }}>3 Bedrooms</option>
                                <option value="4 Bedrooms" {{ old('bedrooms') == '4 Bedrooms' ? 'selected' : '' }}>4 Bedrooms</option>
                                <option value="5+ Bedrooms" {{ old('bedrooms') == '5+ Bedrooms' ? 'selected' : '' }}>5+ Bedrooms</option>
                                <option value="Commercial Space" {{ old('bedrooms') == 'Commercial Space' ? 'selected' : '' }}>Commercial Space</option>
                            </select>
                        </div>
                    </div>

                    <!-- 3. Preferred Date, Time & Materials -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                        <div>
                            <label for="preferred_date" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Preferred Date
                            </label>
                            <input type="date" id="preferred_date" name="preferred_date" value="{{ old('preferred_date', date('Y-m-d')) }}" min="{{ date('Y-m-d') }}"
                                class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white">
                        </div>

                        <div>
                            <label for="preferred_time" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Preferred Time
                            </label>
                            <select id="preferred_time" name="preferred_time" class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white">
                                <option value="Morning (08:00 AM – 12:00 PM)" {{ old('preferred_time') == 'Morning (08:00 AM – 12:00 PM)' ? 'selected' : '' }}>Morning (08:00 AM – 12:00 PM)</option>
                                <option value="Afternoon (12:00 PM – 04:00 PM)" {{ old('preferred_time') == 'Afternoon (12:00 PM – 04:00 PM)' ? 'selected' : '' }}>Afternoon (12:00 PM – 04:00 PM)</option>
                                <option value="Evening (04:00 PM – 07:30 PM)" {{ old('preferred_time') == 'Evening (04:00 PM – 07:30 PM)' ? 'selected' : '' }}>Evening (04:00 PM – 07:30 PM)</option>
                                <option value="Flexible / Any Time" {{ old('preferred_time') == 'Flexible / Any Time' ? 'selected' : '' }}>Flexible / Any Time</option>
                            </select>
                        </div>

                        <div>
                            <label for="materials" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                                Materials
                            </label>
                            <select id="materials" name="materials" class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-slate-50/50 focus:bg-white">
                                <option value="With Materials" {{ old('materials') == 'With Materials' ? 'selected' : '' }}>With Materials (Pure Drop Supplies)</option>
                                <option value="Without Materials" {{ old('materials') == 'Without Materials' ? 'selected' : '' }}>Without Materials (Client Provides)</option>
                                <option value="Deep Clean Standard (All Included)" {{ old('materials') == 'Deep Clean Standard (All Included)' ? 'selected' : '' }}>Deep Clean (Full Equipment Included)</option>
                            </select>
                        </div>
                    </div>

                    <!-- 4. Deep Cleaning Photo / Video Upload (Checklist Item 7) -->
                    <div class="pt-2">
                        <label class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Upload Photos / Video <span class="text-slate-400 font-normal">(Optional for Deep Cleaning &amp; Furniture)</span>
                        </label>
                        <div class="border-2 border-dashed border-slate-300 hover:border-primary rounded-2xl p-4 sm:p-5 bg-slate-50/70 text-center transition-colors">
                            <input type="file" id="attachment" name="attachment" accept="image/*,video/*,.pdf" class="hidden" onchange="updateFileName(this)">
                            <label for="attachment" class="cursor-pointer flex flex-col items-center justify-center gap-1.5">
                                <svg class="w-8 h-8 text-primary/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-xs sm:text-sm font-bold text-slate-700">Click to upload property photo or video</span>
                                <span class="text-[11px] text-slate-500">Helps us give you an exact, guaranteed quotation without delays (Max: 25MB)</span>
                                <span id="file-name-display" class="text-xs font-bold text-emerald-600 mt-1 hidden"></span>
                            </label>
                        </div>
                        @error('attachment')
                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 5. Additional Notes -->
                    <div>
                        <label for="notes" class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">
                            Special Instructions or Notes
                        </label>
                        <textarea id="notes" name="notes" rows="3"
                            class="w-full px-3.5 py-2.5 sm:py-3 text-sm border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none bg-slate-50/50 focus:bg-white"
                            placeholder="e.g. Balcony wash needed, key under mat, move-in on 15th, stained white sofa...">{{ old('notes') }}</textarea>
                    </div>

                    <!-- 6. Math Captcha -->
                    <div>
                        <label class="block text-xs sm:text-sm font-bold text-slate-800 mb-1.5">Security Check *</label>
                        <div class="bg-gradient-to-r from-slate-50 to-blue-50 border border-slate-200 rounded-xl p-3 sm:p-4">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-2 bg-white rounded-lg px-3 py-2 shadow-xs border border-slate-200">
                                    <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    <span class="text-sm font-bold text-dark" id="captcha-question">Loading...</span>
                                </div>
                                <span class="text-slate-500 font-bold text-sm">=</span>
                                <input type="number" id="captcha_answer" name="captcha_answer" required
                                    class="w-20 px-3 py-2 text-sm text-center font-bold border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors bg-white"
                                    placeholder="?">
                                <input type="hidden" id="captcha_hash" name="captcha_hash">
                                <button type="button" onclick="generateCaptcha()" class="p-2 text-slate-400 hover:text-primary transition-colors" title="New question">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                </button>
                            </div>
                            <p class="text-[11px] text-slate-500 mt-1.5">Solve the simple sum to protect against spam</p>
                        </div>
                        @error('captcha_answer')
                            <p class="mt-1 text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full py-3.5 sm:py-4 text-sm sm:text-base font-extrabold rounded-xl shadow-lg shadow-primary/25 hover:shadow-primary/40 active:scale-95 transition-all">
                        <span>Submit Free Quotation Request</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>
            </div>
            
            <!-- Contact Info & Fast Assistance Sidebar (4 Cols) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Direct WhatsApp Fast Response Card -->
                <div class="bg-gradient-to-br from-emerald-600 to-emerald-700 text-white rounded-3xl p-6 sm:p-7 shadow-lg">
                    <span class="inline-block px-2.5 py-1 bg-white/20 text-white text-[11px] font-bold rounded-full mb-3 uppercase tracking-wider">Fastest Way</span>
                    <h3 class="text-xl font-extrabold mb-2">Prefer Chatting on WhatsApp?</h3>
                    <p class="text-xs sm:text-sm text-emerald-100 mb-5 leading-relaxed">
                        Send us your property location and pictures directly for an instant quotation within minutes.
                    </p>
                    <a href="https://wa.me/{{ $waDigits }}?text={{ urlencode('Hello Pure Drop, I would like to get an instant cleaning quote for my space in Dubai.') }}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 w-full py-3 bg-white hover:bg-emerald-50 text-emerald-800 font-extrabold text-xs sm:text-sm rounded-xl shadow-md transition-all active:scale-95">
                        <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="" class="w-4 h-4">
                        <span>Chat on WhatsApp (+971 56 217 0386)</span>
                    </a>
                </div>

                <!-- Business Contact Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/90 shadow-sm space-y-5">
                    <h3 class="text-lg font-extrabold text-[#0d2d5a]">Business Details</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 text-primary">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wide block">Office Location</span>
                                <p class="text-xs sm:text-sm text-slate-700 font-semibold">{!! nl2br(\App\Models\Setting::get('brand_address', "Al Mankhool / Bur Dubai\nDubai, United Arab Emirates")) !!}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-accent/15 rounded-xl flex items-center justify-center flex-shrink-0 text-accent">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wide block">Call Support</span>
                                <a href="tel:{{ $cleanPhone }}" class="text-xs sm:text-sm text-primary font-bold hover:underline">
                                    {{ $brandPhone }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-sky/15 rounded-xl flex items-center justify-center flex-shrink-0 text-sky">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wide block">Email Us</span>
                                <a href="mailto:{{ \App\Models\Setting::get('brand_email', 'info.puredropcleaning@gmail.com') }}" class="text-xs sm:text-sm text-primary font-semibold hover:underline break-all">
                                    {{ \App\Models\Setting::get('brand_email', 'info.puredropcleaning@gmail.com') }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center flex-shrink-0 text-slate-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wide block">Customer Support Hours</span>
                                <p class="text-xs sm:text-sm text-slate-700 font-semibold">
                                    {{ \App\Models\Setting::get('brand_hours', 'Daily 8:00 AM – 7:30 PM') }}
                                </p>
                                <span class="text-[11px] text-slate-500">Fast online reply 7 days a week</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Link Card -->
                <div class="bg-slate-100 rounded-3xl p-5 text-center border border-slate-200">
                    <span class="text-xs text-slate-500 font-medium block mb-2">Verified Google Business Profile</span>
                    <a href="https://maps.app.goo.gl/JXGtjbeuHYw3mzT69" target="_blank" rel="noopener noreferrer" 
                       class="inline-flex items-center gap-2 text-xs font-bold text-primary hover:text-primary-dark">
                        <span>View Pure Drop LLC on Google Maps</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function updateFileName(input) {
        const display = document.getElementById('file-name-display');
        if (input.files && input.files[0]) {
            display.textContent = '✓ Selected: ' + input.files[0].name;
            display.classList.remove('hidden');
        } else {
            display.classList.add('hidden');
        }
    }

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
