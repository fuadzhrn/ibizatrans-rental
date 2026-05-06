<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehiclePrice;
use Illuminate\Database\Seeder;

class VehiclePriceSeeder extends Seeder
{
    public function run(): void
    {
        $defaultDriverNote = 'City tour maksimal 12 jam';

        $rows = [
            ['vehicle_name' => 'Innova Reborn', 'self_drive_per_day_price' => 650000, 'self_drive_24h_price' => 700000, 'driver_price' => 950000],
            ['vehicle_name' => 'Innova Zenix', 'self_drive_per_day_price' => 800000, 'self_drive_24h_price' => 850000, 'driver_price' => null],
            ['vehicle_name' => 'Terios', 'self_drive_per_day_price' => 375000, 'self_drive_24h_price' => 400000, 'driver_price' => 850000],
            ['vehicle_name' => 'All New Avanza/Xenia Type E', 'self_drive_per_day_price' => 350000, 'self_drive_24h_price' => 375000, 'driver_price' => null],
            ['vehicle_name' => 'All New Avanza/Xenia Type G', 'self_drive_per_day_price' => 375000, 'self_drive_24h_price' => 400000, 'driver_price' => null],
            ['vehicle_name' => 'All New Avanza/Xenia', 'self_drive_per_day_price' => null, 'self_drive_24h_price' => null, 'driver_price' => 750000],
            ['vehicle_name' => 'All New Agya/Ayla', 'self_drive_per_day_price' => 325000, 'self_drive_24h_price' => 350000, 'driver_price' => null],
            ['vehicle_name' => 'Ayla/Brio', 'self_drive_per_day_price' => null, 'self_drive_24h_price' => null, 'driver_price' => 650000],
            ['vehicle_name' => 'Brio', 'self_drive_per_day_price' => 325000, 'self_drive_24h_price' => 350000, 'driver_price' => null],
            ['vehicle_name' => 'Hiace Commuter', 'self_drive_per_day_price' => null, 'self_drive_24h_price' => null, 'driver_price' => 1400000],
        ];

        foreach ($rows as $index => $row) {
            $vehicle = Vehicle::query()->cars()->where('name', $row['vehicle_name'])->first();

            VehiclePrice::updateOrCreate(
                ['vehicle_name' => $row['vehicle_name']],
                [
                    'vehicle_id' => $vehicle?->id,
                    'self_drive_per_day_price' => $row['self_drive_per_day_price'],
                    'self_drive_24h_price' => $row['self_drive_24h_price'],
                    'driver_price' => $row['driver_price'],
                    'driver_note' => $defaultDriverNote,
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
