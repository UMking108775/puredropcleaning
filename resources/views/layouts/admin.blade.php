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
                
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray">{{ Auth::user()->name }}</span>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-primary hover:text-primary-dark font-medium">
                            Logout
                        </button>
                    </form>
                </div>
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
