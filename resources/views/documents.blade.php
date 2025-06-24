@extends('layout')

@section('title', 'Documents à télécharger')

@section('content')
    <h1 class="text-primary">📁 Documents disponibles</h1>

    @if($documents->isEmpty())
        <p>Aucun document disponible pour le moment.</p>
    @else
        <ul class="list-group mt-3">
            @foreach($documents as $doc)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $doc->titre }}
                    <a href="{{ asset('documents/' . $doc->fichier) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                        Télécharger
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection