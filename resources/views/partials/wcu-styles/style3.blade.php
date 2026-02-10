<!-- Style 3: Modern Dark with Glassmorphism -->
<section class="py-12 sm:py-16 lg:py-20 bg-dark relative overflow-hidden">
    <!-- Background decoration -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-primary rounded-full blur-[128px]"></div>
        <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-accent rounded-full blur-[128px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
            <span class="inline-block px-3 py-1.5 bg-accent/20 text-accent rounded-full text-xs sm:text-sm font-semibold mb-3 backdrop-blur-sm">{{ $wcu['badge'] }}</span>
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-3 sm:mb-4">{!! str_replace('text-primary', 'text-accent', $wcu['heading']) !!}</h2>
            <p class="text-gray-400 text-sm sm:text-base">{{ $wcu['subtitle'] }}</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Features - Left Side -->
            <div class="grid sm:grid-cols-2 gap-4">
                @foreach($wcu['features'] as $index => $feature)
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-5 sm:p-6 hover:bg-white/10 hover:border-accent/30 transition-all duration-300 group">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-accent/20 to-primary/20 rounded-xl flex items-center justify-center mb-3 group-hover:from-accent/30 group-hover:to-primary/30 transition-all">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-sm sm:text-base font-bold text-white mb-1.5">{{ $feature['title'] }}</h3>
                    <p class="text-gray-400 text-xs sm:text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
                @endforeach
            </div>

            <!-- Stats - Right Side -->
            <div class="flex items-center">
                <div class="grid grid-cols-2 gap-4 w-full">
                    <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-5 sm:p-7 text-center border border-primary/20">
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-1">{{ $wcu['stats'][0]['value'] }}</div>
                        <div class="text-white/60 text-xs sm:text-sm">{{ $wcu['stats'][0]['label'] }}</div>
                    </div>
                    <div class="bg-gradient-to-br from-accent/90 to-accent-dark rounded-2xl p-5 sm:p-7 text-center border border-accent/20">
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-dark mb-1">{{ $wcu['stats'][1]['value'] }}</div>
                        <div class="text-dark/60 text-xs sm:text-sm">{{ $wcu['stats'][1]['label'] }}</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-5 sm:p-7 text-center">
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-accent mb-1">{{ $wcu['stats'][2]['value'] }}</div>
                        <div class="text-gray-400 text-xs sm:text-sm">{{ $wcu['stats'][2]['label'] }}</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-5 sm:p-7 text-center">
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-primary mb-1">{{ $wcu['stats'][3]['value'] }}</div>
                        <div class="text-gray-400 text-xs sm:text-sm">{{ $wcu['stats'][3]['label'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
