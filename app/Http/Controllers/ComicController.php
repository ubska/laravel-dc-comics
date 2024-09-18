<?php

namespace App\Http\Controllers;

use App\Models\Comic;


use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $comics = Comic::all();
        $comics = Comic::orderBy('id', 'desc')->get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'thumb' => 'required|string',
                'price' => 'required|string',
                'series' => 'required|string',
                'sale_date' => 'required|date',
                'type' => 'required|string',
            ],
            [
                'title.required' => 'Il titolo è obbligatorio.',
                'title.string' => 'Il titolo deve essere una stringa.',
                'title.max' => 'Il titolo non può superare i 255 caratteri.',
                'description.required' => 'La descrizione è obbligatoria.',
                'description.string' => 'La descrizione deve essere una stringa.',
                'thumb.required' => 'Il thumbnail è obbligatorio.',
                'thumb.string' => 'Il thumbnail deve essere una stringa.',
                'price.required' => 'Il prezzo è obbligatorio.',
                'price.string' => 'Il prezzo deve essere una stringa.',
                'type.required' => 'Il tipo è obbligatorio.',
                'type.string' => 'Il tipo deve essere una stringa.',
            ]
        );

        $comic = Comic::create($data);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'thumb' => 'required|string',
                'price' => 'required|string',
                // 'series' => 'required|string',
                // 'sale_date' => 'required|date',
                // 'type' => 'required|string',
            ],
            [
                'title.required' => 'Il titolo è obbligatorio.',
                'title.string' => 'Il titolo deve essere una stringa.',
                'title.max' => 'Il titolo non può superare i 255 caratteri.',
                'description.required' => 'La descrizione è obbligatoria.',
                'description.string' => 'La descrizione deve essere una stringa.',
                'thumb.required' => 'Il thumbnail è obbligatorio.',
                'thumb.string' => 'Il thumbnail deve essere una stringa.',
                'price.required' => 'Il prezzo è obbligatorio.',
                'price.string' => 'Il prezzo deve essere una stringa.',
                'type.required' => 'Il tipo è obbligatorio.',
                'type.string' => 'Il tipo deve essere una stringa.',
            ]
        );
        $comic = Comic::find($id);
        $comic->update($data);
        return redirect()->route('comics.index')->with('success', 'Comics modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index')->with('success', 'Comic eliminato con successo');
    }
}
