<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $colors = Color::withCount('vehicles')->orderBy('colors')->get();
        return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'colors' => 'required|string|max:255|unique:colors,colors',
        ]);

        Color::create($request->only('colors'));

        return redirect()->route('admin.colors.index')
            ->with('success', 'Cor criada com sucesso!');
    }

    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('admin.colors.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);

        $request->validate([
            'colors' => 'required|string|max:255|unique:colors,colors,' . $color->id,
        ]);

        $color->update($request->only('colors'));

        return redirect()->route('admin.colors.index')
            ->with('success', 'Cor atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $color = Color::findOrFail($id);

        if ($color->vehicles()->count() > 0) {
            return redirect()->route('admin.colors.index')
                ->with('error', 'Não é possível excluir esta cor pois existem veículos cadastrados.');
        }

        $color->delete();

        return redirect()->route('admin.colors.index')
            ->with('success', 'Cor excluída com sucesso!');
    }
}
