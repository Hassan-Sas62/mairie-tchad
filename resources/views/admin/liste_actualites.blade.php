@extends('layout')

@section('title', 'Liste des actualités')

@section('content')
    <h1>Actualités publiées</h1>

    @foreach($actualites as $actu)
        <div class="border p-2 mb-3">
            <h4>{{ $actu->titre }}</h4>
            <small>{{ $actu->date }}</small>
            <p>{{ $actu->contenu }}</p>
        </div>
    @endforeach
@endsection