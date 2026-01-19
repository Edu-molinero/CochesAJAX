<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

// Controlador para gestionar categorías con API REST
class CategoriaController extends Controller
{
    // API: Lista todas las categorías
    public function list()
    {
        return response()->json(Categoria::all());
    }

    // API: Crear nueva categoría
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|unique:categorias'
        ]);

        $categoria = Categoria::create($validated);
        return response()->json($categoria, 201);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoria deleted']);
    }

}
