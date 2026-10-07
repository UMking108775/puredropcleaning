<!-- Testimonials Section -->
<section class="py-12 sm:py-16 lg:py-20 bg-gradient-to-br from-light to-white relative" id="testimonials">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 sm:mb-10">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">
                <svg class="w-4 h-4 text-[#EA4335]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
                </svg>
                <span>Google Business Reviews</span>
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#0d2d5a] tracking-tight">
                What Our Clients Say <span class="text-primary">on Google</span>
            </h2>
            @include('partials.cnc-divider')
        </div>
        
        <!-- Trustindex Google Reviews Widget -->
        @php
            $trustindexId = \App\Models\Setting::get('trustindex_widget_id', '9208233822d1826b65263bb0dba');
            $gmapsProfileUrl = 'https://maps.app.goo.gl/JXGtjbeuHYw3mzT69';
        @endphp
        
        <div class="trustindex-widget-container min-h-[160px] flex justify-center mb-8">
            <script defer async src="https://cdn.trustindex.io/loader.js?{{ $trustindexId }}"></script>
        </div>

        <!-- Official 'See All Google Reviews' Link (Checklist Item 4) -->
        <div class="text-center pt-2">
            <a href="{{ $gmapsProfileUrl }}" 
               target="_blank" 
               rel="noopener noreferrer"
               class="inline-flex items-center gap-2.5 px-6 py-3 bg-white hover:bg-slate-50 text-slate-800 hover:text-primary font-bold text-xs sm:text-sm rounded-full border border-slate-300 shadow-sm hover:shadow transition-all duration-200">
                <svg class="w-4 h-4 text-[#4285F4]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/>
                </svg>
                <span>See All Google Reviews</span>
                <span class="text-amber-500 font-extrabold">★★★★★</span>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
            </a>
        </div>
    </div>
</section>
