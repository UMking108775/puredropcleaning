<!-- Style 2: Centered Cards Grid -->
<section class="py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Centered Header -->
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
            <span class="inline-block px-3 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">{{ $wcu['badge'] }}</span>
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark mb-3 sm:mb-4">{!! $wcu['heading'] !!}</h2>
            <p class="text-gray text-sm sm:text-base">{{ $wcu['subtitle'] }}</p>
        </div>

        <!-- Feature Cards Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-10 sm:mb-14">
            @foreach($wcu['features'] as $feature)
            <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:border-primary/20 hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-br from-primary to-primary-dark rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-sm sm:text-base font-bold text-dark mb-2">{{ $feature['title'] }}</h3>
                <p class="text-gray text-xs sm:text-sm leading-relaxed">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Stats Row -->
        <div class="bg-gradient-to-r from-primary via-primary-dark to-primary rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 text-center">
                @foreach($wcu['stats'] as $stat)
                <div>
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-1">{{ $stat['value'] }}</div>
                    <div class="text-white/70 text-xs sm:text-sm">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
