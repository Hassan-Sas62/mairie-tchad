<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Actualite;
use App\Models\Document;
use App\Models\Naissance;
use App\Models\Mariage;
use App\Models\Logement;
use App\Http\Controllers\ProfileController;

// ✅ Page d’accueil
Route::get('/', function () {
    return view('accueil');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard', [
        'messagesCount' => \App\Models\Message::count(),
        'actualitesCount' => \App\Models\Actualite::count(),
        'documentsCount' => \App\Models\Document::count(),
    ]);
})->middleware(['auth', 'is_admin'])->name('admin.dashboard');

Route::get('/logement', function () {
    return view('logement');
});

Route::post('/logement', function (Request $request) {
    $validated = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'telephone' => 'required',
        'adresse' => 'required',
        'motif' => 'required|min:10',
    ]);

    Logement::create($validated);
    return redirect('/logement')->with('success', 'Demande envoyée avec succès !');
})->name('logement.envoyer');

// 🔐 Espace admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/logements', function () {
        $logements = Logement::latest()->get();
        return view('admin.logements', compact('logements'));
    });
});

Route::get('/mariage', function () {
    return view('mariage');
});

Route::post('/mariage', function (Request $request) {
    $validated = $request->validate([
        'nom_epoux' => 'required',
        'nom_epouse' => 'required',
        'date_mariage' => 'required|date',
        'lieu_mariage' => 'required',
        'telephone' => 'required',
    ]);

    Mariage::create($validated);
    return redirect('/mariage')->with('success', 'Demande de mariage envoyée avec succès !');
})->name('mariage.envoyer');

// 🔐 Admin : consulter les demandes
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/mariages', function () {
        $mariages = Mariage::latest()->get();
        return view('admin.mariages', compact('mariages'));
    });
});

// Page publique
Route::get('/naissance', function () {
    return view('naissance');
});

// Traitement
Route::post('/naissance', function (Request $request) {
    $validated = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'date_naissance' => 'required|date',
        'lieu_naissance' => 'required',
        'nom_pere' => 'required',
        'nom_mere' => 'required',
        'telephone' => 'required',
    ]);

    \App\Models\Naissance::create($validated);
    return redirect('/naissance')->with('success', 'Demande envoyée avec succès !');
})->name('naissance.envoyer');

// Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/naissances', function () {
        $naissances = \App\Models\Naissance::latest()->get();
        return view('admin.naissances', compact('naissances'));
    });
});

// ✅ Pages publiques
Route::get('/mairie', fn() => view('mairie'));
Route::get('/services', fn() => view('services'));
Route::get('/contact', fn() => view('contact'));

// ✅ Page des documents (publique)
Route::get('/documents', function () {
    $documents = Document::latest()->get();
    return view('documents', compact('documents'));
});

// ✅ Traitement du formulaire de contact
Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'nom' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ]);

    Message::create($validated);
    return redirect('/contact')->with('success', 'Message enregistré avec succès !');
})->name('envoyer-message');

// ✅ Liste des actualités (publique)
Route::get('/actualites', function () {
    $actualites = Actualite::latest()->get();
    return view('actualites', compact('actualites'));
});

// 🔐 Espace administration : seulement pour les administrateurs
Route::middleware(['auth', 'is_admin'])->group(function () {

    // 📬 Liste des messages
    Route::get('/admin/messages', function () {
        $messages = Message::latest()->get();
        return view('admin.messages', compact('messages'));
    });

    // ❌ Supprimer un message
    Route::delete('/admin/messages/{id}', function ($id) {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect('/admin/messages')->with('success', 'Message supprimé avec succès.');
    })->name('messages.supprimer');

    // 📰 Ajouter une actualité
    Route::get('/admin/actualites/create', fn() => view('admin.ajouter_actualite'));
    Route::get('/admin/actualites', function () {
        $actualites = Actualite::latest()->get();
        return view('admin.liste_actualites', compact('actualites'));
    });

    Route::post('/admin/actualites', function (Request $request) {
        $validated = $request->validate([
            'titre' => 'required|min:3',
            'contenu' => 'required|min:10',
            'date' => 'required|date',
        ]);
        Actualite::create($validated);
        return redirect('/admin/actualites/create')->with('success', 'Actualité ajoutée avec succès !');
    })->name('actualites.ajouter');

    // 📄 Ajouter un document
    Route::get('/admin/documents/create', fn() => view('admin.ajouter_document'));
    Route::post('/admin/documents', function (Request $request) {
        $validated = $request->validate([
            'titre' => 'required|string',
            'fichier' => 'required|file|mimes:pdf|max:2048',
        ]);

        $nomFichier = time() . '_' . $request->file('fichier')->getClientOriginalName();
        $request->file('fichier')->move(public_path('documents'), $nomFichier);

        Document::create([
            'titre' => $validated['titre'],
            'fichier' => $nomFichier,
        ]);

        return redirect('/admin/documents/create')->with('success', 'Document ajouté avec succès !');
    })->name('documents.ajouter');
});

// ✅ Tableau de bord après connexion
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Gestion du profil utilisateur (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Authentification Breeze
require __DIR__.'/auth.php';