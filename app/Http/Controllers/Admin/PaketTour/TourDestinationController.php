<?php

namespace App\Http\Controllers\Admin\PaketTour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourPackage;
use App\Models\TourDestination;

class TourDestinationController extends Controller
{
    public function store(Request $request, TourPackage $tourPackage)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $tourPackage->destinations()->create($data);

        return back()->with('success', 'Destination added');
    }

    public function update(Request $request, TourDestination $tourDestination)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $tourDestination->update($data);

        return back()->with('success', 'Destination updated');
    }

    public function destroy(TourDestination $tourDestination)
    {
        $tourDestination->delete();
        return back()->with('success', 'Destination deleted');
    }
}
