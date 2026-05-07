<?php

namespace App\Http\Controllers\Admin\PaketTour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourPackage;
use App\Models\TourItinerary;

class TourItineraryController extends Controller
{
    public function store(Request $request, TourPackage $tourPackage)
    {
        $data = $request->validate([
            'time_label' => 'nullable|string|max:100',
            'activity' => 'required|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $tourPackage->itineraries()->create($data);

        return back()->with('success', 'Itinerary added');
    }

    public function update(Request $request, TourItinerary $tourItinerary)
    {
        $data = $request->validate([
            'time_label' => 'nullable|string|max:100',
            'activity' => 'required|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $tourItinerary->update($data);

        return back()->with('success', 'Itinerary updated');
    }

    public function destroy(TourItinerary $tourItinerary)
    {
        $tourItinerary->delete();
        return back()->with('success', 'Itinerary deleted');
    }
}
