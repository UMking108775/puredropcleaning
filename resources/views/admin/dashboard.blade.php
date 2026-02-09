@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray">Total Services</p>
                <p class="text-2xl font-bold text-dark">{{ $stats['total_services'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray">Active Services</p>
                <p class="text-2xl font-bold text-dark">{{ $stats['active_services'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-accent/20 rounded-lg flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray">Pending Quotes</p>
                <p class="text-2xl font-bold text-dark">{{ $stats['pending_quotes'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-sky/20 rounded-lg flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-sky" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray">Total Quotes</p>
                <p class="text-2xl font-bold text-dark">{{ $stats['total_quotes'] }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Quote Requests -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="p-6 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-dark">Recent Quote Requests</h2>
            <a href="{{ route('admin.quotes.index') }}" class="text-sm text-primary hover:text-primary-dark font-medium">View All →</a>
        </div>
    </div>
    
    <div class="divide-y divide-gray-100">
        @forelse($recentQuotes as $quote)
            <div class="p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-dark">{{ $quote->name }}</p>
                        <p class="text-sm text-gray">{{ $quote->email }}</p>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $quote->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $quote->status === 'responded' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $quote->status === 'closed' ? 'bg-gray-100 text-gray-800' : '' }}">
                            {{ ucfirst($quote->status) }}
                        </span>
                        <p class="text-xs text-gray mt-1">{{ $quote->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-8 text-center text-gray">
                No quote requests yet.
            </div>
        @endforelse
    </div>
</div>
@endsection
