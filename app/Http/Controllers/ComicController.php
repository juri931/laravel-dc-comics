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
        $comics = Comic::orderByDesc('id')->get();

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
        $form_data = $request->all();
        $form_data['artists'] = '';
        $form_data['writers'] = '';


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
    $json_artists = json_decode($comic->artists, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($json_artists)) {
        $artists = implode(', ', $json_artists);
    } else {
        $artists = '-';
    }

    $json_writers = json_decode($comic->writers, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($json_writers)) {
        $writers = implode(', ', $json_writers);
    } else {
        $writers = '-';
    }

    return view('comics.show', compact('comic', 'artists', 'writers'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $form_data = $request->all();

        $comic->update($form_data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', 'Il comic ' . $comic->title . ' è stato eliminato');
    }
}