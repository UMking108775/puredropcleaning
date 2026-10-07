<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', App\Models\Setting::get('site_description', 'Pure Drop Building Cleaning Services LLC provides professional residential and commercial cleaning services in Dubai including deep cleaning, maid services, sofa, carpet and villa cleaning.'))">
    <meta name="keywords" content="Cleaning Services Dubai, Deep Cleaning Dubai, Maid Services Dubai, Villa Deep Cleaning Dubai, Sofa Cleaning Dubai, Carpet Cleaning Dubai">
    
    <title>@yield('title', \App\Models\Setting::get('brand_name', 'Pure Drop Building Cleaning Services LLC') . ' | Cleaning Services Dubai')</title>
    
    <!-- Favicon -->
    @if(\App\Models\Setting::get('brand_favicon'))
        <link rel="icon" type="image/png" href="{{ asset(\App\Models\Setting::get('brand_favicon')) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @endif
    
    <!-- Google Fonts: Plus Jakarta Sans & Outfit (Premium Modern Typography) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    
    <!-- Heroicons (for icons) -->
    <script src="https://unpkg.com/@heroicons/vue@2.0.18/dist/index.min.js" defer></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="bg-light min-h-screen flex flex-col pb-20 md:pb-0 antialiased">
    <!-- Header -->
    @include('components.header')
    
    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('components.footer')

    <!-- Mobile Sticky Action Bar -->
    @include('partials.mobile-action-bar')
    
    @stack('scripts')
    
    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuClose = document.getElementById('mobile-menu-close');
            const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
            
            function openMenu() {
                mobileMenu.classList.remove('translate-x-full');
                mobileMenuOverlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            
            function closeMenu() {
                mobileMenu.classList.add('translate-x-full');
                mobileMenuOverlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
            
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', openMenu);
            }
            
            if (mobileMenuClose) {
                mobileMenuClose.addEventListener('click', closeMenu);
            }
            
            if (mobileMenuOverlay) {
                mobileMenuOverlay.addEventListener('click', closeMenu);
            }
        });
    </script>

    <!-- Google Ads & Analytics Conversion Tracking Hooks (Checklist Item 16) -->
    <script>
        window.dataLayer = window.dataLayer || [];
        document.addEventListener('click', function(e) {
            const anchor = e.target.closest('a');
            if (!anchor) return;
            const href = anchor.getAttribute('href') || '';
            
            if (href.includes('wa.me') || href.includes('whatsapp.com')) {
                window.dataLayer.push({
                    'event': 'whatsapp_click',
                    'conversion_type': 'lead',
                    'link_url': href
                });
                if (typeof window.gtag === 'function') {
                    window.gtag('event', 'generate_lead', {
                        'event_category': 'Contact',
                        'event_label': 'WhatsApp',
                        'value': 1
                    });
                }
            }
            
            if (href.startsWith('tel:')) {
                window.dataLayer.push({
                    'event': 'phone_call_click',
                    'conversion_type': 'lead',
                    'phone_number': href.replace('tel:', '')
                });
                if (typeof window.gtag === 'function') {
                    window.gtag('event', 'contact', {
                        'event_category': 'Contact',
                        'event_label': 'Phone Call',
                        'value': 1
                    });
                }
            }
        }, { passive: true });
    </script>
</body>
</html>
