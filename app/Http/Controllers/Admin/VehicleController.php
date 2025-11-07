<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vehicles = Vehicle::with('branc', 'model', 'color')->get();
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $brands = Brand::all();
        $models = CarModel::all();
        $colora = Color::all();

        return view('admin.vehicles.create', compact('brands', 'models', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|url',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:car_models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|integer',
            'mileage' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Vehicle::create($request->all());
        return redirect()->route('admin.vehicles.index');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $brands = Brand::all();
        $models = CarModel::all();
        $colora = Color::all();

        return view('admin.vehicles.edit', compact('vehicle', 'brands', 'models', 'colors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|url',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:car_models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|integer',
            'mileage' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());
        return redirect()->route('admin.vehicles.index');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('admin.vehicles.index');
    }
}
