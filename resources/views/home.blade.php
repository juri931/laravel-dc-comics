@extends('layout.main')

@section('content')

<h1>Home DC Comics</h1>
<p>Nel database ci sono <b>{{ $num_products }}</b> prodotti</p>

@endsection

@section('title')
Home
@endsection
