<?php

namespace App\Services; //Directorio de ubicación

use App\Models\Categoria; //Importación de modelo
use Illuminate\Http\Request;

class CategoriaService {
    
    /**
     * Obtener todas las categorías.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCategories() { //Definición de método dentro de la clase
        return Categoria::all(); //Método para obtener todos los registros presentes en la tabla
    }

    /**
     * Crear una nueva categoría.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\Categoria
     */
    public function createCategoria(Request $request) { //Solicitud para crear una categoría
        $validated = $request->validate([ //Validamos los datos a continuación...
            'name' => 'required|unique:categorias|max:100',
            'description' => 'required|max:255'
        ]);

        return Categoria::create($validated); // Crear una nueva categoría con los datos validados
    }

    /**
     * Actualizar una categoría existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return bool
     */
    public function updateCategoria(Request $request, $id) { //Solicitud para actualizar una categoría
        $validated = $request->validate([ //Validación de datos a continuación...
            'name' => 'required|max:100',
            'description' => 'required|max:255'
        ]);

        return Categoria::where('id', $id)->update($validated); // Actualizar la categoría con los datos validados
    }

    /**
     * Eliminar una categoría.
     *
     * @param  int  $id
     * @return bool|null
     */
    public function deleteCategoria($id) { //Solicitud para eliminar una categoría
        return Categoria::destroy($id); // Eliminar la categoría por id
    }
}
