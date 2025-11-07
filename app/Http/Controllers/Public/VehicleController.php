<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Color;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::with('brand', 'model', 'color');

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $vehicles = $query->get();

        $brands = Brand::orderBy('name')->get();

        $years = Vehicle::select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        $minPrice = Vehicle::min('price') ?? 0;
        $maxPrice = Vehicle::max('price') ?? 500000;

        return view('public.vehicles.index', compact(
            'vehicles',
            'brands',
            'years',
            'minPrice',
            'maxPrice'
        ));
    }

    public function show($id)
    {
        $vehicle = Vehicle::with('brand', 'model', 'color')->findOrFail($id);
        return view('public.vehicles.show', compact('vehicle'));
    }
}
