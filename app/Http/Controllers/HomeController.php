<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\AboutSection;

class HomeController extends Controller
{
    public function index()
    {
        // Read all images from gallery folder
        $galleryPath = public_path('assets/images/galery');
        $images = [];

        if (File::exists($galleryPath)) {
            $files = File::files($galleryPath);
            foreach ($files as $file) {
                $images[] = 'assets/images/galery/' . $file->getFilename();
            }
            // Shuffle images for random order each page load
            shuffle($images);
        }

        // Get About section data from database
        $aboutSection = AboutSection::first() ?? new AboutSection([
            'title' => 'Tentang Ibiza Trans',
            'content' => [
                'paragraphs' => [
                    'Ibiza Trans adalah penyedia layanan transportasi dan tour profesional berbasis di Banyuwangi. Ibiza Trans menghadirkan solusi perjalanan yang nyaman, aman, dan personal untuk wisatawan, tamu hotel, villa, serta partner hospitality.',
                ],
                'stats' => [
                    ['label' => 'Private Trip', 'description' => 'Flexible'],
                    ['label' => 'Professional Driver', 'description' => 'Trained & Friendly'],
                    ['label' => 'Clean Fleet', 'description' => 'Well Maintained'],
                    ['label' => 'Flexible Request', 'description' => 'Custom Itinerary'],
                ]
            ],
            'featured_image_path' => null,
        ]);

        return view('pages.home', [
            'galleryImages' => $images,
            'aboutSection' => $aboutSection,
            'aboutFeaturedImage' => $aboutSection->getFeaturedImagePath(),
        ]);
    }
}
