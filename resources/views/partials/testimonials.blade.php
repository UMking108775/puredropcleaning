<!-- Testimonials Section -->
<section class="py-12 sm:py-16 lg:py-20 bg-gradient-to-br from-light to-white" id="testimonials">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 sm:mb-10">
            <span class="inline-block px-3 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">Google Reviews</span>
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark">What Our <span class="text-primary">Clients Say</span></h2>
            <p class="text-gray text-sm sm:text-base mt-2 max-w-2xl mx-auto">Real verified reviews from our valued clients on Google Maps</p>
        </div>
        
        <!-- Trustindex Google Reviews Widget -->
        @php
            $trustindexId = \App\Models\Setting::get('trustindex_widget_id', '9208233822d1826b65263bb0dba');
        @endphp
        <div class="trustindex-widget-container min-h-[160px] flex justify-center">
            <script defer async src="https://cdn.trustindex.io/loader.js?{{ $trustindexId }}"></script>
        </div>
    </div>
</section>

