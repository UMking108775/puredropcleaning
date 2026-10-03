<!-- Style 1: Modern Split Showcase (Light Brand Kit) -->
<section class="py-14 sm:py-20 lg:py-24 bg-white relative overflow-hidden" id="why-choose-us-section">
    <!-- Subtle Ambient Background Accents -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl pointer-events-none -mr-20 -mt-20"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none -ml-20 -mb-20"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            
            <!-- Left Column: Value Proposition & Feature List (7 Cols on desktop) -->
            <div class="lg:col-span-7 flex flex-col justify-center">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-4 w-fit shadow-2xs">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    <span>{{ $wcu['badge'] }}</span>
                </div>

                <!-- Heading -->
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-[42px] font-extrabold text-[#0d2d5a] tracking-tight leading-[1.2] mb-4">
                    {!! $wcu['heading'] !!}
                </h2>

                <!-- Subtitle -->
                <p class="text-slate-600 text-sm sm:text-base lg:text-lg leading-relaxed mb-8 max-w-2xl">
                    {{ $wcu['subtitle'] }}
                </p>

                <!-- Features List (2-Column on Tablet/Desktop, 1-Column on Mobile) -->
                <div class="grid sm:grid-cols-2 gap-4 sm:gap-5 mb-8">
                    @foreach($wcu['features'] as $index => $feature)
                    <div class="p-4 sm:p-5 rounded-2xl bg-slate-50/80 border border-slate-200/70 hover:bg-blue-50/50 hover:border-primary/30 transition-all duration-300 group flex items-start gap-3.5 shadow-2xs">
                        <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-white text-primary border border-slate-100 flex items-center justify-center flex-shrink-0 shadow-sm group-hover:scale-110 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="{{ $feature['icon'] }}"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="text-sm sm:text-[15px] font-bold text-slate-900 group-hover:text-primary transition-colors leading-tight mb-1">
                                {{ $feature['title'] }}
                            </h3>
                            <p class="text-slate-500 text-xs sm:text-[13px] leading-relaxed line-clamp-2">
                                {{ $feature['desc'] }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Trust Guarantee Bar & Fast CTAs -->
                <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-700">
                        <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span>100% Guaranteed • Certified & Insured in Dubai</span>
                    </div>

                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <a href="{{ route('contact') }}" class="btn btn-primary text-xs sm:text-sm px-5 py-2.5 rounded-xl font-bold shadow-md shadow-primary/20 hover:-translate-y-0.5 transition-all text-center flex-1 sm:flex-none">
                            Get Free Quote
                        </a>
                        <a href="{{ \App\Models\Setting::get('social_whatsapp', 'https://api.whatsapp.com/send?phone=971562170386') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold text-xs sm:text-sm border border-emerald-200/80 hover:-translate-y-0.5 transition-all whitespace-nowrap">
                            <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="WhatsApp" class="w-4 h-4 mr-1.5 object-contain">
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Right Column: Interactive Stats Showcase Matrix (5 Cols on desktop) -->
            <div class="lg:col-span-5">
                <div class="relative bg-gradient-to-br from-slate-50 via-white to-blue-50/50 p-6 sm:p-8 rounded-[28px] border border-slate-200/80 shadow-[0_20px_50px_rgba(13,45,90,0.07)]">
                    
                    <!-- Top Ribbon -->
                    <div class="flex items-center justify-between pb-5 mb-6 border-b border-slate-100">
                        <div>
                            <div class="text-[11px] font-bold uppercase tracking-wider text-primary">Dubai's Trusted Standard</div>
                            <div class="text-base font-bold text-slate-900">Proven Performance</div>
                        </div>
                        <div class="flex items-center gap-1 text-amber-500 bg-amber-50 px-2.5 py-1 rounded-full border border-amber-200/60 text-xs font-bold">
                            <span>★ 4.9 / 5.0</span>
                        </div>
                    </div>

                    <!-- 2x2 Stats Grid with Counting Animation -->
                    <div class="grid grid-cols-2 gap-3.5 sm:gap-4">
                        <!-- Stat 1 -->
                        <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-2xs hover:border-primary/40 hover:-translate-y-0.5 transition-all duration-300">
                            <div class="w-9 h-9 rounded-xl bg-blue-50 text-primary flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#0d2d5a] tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][0]['value'] }}">
                                {{ $wcu['stats'][0]['value'] }}
                            </div>
                            <div class="text-slate-500 text-xs sm:text-[13px] font-semibold">
                                {{ $wcu['stats'][0]['label'] }}
                            </div>
                        </div>

                        <!-- Stat 2 (Highlight Primary) -->
                        <div class="bg-gradient-to-br from-primary to-[#0d2d5a] p-5 rounded-2xl text-white shadow-md shadow-primary/20 hover:-translate-y-0.5 transition-all duration-300">
                            <div class="w-9 h-9 rounded-xl bg-white/15 text-white flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                </svg>
                            </div>
                            <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][1]['value'] }}">
                                {{ $wcu['stats'][1]['value'] }}
                            </div>
                            <div class="text-blue-100 text-xs sm:text-[13px] font-medium">
                                {{ $wcu['stats'][1]['label'] }}
                            </div>
                        </div>

                        <!-- Stat 3 -->
                        <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-2xs hover:border-emerald-300 hover:-translate-y-0.5 transition-all duration-300">
                            <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-emerald-600 tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][2]['value'] }}">
                                {{ $wcu['stats'][2]['value'] }}
                            </div>
                            <div class="text-slate-500 text-xs sm:text-[13px] font-semibold">
                                {{ $wcu['stats'][2]['label'] }}
                            </div>
                        </div>

                        <!-- Stat 4 -->
                        <div class="bg-white p-5 rounded-2xl border border-slate-200/70 shadow-2xs hover:border-cyan-300 hover:-translate-y-0.5 transition-all duration-300">
                            <div class="w-9 h-9 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center mb-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div class="text-2xl sm:text-3xl lg:text-4xl font-black text-primary tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][3]['value'] }}">
                                {{ $wcu['stats'][3]['value'] }}
                            </div>
                            <div class="text-slate-500 text-xs sm:text-[13px] font-semibold">
                                {{ $wcu['stats'][3]['label'] }}
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Social Proof Footer -->
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <div class="flex items-center gap-1.5 font-medium">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span>Live Dispatch Across All Dubai</span>
                        </div>
                        <span class="font-bold text-slate-700">8:00 AM – 9:00 PM</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
