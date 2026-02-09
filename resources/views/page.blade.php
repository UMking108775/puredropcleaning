@extends('layouts.app')

@section('title', $page->title . ' - PureDropCleaning')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-primary to-primary-dark py-10 sm:py-14 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3">{{ $page->title }}</h1>
        @if($page->meta_description)
        <p class="text-sm sm:text-base md:text-lg text-white/80 max-w-2xl mx-auto">{{ $page->meta_description }}</p>
        @endif
        <nav class="mt-4 sm:mt-6">
            <ol class="flex items-center justify-center space-x-2 text-white/60 text-sm">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                <li>/</li>
                <li class="text-accent">{{ $page->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Page Content -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="content-html">
            {!! $page->content !!}
        </div>
    </div>
</section>

<!-- CTA Section -->
@include('partials.cta-section')
@endsection
