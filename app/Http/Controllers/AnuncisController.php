<?php

namespace App\Http\Controllers;

use App\Models\Anunci;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Pest\Laravel\delete;

class AnuncisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Anunci::query();

        // Filtrar por búsqueda
        if ($request->has('search') && $request->search) {
            $query->where('titol', 'like', '%' . $request->search . '%');
        }

        // Filtrar por categoría
        if ($request->has('categoria') && $request->categoria) {
            $query->where('categoria_id', $request->categoria);
        }

        // Obtener los resultados
        $anuncis = $query->get();

        // Pasar los datos a la vista
        return inertia('AnunciList', [
            'anuncis' => $anuncis,
            'filters' => $request->only('search', 'categoria'),
            'categories' => Categoria::all(), // Asegúrate de cargar las categorías
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categoria::all();

        return Inertia::render('AnuncisCreate', [
            'categories' => $categories, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titol' => 'required|max:255',
            'descripcio' => 'required|max:255',
            'time' => 'required|max:255',
            'date' => 'required|max:255',
            'email' => 'required|max:255',
            'categoria_id' => 'required',
        ]);

        Anunci::create($validated);
        return redirect()->route('anuncis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anunci $anunci)
    {
        $anunci->load('categories');
        
        return Inertia::render('AnuncisShow',[
            'anunci' => $anunci
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anunci $anunci)
    {
        $categories = Categoria::all(); 

        return Inertia::render('AnuncisEdit', [
            'anuncis' => $anunci,
            'categories' => $categories, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anunci $anunci)
    {
        $validated = $request->validate([
            'titol' => 'max:255',
            'descripcio' => 'max:255',
            'time' => 'max:255',
            'date' => 'max:255',
            'email' => 'max:255',
            'categoria_id' => 'required'
        ]);

        $anunci->update($validated);

        return redirect()->route('anuncis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anunci $anunci)
    {
        try {
            $anunci->delete();
            return response()->json([
                'success' => true,
                'message' => 'anunci esborrat correctament'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al esborrar: ' . $e->getMessage()
            ], 500);
        }
    }
}
