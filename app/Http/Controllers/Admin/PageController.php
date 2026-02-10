<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('title')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'meta_description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'is_active' => 'boolean',
            'show_in_header' => 'boolean',
            'show_in_footer' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['show_in_header'] = $request->has('show_in_header');
        $validated['show_in_footer'] = $request->has('show_in_footer');

        Page::create($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page created successfully!');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'meta_description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'is_active' => 'boolean',
            'show_in_header' => 'boolean',
            'show_in_footer' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['show_in_header'] = $request->has('show_in_header');
        $validated['show_in_footer'] = $request->has('show_in_footer');

        $page->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully!');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully!');
    }
}
