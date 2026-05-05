<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = HomeGallery::orderBy('sort_order')->orderByDesc('created_at')->paginate(15);
        return view('admin.home.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.home.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
            'category' => 'nullable|string|max:100',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $path = $request->file('image')->store('home/gallery', 'public');

        HomeGallery::create([
            'title' => $validated['title'],
            'image' => $path,
            'category' => $validated['category'] ?? null,
            'alt_text' => $validated['alt_text'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.home.gallery.index')->with('success', 'Gallery item added.');
    }

    public function edit(HomeGallery $gallery)
    {
        return view('admin.home.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, HomeGallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'category' => 'nullable|string|max:100',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $path = $request->file('image')->store('home/gallery', 'public');
            $gallery->image = $path;
        }

        $gallery->title = $validated['title'];
        $gallery->category = $validated['category'] ?? null;
        $gallery->alt_text = $validated['alt_text'] ?? null;
        $gallery->sort_order = $validated['sort_order'] ?? 0;
        $gallery->is_active = $request->has('is_active');
        $gallery->save();

        return redirect()->route('admin.home.gallery.index')->with('success', 'Gallery updated.');
    }

    public function destroy(HomeGallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        return redirect()->route('admin.home.gallery.index')->with('success', 'Gallery deleted.');
    }

    public function toggleStatus(HomeGallery $gallery)
    {
        $gallery->is_active = !$gallery->is_active;
        $gallery->save();
        return redirect()->route('admin.home.gallery.index')->with('success', 'Status updated.');
    }
}
