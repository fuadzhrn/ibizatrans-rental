<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourFaq;

class TourFaqSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            ['question' => 'Apakah paket tour bersifat private?', 'answer' => 'Ya, paket tour Ibiza Trans dapat disesuaikan sebagai private trip sehingga perjalanan lebih nyaman dan fleksibel.', 'sort_order' => 0],
            ['question' => 'Apakah itinerary bisa disesuaikan?', 'answer' => 'Bisa. Itinerary dapat disesuaikan berdasarkan durasi, jumlah peserta, destinasi pilihan, dan kondisi perjalanan.', 'sort_order' => 1],
            ['question' => 'Apakah harga sudah termasuk tiket destinasi?', 'answer' => 'Sebagian besar paket sudah mencakup tiket destinasi sesuai detail fasilitas masing-masing paket.', 'sort_order' => 2],
            ['question' => 'Apakah bisa booking untuk lebih dari 5 orang?', 'answer' => 'Bisa. Untuk group di atas 5 orang, silakan hubungi admin agar kami dapat menyesuaikan armada dan harga.', 'sort_order' => 3],
            ['question' => 'Apakah tersedia dokumentasi untuk trip island/snorkeling?', 'answer' => 'Untuk Esencia Trip tersedia underwater documentation sesuai fasilitas paket.', 'sort_order' => 4],
            ['question' => 'Bagaimana cara booking paket tour?', 'answer' => 'Booking dapat dilakukan melalui WhatsApp dengan mengirimkan tanggal trip, jumlah peserta, pilihan paket, dan lokasi penjemputan.', 'sort_order' => 5],
        ];

        foreach ($faqs as $f) {
            TourFaq::updateOrCreate(['question' => $f['question']], [
                'answer' => $f['answer'],
                'sort_order' => $f['sort_order'],
                'is_active' => true,
            ]);
        }
    }
}
