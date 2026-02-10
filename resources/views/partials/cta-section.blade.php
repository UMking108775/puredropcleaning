<!-- CTA Section - Business Details Style -->
<section class="bg-gradient-to-br from-sky/20 to-primary/10 py-10 sm:py-12 lg:py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8 sm:gap-10 items-center">
            <!-- Left Side - Logo -->
            <div class="text-center md:text-left">
                <a href="{{ route('home') }}" class="inline-block">
                    <img src="{{ asset('logo2.png') }}" alt="PureDropCleaning" class="h-32 sm:h-40 lg:h-48 w-auto mx-auto md:mx-0">
                </a>
            </div>
            
            <!-- Right Side - Business Details -->
            <div class="text-left">
                <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-dark mb-4 sm:mb-6">BUSINESS DETAILS</h3>
                
                <div class="space-y-3 sm:space-y-4 mb-5 sm:mb-8">
                    <div>
                        <span class="text-xs sm:text-sm font-semibold text-primary">Working Hours</span>
                        <p class="text-gray text-xs sm:text-sm">8:00 am to 9:00 pm</p>
                    </div>
                    <div>
                        <span class="text-xs sm:text-sm font-semibold text-primary">Address</span>
                        <p class="text-gray text-xs sm:text-sm">Al Jafiliya, Dubai, United Arab Emirates</p>
                    </div>
                    <div>
                        <span class="text-xs sm:text-sm font-semibold text-primary">Call Us</span>
                    </div>
                </div>
                
                <!-- Phone Buttons -->
                <div class="flex flex-col sm:flex-row gap-2.5 sm:gap-3">
                    <a href="tel:+971551018837" class="inline-flex items-center justify-center px-4 sm:px-6 py-2.5 sm:py-3 bg-primary text-white font-semibold rounded-full text-sm sm:text-base hover:bg-primary-dark transition-colors">
                        +971 55 101 8837
                    </a>
                    <a href="mailto:info.puredropcleaning@gmail.com" class="inline-flex items-center justify-center px-4 sm:px-6 py-2.5 sm:py-3 bg-accent text-dark font-semibold rounded-full text-sm sm:text-base hover:bg-accent/80 transition-colors">
                        Email Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
