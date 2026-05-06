<?php

namespace App\Http\Controllers\Admin\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RentalCarController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::query()
            ->cars()
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.layanan.rental-mobil.index', compact('vehicles'));
    }

    public function create()
    {
        return view('admin.layanan.rental-mobil.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'description' => 'nullable|string',
            'seats' => 'nullable|integer|min:1|max:60',
            'transmission' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vehicles/cars', 'public');
        }

        Vehicle::create([
            'vehicle_type' => 'car',
            'name' => $validated['name'],
            'category' => $validated['category'] ?? null,
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'seats' => $validated['seats'] ?? null,
            'transmission' => $validated['transmission'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.layanan.rental-mobil.index')->with('success', 'Data rental mobil berhasil ditambahkan.');
    }

    public function edit(Vehicle $vehicle)
    {
        $this->ensureCar($vehicle);

        return view('admin.layanan.rental-mobil.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $this->ensureCar($vehicle);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'description' => 'nullable|string',
            'seats' => 'nullable|integer|min:1|max:60',
            'transmission' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($vehicle->image && Storage::disk('public')->exists($vehicle->image)) {
                Storage::disk('public')->delete($vehicle->image);
            }
            $vehicle->image = $request->file('image')->store('vehicles/cars', 'public');
        }

        $vehicle->name = $validated['name'];
        $vehicle->category = $validated['category'] ?? null;
        $vehicle->description = $validated['description'] ?? null;
        $vehicle->seats = $validated['seats'] ?? null;
        $vehicle->transmission = $validated['transmission'] ?? null;
        $vehicle->sort_order = $validated['sort_order'] ?? 0;
        $vehicle->is_active = $request->has('is_active');
        $vehicle->vehicle_type = 'car';
        $vehicle->save();

        return redirect()->route('admin.layanan.rental-mobil.index')->with('success', 'Data rental mobil berhasil diperbarui.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $this->ensureCar($vehicle);

        if ($vehicle->image && Storage::disk('public')->exists($vehicle->image)) {
            Storage::disk('public')->delete($vehicle->image);
        }

        $vehicle->delete();

        return redirect()->route('admin.layanan.rental-mobil.index')->with('success', 'Data rental mobil berhasil dihapus.');
    }

    public function toggleStatus(Vehicle $vehicle)
    {
        $this->ensureCar($vehicle);

        $vehicle->is_active = ! $vehicle->is_active;
        $vehicle->save();

        return redirect()->route('admin.layanan.rental-mobil.index')->with('success', 'Status rental mobil berhasil diperbarui.');
    }

    private function ensureCar(Vehicle $vehicle): void
    {
        abort_unless($vehicle->vehicle_type === 'car', 404);
    }
}
