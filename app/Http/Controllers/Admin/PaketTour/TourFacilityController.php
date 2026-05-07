<?php

namespace App\Http\Controllers\Admin\PaketTour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourPackage;
use App\Models\TourFacility;

class TourFacilityController extends Controller
{
    public function store(Request $request, TourPackage $tourPackage)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $tourPackage->facilities()->create($data);

        return back()->with('success', 'Facility added');
    }

    public function update(Request $request, TourFacility $tourFacility)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $tourFacility->update($data);

        return back()->with('success', 'Facility updated');
    }

    public function destroy(TourFacility $tourFacility)
    {
        $tourFacility->delete();
        return back()->with('success', 'Facility deleted');
    }
}
