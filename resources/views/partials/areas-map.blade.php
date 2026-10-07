@php
    $waNumber = '971562170386';

    // Curated, non-overlapping coverage zones across the entire emirate of Dubai
    $coverageAreas = [
        [
            'id'       => 'palm-jumeirah',
            'title'    => 'Palm Jumeirah',
            'subtitle' => 'Shoreline & Luxury Villas',
            'lat'      => 25.1124,
            'lng'      => 55.1389,
        ],
        [
            'id'       => 'dubai-marina',
            'title'    => 'Dubai Marina & JBR',
            'subtitle' => 'Marina Towers & Beachfront',
            'lat'      => 25.0780,
            'lng'      => 55.1390,
        ],
        [
            'id'       => 'umm-suqeim-barsha',
            'title'    => 'Umm Suqeim & Barsha',
            'subtitle' => 'Coastal Villas & Residences',
            'lat'      => 25.1180,
            'lng'      => 55.2050,
        ],
        [
            'id'       => 'downtown-dubai',
            'title'    => 'Downtown Dubai',
            'subtitle' => 'Burj Khalifa & Boulevard',
            'lat'      => 25.1950,
            'lng'      => 55.2750,
        ],
        [
            'id'       => 'business-bay',
            'title'    => 'Business Bay',
            'subtitle' => 'Executive Towers & Canal',
            'lat'      => 25.1760,
            'lng'      => 55.2680,
        ],
        [
            'id'       => 'difc-trade-centre',
            'title'    => 'DIFC & Trade Centre',
            'subtitle' => 'Financial Towers & Suites',
            'lat'      => 25.2150,
            'lng'      => 55.2810,
        ],
        [
            'id'       => 'dubai-festival-city',
            'title'    => 'Dubai Festival City',
            'subtitle' => 'Al Badia & Corniche',
            'lat'      => 25.2230,
            'lng'      => 55.3520,
        ],
        [
            'id'       => 'city-centre-mirdif',
            'title'    => 'City Centre Mirdif',
            'subtitle' => 'Mirdif Uptown & Enclaves',
            'lat'      => 25.2210,
            'lng'      => 55.4190,
        ],
        [
            'id'       => 'dubai-silicon-oasis',
            'title'    => 'Dubai Silicon Oasis',
            'subtitle' => 'Cedre & Semmer Villas',
            'lat'      => 25.1228,
            'lng'      => 55.3814,
        ],
        [
            'id'       => 'nad-al-sheba',
            'title'    => 'Nad Al Sheba & Meydan',
            'subtitle' => 'Meydan Luxury Villas',
            'lat'      => 25.1432,
            'lng'      => 55.3340,
        ],
        [
            'id'       => 'the-villa-villanova',
            'title'    => 'The Villa & Villanova',
            'subtitle' => 'Dubailand Villa Enclaves',
            'lat'      => 25.0750,
            'lng'      => 55.3670,
        ],
        [
            'id'       => 'arabian-ranches',
            'title'    => 'Arabian Ranches',
            'subtitle' => 'Palmera & Saheel Villas',
            'lat'      => 25.0558,
            'lng'      => 55.2685,
        ],
        [
            'id'       => 'damac-hills-mudon',
            'title'    => 'DAMAC Hills & Mudon',
            'subtitle' => 'Golf Estates & Townhouses',
            'lat'      => 25.0280,
            'lng'      => 55.2580,
        ],
        [
            'id'       => 'jvc-jvt',
            'title'    => 'Jumeirah Village Circle',
            'subtitle' => 'JVC & JVT Apartments',
            'lat'      => 25.0600,
            'lng'      => 55.2080,
        ],
        [
            'id'       => 'city-centre-meaisem',
            'title'    => 'City Centre Me\'aisem',
            'subtitle' => 'Production City (IMPZ)',
            'lat'      => 25.0315,
            'lng'      => 55.1870,
        ],
        [
            'id'       => 'festival-plaza',
            'title'    => 'Festival Plaza & Furjan',
            'subtitle' => 'Jebel Ali Village & Al Furjan',
            'lat'      => 25.0180,
            'lng'      => 55.1150,
        ],
        [
            'id'       => 'deira-old-dubai',
            'title'    => 'Deira & Creek',
            'subtitle' => 'Commercial & Waterfront',
            'lat'      => 25.2680,
            'lng'      => 55.3120,
        ],
    ];
@endphp

<!-- Areas We Serve & Coverage Map Section -->
<section id="areas-map-section" class="py-12 sm:py-16 bg-white relative overflow-hidden">
    
    <!-- Header Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 sm:mb-10 text-center">
        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">
            <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
            <span>Interactive Dubai Coverage Map</span>
        </span>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#0d2d5a] tracking-tight">
            Areas We Serve <span class="text-primary">in Dubai</span>
        </h2>
        @include('partials.cnc-divider')
    </div>

    <!-- Free Custom Map Container (Leaflet.js + Esri World Street Map - Zero API Key, Zero Watermarks) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative w-full bg-slate-100 overflow-hidden border border-slate-200 shadow-lg rounded-2xl sm:rounded-3xl">
            <div id="puredrop-custom-map" class="w-full h-[520px] sm:h-[600px] lg:h-[660px] z-10"></div>
        </div>
    </div>

</section>

<!-- Leaflet CDN (100% Free & Open Source, No API Key Required) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>

<!-- Custom Map & Popup Styles Matching Image 3 -->
<style>
    /* Leaflet popup container overrides for clean white cards */
    .leaflet-popup-content-wrapper {
        background: transparent !important;
        box-shadow: none !important;
        padding: 0 !important;
        border-radius: 12px !important;
    }
    .leaflet-popup-content {
        margin: 0 !important;
        line-height: 1.3 !important;
    }
    .leaflet-popup-tip-container {
        margin-top: -2px;
    }
    .leaflet-popup-tip {
        background: #ffffff !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.15) !important;
    }
    .leaflet-container a.leaflet-popup-close-button {
        display: none !important;
    }
    
    /* Marker pin hover animation */
    .puredrop-marker-pin {
        transition: transform 0.2s ease-in-out;
    }
    .puredrop-marker-pin:hover {
        transform: scale(1.15) translateY(-2px);
    }

    /* Mobile responsive card widths */
    .puredrop-map-card {
        width: 145px;
    }
    @media (min-width: 640px) {
        .puredrop-map-card {
            width: 162px;
        }
    }
</style>

<!-- Map Initialization Script -->
<script>
    (function() {
        const markersData = @json($coverageAreas);
        const waNumber = '{{ $waNumber }}';

        let map = null;

        const isMobile = window.innerWidth < 640;
        const DUBAI_CENTER = [25.130, 55.270];
        const DEFAULT_ZOOM = isMobile ? 10.5 : 11;

        function createCustomPin() {
            return L.divIcon({
                className: 'puredrop-custom-marker-wrapper',
                html: `
                    <div class="puredrop-marker-pin cursor-pointer" style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.25));">
                        <div style="width: 20px; height: 20px; background-color: #1e4b8e; border: 2px solid #ffffff; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); display: flex; align-items: center; justify-content: center;">
                            <div style="transform: rotate(45deg); width: 6px; height: 6px; background-color: #ffffff; border-radius: 50%;"></div>
                        </div>
                    </div>
                `,
                iconSize: [20, 20],
                iconAnchor: [10, 20],
                popupAnchor: [0, -20]
            });
        }

        function buildPopupContent(item) {
            const dirUrl = `https://www.google.com/maps/dir/?api=1&destination=${item.lat},${item.lng}`;
            const waMsg = encodeURIComponent(`Hello Pure Drop, I would like to book a cleaning service in ${item.title}.`);
            const waUrl = `https://wa.me/${waNumber}?text=${waMsg}`;

            return `
                <div class="puredrop-map-card bg-white p-2 sm:p-2.5 rounded-xl shadow-md border border-slate-200/90 text-left select-none pointer-events-auto">
                    <h4 class="text-[11px] sm:text-xs font-bold text-[#0d2d5a] leading-tight tracking-tight truncate block" title="${item.title}">
                        ${item.title}
                    </h4>
                    <p class="text-[9px] sm:text-[10px] text-slate-500 leading-tight truncate block mb-1.5" title="${item.subtitle}">
                        ${item.subtitle}
                    </p>
                    <div class="grid grid-cols-2 gap-1 pt-1.5 border-t border-slate-100">
                        <a href="${dirUrl}" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="inline-flex items-center justify-center gap-1 py-1 px-1 bg-blue-50/90 hover:bg-[#1e4b8e] text-[#1e4b8e] hover:text-white text-[9.5px] font-bold rounded-md border border-blue-200/70 hover:border-[#1e4b8e] transition-all duration-150 shadow-2xs" 
                           title="Directions">
                            <svg class="w-2.5 h-2.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <span>Directions</span>
                        </a>
                        <a href="${waUrl}" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="inline-flex items-center justify-center gap-1 py-1 px-1 bg-emerald-50/90 hover:bg-[#25D366] text-emerald-700 hover:text-white text-[9.5px] font-bold rounded-md border border-emerald-200/70 hover:border-[#25D366] transition-all duration-150 shadow-2xs" 
                           title="WhatsApp">
                            <svg class="w-2.5 h-2.5 fill-current flex-shrink-0" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>
            `;
        }

        function initMap() {
            const mapEl = document.getElementById('puredrop-custom-map');
            if (!mapEl || map !== null) return;

            // 1. Initialize Map centered on Dubai
            map = L.map('puredrop-custom-map', {
                center: DUBAI_CENTER,
                zoom: DEFAULT_ZOOM,
                scrollWheelZoom: false,
                tap: true
            });

            // 2. High-Quality Esri World Street Map Free Tiles (100% Free, Zero API Key, Zero Watermarks)
            L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: '&copy; <a href="https://www.esri.com/">Esri</a> &mdash; Street Map',
                maxZoom: 18
            }).addTo(map);

            // 3. Add all custom markers & open popups by default on EVERY point (no bare points)
            markersData.forEach(item => {
                const markerIcon = createCustomPin();
                const marker = L.marker([item.lat, item.lng], { icon: markerIcon });

                marker.bindPopup(buildPopupContent(item), {
                    autoClose: false,
                    closeOnClick: false,
                    closeButton: false,
                    autoPan: false,
                    maxWidth: 175,
                    minWidth: 140
                });

                marker.addTo(map);

                // Open popup on all points so no naked pins remain
                marker.openPopup();
            });
        }

        // Initialize on DOM ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initMap);
        } else {
            initMap();
        }
    })();
</script>
