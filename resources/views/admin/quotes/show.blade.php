@extends('layouts.admin')

@section('title', 'View Quote Request')
@section('page-title', 'Quote Request Details')

@section('content')
<div class="max-w-3xl">
    <div class="mb-6">
        <a href="{{ route('admin.quotes.index') }}" class="text-primary hover:text-primary-dark font-medium flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Quote Requests
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8 mb-6">
        <div class="flex items-start justify-between mb-6">
            <div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mb-2
                    {{ $quote->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    {{ $quote->status === 'responded' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $quote->status === 'closed' ? 'bg-gray-100 text-gray-800' : '' }}">
                    {{ ucfirst($quote->status) }}
                </span>
                <h3 class="text-xl font-bold text-dark">{{ $quote->name }}</h3>
                <p class="text-gray">{{ $quote->created_at->format('F d, Y - h:i A') }}</p>
            </div>
            
            @if($quote->status !== 'closed')
                <form action="{{ route('admin.quotes.close', $quote) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="text-sm text-gray hover:text-dark">Close Request</button>
                </form>
            @endif
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-6 pb-6 border-b border-gray-100">
            <div>
                <p class="text-sm font-medium text-gray mb-1">Email</p>
                <a href="mailto:{{ $quote->email }}" class="text-primary hover:underline">{{ $quote->email }}</a>
            </div>
            <div>
                <p class="text-sm font-medium text-gray mb-1">Phone</p>
                @if($quote->phone)
                    <a href="tel:{{ $quote->phone }}" class="text-primary hover:underline">{{ $quote->phone }}</a>
                @else
                    <span class="text-gray">Not provided</span>
                @endif
            </div>
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray mb-1">Requested Service</p>
                <p class="text-dark">{{ $quote->service?->title ?? 'General Inquiry' }}</p>
            </div>
        </div>

        <div class="mb-6 pb-6 border-b border-gray-100">
            <p class="text-sm font-medium text-gray mb-2">Customer Message</p>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-dark whitespace-pre-wrap">{{ $quote->message }}</p>
            </div>
        </div>

        @if($quote->admin_response)
            <div class="mb-6">
                <p class="text-sm font-medium text-gray mb-2">Your Response</p>
                <div class="bg-green-50 rounded-lg p-4 border border-green-200">
                    <p class="text-dark whitespace-pre-wrap">{{ $quote->admin_response }}</p>
                    <p class="text-sm text-gray mt-2">Sent on {{ $quote->responded_at?->format('F d, Y - h:i A') }}</p>
                </div>
            </div>
        @endif

        @if($quote->status === 'pending')
            <div>
                <p class="text-sm font-medium text-dark mb-2">Send Response</p>
                <form action="{{ route('admin.quotes.respond', $quote) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <textarea name="admin_response" rows="5" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                            placeholder="Type your response to the customer...">{{ old('admin_response') }}</textarea>
                        @error('admin_response')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray">This response will be emailed to {{ $quote->email }}</p>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Send Response
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection
