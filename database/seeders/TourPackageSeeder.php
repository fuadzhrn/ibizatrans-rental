<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourPackage;

class TourPackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'name' => 'Escapada Trip',
                'slug' => 'escapada-trip',
                'destination_summary' => 'Kawah Ijen + Taman Nasional Baluran',
                'description' => 'Kombinasi petualangan malam menuju Kawah Ijen dan eksplorasi savana Baluran dalam satu perjalanan private trip.',
                'highlight' => 'Ijen trekking, savana Baluran, nature experience',
                'starting_price' => 315000,
                'sort_order' => 1,
                'is_active' => true,
                'destinations' => ['Kawah Ijen','Taman Nasional Baluran'],
                'prices' => [
                    ['pax_label'=>'1 person','price'=>985000],
                    ['pax_label'=>'2 person','price'=>555000],
                    ['pax_label'=>'3 person','price'=>415000],
                    ['pax_label'=>'4 person','price'=>350000],
                    ['pax_label'=>'5 person','price'=>315000],
                ],
                'facilities' => ['Unit accommodation','Professional driver','BBM','Ticket all destination','Mineral water','Surat sehat','P3K'],
                'itineraries' => [
                    ['time_label'=>'23.00 - 00.00','activity'=>'Penjemputan menuju Paltuding'],
                    ['time_label'=>'00.00 - 01.30','activity'=>'Prepare pendakian'],
                    ['time_label'=>'01.30 - 05.30','activity'=>'Pendakian & explore Ijen'],
                    ['time_label'=>'05.30 - 07.30','activity'=>'Kembali ke Paltuding'],
                    ['time_label'=>'07.30 - 09.30','activity'=>'Bersih diri & sarapan'],
                    ['time_label'=>'09.30 - 10.30','activity'=>'Perjalanan menuju Baluran'],
                    ['time_label'=>'10.30 - 12.00','activity'=>'Explore Baluran'],
                    ['time_label'=>'12.00 - 13.00','activity'=>'Perjalanan menuju penginapan'],
                    ['time_label'=>'13.00','activity'=>'Finish trip'],
                ],
            ],
            [
                'name' => 'Esencia Trip',
                'slug' => 'esencia-trip',
                'destination_summary' => 'Menjangan Island + Tabuhan Island',
                'description' => 'Trip island hopping dan snorkeling menuju Menjangan dan Tabuhan Island dengan pengalaman laut yang lebih privat dan nyaman.',
                'highlight' => 'Snorkeling, island hopping, underwater documentation',
                'starting_price' => 499000,
                'sort_order' => 2,
                'is_active' => true,
                'destinations' => ['Menjangan Island','Tabuhan Island','Ratu Osing'],
                'prices' => [
                    ['pax_label'=>'1 person','price'=>1075000],
                    ['pax_label'=>'2 person','price'=>715000],
                    ['pax_label'=>'3 person','price'=>600000],
                    ['pax_label'=>'4 person','price'=>535000],
                    ['pax_label'=>'5 person','price'=>499000],
                ],
                'facilities' => ['Unit accommodation','Professional driver','BBM','Ticket destination','Mineral water','Snorkeling equipment','Underwater documentation'],
                'itineraries' => [
                    ['time_label'=>'07.00 - 07.30','activity'=>'Penjemputan penginapan'],
                    ['time_label'=>'07.30 - 08.00','activity'=>'Perjalanan menuju meet point GWD'],
                    ['time_label'=>'08.00 - 08.30','activity'=>'Prepare menuju Menjangan & Tabuhan Island'],
                    ['time_label'=>'08.30 - 14.00','activity'=>'Explore Menjangan & Tabuhan Island'],
                    ['time_label'=>'14.00 - 15.00','activity'=>'Kembali menuju meet point GWD'],
                    ['time_label'=>'15.00 - 16.30','activity'=>'Explore Ratu Osing'],
                    ['time_label'=>'16.30 - 17.00','activity'=>'Drop off ke penginapan'],
                    ['time_label'=>'17.00','activity'=>'Finish trip'],
                ],
            ],
            [
                'name' => 'Aventura Trip',
                'slug' => 'aventura-trip',
                'destination_summary' => 'Djawatan, Green Island, Goa Bedil, Wedi Ireng, Red Island',
                'description' => 'Eksplorasi Banyuwangi Selatan dengan kombinasi hutan, pantai, pulau, private boat, dan sunset di Red Island.',
                'highlight' => 'Beach, forest, private boat, sunset',
                'starting_price' => 450000,
                'sort_order' => 3,
                'is_active' => true,
                'destinations' => ['Djawatan Forest','Puncak Green Island','Green Island Beach','Goa Bedil','Bedil Island','Wedi Ireng Beach','Sunset Red Island'],
                'prices' => [
                    ['pax_label'=>'1 person','price'=>2050000],
                    ['pax_label'=>'2 person','price'=>1050000],
                    ['pax_label'=>'3 person','price'=>725000],
                    ['pax_label'=>'4 person','price'=>550000],
                    ['pax_label'=>'5 person','price'=>450000],
                ],
                'facilities' => ['Unit accommodation','Professional driver','BBM','Ticket all destination','Guide','Mineral water','Private boat','Life jacket','P3K'],
                'itineraries' => [
                    ['time_label'=>'07.00 - 08.00','activity'=>'Penjemputan menuju Djawatan Forest'],
                    ['time_label'=>'08.00 - 09.00','activity'=>'Explore Djawatan Forest'],
                    ['time_label'=>'09.00 - 10.00','activity'=>'Perjalanan menuju Pantai Mustika'],
                    ['time_label'=>'10.00 - 10.30','activity'=>'Prepare & briefing by guide'],
                    ['time_label'=>'10.30 - 13.00','activity'=>'Explore Green Island'],
                    ['time_label'=>'13.00 - 14.30','activity'=>'Kembali, bersih diri & makan siang'],
                    ['time_label'=>'14.30 - 15.00','activity'=>'Perjalanan menuju Red Island'],
                    ['time_label'=>'15.00 - 17.00','activity'=>'Sunset point Red Island'],
                    ['time_label'=>'17.00 - 19.00','activity'=>'Perjalanan menuju penginapan'],
                    ['time_label'=>'19.00','activity'=>'Finish trip'],
                ],
            ],
            [
                'name' => 'Travesia Trip',
                'slug' => 'travesia-trip',
                'destination_summary' => 'Kawah Ijen',
                'description' => 'Trip privat menuju Kawah Ijen untuk menikmati pengalaman trekking, sunrise, dan suasana ikonik Banyuwangi.',
                'highlight' => 'Ijen sunrise / blue fire experience, trekking',
                'starting_price' => 215000,
                'sort_order' => 4,
                'is_active' => true,
                'destinations' => ['Kawah Ijen'],
                'prices' => [
                    ['pax_label'=>'1 person','price'=>700000],
                    ['pax_label'=>'2 person','price'=>390000],
                    ['pax_label'=>'3 person','price'=>290000],
                    ['pax_label'=>'4 person','price'=>245000],
                    ['pax_label'=>'5 person','price'=>215000],
                ],
                'facilities' => ['Unit accommodation','Professional driver','BBM','Ticket destination','Mineral water','Surat sehat'],
                'itineraries' => [
                    ['time_label'=>'23.00','activity'=>'Penjemputan penginapan'],
                    ['time_label'=>'23.00 - 01.00','activity'=>'Perjalanan menuju Paltuding'],
                    ['time_label'=>'01.00 - 02.00','activity'=>'Menunggu tiket dan pintu masuk dibuka'],
                    ['time_label'=>'02.00 - 04.00','activity'=>'Start pendakian'],
                    ['time_label'=>'06.00 - 08.00','activity'=>'Kembali menuju Paltuding'],
                    ['time_label'=>'08.00 - 09.00','activity'=>'Bersih diri'],
                    ['time_label'=>'09.00 - 10.30','activity'=>'Perjalanan menuju lokasi sarapan'],
                    ['time_label'=>'10.30 - 11.00','activity'=>'Drop off ke penginapan'],
                    ['time_label'=>'11.00','activity'=>'Finish trip'],
                ],
            ],
            [
                'name' => 'Explore Baluran',
                'slug' => 'explore-baluran',
                'destination_summary' => 'Taman Nasional Baluran + Ratu Osing',
                'description' => 'Paket eksplorasi savana Baluran yang dikenal sebagai Africa van Java, cocok untuk nature lovers dan photography enthusiasts.',
                'highlight' => 'Savanna landscape, Africa van Java, photography trip',
                'starting_price' => 175000,
                'sort_order' => 5,
                'is_active' => true,
                'destinations' => ['Taman Nasional Baluran','Ratu Osing Souvenir Center'],
                'prices' => [
                    ['pax_label'=>'1 pax','price'=>750000],
                    ['pax_label'=>'2 pax','price'=>365000],
                    ['pax_label'=>'3 pax','price'=>270000],
                    ['pax_label'=>'4 pax','price'=>210000],
                    ['pax_label'=>'5 pax','price'=>175000],
                ],
                'facilities' => ['Car with driver and fuel','Entrance tickets to all attractions','Mineral water','Private guide'],
                'itineraries' => [],
            ],
            [
                'name' => 'Explore Banyuwangi Selatan',
                'slug' => 'explore-banyuwangi-selatan',
                'destination_summary' => 'Djawatan, Green Island, Goa Bedil, Wedi Ireng, Pulau Merah',
                'description' => 'Paket beach & nature trip di Banyuwangi Selatan dengan kombinasi hutan, pantai, private boat, dan suasana sunset.',
                'highlight' => 'Beach & nature trip, private boat, Red Island sunset',
                'starting_price' => 450000,
                'sort_order' => 6,
                'is_active' => true,
                'destinations' => ['Djawatan','Green Island','Goa Bedil','Wedi Ireng','Pulau Merah'],
                'prices' => [
                    ['pax_label'=>'1 pax','price'=>2000000],
                    ['pax_label'=>'2 pax','price'=>1025000],
                    ['pax_label'=>'3 pax','price'=>700000],
                    ['pax_label'=>'4 pax','price'=>550000],
                    ['pax_label'=>'5 pax','price'=>450000],
                ],
                'facilities' => ['Car with driver and fuel','Entrance tickets to all attractions','Mineral water','Private boat','Private guide'],
                'itineraries' => [],
            ],
        ];

        foreach ($packages as $pkg) {
            $package = TourPackage::updateOrCreate(
                ['slug' => $pkg['slug']],
                [
                    'name' => $pkg['name'],
                    'destination_summary' => $pkg['destination_summary'] ?? null,
                    'description' => $pkg['description'] ?? null,
                    'highlight' => $pkg['highlight'] ?? null,
                    'starting_price' => $pkg['starting_price'] ?? null,
                    'sort_order' => $pkg['sort_order'] ?? 0,
                    'is_active' => $pkg['is_active'] ?? true,
                ]
            );

            if (!empty($pkg['destinations'])) {
                foreach ($pkg['destinations'] as $i => $d) {
                    $package->destinations()->updateOrCreate(
                        ['name' => $d],
                        ['sort_order' => $i]
                    );
                }
            }

            if (!empty($pkg['prices'])) {
                foreach ($pkg['prices'] as $i => $p) {
                    $package->prices()->updateOrCreate(
                        ['pax_label' => $p['pax_label']],
                        ['price' => $p['price'], 'sort_order' => $i]
                    );
                }
            }

            if (!empty($pkg['facilities'])) {
                foreach ($pkg['facilities'] as $i => $f) {
                    $package->facilities()->updateOrCreate(
                        ['name' => $f],
                        ['sort_order' => $i]
                    );
                }
            }

            if (!empty($pkg['itineraries'])) {
                foreach ($pkg['itineraries'] as $i => $it) {
                    $package->itineraries()->updateOrCreate(
                        ['activity' => $it['activity']],
                        ['time_label' => $it['time_label'] ?? null, 'sort_order' => $i]
                    );
                }
            }
        }
    }
}
