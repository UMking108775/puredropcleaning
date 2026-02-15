@extends('layouts.admin')

@section('title', 'Brand Settings')
@section('page-title', 'Brand Customization')

@section('content')
@section('content')
<div>
    <div class="mb-4">
        <p class="text-gray text-sm">Customize your website's branding, contact information, and social media links.</p>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.settings.brand.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
            <!-- Brand Identity -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 h-fit">
                <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Brand Identity
                </h3>
                <div class="space-y-4">
                    <div>
                        <label for="brand_name" class="block text-sm font-medium text-dark mb-1">Brand Name</label>
                        <input type="text" id="brand_name" name="brand_name" value="{{ $data['brand_name'] }}" required
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1">Logo</label>
                            <div class="flex items-center gap-3">
                                <div class="w-14 h-14 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-center p-2 flex-shrink-0">
                                    @if($data['brand_logo'] && $data['brand_logo'] !== 'logo.png')
                                        <img src="{{ asset($data['brand_logo']) }}" class="max-h-full max-w-full">
                                    @else
                                        <img src="{{ asset('logo.png') }}" class="max-h-full max-w-full">
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <input type="file" name="brand_logo" class="block w-full text-xs text-gray file:mr-2 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                    <p class="mt-1 text-[10px] text-gray truncate">PNG/SVG, min 200px</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark mb-1">Favicon</label>
                            <div class="flex items-center gap-3">
                                <div class="w-14 h-14 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-center p-2 flex-shrink-0">
                                    @if($data['brand_favicon'])
                                        <img src="{{ asset($data['brand_favicon']) }}" class="max-h-full max-w-full">
                                    @else
                                        <div class="text-xs text-gray-400">None</div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <input type="file" name="brand_favicon" class="block w-full text-xs text-gray file:mr-2 file:py-1.5 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="meta_title_suffix" class="block text-sm font-medium text-dark mb-1">Meta Title Suffix</label>
                        <input type="text" id="meta_title_suffix" name="meta_title_suffix" value="{{ $data['meta_title_suffix'] }}"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm"
                            placeholder="e.g. - Professional Cleaning Services">
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 h-fit">
                <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Contact Details
                </h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="brand_email" class="block text-sm font-medium text-dark mb-1">Email Address</label>
                            <input type="email" id="brand_email" name="brand_email" value="{{ $data['brand_email'] }}"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                        </div>
                        <div>
                            <label for="brand_phone" class="block text-sm font-medium text-dark mb-1">Phone Number</label>
                            <input type="text" id="brand_phone" name="brand_phone" value="{{ $data['brand_phone'] }}"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                        </div>
                    </div>
                    <div>
                        <label for="brand_hours" class="block text-sm font-medium text-dark mb-1">Working Hours</label>
                        <input type="text" id="brand_hours" name="brand_hours" value="{{ $data['brand_hours'] }}"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                    </div>
                    <div>
                        <label for="brand_address" class="block text-sm font-medium text-dark mb-1">Physical Address</label>
                        <textarea id="brand_address" name="brand_address" rows="3"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm resize-none">{{ $data['brand_address'] }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 xl:col-span-2">
            <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-sky" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                </svg>
                Social Media Links
            </h3>
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label for="social_facebook" class="block text-sm font-medium text-dark mb-1">Facebook URL</label>
                    <input type="text" id="social_facebook" name="social_facebook" value="{{ $data['social_facebook'] }}"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm" placeholder="https://facebook.com/...">
                </div>
                <div>
                    <label for="social_instagram" class="block text-sm font-medium text-dark mb-1">Instagram URL</label>
                    <input type="text" id="social_instagram" name="social_instagram" value="{{ $data['social_instagram'] }}"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm" placeholder="https://instagram.com/...">
                </div>
                <div>
                    <label for="social_tiktok" class="block text-sm font-medium text-dark mb-1">TikTok URL</label>
                    <input type="text" id="social_tiktok" name="social_tiktok" value="{{ $data['social_tiktok'] }}"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm" placeholder="https://tiktok.com/...">
                </div>
                <div>
                    <label for="social_whatsapp" class="block text-sm font-medium text-dark mb-1">WhatsApp Link</label>
                    <input type="text" id="social_whatsapp" name="social_whatsapp" value="{{ $data['social_whatsapp'] }}"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm" placeholder="https://wa.me/...">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
