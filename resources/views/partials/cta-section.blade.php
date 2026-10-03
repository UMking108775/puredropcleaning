@php
    $brandPhone = \App\Models\Setting::get('brand_phone', '+971 56 217 0386');
    $cleanPhone = preg_replace('/[^0-9+]/', '', $brandPhone);
    $waDigits = preg_replace('/[^0-9]/', '', $cleanPhone) ?: '971562170386';
    $brandHours = \App\Models\Setting::get('brand_hours', '8:00 am to 9:00 pm');
    $brandAddress = \App\Models\Setting::get('brand_address', 'Al Jafiliya, Dubai, United Arab Emirates');
    $brandEmail = \App\Models\Setting::get('brand_email', 'info.puredropcleaning@gmail.com');
@endphp

<!-- CTA Section - Business Details Style with Panoramic ctabg.png -->
<section class="relative py-8 sm:py-10 lg:py-12 bg-cover bg-center bg-no-repeat border-y border-slate-200/70 overflow-hidden" 
         style="background-image: url('{{ asset('ctabg.png') }}');" 
         id="cta-section">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid md:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-center">
            
            <!-- Left Side - CTA Image -->
            <div class="text-center md:text-left flex justify-center md:justify-start">
                <img src="{{ asset('cta-image.png') }}" 
                     alt="PureDropCleaning" 
                     class="h-40 sm:h-48 md:h-56 lg:h-64 w-auto object-contain drop-shadow-md select-none">
            </div>
            
            <!-- Right Side - Business Details -->
            <div class="text-center md:text-left">
                <h3 class="text-lg sm:text-xl lg:text-2xl font-extrabold text-[#0d2d5a] tracking-wider uppercase mb-4 sm:mb-5">
                    BUSINESS DETAILS
                </h3>
                
                <div class="space-y-3 sm:space-y-3.5 mb-6">
                    <div>
                        <span class="text-xs sm:text-sm font-bold text-primary block mb-0.5">Working Hours</span>
                        <p class="text-slate-600 text-xs sm:text-sm font-medium">{{ $brandHours }}</p>
                    </div>
                    <div>
                        <span class="text-xs sm:text-sm font-bold text-primary block mb-0.5">Address</span>
                        <p class="text-slate-600 text-xs sm:text-sm font-medium">{!! nl2br(e($brandAddress)) !!}</p>
                    </div>
                    <div>
                        <span class="text-xs sm:text-sm font-bold text-primary block mb-0.5">Call Us</span>
                    </div>
                </div>
                
                <!-- Action Buttons: Phone, WhatsApp, and Email Us (Moved to Last) -->
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-2.5 sm:gap-3">
                    <!-- 1. Direct Call -->
                    <a href="tel:{{ $cleanPhone }}" 
                       class="inline-flex items-center justify-center px-5 sm:px-6 py-2.5 sm:py-3 bg-primary hover:bg-primary-dark text-white font-bold rounded-full text-xs sm:text-sm shadow-md shadow-primary/20 hover:-translate-y-0.5 transition-all">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>{{ $brandPhone }}</span>
                    </a>

                    <!-- 2. WhatsApp -->
                    <a href="https://wa.me/{{ $waDigits }}?text={{ urlencode('Hello PureDropCleaning, I would like to inquire about your cleaning services.') }}" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="inline-flex items-center justify-center px-4 sm:px-5 py-2.5 sm:py-3 bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold rounded-full text-xs sm:text-sm shadow-md shadow-green-500/20 hover:-translate-y-0.5 transition-all"
                       aria-label="WhatsApp">
                        <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="WhatsApp" class="w-4 h-4 mr-1.5 object-contain">
                        <span>WhatsApp</span>
                    </a>

                    <!-- 3. Email Us (Moved to Last) -->
                    <a href="mailto:{{ $brandEmail }}" 
                       class="inline-flex items-center justify-center px-5 sm:px-6 py-2.5 sm:py-3 bg-white hover:bg-slate-50 text-slate-700 hover:text-primary font-bold rounded-full text-xs sm:text-sm border border-slate-200/90 shadow-xs hover:-translate-y-0.5 transition-all">
                        <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>Email Us</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>
