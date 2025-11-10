<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $models = CarModel::with('brand')->withCount('vehicles')->orderBy('name')->get();
        return view('admin.models.index', compact('models'));
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get();
        return view('admin.models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
        ]);

        CarModel::create($request->only('name', 'brand_id'));

        return redirect()->route('admin.models.index')
            ->with('success', 'Modelo criado com sucesso!');
    }

    public function edit($id)
    {
        $model = CarModel::findOrFail($id);
        $brands = Brand::orderBy('name')->get();
        return view('admin.models.edit', compact('model', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $model = CarModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $model->update($request->only('name', 'brand_id'));

        return redirect()->route('admin.models.index')
            ->with('success', 'Modelo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $model = CarModel::findOrFail($id);

        if ($model->vehicles()->count() > 0) {
            return redirect()->route('admin.models.index')
                ->with('error', 'Não é possível excluir este modelo pois existem veículos cadastrados.');
        }

        $model->delete();

        return redirect()->route('admin.models.index')
            ->with('success', 'Modelo excluído com sucesso!');
    }
}
