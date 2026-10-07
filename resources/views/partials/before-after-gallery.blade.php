@php
    $brandName    = \App\Models\Setting::get('brand_name', 'Pure Drop Building Cleaning Services LLC');
    $brandPhone   = \App\Models\Setting::get('brand_phone', '+971 56 217 0386');
    $cleanPhone   = preg_replace('/[^0-9+]/', '', $brandPhone);
    $waDigits     = preg_replace('/[^0-9]/', '', $cleanPhone) ?: '971562170386';
    $quoteWaMsg   = urlencode("Hello Pure Drop,\n\nI saw your Before & After cleaning results on your website. I would like to get a quote for a deep cleaning job.\n\nThank you!");
    $quoteWaUrl   = "https://wa.me/{$waDigits}?text={$quoteWaMsg}";

    $items = [
        [
            'id' => 'kitchen',
            'title' => 'Stove & Burner Degreasing',
            'category' => 'kitchen',
            'categories' => ['kitchen', 'deep-cleaning', 'move-in'],
            'badge' => 'Kitchen Deep Clean',
            'image' => asset('before-after/kitchen-cleaning.jpg'),
            'desc' => 'Tough baked-on carbon and grease completely dissolved and polished away.'
        ],
        [
            'id' => 'oven',
            'title' => 'Oven Interior & Racks Restoration',
            'category' => 'kitchen',
            'categories' => ['kitchen', 'deep-cleaning'],
            'badge' => 'Appliance Detailing',
            'image' => asset('before-after/oven-cleaning.jpg'),
            'desc' => 'Internal oven walls, wire racks, and tempered glass returned to food-safe shine.'
        ],
        [
            'id' => 'refrigerator',
            'title' => 'Refrigerator Deep Sanitization',
            'category' => 'kitchen',
            'categories' => ['kitchen', 'deep-cleaning', 'move-in'],
            'badge' => 'Fridge Disinfection',
            'image' => asset('before-after/refrigerator-cleaning.jpg'),
            'desc' => 'Shelves, drawers, and seals sanitized with antibacterial food-grade cleaner.'
        ],
        [
            'id' => 'bathroom',
            'title' => 'Marble Sink & Chrome Descaling',
            'category' => 'bathroom',
            'categories' => ['bathroom', 'deep-cleaning', 'villa'],
            'badge' => 'Bathroom Detailing',
            'image' => asset('before-after/bathroom-cleaning.jpg'),
            'desc' => 'Calcium deposits, soap scum, and hard water stains lifted from natural stone.'
        ],
        [
            'id' => 'shower',
            'title' => 'Shower Glass Mineral Fog Removal',
            'category' => 'bathroom',
            'categories' => ['bathroom', 'deep-cleaning'],
            'badge' => 'Shower Enclosure',
            'image' => asset('before-after/shower-glass-cleaning.jpg'),
            'desc' => 'Limescale cloudiness stripped away, restoring 100% optical glass clarity.'
        ],
        [
            'id' => 'sofa',
            'title' => 'Fabric Sofa Shampoo & Extraction',
            'category' => 'upholstery',
            'categories' => ['upholstery', 'sofa', 'deep-cleaning'],
            'badge' => 'Sofa Shampooing',
            'image' => asset('before-after/sofa-cleaning.jpg'),
            'desc' => 'Deep fiber extraction lifting spills, dirt patches, and fabric odors.'
        ],
        [
            'id' => 'bedroom',
            'title' => 'Mattress Deep Stain & Dust Removal',
            'category' => 'upholstery',
            'categories' => ['upholstery', 'carpet', 'deep-cleaning'],
            'badge' => 'Mattress Sanitization',
            'image' => asset('before-after/bedroom-cleaning.jpg'),
            'desc' => 'Hygienic steam wash removing deep sweat stains and embedded allergens.'
        ],
        [
            'id' => 'floor',
            'title' => 'Grout Scrubbing & Floor Detailing',
            'category' => 'floors',
            'categories' => ['floors', 'deep-cleaning', 'move-in', 'villa'],
            'badge' => 'Floor Scrubbing',
            'image' => asset('before-after/floor-cleaning.jpg'),
            'desc' => 'Post-tenancy grime and stained grout scrubbed back to pristine gloss.'
        ],
        [
            'id' => 'window',
            'title' => 'Window Sill & Frame Sand Removal',
            'category' => 'windows',
            'categories' => ['windows', 'deep-cleaning', 'villa'],
            'badge' => 'Window Deep Clean',
            'image' => asset('before-after/window-cleaning.jpg'),
            'desc' => 'Dubai sand buildup cleared from tracks, corners, and sliding seals.'
        ],
    ];
@endphp

<!-- Real Before & After Gallery: See the Pure Drop Difference -->
<section id="before-after-section" class="py-12 sm:py-16 lg:py-20 bg-slate-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-accent/20 text-[#92400e] rounded-full text-xs sm:text-sm font-bold tracking-wide uppercase mb-3">
                <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                </svg>
                <span>Real Job Transformations</span>
            </div>
            
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-[#0d2d5a] tracking-tight leading-tight">
                See the <span class="text-primary">Pure Drop Difference</span>
            </h2>
            @include('partials.cnc-divider')
        </div>

        <!-- 9 Items Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" id="ba-cards-grid">
            @foreach($items as $item)
                <div class="ba-card bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md transition-all duration-300 overflow-hidden group cursor-pointer"
                     onclick="openBaLightbox('{{ $item['image'] }}', '', '')">
                    
                    <!-- Card Image with Uniform Stretched Height & Aspect Ratio -->
                    <div class="relative overflow-hidden bg-slate-100 flex items-center justify-center aspect-[16/10] w-full">
                        <img src="{{ $item['image'] }}" 
                             alt="Pure Drop Dubai Cleaning Transformation" 
                             class="w-full h-full object-fill block transition-transform duration-300 group-hover:scale-[1.02] select-none"
                             loading="lazy">

                        <!-- Hover Icon Hint -->
                        <div class="absolute inset-0 bg-dark/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="w-10 h-10 rounded-full bg-white/90 text-primary flex items-center justify-center shadow-md transform scale-90 group-hover:scale-100 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Single Card Lightbox Modal -->
<div id="ba-single-lightbox" class="fixed inset-0 z-50 bg-dark/90 backdrop-blur-sm hidden flex items-center justify-center p-3 sm:p-6" onclick="closeBaLightbox()">
    <div class="relative max-w-4xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl" onclick="event.stopPropagation()">
        <div class="p-4 bg-slate-900 text-white flex items-center justify-between">
            <div class="min-w-0 pr-3">
                <span class="text-xs text-accent font-bold uppercase tracking-wider block">Before &amp; After Inspection</span>
                <h4 id="ba-modal-title" class="text-sm sm:text-base font-bold truncate">Title</h4>
            </div>
            <button type="button" onclick="closeBaLightbox()" class="text-white/70 hover:text-white p-1 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="max-h-[75vh] overflow-y-auto bg-slate-950 flex items-center justify-center p-2">
            <img id="ba-modal-img" src="" alt="" class="max-w-full max-h-[70vh] object-contain rounded">
        </div>
        <div class="p-4 bg-white border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
            <p id="ba-modal-desc" class="text-slate-600 text-center sm:text-left">Description</p>
            <a href="{{ $quoteWaUrl }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#25D366] text-white font-bold rounded-lg hover:bg-[#20ba5a] transition-all">
                <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="" class="w-3.5 h-3.5">
                <span>Inquire About This Service</span>
            </a>
        </div>
    </div>
</div>

<!-- Master Comparison Board Lightbox Modal -->
<div id="ba-master-modal" class="fixed inset-0 z-50 bg-dark/95 backdrop-blur-sm hidden flex items-center justify-center p-2 sm:p-5" onclick="closeMasterBoardModal()">
    <div class="relative max-w-6xl w-full bg-slate-900 rounded-2xl overflow-hidden shadow-2xl flex flex-col max-h-[92vh]" onclick="event.stopPropagation()">
        <div class="p-3 sm:p-4 bg-slate-950 text-white flex items-center justify-between border-b border-slate-800">
            <div>
                <span class="text-accent text-[11px] font-bold uppercase tracking-wider block">Full Job Portfolio</span>
                <h4 class="text-sm sm:text-base font-bold text-white">Pure Drop Complete 9-Category Before &amp; After Board</h4>
            </div>
            <button type="button" onclick="closeMasterBoardModal()" class="text-white/70 hover:text-white p-1 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="overflow-auto p-2 sm:p-4 bg-slate-950 flex items-center justify-center flex-1">
            <img src="{{ asset('before-after.jpeg') }}" 
                 alt="Pure Drop Complete 9-Category Real Work Showcase" 
                 class="max-w-full max-h-[75vh] object-contain rounded-lg shadow-lg">
        </div>
        <div class="p-3 sm:p-4 bg-slate-900 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-300">
            <span>Kitchen &bull; Bathroom &bull; Shower Glass &bull; Floor &bull; Window &bull; Oven &bull; Bedroom &bull; Sofa &bull; Refrigerator</span>
            <a href="{{ $quoteWaUrl }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 bg-[#25D366] text-white font-bold rounded-lg hover:bg-[#20ba5a] transition-all">
                <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="" class="w-3.5 h-3.5">
                <span>Book Pure Drop On WhatsApp</span>
            </a>
        </div>
    </div>
</div>

<script>
    function filterBa(cat, btn) {
        // Toggle active button style
        const buttons = document.querySelectorAll('.ba-filter-btn');
        buttons.forEach(b => {
            b.classList.remove('active', 'bg-primary', 'text-white', 'shadow-sm', 'shadow-primary/20');
            b.classList.add('bg-white', 'text-slate-700', 'border', 'border-slate-200');
        });
        if (btn) {
            btn.classList.add('active', 'bg-primary', 'text-white', 'shadow-sm', 'shadow-primary/20');
            btn.classList.remove('bg-white', 'text-slate-700', 'border-slate-200');
        }

        const cards = document.querySelectorAll('.ba-card');
        cards.forEach(card => {
            const categories = (card.getAttribute('data-categories') || '').split(' ');
            if (cat === 'all' || categories.includes(cat)) {
                card.style.display = 'flex';
                card.style.opacity = '1';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function openBaLightbox(imgUrl, title, desc) {
        const modal = document.getElementById('ba-single-lightbox');
        document.getElementById('ba-modal-img').src = imgUrl;
        document.getElementById('ba-modal-title').textContent = title;
        document.getElementById('ba-modal-desc').textContent = desc;
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeBaLightbox() {
        const modal = document.getElementById('ba-single-lightbox');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    function openMasterBoardModal() {
        const modal = document.getElementById('ba-master-modal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeMasterBoardModal() {
        const modal = document.getElementById('ba-master-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }
</script>
