<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoriaController extends Controller
{
    public function index()
    {
        $categories = Categoria::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {       
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categorias|max:100',
            'description' => 'required|max:255'
        ]);

        Categoria::create($validated);

        return redirect()->route('categories.index')->with('status', 'Categoria creada con éxito');
    }

    public function edit($id)
    {
        $category = Categoria::findOrFail($id);
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100', 
            'description' => 'required|max:255'
        ]);

        Categoria::where('id', $id)->update($validated);

        return redirect()->route('categories.index')->with('status', 'Categoria modificada con éxito');
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect()->route('categories.index')->with('status', 'Categoria eliminada con éxito');
    }
}
