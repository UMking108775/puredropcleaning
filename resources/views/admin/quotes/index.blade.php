@extends('layouts.admin')

@section('title', 'Quote Requests')
@section('page-title', 'Quote Requests')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
    <p class="text-gray">Manage customer quote requests</p>
    
    <div class="flex items-center space-x-2">
        <a href="{{ route('admin.quotes.index') }}" 
            class="px-4 py-2 rounded-lg text-sm font-medium {{ !request('status') ? 'bg-primary text-white' : 'bg-gray-100 text-gray hover:bg-gray-200' }} transition-colors">
            All
        </a>
        <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" 
            class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') === 'pending' ? 'bg-primary text-white' : 'bg-gray-100 text-gray hover:bg-gray-200' }} transition-colors">
            Pending
        </a>
        <a href="{{ route('admin.quotes.index', ['status' => 'responded']) }}" 
            class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') === 'responded' ? 'bg-primary text-white' : 'bg-gray-100 text-gray hover:bg-gray-200' }} transition-colors">
            Responded
        </a>
        <a href="{{ route('admin.quotes.index', ['status' => 'closed']) }}" 
            class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') === 'closed' ? 'bg-primary text-white' : 'bg-gray-100 text-gray hover:bg-gray-200' }} transition-colors">
            Closed
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray uppercase tracking-wider">Customer</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray uppercase tracking-wider hidden md:table-cell">Service</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray uppercase tracking-wider hidden sm:table-cell">Date</th>
                <th class="px-6 py-4 text-right text-xs font-semibold text-gray uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($quotes as $quote)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div>
                            <p class="font-medium text-dark">{{ $quote->name }}</p>
                            <p class="text-sm text-gray">{{ $quote->email }}</p>
                            @if($quote->phone)
                                <p class="text-sm text-gray">{{ $quote->phone }}</p>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray hidden md:table-cell">
                        {{ $quote->service?->title ?? 'General Inquiry' }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $quote->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $quote->status === 'responded' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $quote->status === 'closed' ? 'bg-gray-100 text-gray-800' : '' }}">
                            {{ ucfirst($quote->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center text-sm text-gray hidden sm:table-cell">
                        {{ $quote->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.quotes.show', $quote) }}" 
                                class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this quote request?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray">
                        No quote requests found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($quotes->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $quotes->links() }}
        </div>
    @endif
</div>
@endsection
