@extends('layouts.admin')

@section('title', isset($page) ? 'Edit Page' : 'Create Page')
@section('page-title', isset($page) ? 'Edit Page' : 'Create New Page')

@php
// Handle template presets
$template = request('template');
$presets = [
    'privacy' => [
        'title' => 'Privacy Policy',
        'slug' => 'privacy-policy',
        'meta_description' => 'Privacy Policy for PureDropCleaning - Learn how we collect, use, and protect your personal information.',
        'content' => '<h2>Privacy Policy</h2>
<p>Last updated: ' . date('F d, Y') . '</p>

<h3>1. Information We Collect</h3>
<p>We collect information you provide directly to us, such as when you request a quote, contact us, or communicate with us. This may include:</p>
<ul>
<li>Name and contact information (email, phone number, address)</li>
<li>Service preferences and requirements</li>
<li>Payment information</li>
<li>Any other information you choose to provide</li>
</ul>

<h3>2. How We Use Your Information</h3>
<p>We use the information we collect to:</p>
<ul>
<li>Provide, maintain, and improve our cleaning services</li>
<li>Process transactions and send related information</li>
<li>Send you technical notices and support messages</li>
<li>Respond to your comments and questions</li>
<li>Communicate with you about services, offers, and events</li>
</ul>

<h3>3. Information Sharing</h3>
<p>We do not sell, trade, or rent your personal information to third parties. We may share your information only in the following circumstances:</p>
<ul>
<li>With your consent</li>
<li>To comply with legal obligations</li>
<li>To protect our rights and safety</li>
</ul>

<h3>4. Data Security</h3>
<p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>

<h3>5. Contact Us</h3>
<p>If you have any questions about this Privacy Policy, please contact us at info.puredropcleaning@gmail.com or call +971 55 101 8837.</p>'
    ],
    'terms' => [
        'title' => 'Terms of Service',
        'slug' => 'terms-of-service',
        'meta_description' => 'Terms of Service for PureDropCleaning - Read our service agreement and policies.',
        'content' => '<h2>Terms of Service</h2>
<p>Last updated: ' . date('F d, Y') . '</p>

<h3>1. Services</h3>
<p>PureDropCleaning provides professional cleaning services for residential and commercial properties in Dubai, UAE. By booking our services, you agree to these terms.</p>

<h3>2. Booking and Cancellation</h3>
<ul>
<li>Bookings can be made through our website, phone, or WhatsApp</li>
<li>Cancellations must be made at least 24 hours before the scheduled service</li>
<li>Late cancellations may incur a cancellation fee</li>
</ul>

<h3>3. Payment Terms</h3>
<ul>
<li>Payment is due upon completion of service unless otherwise agreed</li>
<li>We accept cash, bank transfer, and major credit cards</li>
<li>Prices are subject to change with notice</li>
</ul>

<h3>4. Service Guarantee</h3>
<p>We strive for 100% customer satisfaction. If you are not satisfied with our service, please contact us within 24 hours and we will address your concerns or re-clean at no additional cost.</p>

<h3>5. Liability</h3>
<p>While we take utmost care during our cleaning services, we are not liable for:</p>
<ul>
<li>Pre-existing damage or wear</li>
<li>Items not disclosed to our team</li>
<li>Damage due to defective materials or surfaces</li>
</ul>

<h3>6. Access and Safety</h3>
<p>Clients must ensure safe access to the premises. Please secure or remove valuable items before our team arrives.</p>

<h3>7. Contact</h3>
<p>For questions about these terms, contact us at info.puredropcleaning@gmail.com or +971 55 101 8837.</p>'
    ],
    'about' => [
        'title' => 'About Us',
        'slug' => 'about-us',
        'meta_description' => 'Learn about PureDropCleaning - Your trusted professional cleaning service in Dubai with 10+ years of experience.',
        'content' => '<h2>About PureDropCleaning</h2>

<h3>Our Story</h3>
<p>Founded in 2014, PureDropCleaning started with a simple mission: to provide exceptional cleaning services that transform spaces and exceed expectations. What began as a small family operation has grown into a trusted cleaning company serving thousands of homes and businesses across Dubai.</p>

<h3>Our Mission</h3>
<p>We believe everyone deserves a clean, healthy living and working environment. Our commitment to quality, eco-friendly practices, and customer satisfaction has been the cornerstone of our success.</p>

<h3>Why Choose Us?</h3>
<ul>
<li><strong>Experienced Team:</strong> 15+ professionally trained cleaners</li>
<li><strong>Eco-Friendly:</strong> We use environmentally safe products</li>
<li><strong>Reliable Service:</strong> 10+ years serving Dubai</li>
<li><strong>Customer Satisfaction:</strong> 98% satisfaction rate</li>
<li><strong>Flexible Scheduling:</strong> We work around your schedule</li>
</ul>

<h3>Our Values</h3>
<ul>
<li><strong>Quality First:</strong> We never compromise on the quality of our work</li>
<li><strong>Integrity:</strong> Honest, transparent service you can trust</li>
<li><strong>Sustainability:</strong> Caring for the environment while cleaning</li>
<li><strong>Customer Focus:</strong> Your needs come first</li>
</ul>

<h3>Contact Us</h3>
<p>Ready to experience the PureDropCleaning difference?</p>
<ul>
<li>Phone: +971 55 101 8837</li>
<li>Email: info.puredropcleaning@gmail.com</li>
<li>Location: Al Jafiliya, Dubai, UAE</li>
</ul>'
    ]
];

$preset = isset($presets[$template]) ? $presets[$template] : null;
@endphp

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.pages.index') }}" class="text-gray hover:text-primary inline-flex items-center transition-colors">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Pages
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <form action="{{ isset($page) ? route('admin.pages.update', $page) : route('admin.pages.store') }}" method="POST">
            @csrf
            @if(isset($page))
                @method('PUT')
            @endif

            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-dark mb-2">Page Title *</label>
                    <input type="text" id="title" name="title" required
                        value="{{ old('title', $page->title ?? ($preset['title'] ?? '')) }}"
                        class="w-full px-4 py-3 border border-gray-light rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                        placeholder="e.g., Privacy Policy">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-dark mb-2">URL Slug *</label>
                    <div class="flex items-center">
                        <span class="text-gray text-sm mr-2">{{ url('/page') }}/</span>
                        <input type="text" id="slug" name="slug" required
                            value="{{ old('slug', $page->slug ?? ($preset['slug'] ?? '')) }}"
                            class="flex-1 px-4 py-3 border border-gray-light rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                            placeholder="privacy-policy">
                    </div>
                    <p class="mt-1 text-xs text-gray">Use lowercase letters, numbers, and hyphens only</p>
                    @error('slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Description -->
                <div>
                    <label for="meta_description" class="block text-sm font-medium text-dark mb-2">Meta Description</label>
                    <textarea id="meta_description" name="meta_description" rows="2"
                        class="w-full px-4 py-3 border border-gray-light rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none"
                        placeholder="Brief description for search engines...">{{ old('meta_description', $page->meta_description ?? ($preset['meta_description'] ?? '')) }}</textarea>
                    <p class="mt-1 text-xs text-gray">Recommended: 150-160 characters for SEO</p>
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-dark mb-2">Page Content *</label>
                    <div class="border border-gray-light rounded-xl overflow-hidden">
                        <div class="bg-gray-50 px-4 py-2 border-b border-gray-light">
                            <span class="text-xs text-gray">HTML supported. Use headings, paragraphs, and lists.</span>
                        </div>
                        <textarea id="content" name="content" rows="20" required
                            class="w-full px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary transition-colors resize-none font-mono text-sm border-0"
                            placeholder="<h2>Page Title</h2>
<p>Your content here...</p>">{{ old('content', $page->content ?? ($preset['content'] ?? '')) }}</textarea>
                    </div>
                    @error('content')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1"
                        class="w-5 h-5 text-primary border-gray-light rounded focus:ring-primary"
                        {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }}>
                    <label for="is_active" class="ml-3 text-sm text-dark">Page is active and visible to public</label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ isset($page) ? 'Update Page' : 'Create Page' }}
                    </button>
                </div>
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
