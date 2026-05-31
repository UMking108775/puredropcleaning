@extends('layouts.admin')

@section('title', $package ? 'Edit Package' : 'Add Package')
@section('page-title', $package ? 'Edit Package' : 'Add New Package')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.packages.index') }}" class="text-primary hover:text-primary-dark font-medium flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Packages
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ $package ? route('admin.packages.update', $package) : route('admin.packages.store') }}" method="POST" class="space-y-6">
            @csrf
            @if($package)
                @method('PUT')
            @endif

            {{-- Basic Info --}}
            <div class="border-b border-gray-100 pb-6">
                <h3 class="text-lg font-semibold text-dark mb-4">Basic Information</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-dark mb-2">Package Name *</label>
                        <input type="text" id="name" name="name" required
                            value="{{ old('name', $package?->name) }}"
                            placeholder="e.g., Without Materials"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                        @error('name')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-dark mb-2">Package Type *</label>
                        <select id="type" name="type" required onchange="toggleScheduleFields()"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors bg-white">
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" {{ old('type', $package?->type ?? 'hourly') === $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-gray">Hourly, Weekly or Monthly — changes how this package displays on the site.</p>
                        @error('type')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-dark mb-2">Price (AED) *</label>
                        <input type="number" step="0.01" min="0" id="price" name="price" required
                            value="{{ old('price', $package?->price) }}"
                            placeholder="30.00"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                        @error('price')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="unit_label" class="block text-sm font-medium text-dark mb-2">Unit Label</label>
                        <input type="text" id="unit_label" name="unit_label"
                            value="{{ old('unit_label', $package?->unit_label) }}"
                            placeholder="e.g. per hour, per session / cleaner, per month / cleaner"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                        <p class="mt-1 text-xs text-gray">Shown below the price (e.g. "per hour").</p>
                    </div>
                </div>
            </div>

            {{-- Schedule --}}
            <div class="border-b border-gray-100 pb-6" id="schedule-section">
                <h3 class="text-lg font-semibold text-dark mb-1">Schedule</h3>
                <p class="text-xs text-gray mb-4">For weekly/monthly packages. Leave blank for hourly.</p>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="schedule_visits" class="block text-sm font-medium text-dark mb-2">Visits / Days</label>
                        <input type="text" id="schedule_visits" name="schedule_visits"
                            value="{{ old('schedule_visits', $package?->schedule_visits) }}"
                            placeholder="e.g. 3 visits per week"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                    </div>
                    <div>
                        <label for="schedule_hours" class="block text-sm font-medium text-dark mb-2">Duration</label>
                        <input type="text" id="schedule_hours" name="schedule_hours"
                            value="{{ old('schedule_hours', $package?->schedule_hours) }}"
                            placeholder="e.g. 3 hours each visit"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                    </div>
                </div>
            </div>

            {{-- Features --}}
            <div class="border-b border-gray-100 pb-6">
                <h3 class="text-lg font-semibold text-dark mb-4">Features</h3>
                <div>
                    <label for="features" class="block text-sm font-medium text-dark mb-2">Package Features <span class="text-gray font-normal">(one per line)</span></label>
                    <textarea id="features" name="features" rows="5"
                        placeholder="Professional trained cleaner&#10;Flexible hourly booking&#10;You provide cleaning supplies"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">{{ old('features', $package ? implode("\n", $package->features ?? []) : '') }}</textarea>
                    <p class="mt-1 text-sm text-gray">Enter each feature on a new line. These appear as bullet points on the package card.</p>
                </div>
            </div>

            {{-- Display Settings --}}
            <div>
                <h3 class="text-lg font-semibold text-dark mb-4">Display Settings</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="badge_text" class="block text-sm font-medium text-dark mb-2">Badge Text</label>
                        <input type="text" id="badge_text" name="badge_text" maxlength="50"
                            value="{{ old('badge_text', $package?->badge_text) }}"
                            placeholder="e.g. Popular, Recommended, Best Value"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                        <p class="mt-1 text-xs text-gray">Small label shown on the card (only when highlighted).</p>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-dark mb-2">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order"
                            value="{{ old('sort_order', $package?->sort_order ?? 0) }}"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                        <p class="mt-1 text-xs text-gray">Lower numbers appear first within the same type.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6 mt-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_highlighted" value="1"
                            {{ old('is_highlighted', $package?->is_highlighted ?? false) ? 'checked' : '' }}
                            class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary">
                        <span class="ml-3 text-sm font-medium text-dark">Highlighted (featured card style)</span>
                    </label>

                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', $package?->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary">
                        <span class="ml-3 text-sm font-medium text-dark">Active (visible on website)</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.packages.index') }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    {{ $package ? 'Update Package' : 'Create Package' }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleScheduleFields() {
        const type = document.getElementById('type').value;
        const section = document.getElementById('schedule-section');
        // Show muted styling for hourly (schedule fields not really used), but still allow input.
        section.style.opacity = type === 'hourly' ? '0.5' : '1';
    }
    toggleScheduleFields();
</script>
@endsection
