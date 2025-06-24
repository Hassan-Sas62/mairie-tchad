@extends('layout')

@section('title', 'Demandes de naissance')

@section('content')
<h1 class="text-primary">Demandes d’acte de naissance</h1>

@foreach($naissances as $n)
    <div class="card mb-3">
        <div class="card-body">
            <strong>{{ $n->nom }} {{ $n->prenom }}</strong><br>
            Né le {{ $n->date_naissance }} à {{ $n->lieu_naissance }}<br>
            Père : {{ $n->nom_pere }} – Mère : {{ $n->nom_mere }}<br>
            Téléphone : {{ $n->telephone }}
        </div>
    </div>
@endforeach
@endsection