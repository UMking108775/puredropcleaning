<!-- Style 3: Executive Bento Grid (Light Luxury Brand Kit) -->
<section class="py-14 sm:py-20 lg:py-24 bg-[#f8fafc] relative overflow-hidden" id="why-choose-us-section">
    <!-- Subtle Background Lighting Graphics -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Header -->
        <div class="max-w-3xl mb-10 sm:mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-4 shadow-2xs">
                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                <span>{{ $wcu['badge'] }}</span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#0d2d5a] tracking-tight leading-tight mb-4">
                {!! $wcu['heading'] !!}
            </h2>
            <p class="text-slate-600 text-sm sm:text-base lg:text-lg leading-relaxed">
                {{ $wcu['subtitle'] }}
            </p>
        </div>

        <!-- Asymmetric Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
            
            <!-- Bento 1: Large Trust & Guarantee Anchor (Spans 2 cols on lg) -->
            <div class="lg:col-span-2 bg-white rounded-3xl p-6 sm:p-8 lg:p-9 border border-slate-200/80 shadow-[0_10px_35px_rgba(13,45,90,0.04)] hover:shadow-[0_16px_45px_rgba(13,45,90,0.08)] transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <!-- Badge & Icon Row -->
                    <div class="flex items-center justify-between gap-4 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold border border-emerald-200/60">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Verified Dubai Standards
                        </span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-3 group-hover:text-primary transition-colors">
                        {{ $wcu['features'][3]['title'] ?? '100% Satisfaction Guarantee' }}
                    </h3>
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-6">
                        {{ $wcu['features'][3]['desc'] ?? "Not happy? We'll re-clean for free. That's our promise." }}
                    </p>

                    <!-- Trust Checkpoints Grid -->
                    <div class="grid sm:grid-cols-2 gap-3.5 mb-6">
                        <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-700">
                            <div class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Background-checked & verified staff</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-700">
                            <div class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Hospital-grade eco disinfection</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-700">
                            <div class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Same-day dispatch across Dubai</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-700">
                            <div class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Zero hassle, upfront flat pricing</span>
                        </div>
                    </div>
                </div>

                <!-- Card Footer Bar -->
                <div class="pt-5 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                    <div class="flex items-center gap-2 text-xs font-semibold text-slate-500">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>Open 7 Days • 8:00 AM – 9:00 PM</span>
                    </div>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-primary group-hover:text-primary-dark transition-colors">
                        <span>Get Instant Quote</span>
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>

            <!-- Bento 2: Premium Stats Spotlight Card (1 col on lg) -->
            <div class="bg-gradient-to-br from-[#0d2d5a] via-[#153a6f] to-[#1e4b8e] rounded-3xl p-6 sm:p-8 text-white shadow-xl shadow-[#0d2d5a]/20 flex flex-col justify-between relative overflow-hidden group">
                <!-- Subtle Radial Watermark -->
                <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-white/5 rounded-full blur-xl pointer-events-none"></div>

                <div>
                    <div class="inline-flex items-center gap-1 text-[11px] font-bold uppercase tracking-wider text-cyan-300 bg-white/10 px-3 py-1 rounded-full mb-6">
                        ★ Client Recommended
                    </div>
                    <div class="text-4xl sm:text-5xl font-black text-white tracking-tight mb-2" data-wcu-counter="{{ $wcu['stats'][1]['value'] }}">
                        {{ $wcu['stats'][1]['value'] }}
                    </div>
                    <div class="text-white/90 text-base font-bold mb-2">
                        {{ $wcu['stats'][1]['label'] }}
                    </div>
                    <p class="text-blue-100/70 text-xs sm:text-sm leading-relaxed">
                        Trusted by homeowners, expats, landlords & premier businesses across every Dubai community.
                    </p>
                </div>

                <div class="pt-6 border-t border-white/10 mt-6 flex items-center justify-between">
                    <div class="flex text-amber-400 text-sm">
                        ★★★★★
                    </div>
                    <span class="text-xs text-blue-100/80 font-semibold">4.9 / 5.0 Rated</span>
                </div>
            </div>

            <!-- Bento 3: Experience Stat Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm hover:border-primary/40 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-primary flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl sm:text-4xl font-black text-[#0d2d5a] tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][0]['value'] }}">
                        {{ $wcu['stats'][0]['value'] }}
                    </div>
                    <div class="text-slate-900 font-bold text-sm sm:text-base mb-1">
                        {{ $wcu['stats'][0]['label'] }}
                    </div>
                    <p class="text-slate-500 text-xs leading-relaxed">
                        Industry expertise delivering top-tier residential and commercial sanitization.
                    </p>
                </div>
            </div>

            <!-- Bento 4: Eco-Friendly Feature Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm hover:border-emerald-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="{{ $wcu['features'][1]['icon'] }}"/>
                        </svg>
                    </div>
                    <h4 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-emerald-700 transition-colors mb-2">
                        {{ $wcu['features'][1]['title'] }}
                    </h4>
                    <p class="text-slate-500 text-xs sm:text-[13px] leading-relaxed">
                        {{ $wcu['features'][1]['desc'] }}
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1.5 text-[11px] font-bold text-emerald-600">
                    <span>✓ Kid & Pet Safe</span>
                </div>
            </div>

            <!-- Bento 5: Flexible Scheduling & Staff Stat Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm hover:border-cyan-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="{{ $wcu['features'][2]['icon'] }}"/>
                        </svg>
                    </div>
                    <h4 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-cyan-700 transition-colors mb-2">
                        {{ $wcu['features'][2]['title'] }}
                    </h4>
                    <p class="text-slate-500 text-xs sm:text-[13px] leading-relaxed mb-4">
                        {{ $wcu['features'][2]['desc'] }}
                    </p>
                </div>

                <!-- Combined Micro Stats -->
                <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                    <div>
                        <div class="text-lg font-extrabold text-[#0d2d5a]" data-wcu-counter="{{ $wcu['stats'][2]['value'] }}">{{ $wcu['stats'][2]['value'] }}</div>
                        <div class="text-slate-400 text-[10px] font-semibold">{{ $wcu['stats'][2]['label'] }}</div>
                    </div>
                    <div class="text-right">
                        <div class="text-lg font-extrabold text-primary" data-wcu-counter="{{ $wcu['stats'][3]['value'] }}">{{ $wcu['stats'][3]['value'] }}</div>
                        <div class="text-slate-400 text-[10px] font-semibold">{{ $wcu['stats'][3]['label'] }}</div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
