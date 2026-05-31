<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::ordered()->get()->groupBy('type');
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.form', [
            'package' => null,
            'types'   => Package::TYPES,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);
        Package::create($validated);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package created successfully!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.form', [
            'package' => $package,
            'types'   => Package::TYPES,
        ]);
    }

    public function update(Request $request, Package $package)
    {
        $validated = $this->validateRequest($request);
        $package->update($validated);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package updated successfully!');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Package deleted successfully!');
    }

    private function validateRequest(Request $request): array
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'type'            => 'required|in:' . implode(',', array_keys(Package::TYPES)),
            'price'           => 'required|numeric|min:0',
            'unit_label'      => 'nullable|string|max:255',
            'schedule_visits' => 'nullable|string|max:255',
            'schedule_hours'  => 'nullable|string|max:255',
            'features'        => 'nullable|string',
            'badge_text'      => 'nullable|string|max:50',
            'sort_order'      => 'integer',
        ]);

        $validated['features'] = !empty($validated['features'])
            ? array_values(array_filter(array_map('trim', explode("\n", $validated['features']))))
            : [];

        $validated['is_highlighted'] = $request->has('is_highlighted');
        $validated['is_active']      = $request->has('is_active');

        return $validated;
    }
}
