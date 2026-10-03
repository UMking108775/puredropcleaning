<!-- Services Grid for Home Page -->
<section class="py-14 sm:py-20 lg:py-24 bg-slate-50/70" id="services-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-3.5">
                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                <span>Our Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#0d2d5a] tracking-tight mb-3 sm:mb-4">
                Professional <span class="text-primary">Cleaning Solutions</span>
            </h2>
            <p class="text-gray-500 text-sm sm:text-base leading-relaxed">
                Tailored residential, commercial, and specialized deep cleaning solutions across Dubai delivered by certified, background-checked staff.
            </p>
        </div>
        
        <!-- 4-Column Balanced Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100/90 shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_16px_36px_rgba(30,75,142,0.1)] hover:border-primary/25 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <!-- Image Container -->
                <a href="{{ route('service.show', ['slug' => $service->slug ?? Str::slug($service->title)]) }}" class="relative block w-full aspect-video overflow-hidden bg-slate-100">
                    <img src="{{ $service->image_url }}"
                         alt="{{ $service->title }}"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                         loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/25 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>

                <!-- Content Body -->
                <div class="p-5 sm:p-6 flex flex-col flex-1 justify-between">
                    <div>
                        <a href="{{ route('service.show', ['slug' => $service->slug ?? Str::slug($service->title)]) }}">
                            <h3 class="text-base sm:text-[17px] font-bold text-gray-900 group-hover:text-primary transition-colors leading-snug line-clamp-1 mb-1.5">
                                {{ $service->title }}
                            </h3>
                        </a>
                        <p class="text-gray-500 text-xs sm:text-[13px] leading-relaxed line-clamp-2">
                            {{ $service->description }}
                        </p>
                    </div>

                    <!-- Bottom Action Link -->
                    <div class="mt-4 pt-3.5 border-t border-slate-100 flex items-center justify-between">
                        <a href="{{ route('service.show', ['slug' => $service->slug ?? Str::slug($service->title)]) }}" 
                           class="text-xs sm:text-sm font-bold text-primary group-hover:text-primary-dark transition-colors inline-flex items-center gap-1.5">
                            <span>View Details</span>
                            <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <a href="{{ route('contact') }}" 
                           class="p-1.5 rounded-lg text-gray-400 hover:text-primary hover:bg-primary/5 transition-colors"
                           title="Inquire about {{ $service->title }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- 12th Card: Custom Quote & Subscription Packages -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#0d2d5a] via-[#1e4b8e] to-[#2563eb] text-white p-6 sm:p-7 flex flex-col justify-between shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
                <div class="absolute -left-8 -bottom-8 w-32 h-32 bg-accent/20 rounded-full blur-xl pointer-events-none"></div>

                <div class="relative z-10">
                    <span class="inline-block px-2.5 py-1 bg-white/15 text-accent-light text-[11px] font-bold rounded-full uppercase tracking-wider mb-3">
                        Flexible Plans
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-white tracking-tight leading-snug mb-2">
                        Need a Specialized Cleaning Plan?
                    </h3>
                    <p class="text-white/80 text-xs sm:text-[13px] leading-relaxed">
                        We create tailored schedules for villas, offices, moving in/out, and recurring subscription packages.
                    </p>
                </div>

                <div class="relative z-10 pt-5 space-y-2.5">
                    <a href="{{ route('packages') }}" class="w-full flex items-center justify-center gap-1.5 py-2.5 px-4 rounded-xl bg-white text-primary font-bold text-xs sm:text-sm hover:bg-slate-100 transition-colors shadow">
                        <span>Explore Packages</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="w-full flex items-center justify-center py-2 px-3 text-xs text-white/90 hover:text-white font-semibold transition-colors">
                        <span>Request Free Quote →</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
