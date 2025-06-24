@extends('layout')

@section('title', 'Demandes de logement')

@section('content')
    <h1 class="text-primary">Demandes de logement</h1>

    @foreach($logements as $l)
        <div class="card mb-3">
            <div class="card-body">
                <strong>{{ $l->prenom }} {{ $l->nom }}</strong><br>
                Téléphone : {{ $l->telephone }}<br>
                Adresse : {{ $l->adresse }}<br>
                Motif : {{ $l->motif }}
            </div>
        </div>
    @endforeach
@endsection