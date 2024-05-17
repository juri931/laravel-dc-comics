@extends('layout.main')

@section('content')


    <div class="comtainer text-center">
        <h1 class="my-5">{{ $comic->title }}</h1>

        <div class="row m-3">
            <div class="col">
                <img class="img-fluid" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
            </div>
            <div class="col d-flex justify-content-between flex-column">
                <h5>{{ $comic->description }}</h5>
                <p><b>Series:</b> {{ $comic->series }}</p>
                <p><b>Sale Date:</b> {{ $comic->sale_date }}</p>
                <p><b>Type:</b> {{ $comic->type }}</p>
                <p><b>Artists:</b> {{ implode(', ', json_decode($comic->artists)) }}</p>
                <p><b>Writers:</b> {{ implode(', ', json_decode($comic->writers)) }}</p>
            </div>
        </div>
    </div>

@endsection

@section('title')
Detail
@endsection
