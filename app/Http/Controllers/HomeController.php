<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use App\Models\AboutSection;
use App\Models\HomeGallery;
use App\Models\HomeServiceHighlight;
use App\Models\TourPackage;

class HomeController extends Controller
{
    public function index()
    {
        // Try to get gallery images from DB if table exists, otherwise fallback to public folder
        $images = [];
        if (Schema::hasTable('home_galleries')) {
            $galleries = HomeGallery::where('is_active', true)->orderBy('sort_order')->orderByDesc('created_at')->get();
            foreach ($galleries as $g) {
                // store relative path that can be passed to asset() in views
                $images[] = 'storage/' . ltrim($g->image, '/');
            }
            // Randomize order on user home gallery so it changes each load.
            if (count($images) > 1) {
                shuffle($images);
            }
        } else {
            $galleryPath = public_path('assets/images/galery');
            if (File::exists($galleryPath)) {
                $files = File::files($galleryPath);
                foreach ($files as $file) {
                    $images[] = 'assets/images/galery/' . $file->getFilename();
                }
                shuffle($images);
            }
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

        // Service highlights from DB if available
        $highlights = [];
        if (Schema::hasTable('home_service_highlights')) {
            $highlights = HomeServiceHighlight::where('is_highlighted', true)->orderBy('sort_order')->limit(4)->get();
        }

        // Featured tour packages for home section
        $homeTourPackages = collect();
        if (Schema::hasTable('tour_packages')) {
            $homeTourPackages = TourPackage::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderByDesc('created_at')
                ->limit(4)
                ->get();
        }

        return view('pages.home', [
            'galleryImages' => $images,
            'aboutSection' => $aboutSection,
            'aboutFeaturedImage' => $aboutSection->getFeaturedImagePath(),
            'homeGalleries' => $images, // keep legacy variable name for compatibility
            'homeServiceHighlights' => $highlights,
            'homeTourPackages' => $homeTourPackages,
        ]);
    }
}
