@extends('layouts.admin')

@section('title', 'Packages')
@section('page-title', 'Manage Packages')

@section('content')
<div class="mb-6 flex items-center justify-between flex-wrap gap-3">
    <p class="text-gray">Manage your pricing packages — hourly, weekly &amp; monthly.</p>
    <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Package
    </a>
</div>

@php
    $typeBadgeColors = [
        'hourly'  => 'bg-blue-100 text-blue-700',
        'weekly'  => 'bg-amber-100 text-amber-700',
        'monthly' => 'bg-emerald-100 text-emerald-700',
    ];
@endphp

@forelse(\App\Models\Package::TYPES as $typeKey => $typeLabel)
    @php $items = $packages[$typeKey] ?? collect(); @endphp
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-3">
            <h3 class="text-base font-semibold text-dark">{{ $typeLabel }} Packages</h3>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $typeBadgeColors[$typeKey] ?? 'bg-gray-100 text-gray-700' }}">
                {{ $items->count() }} {{ Str::plural('package', $items->count()) }}
            </span>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray uppercase tracking-wider hidden md:table-cell">Schedule</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray uppercase tracking-wider">Highlighted</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($items as $package)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-medium text-dark">{{ $package->name }}</div>
                                @if($package->badge_text)
                                    <span class="inline-block mt-1 px-2 py-0.5 bg-accent/20 text-dark text-[10px] font-bold rounded-full uppercase">{{ $package->badge_text }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray hidden md:table-cell">
                                @if($package->schedule_visits || $package->schedule_hours)
                                    {{ $package->schedule_visits }}@if($package->schedule_visits && $package->schedule_hours) · @endif{{ $package->schedule_hours }}
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-semibold text-dark">AED {{ number_format($package->price, $package->price == floor($package->price) ? 0 : 2) }}</span>
                                @if($package->unit_label)
                                    <div class="text-[11px] text-gray">{{ $package->unit_label }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($package->is_highlighted)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-accent/20 text-dark">Featured</span>
                                @else
                                    <span class="text-gray-400 text-xs">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($package->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray">{{ $package->sort_order }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.packages.edit', $package) }}" class="p-2 text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" onsubmit="return confirm('Delete this package?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
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
                            <td colspan="7" class="px-6 py-8 text-center text-gray text-sm">
                                No {{ strtolower($typeLabel) }} packages yet.
                                <a href="{{ route('admin.packages.create') }}" class="text-primary hover:underline">Add one</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@empty
@endforelse
@endsection
