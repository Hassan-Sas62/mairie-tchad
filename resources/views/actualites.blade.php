@extends('layout')

@section('title', 'Actualités')

@section('content')
    <h1 class="text-primary">Actualités de la mairie</h1>

    @if($actualites->isEmpty())
        <p>Aucune actualité pour le moment.</p>
    @else
        @foreach($actualites as $actu)
            <div class="card mb-3">
                @if($actu->image)
                    <img src="{{ asset('storage/' . $actu->image) }}" class="card-img-top" alt="Image actualité">
                @endif
                <div class="card-body">
                    <h4>{{ $actu->titre }}</h4>
                    <small class="text-muted">Publié le {{ \Carbon\Carbon::parse($actu->date)->format('d/m/Y') }}</small>
                    <p>{{ $actu->contenu }}</p>
                </div>
            </div>
        @endforeach
    @endif
@endsection