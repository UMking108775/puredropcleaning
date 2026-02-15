<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ App\Models\Setting::get('site_description', 'PureDropCleaning - Professional building cleaning services. We provide top-quality home, kitchen, bathroom, and office cleaning solutions.') }}">
    <meta name="keywords" content="cleaning services, home cleaning, office cleaning, professional cleaners">
    
    <title>@yield('title', \App\Models\Setting::get('brand_name', 'PureDropCleaning') . ' - ' . \App\Models\Setting::get('meta_title_suffix', 'Professional Cleaning Services'))</title>
    
    <!-- Favicon -->
    @if(\App\Models\Setting::get('brand_favicon'))
        <link rel="icon" type="image/png" href="{{ asset(\App\Models\Setting::get('brand_favicon')) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @endif
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Heroicons (for icons) -->
    <script src="https://unpkg.com/@heroicons/vue@2.0.18/dist/index.min.js" defer></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="bg-light min-h-screen flex flex-col">
    <!-- Header -->
    @include('components.header')
    
    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('components.footer')
    
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
</body>
</html>
