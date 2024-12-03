<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{


    public function index()
    {
        $tasks = Task::with('category')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $categories = Categoria::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'completed' => 'boolean'
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('status', 'Tarea creada con éxito'); // Redirige con un mensaje de éxito;
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $categories = Categoria::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'completed' => 'boolean'
        ]);

        Task::where('id', $id)->update($validated);

        return redirect()->route('tasks.index')->with('status', 'Tarea actualizada con éxito');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index')->with('status', 'Tarea eliminada con éxito');
    }
}
