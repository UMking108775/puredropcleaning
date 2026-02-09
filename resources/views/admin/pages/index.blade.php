@extends('layouts.admin')

@section('title', 'Manage Pages')
@section('page-title', 'Manage Pages')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <p class="text-gray">Manage static pages like Privacy Policy, Terms of Service, and About Us.</p>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary whitespace-nowrap">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add New Page
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray uppercase tracking-wider">Page Title</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray uppercase tracking-wider">Last Updated</th>
                    <th class="px-6 py-4 text-right text-xs font-semibold text-gray uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($pages as $page)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-medium text-dark">{{ $page->title }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <code class="text-xs bg-gray-100 px-2 py-1 rounded">{{ $page->slug }}</code>
                    </td>
                    <td class="px-6 py-4">
                        @if($page->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                Inactive
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray">
                        {{ $page->updated_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="/page/{{ $page->slug }}" target="_blank" class="p-2 text-gray hover:text-sky transition-colors" title="View Page">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            <a href="{{ route('admin.pages.edit', $page) }}" class="p-2 text-gray hover:text-primary transition-colors" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this page?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-gray hover:text-red-500 transition-colors" title="Delete">
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
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="mb-4">No pages yet. Create your first page!</p>
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Add New Page</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Add Templates -->
<div class="mt-8">
    <h3 class="text-lg font-semibold text-dark mb-4">Quick Templates</h3>
    <div class="grid md:grid-cols-3 gap-4">
        @if(!$pages->contains('slug', 'privacy-policy'))
        <a href="{{ route('admin.pages.create') }}?template=privacy" class="card p-4 hover:shadow-lg transition-shadow group">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div>
                    <div class="font-medium text-dark group-hover:text-primary transition-colors">Privacy Policy</div>
                    <div class="text-xs text-gray">Create from template</div>
                </div>
            </div>
        </a>
        @endif
        
        @if(!$pages->contains('slug', 'terms-of-service'))
        <a href="{{ route('admin.pages.create') }}?template=terms" class="card p-4 hover:shadow-lg transition-shadow group">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <div class="font-medium text-dark group-hover:text-primary transition-colors">Terms of Service</div>
                    <div class="text-xs text-gray">Create from template</div>
                </div>
            </div>
        </a>
        @endif
        
        @if(!$pages->contains('slug', 'about-us'))
        <a href="{{ route('admin.pages.create') }}?template=about" class="card p-4 hover:shadow-lg transition-shadow group">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-sky/10 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-sky" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <div class="font-medium text-dark group-hover:text-primary transition-colors">About Us</div>
                    <div class="text-xs text-gray">Create from template</div>
                </div>
            </div>
        </a>
        @endif
    </div>
</div>
@endsection
