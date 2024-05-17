@extends('layout.main')

@section('content')

<div class="container">
<h1>Lista DC Comics</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Thumb</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($comics as $comic)
        <tr>
            <td>{{ $comic->id }}</td>
            <td>{{ $comic->title }}</td>
            <td><img style="max-width: 150px" src="{{ $comic->thumb }}" alt="{{ $comic->title }}"></td>
            <td>{{ $comic->price }}</td>

            <td>
                <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-success"><i class="fa-regular fa-eye"></i></a>
                <button class="btn btn-warning"><i class="fa-solid fa-pencil"></i></button>
            </td>
        </tr>

        @empty
            <h2>Nessun Comic Trovato</h2>
        @endforelse

    </tbody>
</table>
</div>
@endsection

@section('title')
List
@endsection
