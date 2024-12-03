<?php

namespace App\Services; //Directorio de ubicación
use Illuminate\Http\Request;

use App\Models\Task; //Importación de modelo

class TaskService {
    public function getTasks() { //Definición de método dentro de la clase
        return Task::with('category')->get(); //Método para obtener todos los registros presentes en la tabla con la relación de categorías
    }

    public function createTask(Request $request) { //Solicitud para crear una tarea
        $validated = $request->validate([ //Validamos los datos a continuación...
            'title' => 'required|max:255', // Validación: título requerido y máximo 255 caracteres
            'description' => 'required', // Validación: descripción requerida
            'category_id' => 'required|exists:categories,id', // Validación: category_id debe existir en la tabla categories
            'completed' => 'boolean' // Validación: completed debe ser booleano
        ]);

        return Task::create($validated); // Crear una nueva tarea con los datos validados
    }

    public function updateTask(Request $request, $id) { //Solicitud para actualizar una tarea
        $validated = $request->validate([ //Validación de datos a continuación...
            'title' => 'required|max:255', // Validación: título requerido y máximo 255 caracteres
            'description' => 'required', // Validación: descripción requerida
            'category_id' => 'required|exists:categories,id', // Validación: category_id debe existir en la tabla categories
            'completed' => 'boolean' // Validación: completed debe ser booleano
        ]);

        return Task::where('id', $id)->update($validated); // Actualizar la tarea con los datos validados
    }

    public function deleteTask($id) { //Solicitud para eliminar una tarea
        return Task::destroy($id); // Eliminar la tarea por id
    }
}
