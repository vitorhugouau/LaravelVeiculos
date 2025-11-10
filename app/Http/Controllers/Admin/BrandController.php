<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = Brand::withCount('vehicles')->orderBy('name')->get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
        ]);

        Brand::create($request->only('name'));

        return redirect()->route('admin.brands.index')
            ->with('success', 'Marca criada com sucesso!');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
        ]);

        $brand->update($request->only('name'));

        return redirect()->route('admin.brands.index')
            ->with('success', 'Marca atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand->vehicles()->count() > 0) {
            return redirect()->route('admin.brands.index')
                ->with('error', 'Não é possível excluir esta marca pois existem veículos cadastrados.');
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Marca excluída com sucesso!');
    }
}
