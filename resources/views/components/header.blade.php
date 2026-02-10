<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-50 transition-all duration-300" id="main-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <img src="{{ asset('logo.png') }}" alt="PureDropCleaning" class="h-14 w-auto transition-transform duration-300 group-hover:scale-105">
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}" 
                   class="px-4 py-2 text-gray-dark font-medium rounded-lg transition-all duration-300 hover:text-primary hover:bg-primary/5 {{ request()->routeIs('home') ? 'text-primary bg-primary/5' : '' }}">
                    Home
                </a>
                <a href="{{ route('services') }}" 
                   class="px-4 py-2 text-gray-dark font-medium rounded-lg transition-all duration-300 hover:text-primary hover:bg-primary/5 {{ request()->routeIs('services') ? 'text-primary bg-primary/5' : '' }}">
                    Services
                </a>
                <a href="{{ route('about') }}" 
                   class="px-4 py-2 text-gray-dark font-medium rounded-lg transition-all duration-300 hover:text-primary hover:bg-primary/5 {{ request()->routeIs('about') ? 'text-primary bg-primary/5' : '' }}">
                    About Us
                </a>
                <a href="{{ route('contact') }}" 
                   class="px-4 py-2 text-gray-dark font-medium rounded-lg transition-all duration-300 hover:text-primary hover:bg-primary/5 {{ request()->routeIs('contact') ? 'text-primary bg-primary/5' : '' }}">
                    Contact
                </a>
                @if(isset($headerPages) && $headerPages->count() > 0)
                    @foreach($headerPages as $headerPage)
                    <a href="{{ route('page.show', $headerPage->slug) }}" 
                       class="px-4 py-2 text-gray-dark font-medium rounded-lg transition-all duration-300 hover:text-primary hover:bg-primary/5 {{ request()->is('page/' . $headerPage->slug) ? 'text-primary bg-primary/5' : '' }}">
                        {{ $headerPage->title }}
                    </a>
                    @endforeach
                @endif
            </nav>
            
            <!-- CTA Button (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="tel:+971551018837" class="flex items-center text-gray-dark hover:text-primary transition-colors">
                    <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="font-semibold">+971 55 101 8837</span>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    Get a Quote
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-dark hover:bg-gray-100 transition-colors" aria-label="Open menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-black/50 z-50 hidden transition-opacity duration-300"></div>

<!-- Mobile Menu Drawer -->
<div id="mobile-menu" class="fixed top-0 right-0 w-80 max-w-full h-full bg-white z-50 transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl">
    <div class="flex flex-col h-full">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <img src="{{ asset('logo.png') }}" alt="PureDropCleaning" class="h-10 w-auto">
            <button id="mobile-menu-close" class="p-2 rounded-lg text-gray-dark hover:bg-gray-100 transition-colors" aria-label="Close menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('home') ? 'bg-primary/5 text-primary' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Home
            </a>
            <a href="{{ route('services') }}" class="flex items-center px-4 py-3 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('services') ? 'bg-primary/5 text-primary' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                Services
            </a>
            <a href="{{ route('about') }}" class="flex items-center px-4 py-3 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('about') ? 'bg-primary/5 text-primary' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                About Us
            </a>
            <a href="{{ route('contact') }}" class="flex items-center px-4 py-3 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->routeIs('contact') ? 'bg-primary/5 text-primary' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Contact
            </a>
            @if(isset($headerPages) && $headerPages->count() > 0)
                @foreach($headerPages as $headerPage)
                <a href="{{ route('page.show', $headerPage->slug) }}" class="flex items-center px-4 py-3 text-gray-dark font-medium rounded-lg hover:bg-primary/5 hover:text-primary transition-all {{ request()->is('page/' . $headerPage->slug) ? 'bg-primary/5 text-primary' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    {{ $headerPage->title }}
                </a>
                @endforeach
            @endif
        </nav>
        
        <!-- Contact Info -->
        <div class="p-4 border-t bg-light">
            <a href="tel:+971551018837" class="flex items-center text-primary font-semibold mb-3">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                +971 55 101 8837
            </a>
            <a href="{{ route('contact') }}" class="btn btn-primary w-full">
                Get a Quote
            </a>
        </div>
    </div>
</div>
