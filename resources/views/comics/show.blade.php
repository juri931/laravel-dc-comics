@extends('layout.main')

@section('content')


    <div class="comtainer text-center">
        <h1>{{ $comic->title }}</h1>

        <div class="row m-3">
            <div class="col">
                <img class="img-fluid" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
            </div>
            <div class="col d-flex flex-column justify-between">
                <h6>{{ $comic->description }}</h6>
                <p>Series: {{ $comic->series }}</p>
                <p>Sale Date: {{ $comic->sale_date }}</p>
                <p>Type: {{ $comic->type }}</p>
                <p>Artists: {{ $comic->artists }}</p>
                <p>Writers: {{ $comic->writers }}</p>
            </div>
        </div>
    </div>

@endsection
