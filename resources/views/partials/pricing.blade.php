@php
    use App\Models\Package;

    $brandName    = \App\Models\Setting::get('brand_name', 'Pure Drop Building Cleaning Services LLC');
    $whatsappBase = rtrim(\App\Models\Setting::get('social_whatsapp', 'https://wa.me/971562170386'), '/');

    $allPackages = Package::active()->ordered()->get()->groupBy('type');

    $sectionLabels = [
        'hourly'  => ['title' => 'Hourly Plans',   'subtitle' => 'Pay only for the time you need.'],
        'weekly'  => ['title' => 'Weekly Plans',   'subtitle' => 'Regular visits, dedicated cleaner.'],
        'monthly' => ['title' => 'Monthly Plans',  'subtitle' => 'Best value for full-time support.'],
    ];

    $waIcon = '<svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-1.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>';

    $buildPackageMessage = function ($package, $brandName) {
        $typeLabel = $package->type_label;
        $rate = 'AED ' . rtrim(rtrim(number_format($package->price, 2), '0'), '.');
        if ($package->unit_label) {
            $rate .= ' ' . $package->unit_label;
        }

        $msg  = "Hello {$brandName},\n\n";
        $msg .= "I'd like to subscribe to the following cleaning plan:\n\n";
        $msg .= "📋 Plan: {$typeLabel} — {$package->name}\n";
        $msg .= "💰 Rate: {$rate}\n";

        if ($package->schedule_visits || $package->schedule_hours) {
            $schedule = trim(implode(', ', array_filter([$package->schedule_visits, $package->schedule_hours])));
            $msg .= "📅 Schedule: {$schedule}\n";
        }

        $msg .= ($package->type === 'hourly' ? "📅 Preferred Date: \n⏰ Preferred Time: \n⌛ Duration (hours): \n" : "🗓️ Start Date: \n");
        $msg .= "📍 Location / Address: \n";
        $msg .= "📝 Notes: \n\n";
        $msg .= "Please confirm availability and total quotation.\n\nThank you!";

        return $msg;
    };
@endphp

@if($allPackages->isNotEmpty())
<!-- Subscription Plans -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-8 sm:mb-12 max-w-2xl mx-auto">
            <span class="inline-block px-3 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">Subscription Plans</span>
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark mb-3">Choose Your <span class="text-primary">Cleaning Plan</span></h2>
            <p class="text-gray text-sm sm:text-base">Simple, transparent pricing. Subscribe to a plan and book instantly via WhatsApp.</p>
        </div>

        @foreach($sectionLabels as $typeKey => $section)
            @php $items = $allPackages[$typeKey] ?? collect(); @endphp
            @if($items->isNotEmpty())
                <div class="mb-10 sm:mb-14">
                    <div class="text-center mb-5 sm:mb-7">
                        <h3 class="text-base sm:text-lg lg:text-2xl font-bold text-dark uppercase tracking-wide">{{ $section['title'] }}</h3>
                        @if($section['subtitle'])
                            <p class="text-xs sm:text-sm text-gray mt-1">{{ $section['subtitle'] }}</p>
                        @endif
                    </div>

                    {{-- 2 cards per row on ALL screen sizes (incl. mobile) --}}
                    <div class="grid grid-cols-2 gap-3 sm:gap-5 lg:gap-6">
                        @foreach($items as $package)
                            @php
                                $msg        = $buildPackageMessage($package, $brandName);
                                $waLink     = $whatsappBase . '?text=' . urlencode($msg);
                                $hasSchedule = $package->schedule_visits || $package->schedule_hours;
                                $unit       = $package->unit_label;
                                $isHourly   = $package->type === 'hourly';
                            @endphp

                            <div class="relative rounded-xl sm:rounded-2xl overflow-hidden border-2 flex flex-col {{ $package->is_highlighted ? 'border-primary shadow-lg sm:shadow-xl' : 'border-gray-200 shadow-sm' }} bg-white">
                                {{-- Highlight ribbon --}}
                                @if($package->is_highlighted && $package->badge_text)
                                    <div class="absolute top-2 right-2 sm:top-3 sm:right-3 z-10">
                                        <span class="inline-block bg-accent text-dark text-[8px] sm:text-[10px] lg:text-xs font-bold px-1.5 sm:px-2.5 py-0.5 sm:py-1 rounded-full whitespace-nowrap shadow">{{ $package->badge_text }}</span>
                                    </div>
                                @endif

                                {{-- PROMINENT LABEL BANNER (Without / With Materials) --}}
                                <div class="{{ $package->is_highlighted ? 'bg-gradient-to-r from-primary to-primary-dark' : 'bg-gray-50 border-b border-gray-100' }} px-2.5 sm:px-4 py-2 sm:py-3 text-center">
                                    <span class="text-[11px] sm:text-sm lg:text-base font-extrabold uppercase tracking-wide {{ $package->is_highlighted ? 'text-white' : 'text-dark' }} leading-tight block">
                                        {{ $package->name }}
                                    </span>
                                </div>

                                <div class="p-3 sm:p-5 lg:p-6 flex-1 flex flex-col">
                                    {{-- Price --}}
                                    <div class="text-center mb-2 sm:mb-3">
                                        <div class="flex items-baseline justify-center gap-0.5 sm:gap-1">
                                            <span class="text-[10px] sm:text-xs font-semibold text-gray">AED</span>
                                            <span class="text-2xl sm:text-4xl lg:text-5xl font-bold text-primary leading-none">{{ number_format($package->price, $package->price == floor($package->price) ? 0 : 2) }}</span>
                                        </div>
                                        @if($unit)
                                            <p class="text-[10px] sm:text-xs text-gray mt-1">{{ $unit }}</p>
                                        @elseif($isHourly)
                                            <p class="text-[10px] sm:text-xs text-gray mt-1">per hour</p>
                                        @endif
                                    </div>

                                    @if($hasSchedule)
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-1.5 sm:gap-2 mb-3 sm:mb-4">
                                            @if($package->schedule_visits)
                                                <div class="bg-light rounded-md sm:rounded-lg p-1.5 sm:p-2.5 text-center">
                                                    <p class="text-[8px] sm:text-[10px] text-gray uppercase font-semibold leading-tight">Schedule</p>
                                                    <p class="text-[10px] sm:text-xs font-bold text-dark leading-tight mt-0.5">{{ $package->schedule_visits }}</p>
                                                </div>
                                            @endif
                                            @if($package->schedule_hours)
                                                <div class="bg-light rounded-md sm:rounded-lg p-1.5 sm:p-2.5 text-center">
                                                    <p class="text-[8px] sm:text-[10px] text-gray uppercase font-semibold leading-tight">Per Visit</p>
                                                    <p class="text-[10px] sm:text-xs font-bold text-dark leading-tight mt-0.5">{{ $package->schedule_hours }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    @endif

                                    @if(!empty($package->features))
                                        <ul class="space-y-1.5 sm:space-y-2 mb-4 sm:mb-5 flex-1">
                                            @foreach($package->features as $feature)
                                                <li class="flex items-start gap-1.5 sm:gap-2 text-[10px] sm:text-xs lg:text-sm leading-snug">
                                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 flex-shrink-0 mt-0.5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="text-gray break-words">{{ $feature }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <a href="{{ $waLink }}" target="_blank" rel="noopener" class="mt-auto inline-flex items-center justify-center w-full rounded-lg font-semibold transition-colors text-[11px] sm:text-sm px-2 sm:px-4 py-2 sm:py-2.5 {{ $package->is_highlighted ? 'bg-primary hover:bg-primary-dark text-white' : 'bg-green-500 hover:bg-green-600 text-white' }}">
                                        {!! $waIcon !!}
                                        <span>Subscribe</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        {{-- Staff badges --}}
        <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-4 sm:p-6 lg:p-8 text-white">
            <div class="grid grid-cols-2 sm:flex sm:flex-wrap items-center justify-center gap-2 sm:gap-4 lg:gap-6">
                @foreach(['Female Staff', 'Well-Trained Staff', 'English-Speaking Staff', 'Professional Service'] as $badge)
                    <div class="flex items-center gap-1.5 sm:gap-2 bg-white/10 backdrop-blur rounded-full px-2 sm:px-4 py-1.5 sm:py-2 justify-center">
                        <svg class="w-3.5 h-3.5 sm:w-5 sm:h-5 text-accent flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-[10px] sm:text-sm font-semibold leading-tight">{{ $badge }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <p class="text-center text-[10px] sm:text-xs lg:text-sm text-gray mt-5 sm:mt-8">
            * Prices are indicative. Final quotation may vary based on property size, location and specific requirements.
        </p>
    </div>
</section>
@endif
