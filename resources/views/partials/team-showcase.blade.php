@php
    $brandName    = \App\Models\Setting::get('brand_name', 'Pure Drop Building Cleaning Services LLC');
    $brandPhone   = \App\Models\Setting::get('brand_phone', '+971 56 217 0386');
    $cleanPhone   = preg_replace('/[^0-9+]/', '', $brandPhone);
    $waDigits     = preg_replace('/[^0-9]/', '', $cleanPhone) ?: '971562170386';
    $teamWaMsg    = urlencode("Hello Pure Drop,\n\nI would like to book your uniformed cleaning team for my property in Dubai.\n\nPlease share availability.\n\nThank you!");
    $teamWaUrl    = "https://wa.me/{$waDigits}?text={$teamWaMsg}";
@endphp

<!-- Real Pure Drop Cleaning Team Section -->
<section id="our-team-section" class="py-12 sm:py-16 lg:py-20 bg-gradient-to-b from-white via-slate-50 to-white relative overflow-hidden">
    <!-- Subtle Background Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-bold tracking-wide uppercase mb-3">
                <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>Verified Pure Drop Staff</span>
            </div>
            
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#0d2d5a] tracking-tight leading-tight">
                Meet Our Trained <span class="text-primary">Cleaning Team</span>
            </h2>
            @include('partials.cnc-divider')
        </div>

        <!-- Main Real Team Showcase Card -->
        <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xl overflow-hidden mb-10 transition-all duration-300">
            <div class="relative group cursor-pointer" onclick="openTeamLightbox()">
                <!-- The Real Team Poster Image (Used as is per client instructions) -->
                <img src="{{ asset('team-photo.jpeg') }}" 
                     alt="Pure Drop Building Cleaning Services LLC - Dedicated Cleaning Team in Dubai" 
                     class="w-full h-auto object-cover select-none transition-transform duration-500 group-hover:scale-[1.01]"
                     loading="lazy">

                <!-- Hover Overlay Hint -->
                <div class="absolute inset-0 bg-gradient-to-t from-dark/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-between p-4 sm:p-6 text-white">
                    <span class="text-xs sm:text-sm font-semibold flex items-center gap-2">
                        <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        </svg>
                        Click to enlarge team &amp; individual portraits
                    </span>
                    <span class="text-xs bg-white/20 backdrop-blur px-2.5 py-1 rounded-full font-medium hidden sm:inline-block">
                        Pure Drop Staff LLC
                    </span>
                </div>
            </div>

            <!-- Bottom Sub-Bar with Official Badges -->
            <div class="p-4 sm:p-5 bg-slate-50 border-t border-slate-100 flex items-center justify-center">
                <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-8 text-xs sm:text-sm text-slate-700 font-medium">
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Official Uniformed Cleaners</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>English-Speaking &amp; Polite</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Company-Sponsored in Dubai</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Team Lightbox Modal -->
<div id="team-lightbox" class="fixed inset-0 z-50 bg-dark/90 backdrop-blur-sm hidden flex items-center justify-center p-3 sm:p-6" onclick="closeTeamLightbox()">
    <div class="relative max-w-5xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl" onclick="event.stopPropagation()">
        <div class="p-4 sm:p-5 bg-slate-900 text-white flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-accent inline-block"></span>
                <span class="text-xs sm:text-sm font-bold tracking-wide">Pure Drop Building Cleaning Services LLC — Official Team</span>
            </div>
            <button type="button" onclick="closeTeamLightbox()" class="text-white/70 hover:text-white p-1 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="max-h-[80vh] overflow-y-auto p-2 bg-slate-100 flex items-center justify-center">
            <img src="{{ asset('team-photo.jpeg') }}" 
                 alt="Pure Drop Cleaning Team Full Resolution" 
                 class="w-full h-auto object-contain rounded-lg">
        </div>
        <div class="p-3 sm:p-4 bg-white border-t border-slate-200 flex items-center justify-between text-xs text-slate-500">
            <span>Uniformed Staff &amp; Individual Profiles</span>
            <a href="{{ $teamWaUrl }}" target="_blank" class="text-primary font-bold hover:underline flex items-center gap-1">
                <span>Book This Team</span> &rarr;
            </a>
        </div>
    </div>
</div>

<script>
    function openTeamLightbox() {
        const modal = document.getElementById('team-lightbox');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }
    function closeTeamLightbox() {
        const modal = document.getElementById('team-lightbox');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }
</script>
