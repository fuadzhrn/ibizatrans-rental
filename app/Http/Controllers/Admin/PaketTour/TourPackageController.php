<?php

namespace App\Http\Controllers\Admin\PaketTour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\TourPackage;

class TourPackageController extends Controller
{
    public function index()
    {
        $packages = TourPackage::orderBy('sort_order')->orderByDesc('created_at')->paginate(15);
        return view('admin.paket-tour.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.paket-tour.packages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:tour_packages,slug',
            'badge' => 'nullable|string|max:100',
            'destination_summary' => 'nullable|string|max:500',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'highlight' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'starting_price' => 'nullable|integer|min:0',
            'duration_label' => 'nullable|string|max:100',
            'whatsapp_text' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|in:0,1',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tour-packages', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $package = TourPackage::create($data);

        return redirect()->route('admin.paket-tour.packages.index')->with('success', 'Package created');
    }

    public function edit(TourPackage $package)
    {
        $package->load(['destinations','prices','facilities','itineraries']);
        return view('admin.paket-tour.packages.edit', ['package' => $package]);
    }

    public function update(Request $request, TourPackage $package)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:tour_packages,slug,' . $package->id,
            'badge' => 'nullable|string|max:100',
            'destination_summary' => 'nullable|string|max:500',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'highlight' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'starting_price' => 'nullable|integer|min:0',
            'duration_label' => 'nullable|string|max:100',
            'whatsapp_text' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|in:0,1',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        if ($request->hasFile('image')) {
            // delete old
            if ($package->image && Storage::disk('public')->exists($package->image)) {
                Storage::disk('public')->delete($package->image);
            }
            $path = $request->file('image')->store('tour-packages', 'public');
            $data['image'] = $path;
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $package->update($data);

        return redirect()->route('admin.paket-tour.packages.edit', $package->id)->with('success', 'Package updated');
    }

    public function destroy(TourPackage $package)
    {
        if ($package->image && Storage::disk('public')->exists($package->image)) {
            Storage::disk('public')->delete($package->image);
        }

        $package->delete();

        return redirect()->route('admin.paket-tour.packages.index')->with('success', 'Package deleted');
    }

    public function toggleStatus(TourPackage $package)
    {
        $package->is_active = !$package->is_active;
        $package->save();
        return back()->with('success', 'Status updated');
    }
}
