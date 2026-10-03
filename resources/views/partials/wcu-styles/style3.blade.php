<!-- Style 3: Minimal Stats-First & 2x2 Grid (Light Version) -->
<section class="py-12 sm:py-16 lg:py-20 bg-white" id="why-choose-us-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="max-w-3xl mb-8 sm:mb-10">
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

        <!-- Minimal Stats Counter Row -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 py-6 sm:py-8 mb-8 sm:mb-12 border-y border-slate-100">
            @foreach($wcu['stats'] as $stat)
            <div>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-primary tracking-tight mb-1" data-wcu-counter="{{ $stat['value'] }}">
                    {{ $stat['value'] }}
                </div>
                <div class="text-xs sm:text-sm font-semibold text-slate-600">
                    {{ $stat['label'] }}
                </div>
            </div>
            @endforeach
        </div>

        <!-- 2x2 Feature Grid (Mobile 1 Col, Tablet/Desktop 2 Col) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            @foreach($wcu['features'] as $feature)
            <div class="p-5 sm:p-6 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-4">
                <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-xl bg-white text-primary border border-slate-200/60 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-900 mb-1">{{ $feature['title'] }}</h3>
                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
