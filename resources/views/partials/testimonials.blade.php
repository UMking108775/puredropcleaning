<!-- Testimonials Section -->
<section class="py-12 sm:py-16 lg:py-20 bg-gradient-to-br from-light to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 sm:mb-10">
            <span class="inline-block px-3 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">Testimonials</span>
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark">What Our <span class="text-primary">Clients Say</span></h2>
        </div>
        
        <div class="grid md:grid-cols-3 gap-4 sm:gap-6">
            @php
            $testimonials = [
                ['name' => 'Sarah Anderson', 'role' => 'Homeowner', 'initials' => 'SA', 'color' => 'primary', 'text' => 'PureDropCleaning transformed my home! Their attention to detail is incredible. The team was professional, punctual, and thorough.'],
                ['name' => 'Michael Johnson', 'role' => 'Business Owner', 'initials' => 'MJ', 'color' => 'accent', 'text' => "We've been using their office cleaning services for 2 years now. Consistent quality, reliable team, and competitive pricing."],
                ['name' => 'Emily Watson', 'role' => 'Apartment Resident', 'initials' => 'EW', 'color' => 'sky', 'text' => 'The eco-friendly approach sold me, but the quality kept me coming back. My apartment has never looked better!'],
            ];
            @endphp
            
            @foreach($testimonials as $testimonial)
            <div class="card p-4 sm:p-6 bg-white">
                <div class="flex items-center mb-3 sm:mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-gray text-xs sm:text-sm mb-3 sm:mb-4">"{{ $testimonial['text'] }}"</p>
                <div class="flex items-center">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-{{ $testimonial['color'] }}/20 rounded-full flex items-center justify-center mr-3">
                        <span class="text-{{ $testimonial['color'] }} font-bold text-sm sm:text-base">{{ $testimonial['initials'] }}</span>
                    </div>
                    <div>
                        <div class="font-semibold text-dark text-sm sm:text-base">{{ $testimonial['name'] }}</div>
                        <div class="text-gray text-xs sm:text-sm">{{ $testimonial['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
