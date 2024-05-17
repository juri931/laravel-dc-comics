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
        $comics = Comic::all();

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
        $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'thumb' => 'required|string|max:255',
        'price' => 'required|numeric',
        'series' => 'required|string|max:255',
        'sale_date' => 'required|date',
        'type' => 'required|string|max:255',
        'artists' => 'required|array',
        'writers' => 'required|array',
    ]);

        $new_comic = new Comic();
    $new_comic->title = $validatedData['title'];
    $new_comic->description = $validatedData['description'];
    $new_comic->thumb = $validatedData['thumb'];
    $new_comic->price = $validatedData['price'];
    $new_comic->series = $validatedData['series'];
    $new_comic->sale_date = $validatedData['sale_date'];
    $new_comic->type = $validatedData['type'];
    $new_comic->artists = json_encode(array_map('trim', $validatedData['artists']));
    $new_comic->writers = json_encode(array_map('trim', $validatedData['writers']));

    $new_comic->save();

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}