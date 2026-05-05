<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeServiceHighlight;

class HomeServiceHighlightSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['service_key'=>'rental_mobil','title'=>'Rental Mobil','description'=>'Pilihan lepas kunci dan include driver untuk perjalanan harian, bisnis, city tour, dan wisata.','icon'=>'ri-car-line','highlight'=>true],
            ['service_key'=>'rental_motor','title'=>'Rental Motor','description'=>'Unit motor praktis untuk mobilitas fleksibel selama berada di Banyuwangi.','icon'=>'ri-motorbike-line','highlight'=>true],
            ['service_key'=>'airport_transfer','title'=>'Airport & Station Transfer','description'=>'Layanan pick-up dan drop-off bandara/stasiun dengan jadwal yang tepat waktu.','icon'=>'ri-plane-line','highlight'=>true],
            ['service_key'=>'private_tour','title'=>'Private Tour Package','description'=>'Paket wisata privat ke destinasi populer di Banyuwangi.','icon'=>'ri-map-pin-line','highlight'=>true],
            ['service_key'=>'driver_service','title'=>'Mobil + Driver','description'=>'Driver profesional untuk city tour, tamu hotel, perjalanan keluarga, dan kebutuhan bisnis.','icon'=>'ri-steering-2-line','highlight'=>false],
            ['service_key'=>'custom_trip','title'=>'Custom Private Trip','description'=>'Itinerary by request sesuai durasi, destinasi pilihan, jumlah peserta, dan gaya perjalanan.','icon'=>'ri-route-line','highlight'=>false],
            ['service_key'=>'partnership','title'=>'Hospitality Partnership','description'=>'Solusi transportasi dan tour untuk hotel, villa, homestay, travel agent, dan tour operator.','icon'=>'ri-building-line','highlight'=>false],
        ];

        foreach ($services as $i => $s) {
            HomeServiceHighlight::updateOrCreate(
                ['service_key' => $s['service_key']],
                [
                    'title' => $s['title'],
                    'description' => $s['description'],
                    'icon' => $s['icon'],
                    'sort_order' => $i,
                    'is_highlighted' => $s['highlight'],
                ]
            );
        }
    }
}
