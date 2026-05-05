<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class PaketTourController extends Controller
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

        // Get 6 tour images for featured cards
        $tourImages = array_slice($images, 0, 6);

        return view('pages.paket-tour', ['tourImages' => $tourImages]);
    }
}
