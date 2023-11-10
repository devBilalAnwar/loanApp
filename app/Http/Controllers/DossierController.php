<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DossierSubmitted;

class DossierController extends Controller
{
    public function store(Request $request) {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'locataire' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|string|max:255',
            'documents' => 'nullable', // Peut être null si non obligatoire
            'commentaires' => 'nullable|string',
        ]);

        // Traiter et stocker les fichiers téléchargés, si disponibles
        $documentsPaths = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('public/documents');
                $documentsPaths[] = $path;
            }
        }

        // Créer une nouvelle entrée Dossier dans la base de données
        $dossier = Dossier::create([
            'user_id' => auth()->id(),
            'locataire' => $validatedData['locataire'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'documents' => json_encode($documentsPaths),
            'commentaires' => $validatedData['commentaires'],
        ]);

        // Envoyer un e-mail de confirmation
        Mail::to('contact@leaze.fr')->send(new DossierSubmitted($dossier));

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->back()->with('success', 'Votre dossier a été soumis avec succès et est en cours de traitement.');
    }
}
