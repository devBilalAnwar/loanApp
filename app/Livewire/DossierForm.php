<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Dossier;
use Illuminate\Support\Facades\Mail;
use App\Mail\DossierSubmitted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DossierForm extends Component
{
    use WithFileUploads;

    public $prenom, $nom; // Ajout des propriétés pour prénom et nom
    public $date_naissance, $adresse_actuelle;
    public $profession, $revenus;
    public $piece_identite, $justificatifs_revenus, $justificatif_domicile, $quittances_loyer;
    public $garant, $dossier_caution;
    public $commentaires;

    protected $rules = [
        'prenom' => 'required|string|max:255', // Ajoutez des règles pour $prenom
        'nom' => 'required|string|max:255', // Ajoutez des règles pour $nom
        'date_naissance' => 'required|date',
        'adresse_actuelle' => 'required|string|max:255',
        'profession' => 'required|string|max:255',
        'revenus' => 'required|numeric',
        'piece_identite' => 'required|file|max:10240', // 10MB max size
        'justificatifs_revenus' => 'required|file|max:10240',
        'justificatif_domicile' => 'required|file|max:10240',
        'quittances_loyer' => 'nullable|file|max:10240',
        'garant' => 'nullable|string|max:255',
        'dossier_caution' => 'nullable|file|max:10240',
        'commentaires' => 'nullable|string|max:2000',
    ];

    public function mount()
    {
        $user = Auth::user();
        if ($user) {
            // Jetstream stocke le nom complet sous 'name', le diviser en prénom et nom
            $names = explode(' ', $user->name, 2);
            $this->prenom = $names[0];
            $this->nom = $names[1] ?? ''; // Utilisez '??' pour gérer le cas où il n'y a pas de nom

            // Charger le dossier existant de l'utilisateur si disponible
            $userDossier = Dossier::where('user_id', $user->id)->first();
            if ($userDossier) {
                $this->fill($userDossier->toArray());
            }
        }
    }


    public function submit()
    {
        $this->validate();

        // Utilisez $prenom et $nom pour le champ 'nom_locataire'
        $nomCompletLocataire = $this->prenom . ' ' . $this->nom;

        $dossier = Dossier::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'nom_locataire' => $nomCompletLocataire, // Utiliser la variable locale au lieu de la propriété
                'date_naissance' => $this->date_naissance,
                'adresse_actuelle' => $this->adresse_actuelle,
                'profession' => $this->profession,
                'revenus' => $this->revenus,
                // ... autres attributs non fichier
                'commentaires' => $this->commentaires,
            ]
        );

        // Gérer les fichiers téléchargés
        if ($this->piece_identite) {
            $dossier->piece_identite = $this->piece_identite->store('documents', 'public');
        }
        if ($this->justificatifs_revenus) {
            $dossier->justificatifs_revenus = $this->justificatifs_revenus->store('documents', 'public');
        }
        if ($this->justificatif_domicile) {
            $dossier->justificatif_domicile = $this->justificatif_domicile->store('documents', 'public');
        }
        if ($this->quittances_loyer) {
            $dossier->quittances_loyer = $this->quittances_loyer->store('documents', 'public');
        }
        if ($this->dossier_caution) {
            $dossier->dossier_caution = $this->dossier_caution->store('documents', 'public');
        }
        // ... Répéter pour les autres fichiers

        $dossier->save();

             // Récupérer l'utilisateur authentifié
             $user = Auth::user(); // Assurez-vous que $user est défini en récupérant l'utilisateur authentifié

            // Envoyer l'email
            Mail::to($user->email)->send(new DossierSubmitted($dossier));

            // Afficher un message de succès
            session()->flash('success', 'Dossier enregistré avec succès.');

    }

    public function render()
    {
        return view('livewire.dossier-form');
    }
}
