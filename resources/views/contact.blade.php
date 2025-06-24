@extends('layout')

@section('title', 'Contact')

@section('content')
    <h1 class="text-danger">Contactez la mairie</h1>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire de contact --}}
    <form action="{{ route('envoyer-message') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="nom" name="nom" required value="{{ old('nom') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection