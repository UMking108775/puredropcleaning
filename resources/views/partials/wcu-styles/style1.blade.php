<!-- Style 1: Classic Side-by-Side (Original) -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div>
                <span class="inline-block px-3 py-1.5 bg-accent/10 text-accent rounded-full text-xs sm:text-sm font-semibold mb-3">{{ $wcu['badge'] }}</span>
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark mb-3 sm:mb-4">{!! $wcu['heading'] !!}</h2>
                <p class="text-gray text-sm sm:text-base mb-5 sm:mb-8">{{ $wcu['subtitle'] }}</p>
                
                <div class="space-y-4 sm:space-y-5">
                    @foreach($wcu['features'] as $feature)
                    <div class="flex items-start">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-primary/10 rounded-lg sm:rounded-xl flex items-center justify-center flex-shrink-0 mr-3 sm:mr-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-dark mb-0.5 sm:mb-1">{{ $feature['title'] }}</h3>
                            <p class="text-gray text-xs sm:text-sm">{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-3 sm:gap-4">
                <div class="bg-gradient-to-br from-primary to-primary-dark rounded-xl sm:rounded-2xl p-4 sm:p-6 text-white">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-1">{{ $wcu['stats'][0]['value'] }}</div>
                    <div class="text-white/80 text-xs sm:text-sm">{{ $wcu['stats'][0]['label'] }}</div>
                </div>
                <div class="bg-gradient-to-br from-accent to-accent-dark rounded-xl sm:rounded-2xl p-4 sm:p-6 text-dark">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-1">{{ $wcu['stats'][1]['value'] }}</div>
                    <div class="text-dark/80 text-xs sm:text-sm">{{ $wcu['stats'][1]['label'] }}</div>
                </div>
                <div class="bg-gradient-to-br from-sky to-primary rounded-xl sm:rounded-2xl p-4 sm:p-6 text-white">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-1">{{ $wcu['stats'][2]['value'] }}</div>
                    <div class="text-white/80 text-xs sm:text-sm">{{ $wcu['stats'][2]['label'] }}</div>
                </div>
                <div class="card bg-light rounded-xl sm:rounded-2xl p-4 sm:p-6">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-primary mb-1">{{ $wcu['stats'][3]['value'] }}</div>
                    <div class="text-gray text-xs sm:text-sm">{{ $wcu['stats'][3]['label'] }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
