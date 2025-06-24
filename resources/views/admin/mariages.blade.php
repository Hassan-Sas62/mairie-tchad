@extends('layout')

@section('title', 'Demandes de mariage')

@section('content')
    <h1 class="text-primary">Demandes de mariage</h1>

    @foreach($mariages as $m)
        <div class="card mb-3">
            <div class="card-body">
                <strong>{{ $m->nom_epoux }} & {{ $m->nom_epouse }}</strong><br>
                Mariage prévu le {{ $m->date_mariage }} à {{ $m->lieu_mariage }}<br>
                Téléphone : {{ $m->telephone }}
            </div>
        </div>
    @endforeach
@endsection