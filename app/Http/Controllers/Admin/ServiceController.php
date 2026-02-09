<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => null]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'description' => 'required|string',
            'meta_description' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'full_content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Make slug unique
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Service::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count;
            $count++;
        }

        // Handle features - convert from textarea to array
        if (!empty($validated['features'])) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $validated['features'])));
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('services images'), $filename);
            $validated['image'] = $filename;
        }

        $validated['is_active'] = $request->has('is_active');

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'required|string',
            'meta_description' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'full_content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Make slug unique (excluding current service)
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Service::where('slug', $validated['slug'])->where('id', '!=', $service->id)->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count;
            $count++;
        }

        // Handle features
        if (!empty($validated['features'])) {
            $validated['features'] = array_filter(array_map('trim', explode("\n", $validated['features'])));
        } else {
            $validated['features'] = [];
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && file_exists(public_path('services images/' . $service->image))) {
                unlink(public_path('services images/' . $service->image));
            }
            
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('services images'), $filename);
            $validated['image'] = $filename;
        }

        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image && file_exists(public_path('services images/' . $service->image))) {
            unlink(public_path('services images/' . $service->image));
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully!');
    }
}
