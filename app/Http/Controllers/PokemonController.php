<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemon = Pokemon::all();
        return view('pokemon.index', compact('pokemon'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');        
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'pokemon_id' => 'required|string|max:255',
            'type1' => 'required|string|max:255',
            'type2' => 'nullable|string|max:255',
            'url_image' => 'nullable|url',
            'generation' => 'required|string|max:255',
            'entry' => 'required|string|max:255',
        ]);

        foreach ($data as $key => $value) {
            if (empty($value)) {
                $data[$key] = null;
            }
        }

        // Check if the pokemon_id already exists
        if (Pokemon::where('pokemon_id', $data['pokemon_id'])->exists()) {
            return redirect()->back()->with('error', 'El ID del Pokémon ya existe.');
        }

        // Create a new Pokemon with the validated data
        Pokemon::create($data);

        // Redirect to the index page with a success message
        return redirect()->route('pokemon')->with('success', 'Pokémon creado exitosamente.');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pokemon = Pokemon::find($id);
        return view('pokemon.edit', compact('pokemon'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type1' => 'required|string|max:255',
            'type2' => 'nullable|string|max:255',
            'url_image' => 'nullable|url',
            'generation' => 'required|string|max:255',
            'entry' => 'required|string|max:255',
        ]);
    
        // Convertir campos vacíos a null
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $data[$key] = null;
            }
        }
    
        // Encontrar el Pokémon por su ID y lanzar una excepción si no se encuentra
        $pokemon = Pokemon::findOrFail($id);
    
        // Actualizar los datos del Pokémon
        $pokemon->update($data);
    
        // Redirigir a la lista de Pokémon con un mensaje de éxito
        return redirect()->route('pokemon')->with('success', 'Pokémon actualizado correctamente.');
        
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $pokemon_id)
    {
        $pokemon = Pokemon::find($pokemon_id);
        $pokemon->delete();

        return redirect()->back()->with('success', 'Pokemon eliminado exitosamente');
        //
    }
}
