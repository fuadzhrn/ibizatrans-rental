<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

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

        // Get featured image (first one from shuffled array)
        $featuredImage = !empty($images) ? $images[0] : null;

        // Get 4 package images (different from featured)
        $packageImages = array_slice($images, 1, 4);

        // Get 6 tour images for tour cards
        $tourImages = array_slice($images, 5, 6);

        return view('pages.home', [
            'galleryImages' => $images,
            'featuredImage' => $featuredImage,
            'packageImages' => $packageImages,
            'tourImages' => $tourImages
        ]);
    }
}
