@extends('layout')

@section('title', 'Accueil')

@section('content')
    <h1 class="text-primary">Bienvenue sur le site de la mairie</h1>
    <p class="mb-4">Ce site permet aux citoyens de s’informer et de faire des démarches administratives en ligne.</p>

    <ul class="list-group">
        <li class="list-group-item">
            <a href="/mairie">🏛 Présentation de la mairie</a>
        </li>
        <li class="list-group-item">
            <a href="/services">🛠 Services proposés</a>
        </li>
        <li class="list-group-item">
            <a href="/actualites">📰 Actualités</a>
        </li>
        <li class="list-group-item">
            <a href="/contact">📩 Contactez-nous</a>
        </li>
        <li class="list-group-item">
            <a href="/documents">📁 Documents à télécharger</a>
        </li>
        <li class="list-group-item">
            <a href="/logement">🏠 Demande de logement</a>
        </li>
        <li class="list-group-item">
            <a href="/naissance">👶 Demande d’acte de naissance</a>
        </li>
        <li class="list-group-item">
            <a href="/mariage">💍 Demande de mariage</a>
        </li>
    </ul>
@endsection