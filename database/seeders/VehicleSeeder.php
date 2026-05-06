<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        $vehicles = [
            ['vehicle_type' => 'car', 'name' => 'Ayla', 'category' => 'City Car'],
            ['vehicle_type' => 'car', 'name' => 'Brio', 'category' => 'City Car'],
            ['vehicle_type' => 'car', 'name' => 'Agya', 'category' => 'City Car'],
            ['vehicle_type' => 'car', 'name' => 'Innova Reborn', 'category' => 'MPV'],
            ['vehicle_type' => 'car', 'name' => 'Innova Zenix', 'category' => 'MPV'],
            ['vehicle_type' => 'car', 'name' => 'All New Avanza', 'category' => 'MPV'],
            ['vehicle_type' => 'car', 'name' => 'All New Xenia', 'category' => 'MPV'],
            ['vehicle_type' => 'car', 'name' => 'Terios', 'category' => 'SUV'],
            ['vehicle_type' => 'car', 'name' => 'Hiace Commuter', 'category' => 'Hiace'],
            ['vehicle_type' => 'car', 'name' => 'Hiace Premio', 'category' => 'Hiace'],

            ['vehicle_type' => 'motor', 'name' => 'PCX', 'category' => 'Premium'],
            ['vehicle_type' => 'motor', 'name' => 'NMAX', 'category' => 'Premium'],
            ['vehicle_type' => 'motor', 'name' => 'Stylo', 'category' => 'Matic'],
            ['vehicle_type' => 'motor', 'name' => 'Vario', 'category' => 'Matic'],
            ['vehicle_type' => 'motor', 'name' => 'Scoopy', 'category' => 'Matic'],
            ['vehicle_type' => 'motor', 'name' => 'Beat', 'category' => 'Matic'],
            ['vehicle_type' => 'motor', 'name' => 'Lexi', 'category' => 'Matic'],
            ['vehicle_type' => 'motor', 'name' => 'Fazzio', 'category' => 'Matic'],
            ['vehicle_type' => 'motor', 'name' => 'Aerox', 'category' => 'Sporty'],
            ['vehicle_type' => 'motor', 'name' => 'Genio', 'category' => 'Matic'],
        ];

        foreach ($vehicles as $index => $vehicle) {
            Vehicle::updateOrCreate(
                [
                    'vehicle_type' => $vehicle['vehicle_type'],
                    'name' => $vehicle['name'],
                ],
                [
                    'category' => $vehicle['category'],
                    'image' => null,
                    'description' => null,
                    'seats' => null,
                    'transmission' => null,
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
