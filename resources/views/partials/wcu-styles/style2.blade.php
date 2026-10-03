<!-- Style 2: Centered 4-Card Grid + Floating Stats Ribbon (Light Brand Kit) -->
<section class="py-14 sm:py-20 lg:py-24 bg-gradient-to-b from-slate-50/90 via-white to-slate-50/60 relative overflow-hidden" id="why-choose-us-section">
    <!-- Ambient Blur Graphics -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[500px] bg-blue-100/30 rounded-full blur-[120px] pointer-events-none -z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Centered Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-4 shadow-2xs">
                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                <span>{{ $wcu['badge'] }}</span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#0d2d5a] tracking-tight leading-tight mb-4">
                {!! $wcu['heading'] !!}
            </h2>
            <p class="text-slate-600 text-sm sm:text-base lg:text-lg leading-relaxed max-w-2xl mx-auto">
                {{ $wcu['subtitle'] }}
            </p>
        </div>

        <!-- 4-Card Horizontal Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6 mb-12 sm:mb-16">
            @foreach($wcu['features'] as $index => $feature)
            @php
                $colors = [
                    ['bg' => 'bg-blue-50', 'text' => 'text-primary', 'border' => 'group-hover:border-primary/40', 'accent' => 'bg-primary'],
                    ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'border' => 'group-hover:border-emerald-400', 'accent' => 'bg-emerald-500'],
                    ['bg' => 'bg-amber-50', 'text' => 'text-amber-600', 'border' => 'group-hover:border-amber-400', 'accent' => 'bg-amber-500'],
                    ['bg' => 'bg-cyan-50', 'text' => 'text-cyan-600', 'border' => 'group-hover:border-cyan-400', 'accent' => 'bg-cyan-500'],
                ];
                $c = $colors[$index % 4];
                $tags = ['Vetted & Trained', '100% Eco-Safe', 'Flexible Hours', 'Guaranteed Quality'];
            @endphp
            <div class="bg-white rounded-2xl p-6 sm:p-7 border border-slate-200/80 shadow-[0_4px_25px_rgba(13,45,90,0.03)] hover:shadow-[0_16px_40px_rgba(13,45,90,0.09)] {{ $c['border'] }} hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden flex flex-col justify-between group">
                <!-- Top Accent Line -->
                <div class="absolute top-0 left-0 right-0 h-1 {{ $c['accent'] }} opacity-80 group-hover:h-1.5 transition-all duration-300"></div>

                <div>
                    <!-- Icon Box -->
                    <div class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl {{ $c['bg'] }} {{ $c['text'] }} flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300 shadow-2xs">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="{{ $feature['icon'] }}"/>
                        </svg>
                    </div>

                    <!-- Title -->
                    <h3 class="text-base sm:text-[17px] font-bold text-slate-900 group-hover:text-primary transition-colors leading-snug mb-2">
                        {{ $feature['title'] }}
                    </h3>

                    <!-- Description -->
                    <p class="text-slate-500 text-xs sm:text-[13px] leading-relaxed">
                        {{ $feature['desc'] }}
                    </p>
                </div>

                <!-- Bottom Pill Tag -->
                <div class="mt-5 pt-3.5 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400 font-semibold">
                    <span class="inline-flex items-center gap-1.5 text-[11px] {{ $c['text'] }} font-bold">
                        <span class="w-1.5 h-1.5 rounded-full {{ $c['accent'] }}"></span>
                        {{ $tags[$index % 4] }}
                    </span>
                    <span class="text-slate-300 group-hover:text-primary group-hover:translate-x-0.5 transition-all">→</span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Bottom Elevated Stats Ribbon -->
        <div class="bg-gradient-to-r from-blue-50/80 via-white to-sky-50/80 border border-blue-100/90 rounded-3xl p-7 sm:p-9 lg:p-11 shadow-[0_15px_45px_rgba(13,45,90,0.06)] relative overflow-hidden">
            <!-- Decorative Accent Wave -->
            <div class="absolute -right-10 -bottom-10 w-44 h-44 bg-primary/5 rounded-full blur-2xl pointer-events-none"></div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 divide-y sm:divide-y-0 sm:divide-x divide-slate-200/60 items-center">
                <!-- Stat 1 -->
                <div class="text-center sm:px-4">
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#0d2d5a] tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][0]['value'] }}">
                        {{ $wcu['stats'][0]['value'] }}
                    </div>
                    <div class="text-slate-600 text-xs sm:text-sm font-bold uppercase tracking-wider">
                        {{ $wcu['stats'][0]['label'] }}
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="text-center sm:px-4 pt-6 sm:pt-0">
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-primary tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][1]['value'] }}">
                        {{ $wcu['stats'][1]['value'] }}
                    </div>
                    <div class="text-slate-600 text-xs sm:text-sm font-bold uppercase tracking-wider">
                        {{ $wcu['stats'][1]['label'] }}
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="text-center sm:px-4 pt-6 sm:pt-0">
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-emerald-600 tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][2]['value'] }}">
                        {{ $wcu['stats'][2]['value'] }}
                    </div>
                    <div class="text-slate-600 text-xs sm:text-sm font-bold uppercase tracking-wider">
                        {{ $wcu['stats'][2]['label'] }}
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="text-center sm:px-4 pt-6 sm:pt-0">
                    <div class="text-3xl sm:text-4xl lg:text-5xl font-black text-cyan-600 tracking-tight mb-1" data-wcu-counter="{{ $wcu['stats'][3]['value'] }}">
                        {{ $wcu['stats'][3]['value'] }}
                    </div>
                    <div class="text-slate-600 text-xs sm:text-sm font-bold uppercase tracking-wider">
                        {{ $wcu['stats'][3]['label'] }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
