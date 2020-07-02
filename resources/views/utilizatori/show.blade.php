@extends('layouts.app')
@section('content')
<h1>Showing {{ $animal->name }}</h1>

<div class="jumbotron text-center">
    <h2>{{ $animal->name }}</h2>
    <img src="{{$imagine->path}}">
    <p>
        <strong>Varsta:</strong> {{ $animal->age }} ani<br>
        <strong>Rasa:</strong> {{ $animal->breed }}
        <strong>Sex:</strong>
        @if($animal->sex !== '0')
            Mascul
        @else Femela
        @endif
        <br>
        <strong>Talie:</strong> {{ $animal->size }}cm
        <strong>Culoare:</strong> {{ $animal->color }}<br>
        <strong>Descriere:</strong> {{ $animal->description }}
        <strong>Tip:</strong>
        @if($animal->type === '0')
            Fara nevoi speciale
        @else Cu nevoi speciale
        @endif
    </p>
</div>
@endsection
