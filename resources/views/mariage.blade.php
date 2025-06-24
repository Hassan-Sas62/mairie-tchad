@extends('layout')

@section('title', 'Demande de mariage')

@section('content')
    <h1 class="text-primary">Demande de mariage</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('mariage.envoyer') }}" method="POST">
        @csrf
        <input type="text" name="nom_epoux" class="form-control mb-2" placeholder="Nom de l’époux" required>
        <input type="text" name="nom_epouse" class="form-control mb-2" placeholder="Nom de l’épouse" required>
        <input type="date" name="date_mariage" class="form-control mb-2" required>
        <input type="text" name="lieu_mariage" class="form-control mb-2" placeholder="Lieu du mariage" required>
        <input type="text" name="telephone" class="form-control mb-2" placeholder="Téléphone" required>
        <button type="submit" class="btn btn-success">Envoyer la demande</button>
    </form>
@endsection