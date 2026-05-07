<?php

namespace App\Http\Controllers\Admin\PaketTour;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourPackage;
use App\Models\TourPrice;

class TourPriceController extends Controller
{
    public function store(Request $request, TourPackage $tourPackage)
    {
        $data = $request->validate([
            'pax_label' => 'required|string|max:100',
            'price' => 'required|integer|min:0',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $tourPackage->prices()->create($data);

        return back()->with('success', 'Price added');
    }

    public function update(Request $request, TourPrice $tourPrice)
    {
        $data = $request->validate([
            'pax_label' => 'required|string|max:100',
            'price' => 'required|integer|min:0',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $tourPrice->update($data);

        return back()->with('success', 'Price updated');
    }

    public function destroy(TourPrice $tourPrice)
    {
        $tourPrice->delete();
        return back()->with('success', 'Price deleted');
    }
}
