@extends('layout.main')

@section('content')
<div class="my-container w-75 mx-auto">
        <h1>Modifica comic</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.update', $comic) }}" method="POST">
             @csrf {{-- token di sicurezza di convalida del form --}}
             @method('PUT') {{-- forzatura dell'invio in PUT per il metodo POST di HTML --}}
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input
                    name="title"
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id='title'
                    value='{{ old('title', $comic->title) }}'>
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">URL immagine</label>
                <input
                    name="thumb"
                    type="text"
                    class="form-control @error('thumb') is-invalid @enderror"
                    id='thumb'
                    value='{{ old('thumb', $comic->thumb) }}'>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input
                    name="price"
                    type="text"
                    class="form-control @error('price') is-invalid @enderror"
                    id='price'
                    placeholder='$'
                    value='{{ old('price', $comic->price) }}'>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea
                    name="description"
                    type="text"
                    class="form-control @error('description') is-invalid @enderror"
                    id='description'
                    value='{{ old('description', $comic->description) }}'></textarea>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input
                    name="series"
                    type="text"
                    class="form-control @error('series') is-invalid @enderror"
                    id='series'
                    value='{{ old('series', $comic->series) }}'>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data Vendita</label>
                <input
                    name="sale_date"
                    type="date"
                    class="form-control @error('sale_date') is-invalid @enderror"
                    id='sale_date'
                    value='{{ old('sale_date', $comic->sale_date) }}'>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input
                    name="type"
                    type="text"
                    class="form-control @error('type') is-invalid @enderror"
                    id='type'
                    value='{{ old('type', $comic->type) }}'>
            </div>
            <div class="mb-3">
                <label for="artists" class="form-label">Disegnatori ["nome", "nome"]</label>
                <input
                    name="artists"
                    type="text"
                    class="form-control @error('artists') is-invalid @enderror"
                    id='artists'
                    value='{{ old('artists', $comic->artists) }}'>
            </div>
            <div class="mb-3">
                <label for="writers" class="form-label">Scrittori ["nome", "nome"]</label>
                <input
                    name="writers"
                    type="text"
                    class="form-control @error('writers') is-invalid @enderror"
                    id='writers'
                    value='{{ old('writers', $comic->writers) }}'>
            </div>
            <button class="btn btn-success" type='submit'>Invia</button>
            <button class="btn btn-warning" type='reset'>Reset</button>

        </form>
    </div>
@endsection

@section('title')
    Aggiungi un comic
@endsection
