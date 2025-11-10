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
        $vehicles = Vehicle::with('brand', 'model', 'color')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get();
        $models = CarModel::with('brand')->orderBy('name')->get();
        $colors = Color::orderBy('colors')->get();

        return view('admin.vehicles.create', compact('brands', 'models', 'colors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|url|max:500',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
        ]);

        Vehicle::create($validated);

        return redirect()->route('admin.vehicles.index')
            ->with('success', 'Veículo criado com sucesso!');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $brands = Brand::orderBy('name')->get();
        $models = CarModel::with('brand')->orderBy('name')->get();
        $colors = Color::orderBy('colors')->get();

        return view('admin.vehicles.edit', compact('vehicle', 'brands', 'models', 'colors'));
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'required|url|max:500',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:models,id',
            'color_id' => 'required|exists:colors,id',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:1000',
        ]);

        $vehicle->update($validated);

        return redirect()->route('admin.vehicles.index')
            ->with('success', 'Veículo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('admin.vehicles.index')
            ->with('success', 'Veículo excluído com sucesso!');
    }
}