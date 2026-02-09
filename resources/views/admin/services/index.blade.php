@extends('layouts.admin')

@section('title', 'Services')
@section('page-title', 'Manage Services')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <p class="text-gray">Manage your cleaning services</p>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Service
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray uppercase tracking-wider">Service</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray uppercase tracking-wider hidden md:table-cell">Description</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray uppercase tracking-wider">Order</th>
                <th class="px-6 py-4 text-right text-xs font-semibold text-gray uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($services as $service)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <img src="{{ $service->image_url }}" alt="{{ $service->title }}" 
                                class="w-12 h-12 rounded-lg object-cover mr-4">
                            <span class="font-medium text-dark">{{ $service->title }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray hidden md:table-cell">
                        {{ Str::limit($service->description, 60) }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($service->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                Inactive
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center text-sm text-gray">
                        {{ $service->sort_order }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.services.edit', $service) }}" 
                                class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this service?')">
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
                        No services found. <a href="{{ route('admin.services.create') }}" class="text-primary hover:underline">Add your first service</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
