@extends('layout.main')

@section('content')
<div class="my-container w-75 mx-auto">
        <h1>Aggingi un comic</h1>
        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input name="title" type="text" class="form-control" id='title' value='{{ $comic->title }}'>
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">URL immagine</label>
                <input name="thumb" type="text" class="form-control" id='thumb' value='{{ $comic->thumb }}'>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input name="price" type="text" class="form-control" id='price' placeholder='$' value='{{ $comic->price }}'>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" type="text" class="form-control" id='description' value='{{ $comic->description }}'></textarea>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input name="series" type="text" class="form-control" id='series' value='{{ $comic->series }}'>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data Vendita</label>
                <input name="sale_date" type="date" class="form-control" id='sale_date' value='{{ $comic->sale_date }}'>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input name="type" type="text" class="form-control" id='type' value='{{ $comic->type }}'>
            </div>
            <div class="mb-3">
                <label for="artists" class="form-label">Disegnatori ["nome", "nome"]</label>
                <input name="artists" type="text" class="form-control" id='artists' value='{{ $comic->artists }}'>
            </div><div class="mb-3">
                <label for="writers" class="form-label">Scrittori ["nome", "nome"]</label>
                <input name="writers" type="text" class="form-control" id='writers' value='{{ $comic->writers }}'>
            </div>
            <button class="btn btn-success" type='submit'>Invia</button>
            <button class="btn btn-warning" type='reset'>Reset</button>

        </form>
    </div>
@endsection

@section('title')
    Aggiungi un comic
@endsection
