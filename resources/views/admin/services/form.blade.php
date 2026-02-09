@extends('layouts.admin')

@section('title', $service ? 'Edit Service' : 'Add Service')
@section('page-title', $service ? 'Edit Service' : 'Add New Service')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}" class="text-primary hover:text-primary-dark font-medium flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Services
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ $service ? route('admin.services.update', $service) : route('admin.services.store') }}" 
              method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if($service)
                @method('PUT')
            @endif

            <!-- Basic Info Section -->
            <div class="border-b border-gray-100 pb-6">
                <h3 class="text-lg font-semibold text-dark mb-4">Basic Information</h3>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-dark mb-2">Service Title *</label>
                        <input type="text" id="title" name="title" required
                            value="{{ old('title', $service?->title) }}"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                            placeholder="e.g., Full Home Cleaning">
                        @error('title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-dark mb-2">URL Slug</label>
                        <div class="flex items-center">
                            <span class="text-gray text-sm mr-2">/service/</span>
                            <input type="text" id="slug" name="slug"
                                value="{{ old('slug', $service?->slug) }}"
                                class="flex-1 px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                                placeholder="auto-generated-from-title">
                        </div>
                        <p class="mt-1 text-xs text-gray">Leave empty to auto-generate from title</p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-dark mb-2">Short Description * <span class="text-gray font-normal">(shown in cards)</span></label>
                    <textarea id="description" name="description" rows="3" required
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="Brief description of the service (2-3 sentences)...">{{ old('description', $service?->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="meta_description" class="block text-sm font-medium text-dark mb-2">Meta Description <span class="text-gray font-normal">(for SEO)</span></label>
                    <textarea id="meta_description" name="meta_description" rows="2"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="SEO description for search engines (150-160 characters)...">{{ old('meta_description', $service?->meta_description) }}</textarea>
                </div>
            </div>

            <!-- Features Section -->
            <div class="border-b border-gray-100 pb-6">
                <h3 class="text-lg font-semibold text-dark mb-4">Features</h3>
                
                <div>
                    <label for="features" class="block text-sm font-medium text-dark mb-2">Service Features <span class="text-gray font-normal">(one per line)</span></label>
                    <textarea id="features" name="features" rows="5"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="Living room cleaning&#10;Kitchen cleaning&#10;Bathroom cleaning&#10;Bedroom cleaning">{{ old('features', $service ? implode("\n", $service->features ?? []) : '') }}</textarea>
                    <p class="mt-1 text-sm text-gray">Enter each feature on a new line. These show as bullet points.</p>
                    @error('features')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Full Content Section -->
            <div class="border-b border-gray-100 pb-6">
                <h3 class="text-lg font-semibold text-dark mb-4">Full Content <span class="text-gray font-normal text-sm">(shown on service detail page)</span></h3>
                
                <div>
                    <label for="full_content" class="block text-sm font-medium text-dark mb-2">Detailed Description</label>
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-gray-50 px-4 py-2 border-b border-gray-200">
                            <span class="text-xs text-gray">HTML supported. Use headings, paragraphs, lists, etc.</span>
                        </div>
                        <textarea id="full_content" name="full_content" rows="12"
                            class="w-full px-4 py-3 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors border-0 font-mono text-sm"
                            placeholder="<h3>What's Included</h3>
<p>Our full home cleaning service covers...</p>

<h3>The Process</h3>
<p>Our trained professionals will...</p>

<h3>Why Choose This Service</h3>
<ul>
<li>Thorough cleaning of all rooms</li>
<li>Eco-friendly products</li>
<li>Trained professionals</li>
</ul>">{{ old('full_content', $service?->full_content) }}</textarea>
                    </div>
                    <p class="mt-1 text-sm text-gray">Leave empty to show only features on detail page</p>
                </div>
            </div>

            <!-- Image Section -->
            <div class="border-b border-gray-100 pb-6">
                <h3 class="text-lg font-semibold text-dark mb-4">Service Image</h3>
                
                <div>
                    @if($service && $service->image)
                        <div class="mb-4">
                            <p class="text-sm text-gray mb-2">Current Image:</p>
                            <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="w-40 h-40 rounded-lg object-cover">
                        </div>
                    @endif
                    <label for="image" class="block text-sm font-medium text-dark mb-2">{{ $service && $service->image ? 'Replace Image' : 'Upload Image' }}</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                    <p class="mt-1 text-sm text-gray">PNG, JPG, WEBP up to 2MB. Recommended: 800x600 pixels</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Settings Section -->
            <div>
                <h3 class="text-lg font-semibold text-dark mb-4">Settings</h3>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-dark mb-2">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order"
                            value="{{ old('sort_order', $service?->sort_order ?? 0) }}"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                        <p class="mt-1 text-xs text-gray">Lower numbers appear first</p>
                    </div>

                    <div class="flex items-center">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" 
                                {{ old('is_active', $service?->is_active ?? true) ? 'checked' : '' }}
                                class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary">
                            <span class="ml-3 text-sm font-medium text-dark">Active (visible on website)</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    {{ $service ? 'Update Service' : 'Create Service' }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function() {
    const slugField = document.getElementById('slug');
    if (!slugField.value || slugField.dataset.autoGenerated === 'true') {
        slugField.value = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        slugField.dataset.autoGenerated = 'true';
    }
});

document.getElementById('slug').addEventListener('input', function() {
    this.dataset.autoGenerated = 'false';
});
</script>
@endsection
