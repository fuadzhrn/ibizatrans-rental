<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeServiceHighlight;
use Illuminate\Http\Request;

class HighlightServiceController extends Controller
{
    public function index()
    {
        $services = HomeServiceHighlight::orderBy('sort_order')->get();
        return view('admin.home.highlight-services.index', compact('services'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'highlighted' => 'nullable|array',
            'highlighted.*' => 'integer|exists:home_service_highlights,id',
            'sort_order' => 'nullable|array',
            'sort_order.*' => 'integer|min:0',
        ]);

        $selected = $validated['highlighted'] ?? [];
        if (count($selected) > 4) {
            return back()->withErrors(['highlighted' => 'Maksimal hanya boleh memilih 4 layanan untuk Highlight Layanan.']);
        }

        // Reset all
        HomeServiceHighlight::query()->update(['is_highlighted' => false]);

        // Set selected
        foreach ($selected as $id) {
            $svc = HomeServiceHighlight::find($id);
            if ($svc) {
                $svc->is_highlighted = true;
                $svc->save();
            }
        }

        // Update sort orders if provided
        if (!empty($validated['sort_order'])) {
            foreach ($validated['sort_order'] as $id => $order) {
                $svc = HomeServiceHighlight::find($id);
                if ($svc) {
                    $svc->sort_order = (int)$order;
                    $svc->save();
                }
            }
        }

        return redirect()->route('admin.home.highlight-services.index')->with('success', 'Highlights updated.');
    }
}
