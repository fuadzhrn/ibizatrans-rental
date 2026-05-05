<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    /**
     * Show the form for editing the about section
     */
    public function edit()
    {
        $aboutSection = AboutSection::first() ?? new AboutSection();
        return view('admin.about.edit', ['aboutSection' => $aboutSection]);
    }

    /**
     * Update the about section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'nullable|string',
            'paragraph_3' => 'nullable|string',
            'stat_1_label' => 'required|string|max:100',
            'stat_1_description' => 'required|string|max:100',
            'stat_2_label' => 'required|string|max:100',
            'stat_2_description' => 'required|string|max:100',
            'stat_3_label' => 'required|string|max:100',
            'stat_3_description' => 'required|string|max:100',
            'stat_4_label' => 'required|string|max:100',
            'stat_4_description' => 'required|string|max:100',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Get or create AboutSection
        $aboutSection = AboutSection::first() ?? new AboutSection();

        // Handle image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($aboutSection->featured_image_path && Storage::disk('public')->exists($aboutSection->featured_image_path)) {
                Storage::disk('public')->delete($aboutSection->featured_image_path);
            }

            // Store new image
            $path = $request->file('featured_image')->store('about-section', 'public');
            $aboutSection->featured_image_path = $path;
        }

        // Prepare paragraphs (remove empty ones)
        $paragraphs = array_filter([
            $validated['paragraph_1'],
            $validated['paragraph_2'] ?? null,
            $validated['paragraph_3'] ?? null,
        ], function ($item) {
            return !empty($item);
        });

        // Prepare stats
        $stats = [
            [
                'label' => $validated['stat_1_label'],
                'description' => $validated['stat_1_description'],
            ],
            [
                'label' => $validated['stat_2_label'],
                'description' => $validated['stat_2_description'],
            ],
            [
                'label' => $validated['stat_3_label'],
                'description' => $validated['stat_3_description'],
            ],
            [
                'label' => $validated['stat_4_label'],
                'description' => $validated['stat_4_description'],
            ],
        ];

        // Update content
        $aboutSection->title = $validated['title'];
        $aboutSection->content = [
            'paragraphs' => array_values($paragraphs),
            'stats' => $stats,
        ];

        $aboutSection->save();

        return redirect()->route('admin.about.edit')->with('success', 'About section updated successfully!');
    }
}
