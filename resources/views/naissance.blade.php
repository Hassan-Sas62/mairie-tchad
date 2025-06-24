@extends('layout')

@section('title', 'Demande d’acte de naissance')

@section('content')
<h1 class="text-primary">Demande d’acte de naissance</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('naissance.envoyer') }}" method="POST">
    @csrf
    <input type="text" name="nom" placeholder="Nom" class="form-control mb-2" required>
    <input type="text" name="prenom" placeholder="Prénom" class="form-control mb-2" required>
    <input type="date" name="date_naissance" class="form-control mb-2" required>
    <input type="text" name="lieu_naissance" placeholder="Lieu de naissance" class="form-control mb-2" required>
    <input type="text" name="nom_pere" placeholder="Nom du père" class="form-control mb-2" required>
    <input type="text" name="nom_mere" placeholder="Nom de la mère" class="form-control mb-2" required>
    <input type="text" name="telephone" placeholder="Téléphone" class="form-control mb-2" required>
    <button type="submit" class="btn btn-success">Envoyer la demande</button>
</form>
@endsection