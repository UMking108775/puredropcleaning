<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - PureDropCleaning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar { width: 260px; }
        .main-content { margin-left: 260px; }
        @media (max-width: 1024px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body class="bg-gray-50 font-body">
    <!-- Sidebar -->
    <aside class="sidebar fixed top-0 left-0 h-full bg-dark text-white z-40 transition-transform duration-300">
        <div class="p-6 border-b border-white/10">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                <img src="{{ asset('logo.png') }}" alt="PureDropCleaning" class="h-10 w-auto">
            </a>
        </div>
        
        <nav class="p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white' : 'text-gray-300' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
            
            <a href="{{ route('admin.services.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-primary text-white' : 'text-gray-300' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                Services
            </a>

            <a href="{{ route('admin.packages.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.packages.*') ? 'bg-primary text-white' : 'text-gray-300' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                Packages
            </a>
            
            <a href="{{ route('admin.quotes.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.quotes.*') ? 'bg-primary text-white' : 'text-gray-300' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
                Quote Requests
                @php $pendingCount = \App\Models\QuoteRequest::pending()->count(); @endphp
                @if($pendingCount > 0)
                    <span class="ml-auto bg-accent text-dark text-xs font-bold px-2 py-1 rounded-full">{{ $pendingCount }}</span>
                @endif
            </a>
            
            <a href="{{ route('admin.pages.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.pages.*') ? 'bg-primary text-white' : 'text-gray-300' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Pages
            </a>
            
            <div class="pt-4 mt-4 border-t border-white/10">
                <p class="px-4 mb-2 text-xs uppercase tracking-wider text-gray-500">Sections</p>
                <a href="{{ route('admin.sections.why-choose-us') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.sections.*') ? 'bg-primary text-white' : 'text-gray-300' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                    </svg>
                    Why Choose Us
                </a>
            </div>

            <div class="pt-4 mt-4 border-t border-white/10">
                <p class="px-4 mb-2 text-xs uppercase tracking-wider text-gray-500">Settings</p>
                <a href="{{ route('admin.settings.brand') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.settings.brand') ? 'bg-primary text-white' : 'text-gray-300' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                    Brand Customization
                </a>
                <a href="{{ route('admin.settings.mailer') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.settings.mailer*') ? 'bg-primary text-white' : 'text-gray-300' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Mailer Settings
                </a>
            </div>
        </nav>
        
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center px-4 py-3 rounded-lg hover:bg-white/10 transition-colors text-gray-300">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View Website
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content min-h-screen">
        <!-- Topbar -->
        <header class="bg-white shadow-sm sticky top-0 z-30">
            <div class="flex items-center justify-between px-6 py-4">
                <button class="lg:hidden text-dark" onclick="document.querySelector('.sidebar').classList.toggle('open')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                
                <h1 class="text-xl font-semibold text-dark">@yield('page-title', 'Dashboard')</h1>
                
                <div class="relative profile-dropdown-container">
                    <button onclick="toggleProfileDropdown()" class="flex items-center space-x-3 text-dark hover:text-primary transition-colors focus:outline-none group">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary/10 to-primary/20 flex items-center justify-center text-primary font-bold text-lg border border-primary/20 shadow-sm group-hover:shadow-md transition-all">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="hidden sm:block text-left">
                            <span class="block font-medium text-sm leading-tight">{{ Auth::user()->name }}</span>
                            <span class="block text-[10px] text-gray-500 leading-tight">Admin</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div id="profile-dropdown" class="hidden absolute right-0 mt-3 w-64 bg-white rounded-xl shadow-xl py-2 border border-gray-100 z-50 transform origin-top-right transition-all">
                        <div class="px-5 py-4 border-b border-gray-50 bg-gray-50/50 rounded-t-xl">
                            <p class="text-sm font-semibold text-dark">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="py-1">
                            <a href="{{ route('admin.profile.edit') }}" class="flex items-center px-5 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary transition-colors">
                                <span class="w-8 h-8 rounded-lg bg-primary/5 text-primary flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </span>
                                My Profile
                            </a>
                        </div>
                        <div class="border-t border-gray-100 my-1"></div>
                        <div class="py-1">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center px-5 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors group">
                                    <span class="w-8 h-8 rounded-lg bg-red-50 text-red-500 flex items-center justify-center mr-3 group-hover:bg-red-100 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                    </span>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    function toggleProfileDropdown() {
                        const dropdown = document.getElementById('profile-dropdown');
                        dropdown.classList.toggle('hidden');
                    }

                    // Close dropdown when clicking outside
                    document.addEventListener('click', function(event) {
                        const container = document.querySelector('.profile-dropdown-container');
                        const dropdown = document.getElementById('profile-dropdown');
                        // Check if click is outside the button and the dropdown
                        if (container && !container.contains(event.target)) {
                             if (dropdown && !dropdown.classList.contains('hidden')) {
                                dropdown.classList.add('hidden');
                             }
                        }
                    });
                </script>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('warning'))
                <div class="mb-6 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg">
                    {{ session('warning') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
