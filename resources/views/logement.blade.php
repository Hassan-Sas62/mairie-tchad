@extends('layout')

@section('title', 'Demande de logement')

@section('content')
    <h1 class="text-primary">Demande de logement</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('logement.envoyer') }}" method="POST">
        @csrf
        <input type="text" name="nom" class="form-control mb-2" placeholder="Nom" required>
        <input type="text" name="prenom" class="form-control mb-2" placeholder="Prénom" required>
        <input type="text" name="telephone" class="form-control mb-2" placeholder="Téléphone" required>
        <input type="text" name="adresse" class="form-control mb-2" placeholder="Adresse" required>
        <textarea name="motif" class="form-control mb-2" placeholder="Motif de la demande" rows="4" required></textarea>
        <button type="submit" class="btn btn-success">Envoyer la demande</button>
    </form>
@endsection