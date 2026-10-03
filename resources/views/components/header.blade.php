@php
    $brandPhone = \App\Models\Setting::get('brand_phone', '+971 56 217 0386');
    $cleanPhone = preg_replace('/[^0-9+]/', '', $brandPhone);
    $waDigits = preg_replace('/[^0-9]/', '', $cleanPhone);
    $whatsappUrl = \App\Models\Setting::get('social_whatsapp', 'https://api.whatsapp.com/send?phone=' . ($waDigits ?: '971562170386'));
    if (!str_starts_with($whatsappUrl, 'http')) {
        $whatsappUrl = 'https://api.whatsapp.com/send?phone=' . preg_replace('/[^0-9]/', '', $whatsappUrl);
    }
@endphp
<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-50 transition-all duration-300 relative" id="main-header">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center pr-2 xl:pr-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    @if(\App\Models\Setting::get('brand_logo'))
                        <img src="{{ asset(\App\Models\Setting::get('brand_logo')) }}" alt="{{ \App\Models\Setting::get('brand_name', 'PureDropCleaning') }}" class="h-10 sm:h-12 w-auto group-hover:opacity-90 transition-opacity">
                    @else
                        <img src="{{ asset('logo.png') }}" alt="PureDropCleaning" class="h-10 sm:h-12 w-auto group-hover:opacity-90 transition-opacity">
                    @endif
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-0.5 xl:space-x-1.5 2xl:space-x-2 text-[13px] xl:text-[14px] 2xl:text-[15px] font-medium h-full">
                <!-- Home -->
                <a href="{{ route('home') }}" 
                   class="px-2.5 xl:px-3 py-2 text-gray-dark font-medium rounded-lg transition-all duration-200 hover:text-primary hover:bg-primary/5 whitespace-nowrap {{ request()->routeIs('home') ? 'text-primary bg-primary/5 font-semibold' : '' }}">
                    Home
                </a>

                <!-- Services with Modern Mega Menu (Matching User UI Design) -->
                <div class="group flex items-center h-full">
                    <a href="{{ route('services') }}" 
                       class="inline-flex items-center gap-1 px-2.5 xl:px-3 py-2 text-gray-dark font-medium rounded-lg transition-all duration-200 hover:text-primary hover:bg-primary/5 group-hover:text-primary group-hover:bg-primary/5 whitespace-nowrap {{ request()->routeIs('services') || request()->is('service/*') ? 'text-primary bg-primary/5 font-semibold' : '' }}">
                        <span>Services</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>

                    <!-- Mega Menu Dropdown Container -->
                    <div class="absolute top-full left-0 right-0 w-full px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0 pointer-events-none group-hover:pointer-events-auto z-50">
                        <div class="relative max-w-6xl xl:max-w-7xl mx-auto bg-white rounded-[28px] shadow-[0_25px_70px_rgba(13,45,90,0.14)] border border-slate-200/80 overflow-hidden ring-1 ring-black/5 p-6 sm:p-7 xl:p-8">
                            
                            <!-- Top Pointer Triangle pointing to Services button -->
                            <div class="absolute -top-2 left-28 xl:left-32 w-4 h-4 bg-white transform rotate-45 border-t border-l border-slate-200/80 z-20 shadow-[-2px_-2px_4px_rgba(0,0,0,0.03)]"></div>

                            <!-- 4-Column x 3-Row Grid with Custom Icons -->
                            <div class="grid grid-cols-4 gap-3.5 xl:gap-4 relative z-10">
                                
                                <!-- 1. Deep Cleaning -->
                                <a href="{{ route('service.show', 'deep-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Deep Cleaning.png') }}" alt="Deep Cleaning" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight">Deep Cleaning</span>
                                                <span class="bg-[#fef3c7] text-[#92400e] text-[10px] font-extrabold px-2 py-0.5 rounded-full whitespace-nowrap">★ Popular</span>
                                            </div>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Full home deep sanitization</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 2. Villa Deep Cleaning -->
                                <a href="{{ route('service.show', 'villa-deep-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Villa Deep Cleaning.png') }}" alt="Villa Deep Cleaning" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Villa Deep Cleaning</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Luxury villas & estates</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 3. Apartment Deep Clean -->
                                <a href="{{ route('service.show', 'apartment-deep-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Apartment Deep Clean.png') }}" alt="Apartment Deep Clean" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Apartment Deep Clean</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Studios, flats & balconies</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 4. Domestic Cleaning -->
                                <a href="{{ route('service.show', 'domestic-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Domestic Cleaning.png') }}" alt="Domestic Cleaning" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Domestic Cleaning</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Routine house maintenance</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 5. Maid Services -->
                                <a href="{{ route('service.show', 'maid-services') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Maid Services.png') }}" alt="Maid Services" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight">Maid Services</span>
                                                <span class="bg-[#e0f2fe] text-[#0369a1] text-[10px] font-bold px-2 py-0.5 rounded-full whitespace-nowrap">Hourly / Monthly</span>
                                            </div>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Vetted & trained maids</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 6. Sofa Cleaning -->
                                <a href="{{ route('service.show', 'sofa-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Sofa Cleaning.png') }}" alt="Sofa Cleaning" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Sofa Cleaning</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Steam & stain extraction</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 7. Carpet & Rug Clean -->
                                <a href="{{ route('service.show', 'carpet-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Carpet & Rug Clean.png') }}" alt="Carpet & Rug Clean" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Carpet & Rug Clean</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Shampoo & allergen wash</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 8. Mattress Cleaning -->
                                <a href="{{ route('service.show', 'mattress-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Mattress Cleaning.png') }}" alt="Mattress Cleaning" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Mattress Cleaning</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">UV & dust mite sanitization</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 9. Window Cleaning -->
                                <a href="{{ route('service.show', 'window-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Window Cleaning.png') }}" alt="Window Cleaning" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Window Cleaning</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Crystal streak-free glass</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 10. Outdoor Cleaning -->
                                <a href="{{ route('service.show', 'outdoor-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Outdoor Cleaning.png') }}" alt="Outdoor Cleaning" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Outdoor Cleaning</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Patios, balconies & terraces</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 11. Commercial Cleaning -->
                                <a href="{{ route('service.show', 'commercial-cleaning') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#f8fafc] hover:bg-[#f0f7ff] border border-slate-200/70 hover:border-primary/40 transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Commercial Cleaning.png') }}" alt="Commercial Cleaning" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Commercial Cleaning</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-500 font-medium leading-tight mt-0.5">Offices, clinics & retail</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-60 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                <!-- 12. Prices & Packages (Distinct Warm Amber Tint) -->
                                <a href="{{ route('packages') }}" 
                                   class="p-3 xl:p-3.5 rounded-2xl bg-[#fef8ea] hover:bg-[#fdf2d5] border border-[#fde4ad] hover:border-[#fbc967] transition-all duration-200 flex items-center justify-between gap-2.5 group/card shadow-2xs">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <img src="{{ asset('menu-icons/Prices & Packages.png') }}" alt="Prices & Packages" class="w-11 h-11 xl:w-12 xl:h-12 flex-shrink-0 object-contain">
                                        <div class="min-w-0">
                                            <span class="text-[13.5px] xl:text-[14px] font-bold text-slate-900 group-hover/card:text-primary transition-colors tracking-tight block">Prices & Packages</span>
                                            <p class="text-[11px] xl:text-[12px] text-slate-600 font-medium leading-tight mt-0.5">Explore all rates & plans</p>
                                        </div>
                                    </div>
                                    <svg class="w-3.5 h-3.5 text-primary opacity-70 group-hover/card:opacity-100 group-hover/card:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                </a>

                            </div>

                            <!-- Bottom Mega Menu Feature Strip (Matching User UI Design) -->
                            <div class="border-t border-slate-100 pt-5 mt-6 grid grid-cols-1 md:grid-cols-4 gap-4 items-center relative z-10">
                                <!-- 1. 100% Satisfaction Guarantee -->
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-primary flex-shrink-0">
                                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-[13px] font-bold text-slate-900 leading-tight">100% Satisfaction Guarantee</div>
                                        <div class="text-[11px] text-slate-500 font-medium">Your clean, our commitment</div>
                                    </div>
                                </div>

                                <!-- 2. Trained, Vetted & Insured Staff -->
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-primary flex-shrink-0">
                                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-[13px] font-bold text-slate-900 leading-tight">Trained, Vetted & Insured Staff</div>
                                        <div class="text-[11px] text-slate-500 font-medium">Professional & reliable team</div>
                                    </div>
                                </div>

                                <!-- 3. WhatsApp Booking -->
                                <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 group/wa hover:opacity-95 transition-opacity">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center flex-shrink-0">
                                        <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain">
                                    </div>
                                    <div>
                                        <div class="text-[13px] font-bold text-slate-900 leading-tight group-hover/wa:text-emerald-700 transition-colors">WhatsApp Booking: {{ $brandPhone }}</div>
                                        <div class="text-[11px] text-slate-500 font-medium">Quick response, easy booking</div>
                                    </div>
                                </a>

                                <!-- 4. View All Services -->
                                <a href="{{ route('services') }}" class="flex items-center gap-3 group/all">
                                    <div>
                                        <div class="text-[13px] font-bold text-primary flex items-center gap-1 group-hover/all:underline">
                                            <span>View All Services</span>
                                            <span class="group-hover/all:translate-x-0.5 transition-transform">→</span>
                                        </div>
                                        <div class="text-[11px] text-slate-500 font-medium">Explore our complete service list</div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Prices & Packages -->
                <a href="{{ route('packages') }}" 
                   class="px-2.5 xl:px-3 py-2 text-gray-dark font-medium rounded-lg transition-all duration-200 hover:text-primary hover:bg-primary/5 whitespace-nowrap {{ request()->routeIs('packages') ? 'text-primary bg-primary/5 font-semibold' : '' }}">
                    Prices & Packages
                </a>

                <!-- Areas We Serve -->
                <a href="{{ route('areas-we-serve') }}" 
                   class="px-2.5 xl:px-3 py-2 text-gray-dark font-medium rounded-lg transition-all duration-200 hover:text-primary hover:bg-primary/5 whitespace-nowrap {{ request()->routeIs('areas-we-serve') ? 'text-primary bg-primary/5 font-semibold' : '' }}">
                    Areas We Serve
                </a>

                <!-- About -->
                <a href="{{ route('about') }}" 
                   class="px-2.5 xl:px-3 py-2 text-gray-dark font-medium rounded-lg transition-all duration-200 hover:text-primary hover:bg-primary/5 whitespace-nowrap {{ request()->routeIs('about') ? 'text-primary bg-primary/5 font-semibold' : '' }}">
                    About
                </a>

                <!-- Contact -->
                <a href="{{ route('contact') }}" 
                   class="px-2.5 xl:px-3 py-2 text-gray-dark font-medium rounded-lg transition-all duration-200 hover:text-primary hover:bg-primary/5 whitespace-nowrap {{ request()->routeIs('contact') ? 'text-primary bg-primary/5 font-semibold' : '' }}">
                    Contact
                </a>
            </nav>
            
            <!-- Desktop Action CTA Buttons -->
            <div class="hidden lg:flex items-center space-x-2.5 xl:space-x-3.5 flex-shrink-0 pl-2">
                <a href="tel:{{ $cleanPhone }}" class="flex items-center text-slate-800 hover:text-primary transition-colors whitespace-nowrap text-xs xl:text-sm font-semibold">
                    <svg class="w-4 h-4 mr-1.5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>{{ $brandPhone }}</span>
                </a>
                <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-3 xl:px-3.5 py-2 bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold text-xs xl:text-sm rounded-xl shadow-sm hover:-translate-y-0.5 active:scale-95 transition-all whitespace-nowrap">
                    <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="WhatsApp" class="w-4 h-4 mr-1.5 object-contain flex-shrink-0">
                    <span>WhatsApp</span>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-primary text-xs xl:text-sm px-3.5 xl:px-4 py-2 whitespace-nowrap font-bold shadow-md shadow-primary/20 hover:-translate-y-0.5 active:scale-95 transition-all">
                    Get a Quote
                </a>
            </div>
            
            <!-- Mobile Menu Toggle Button -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-gray-dark hover:bg-gray-100 transition-colors" aria-label="Open menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-black/50 z-50 hidden transition-opacity duration-300"></div>

<!-- Mobile Menu Drawer -->
<div id="mobile-menu" class="fixed top-0 right-0 w-80 max-w-[85vw] h-full bg-white z-50 transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl flex flex-col">
    <!-- Drawer Header -->
    <div class="flex items-center justify-between p-4 border-b">
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="PureDropCleaning" class="h-9 w-auto">
        </a>
        <button id="mobile-menu-close" class="p-2 rounded-lg text-gray-dark hover:bg-gray-100 transition-colors" aria-label="Close menu">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    
    <!-- Drawer Navigation -->
    <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
        <a href="{{ route('home') }}" class="flex items-center px-4 py-2.5 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('home') ? 'bg-primary/5 text-primary font-semibold' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Home
        </a>

        <!-- Services Accordion in Mobile Menu -->
        <div class="rounded-lg overflow-hidden {{ request()->routeIs('services') || request()->is('service/*') ? 'bg-primary/5' : '' }}">
            <div class="flex items-center justify-between px-4 py-2.5">
                <a href="{{ route('services') }}" class="flex items-center text-gray-dark font-medium hover:text-primary {{ request()->routeIs('services') || request()->is('service/*') ? 'text-primary font-semibold' : '' }}">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Services
                </a>
                <button type="button" id="mobile-services-toggle" class="p-1 rounded-md text-gray-400 hover:text-primary hover:bg-white/80 transition-colors" aria-label="Toggle services list">
                    <svg id="mobile-services-chevron" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
            </div>
            <div id="mobile-services-dropdown" class="hidden pl-12 pr-4 pb-2 pt-1 space-y-1 text-xs">
                <a href="{{ route('service.show', 'deep-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">★ Deep Cleaning (Popular)</a>
                <a href="{{ route('service.show', 'villa-deep-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Villa Deep Cleaning</a>
                <a href="{{ route('service.show', 'apartment-deep-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Apartment Deep Cleaning</a>
                <a href="{{ route('service.show', 'maid-services') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Maid Services (Hourly/Monthly)</a>
                <a href="{{ route('service.show', 'sofa-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Sofa Cleaning</a>
                <a href="{{ route('service.show', 'carpet-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Carpet Cleaning</a>
                <a href="{{ route('service.show', 'mattress-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Mattress Cleaning</a>
                <a href="{{ route('service.show', 'window-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Window Cleaning</a>
                <a href="{{ route('service.show', 'commercial-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Commercial Cleaning</a>
                <a href="{{ route('service.show', 'domestic-cleaning') }}" class="block py-1 text-gray-600 hover:text-primary font-medium">Domestic Cleaning</a>
                <a href="{{ route('services') }}" class="block py-1.5 text-primary font-bold hover:underline">View All 11 Services →</a>
            </div>
        </div>


        <!-- Prices & Packages -->
        <a href="{{ route('packages') }}" class="flex items-center px-4 py-2.5 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('packages') ? 'bg-primary/5 text-primary font-semibold' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Prices & Packages
        </a>

        <!-- Areas We Serve -->
        <a href="{{ route('areas-we-serve') }}" class="flex items-center px-4 py-2.5 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('areas-we-serve') ? 'bg-primary/5 text-primary font-semibold' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Areas We Serve
        </a>

        <!-- About -->
        <a href="{{ route('about') }}" class="flex items-center px-4 py-2.5 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('about') ? 'bg-primary/5 text-primary font-semibold' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            About
        </a>

        <!-- Contact -->
        <a href="{{ route('contact') }}" class="flex items-center px-4 py-2.5 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('contact') ? 'bg-primary/5 text-primary font-semibold' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Contact
        </a>
    </nav>
    
    <!-- Drawer Bottom Contact & Action Buttons -->
    <div class="p-4 border-t bg-light space-y-3">
        <a href="tel:{{ $cleanPhone }}" class="flex items-center text-primary font-semibold text-sm">
            <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <span>{{ $brandPhone }}</span>
        </a>
        <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp w-full text-sm">
            <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="WhatsApp" class="w-5 h-5 mr-2 object-contain">
            WhatsApp us
        </a>
        <a href="{{ route('contact') }}" class="btn btn-primary w-full text-sm">
            Get a Quote
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const servicesToggle = document.getElementById('mobile-services-toggle');
        const servicesDropdown = document.getElementById('mobile-services-dropdown');
        const servicesChevron = document.getElementById('mobile-services-chevron');
        if (servicesToggle && servicesDropdown) {
            servicesToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                servicesDropdown.classList.toggle('hidden');
                if (servicesChevron) {
                    servicesChevron.classList.toggle('rotate-180');
                }
            });
        }
    });
</script>
