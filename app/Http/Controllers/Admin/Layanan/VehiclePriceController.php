<?php

namespace App\Http\Controllers\Admin\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\VehiclePrice;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VehiclePriceController extends Controller
{
    public function index()
    {
        $vehiclePrices = VehiclePrice::with('vehicle')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.layanan.pricelist-mobil.index', compact('vehiclePrices'));
    }

    public function create()
    {
        $vehicles = Vehicle::query()->cars()->orderBy('name')->get();

        return view('admin.layanan.pricelist-mobil.create', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateForm($request);

        $vehicle = !empty($validated['vehicle_id'])
            ? Vehicle::query()->cars()->find($validated['vehicle_id'])
            : null;

        if (!empty($validated['vehicle_id']) && !$vehicle) {
            throw ValidationException::withMessages([
                'vehicle_id' => 'Kendaraan yang dipilih harus bertipe mobil.',
            ]);
        }

        $vehicleName = $validated['vehicle_name'] ?? null;
        if ($vehicle && empty($vehicleName)) {
            $vehicleName = $vehicle->name;
        }

        VehiclePrice::create([
            'vehicle_id' => $vehicle?->id,
            'vehicle_name' => $vehicleName,
            'self_drive_per_day_price' => $validated['self_drive_per_day_price'] ?? null,
            'self_drive_24h_price' => $validated['self_drive_24h_price'] ?? null,
            'driver_price' => $validated['driver_price'] ?? null,
            'driver_note' => $validated['driver_note'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.layanan.pricelist-mobil.index')->with('success', 'Data pricelist mobil berhasil ditambahkan.');
    }

    public function edit(VehiclePrice $vehiclePrice)
    {
        $vehicles = Vehicle::query()->cars()->orderBy('name')->get();

        return view('admin.layanan.pricelist-mobil.edit', compact('vehiclePrice', 'vehicles'));
    }

    public function update(Request $request, VehiclePrice $vehiclePrice)
    {
        $validated = $this->validateForm($request);

        $vehicle = !empty($validated['vehicle_id'])
            ? Vehicle::query()->cars()->find($validated['vehicle_id'])
            : null;

        if (!empty($validated['vehicle_id']) && !$vehicle) {
            throw ValidationException::withMessages([
                'vehicle_id' => 'Kendaraan yang dipilih harus bertipe mobil.',
            ]);
        }

        $vehicleName = $validated['vehicle_name'] ?? null;
        if ($vehicle && empty($vehicleName)) {
            $vehicleName = $vehicle->name;
        }

        $vehiclePrice->update([
            'vehicle_id' => $vehicle?->id,
            'vehicle_name' => $vehicleName,
            'self_drive_per_day_price' => $validated['self_drive_per_day_price'] ?? null,
            'self_drive_24h_price' => $validated['self_drive_24h_price'] ?? null,
            'driver_price' => $validated['driver_price'] ?? null,
            'driver_note' => $validated['driver_note'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.layanan.pricelist-mobil.index')->with('success', 'Data pricelist mobil berhasil diperbarui.');
    }

    public function destroy(VehiclePrice $vehiclePrice)
    {
        $vehiclePrice->delete();

        return redirect()->route('admin.layanan.pricelist-mobil.index')->with('success', 'Data pricelist mobil berhasil dihapus.');
    }

    public function toggleStatus(VehiclePrice $vehiclePrice)
    {
        $vehiclePrice->is_active = ! $vehiclePrice->is_active;
        $vehiclePrice->save();

        return redirect()->route('admin.layanan.pricelist-mobil.index')->with('success', 'Status pricelist mobil berhasil diperbarui.');
    }

    private function validateForm(Request $request): array
    {
        $validated = $request->validate([
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'vehicle_name' => 'nullable|string|max:255',
            'self_drive_per_day_price' => 'nullable|integer|min:0',
            'self_drive_24h_price' => 'nullable|integer|min:0',
            'driver_price' => 'nullable|integer|min:0',
            'driver_note' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $hasAnyPrice = !is_null($validated['self_drive_per_day_price'] ?? null)
            || !is_null($validated['self_drive_24h_price'] ?? null)
            || !is_null($validated['driver_price'] ?? null);

        if (!$hasAnyPrice) {
            throw ValidationException::withMessages([
                'self_drive_per_day_price' => 'Minimal salah satu harga harus diisi.',
            ]);
        }

        if (empty($validated['vehicle_id']) && empty($validated['vehicle_name'])) {
            throw ValidationException::withMessages([
                'vehicle_name' => 'Jika kendaraan tidak dipilih, nama unit wajib diisi.',
            ]);
        }

        return $validated;
    }
}
