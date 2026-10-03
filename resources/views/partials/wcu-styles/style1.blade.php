<!-- Style 1: Clean Minimal Split -->
<section class="py-12 sm:py-16 lg:py-20 bg-white" id="why-choose-us-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Left Column: Title & 4 Features (7 cols) -->
            <div class="lg:col-span-7">
                <span class="inline-block px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full mb-3 uppercase tracking-wider">
                    {{ $wcu['badge'] }}
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-[#0d2d5a] tracking-tight mb-3">
                    {!! $wcu['heading'] !!}
                </h2>
                <p class="text-slate-500 text-sm sm:text-base leading-relaxed mb-6 sm:mb-8">
                    {{ $wcu['subtitle'] }}
                </p>

                <!-- Features List -->
                <div class="space-y-4 sm:space-y-5">
                    @foreach($wcu['features'] as $feature)
                    <div class="flex items-start gap-3.5 sm:gap-4">
                        <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-xl bg-blue-50 text-primary flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base font-bold text-slate-900 mb-0.5">{{ $feature['title'] }}</h3>
                            <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Column: 2x2 Minimal Stat Cards (5 cols) -->
            <div class="lg:col-span-5 mt-2 lg:mt-0">
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    @foreach($wcu['stats'] as $index => $stat)
                    @php
                        $statStyles = [
                            ['bg' => 'bg-slate-50', 'text' => 'text-[#0d2d5a]'],
                            ['bg' => 'bg-primary text-white', 'text' => 'text-white'],
                            ['bg' => 'bg-slate-50', 'text' => 'text-primary'],
                            ['bg' => 'bg-blue-50/70', 'text' => 'text-primary'],
                        ];
                        $s = $statStyles[$index % 4];
                    @endphp
                    <div class="{{ $s['bg'] }} rounded-2xl p-5 sm:p-6 border border-slate-100 flex flex-col justify-center text-center">
                        <div class="text-3xl sm:text-4xl font-extrabold {{ $s['text'] }} tracking-tight mb-1" data-wcu-counter="{{ $stat['value'] }}">
                            {{ $stat['value'] }}
                        </div>
                        <div class="text-xs sm:text-sm font-medium {{ $index === 1 ? 'text-white/80' : 'text-slate-500' }}">
                            {{ $stat['label'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
