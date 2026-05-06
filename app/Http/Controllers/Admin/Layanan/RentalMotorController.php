<?php

namespace App\Http\Controllers\Admin\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RentalMotorController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::query()
            ->motors()
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.layanan.rental-motor.index', compact('vehicles'));
    }

    public function create()
    {
        return view('admin.layanan.rental-motor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vehicles/motors', 'public');
        }

        Vehicle::create([
            'vehicle_type' => 'motor',
            'name' => $validated['name'],
            'category' => $validated['category'] ?? null,
            'image' => $imagePath,
            'description' => $validated['description'] ?? null,
            'seats' => null,
            'transmission' => null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.layanan.rental-motor.index')->with('success', 'Data rental motor berhasil ditambahkan.');
    }

    public function edit(Vehicle $vehicle)
    {
        $this->ensureMotor($vehicle);

        return view('admin.layanan.rental-motor.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $this->ensureMotor($vehicle);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($vehicle->image && Storage::disk('public')->exists($vehicle->image)) {
                Storage::disk('public')->delete($vehicle->image);
            }
            $vehicle->image = $request->file('image')->store('vehicles/motors', 'public');
        }

        $vehicle->name = $validated['name'];
        $vehicle->category = $validated['category'] ?? null;
        $vehicle->description = $validated['description'] ?? null;
        $vehicle->sort_order = $validated['sort_order'] ?? 0;
        $vehicle->is_active = $request->has('is_active');
        $vehicle->vehicle_type = 'motor';
        $vehicle->save();

        return redirect()->route('admin.layanan.rental-motor.index')->with('success', 'Data rental motor berhasil diperbarui.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $this->ensureMotor($vehicle);

        if ($vehicle->image && Storage::disk('public')->exists($vehicle->image)) {
            Storage::disk('public')->delete($vehicle->image);
        }

        $vehicle->delete();

        return redirect()->route('admin.layanan.rental-motor.index')->with('success', 'Data rental motor berhasil dihapus.');
    }

    public function toggleStatus(Vehicle $vehicle)
    {
        $this->ensureMotor($vehicle);

        $vehicle->is_active = ! $vehicle->is_active;
        $vehicle->save();

        return redirect()->route('admin.layanan.rental-motor.index')->with('success', 'Status rental motor berhasil diperbarui.');
    }

    private function ensureMotor(Vehicle $vehicle): void
    {
        abort_unless($vehicle->vehicle_type === 'motor', 404);
    }
}
