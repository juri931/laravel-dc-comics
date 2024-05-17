@extends('layout.main')

@section('content')

@if (session('deleted'))
    <div class="alert alert-success" role="alert">
        {{ session('deleted') }}
    </div>
@endif

<div class="container">
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

            <td class="d-flex flex-column gap-1 border-bottom-0 ">
                <a style="width: max-content" href="{{ route('comics.show', $comic->id) }}" class="btn btn-success"><i class="fa-regular fa-eye"></i></a>
                <a style="width: max-content" href="{{ route('comics.edit', $comic) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                @include('partials.formDelete')

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
