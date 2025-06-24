@extends('layout')

@section('title', 'Ajouter un document')

@section('content')
    <h1 class="text-primary">Ajouter un document à télécharger</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('documents.ajouter') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du document</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fichier" class="form-label">Fichier PDF</label>
            <input type="file" name="fichier" id="fichier" class="form-control" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
@endsection