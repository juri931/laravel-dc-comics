<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Requests\ComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::orderByDesc('id')->get();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $method = 'POST';
        $route = route('comics.store');
        $comic = null;
        return view('comics.create-edit', compact('method', 'route', 'comic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComicRequest $request)
    {
        // OLD request
        // $request->validate([
            // 'title' => 'required|min:3|max:100',
            // 'description' => 'min:10|max:5000',
            // 'thumb' => 'max:5000',
            // 'price' => 'numeric',
            // 'series' => 'min:3|max:100',
            // 'sale_date' => 'date',
            // 'type' => 'min:3|max:100',
        // ],[
            // 'title.required' => 'Il titolo è obbligatorio',
            // 'title.min' => 'Il titolo deve avere almeno 3 caratteri',
            // 'title.max' => 'Il titolo deve avere al massimo 100 caratteri',
            // 'description.min' => 'La descrizione deve avere almeno 10 caratteri',
            // 'price.numeric' => 'Il prezzo deve essere un valore numerico',
            // 'sale_date.date' => 'La data deve avere un formato valido'
        // ]);


        $form_data = $request->all();
        // Stringhe in array
        $array_artists = explode(',', $form_data['artists']);
        $array_writers = explode(',', $form_data['writers']);
        // Array in JSON
        $form_data['artists'] = json_encode($array_artists);
        $form_data['writers'] = json_encode($array_writers);

        $new_comic = new Comic();
        $new_comic->fill($form_data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic);
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
    public function edit(Comic $comic)
    {
        $method = 'PUT';
        $route = route('comics.update', $comic);
        return view('comics.create-edit', compact('method', 'route', 'comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComicRequest $request, Comic $comic)
    {
        $form_data = $request->all();

        // Stringhe in array
        $array_artists = explode(',', $form_data['artists']);
        $array_writers = explode(',', $form_data['writers']);
        // Array in JSON
        $form_data['artists'] = json_encode($array_artists);
        $form_data['writers'] = json_encode($array_writers);

        $comic->update($form_data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        // Reindirizzamento a index + Creazione variabile di sessione che mostrerà il messaggio di conferma eliminazione
        return redirect()->route('comics.index')->with('deleted', 'Il comic ' . $comic->title . ' è stato eliminato');
    }
}