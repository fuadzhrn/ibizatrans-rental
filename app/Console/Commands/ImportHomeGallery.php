<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\HomeGallery;

class ImportHomeGallery extends Command
{
    protected $signature = 'gallery:import-home {--path=public/assets/images/gallery}';
    protected $description = 'Import existing gallery images from public folder into storage and DB';

    public function handle()
    {
        $pathsToCheck = [
            base_path($this->option('path')),
            base_path('public/assets/images/home/gallery'),
            base_path('public/assets/images/galery'),
        ];

        $found = false;

        foreach ($pathsToCheck as $p) {
            if (is_dir($p)) {
                $found = true;
                $files = scandir($p);
                $order = 0;
                foreach ($files as $f) {
                    if (in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','webp','gif'])) {
                        $source = $p . DIRECTORY_SEPARATOR . $f;
                        $filename = pathinfo($f, PATHINFO_BASENAME);
                        $destPath = 'home/gallery/' . $filename;
                        // copy to storage if not exists
                        if (!Storage::disk('public')->exists($destPath)) {
                            Storage::disk('public')->putFileAs('home/gallery', new \Illuminate\Http\UploadedFile($source, $filename, null, null, true), $filename);
                        }

                        // insert if not exists
                        $exists = HomeGallery::where('image', $destPath)->exists();
                        if (!$exists) {
                            HomeGallery::create([
                                'title' => ucwords(str_replace(['_', '-'], ' ', pathinfo($f, PATHINFO_FILENAME))),
                                'image' => $destPath,
                                'category' => 'Imported',
                                'alt_text' => pathinfo($f, PATHINFO_FILENAME),
                                'sort_order' => $order++,
                                'is_active' => true,
                            ]);
                        }
                    }
                }
                $this->info('Imported from: ' . $p);
            }
        }

        if (!$found) {
            $this->error('No gallery folder found in the default locations.');
        }

        return 0;
    }
}
