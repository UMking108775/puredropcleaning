<!-- Style 2: Minimal Centered Cards & Simple Stats Bar -->
<section class="py-12 sm:py-16 lg:py-20 bg-slate-50/50" id="why-choose-us-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Centered Header -->
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
            <span class="inline-block px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full mb-3 uppercase tracking-wider">
                {{ $wcu['badge'] }}
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#0d2d5a] tracking-tight mb-3">
                {!! $wcu['heading'] !!}
            </h2>
            <p class="text-slate-500 text-sm sm:text-base leading-relaxed">
                {{ $wcu['subtitle'] }}
            </p>
        </div>

        <!-- 4 Feature Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8 sm:mb-10">
            @foreach($wcu['features'] as $feature)
            <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-2xs hover:border-primary/30 hover:shadow-sm transition-all">
                <div class="w-11 h-11 rounded-xl bg-blue-50 text-primary flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-900 mb-1.5">{{ $feature['title'] }}</h3>
                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Minimal Stats Bar -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200/80 shadow-2xs">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center divide-y sm:divide-y-0 sm:divide-x divide-slate-100">
                @foreach($wcu['stats'] as $index => $stat)
                <div class="{{ $index > 1 ? 'pt-4 sm:pt-0' : '' }}">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#0d2d5a] tracking-tight mb-1" data-wcu-counter="{{ $stat['value'] }}">
                        {{ $stat['value'] }}
                    </div>
                    <div class="text-xs sm:text-sm font-medium text-slate-500">
                        {{ $stat['label'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
