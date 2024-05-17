@extends('layout.main')

@section('content')
<div class="container">
    <div class="container-text">
        <h1>Home DC Comics</h1>
        <p>Nel database ci sono <b>{{ $num_products }}</b> prodotti</p>
        <a class="btn btn-dark " href="{{ route('comics.index') }}">Vai alla lista dei comics</a>
    </div>
</div>

@endsection

@section('title')
Home
@endsection
