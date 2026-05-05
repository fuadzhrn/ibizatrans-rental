<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Tentang Ibiza Trans');
            $table->longText('content'); // JSON format: {"paragraphs": [...], "stats": [...]}
            $table->string('featured_image_path')->nullable();
            $table->timestamps();
        });

        // Insert default data
        \DB::table('about_sections')->insert([
            'title' => 'Tentang Ibiza Trans',
            'content' => json_encode([
                'paragraphs' => [
                    'Ibiza Trans adalah penyedia layanan transportasi dan tour profesional berbasis di Banyuwangi. Ibiza Trans menghadirkan solusi perjalanan yang nyaman, aman, dan personal untuk wisatawan, tamu hotel, villa, serta partner hospitality.',
                ],
                'stats' => [
                    [
                        'label' => 'Private Trip',
                        'description' => 'Flexible'
                    ],
                    [
                        'label' => 'Professional Driver',
                        'description' => 'Trained & Friendly'
                    ],
                    [
                        'label' => 'Clean Fleet',
                        'description' => 'Well Maintained'
                    ],
                    [
                        'label' => 'Flexible Request',
                        'description' => 'Custom Itinerary'
                    ]
                ]
            ]),
            'featured_image_path' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
