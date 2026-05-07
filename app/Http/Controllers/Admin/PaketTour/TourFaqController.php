<?php

namespace App\Http\Controllers\Admin\PaketTour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourFaq;

class TourFaqController extends Controller
{
    public function index()
    {
        $faqs = TourFaq::orderBy('sort_order')->orderByDesc('created_at')->paginate(15);
        return view('admin.paket-tour.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.paket-tour.faqs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|in:0,1',
        ]);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        TourFaq::create($data);

        return redirect()->route('admin.paket-tour.faqs.index')->with('success', 'FAQ added');
    }

    public function edit(TourFaq $tourFaq)
    {
        return view('admin.paket-tour.faqs.edit', compact('tourFaq'));
    }

    public function update(Request $request, TourFaq $tourFaq)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|in:0,1',
        ]);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $tourFaq->update($data);

        return redirect()->route('admin.paket-tour.faqs.index')->with('success', 'FAQ updated');
    }

    public function destroy(TourFaq $tourFaq)
    {
        $tourFaq->delete();
        return back()->with('success', 'FAQ deleted');
    }

    public function toggleStatus(TourFaq $tourFaq)
    {
        $tourFaq->is_active = !$tourFaq->is_active;
        $tourFaq->save();
        return back()->with('success', 'Status toggled');
    }
}
