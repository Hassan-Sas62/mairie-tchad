@extends('layout')

@section('title', 'Messages reçus')

@section('content')
    <h1 class="text-primary">Liste des messages reçus</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($messages->isEmpty())
        <p>Aucun message pour le moment.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                    <tr>
                        <td>{{ $msg->nom }}</td>
                        <td>{{ $msg->email }}</td>
                        <td>{{ $msg->message }}</td>
                        <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form action="{{ route('messages.supprimer', $msg->id) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection