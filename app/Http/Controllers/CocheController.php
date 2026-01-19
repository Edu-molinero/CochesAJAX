<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coches;
use App\Models\Categoria;

// Controlador para gestionar coches con AJAX y API REST
class CocheController extends Controller
{
    // Retorna la vista principal con catálogo de coches
    public function portada()
    {
        $categorias = Categoria::distinct('id')->get();
        return view('coches.portada', compact('categorias'));
    }

    // API: Lista todos los coches (con filtro opcional por categoría)
    public function list(Request $request)
    {
        $query = Coches::with('categoria');
        
        if ($request->has('categoria_id') && $request->categoria_id) {
            $query->where('categoria_id', $request->categoria_id);
        }
        
        $coches = $query->get();
        return response()->json($coches);
    }

    // API: Crear nuevo coche
    public function store(Request $request)
    {
        $validated = $request->validate([
            'modelo' => 'required|string',
            'marca' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'required|url'
        ]);

        $coche = Coches::create($validated);
        return response()->json($coche, 201);
    }

    public function update(Request $request, $id)
    {
        $coche = Coches::findOrFail($id);
        
        $validated = $request->validate([
            'modelo' => 'string',
            'marca' => 'string',
            'categoria_id' => 'exists:categorias,id',
            'imagen' => 'url'
        ]);

        $coche->update($validated);
        return response()->json($coche);
    }

    public function destroy($id)
    {
        $coche = Coches::findOrFail($id);
        $coche->delete();
        return response()->json(['message' => 'Coche deleted']);
    }
}
