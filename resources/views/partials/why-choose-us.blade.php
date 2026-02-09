<!-- Why Choose Us Section -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <div>
                <span class="inline-block px-3 py-1.5 bg-accent/10 text-accent rounded-full text-xs sm:text-sm font-semibold mb-3">Why Choose Us</span>
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark mb-3 sm:mb-4">We Make Your Space <span class="text-primary">Shine Bright</span></h2>
                <p class="text-gray text-sm sm:text-base mb-5 sm:mb-8">With years of experience in the cleaning industry, we understand what it takes to deliver exceptional results.</p>
                
                <div class="space-y-4 sm:space-y-5">
                    @php
                    $features = [
                        ['title' => 'Trusted & Verified Staff', 'desc' => 'All our cleaners are background-checked and professionally trained.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['title' => 'Eco-Friendly Products', 'desc' => 'We use environmentally safe cleaning solutions that are gentle yet effective.', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
                        ['title' => 'Flexible Scheduling', 'desc' => 'Book at your convenience - we work around your schedule.', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['title' => '100% Satisfaction Guarantee', 'desc' => "Not happy? We'll re-clean for free. That's our promise.", 'icon' => 'M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5'],
                    ];
                    @endphp
                    
                    @foreach($features as $feature)
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
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-1">10+</div>
                    <div class="text-white/80 text-xs sm:text-sm">Years Experience</div>
                </div>
                <div class="bg-gradient-to-br from-accent to-accent-dark rounded-xl sm:rounded-2xl p-4 sm:p-6 text-dark">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-1">5000+</div>
                    <div class="text-dark/80 text-xs sm:text-sm">Happy Clients</div>
                </div>
                <div class="bg-gradient-to-br from-sky to-primary rounded-xl sm:rounded-2xl p-4 sm:p-6 text-white">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-1">15+</div>
                    <div class="text-white/80 text-xs sm:text-sm">Expert Cleaners</div>
                </div>
                <div class="card bg-light rounded-xl sm:rounded-2xl p-4 sm:p-6">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-primary mb-1">98%</div>
                    <div class="text-gray text-xs sm:text-sm">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </div>
</section>
