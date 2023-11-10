<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CahierCharges;
use Illuminate\Support\Facades\Mail;
use App\Mail\CahierChargesSubmitted;

class CahierChargesForm extends Component
{
    public $type_logement, $lieux_recherche, $surface_min, $budget_max, $taille,
           $nombre_chambres, $meuble, $etage, $deadline, $autre_details, $style_prefere;

    protected $rules = [
        'type_logement' => 'required|string',
        'lieux_recherche' => 'required|string',
        'surface_min' => 'required|numeric|min:9',
        'budget_max' => 'required|numeric|min:400',
        'taille' => 'required|string',
        'nombre_chambres' => 'required|numeric|min:0',
        'meuble' => 'required|in:Meublé,Peu importe,Non Meublé',
        'deadline' => 'required|date|after:today',
        'etage' => 'required|in:rez-de-chaussee,peu_importe,premier_etage,plus',
        'style_prefere' => 'required|string',
        'autre_details' => 'sometimes|string|nullable',
    ];

    public function mount()
    {
        // Charger les données de l'utilisateur authentifié
        $userCahierCharges = CahierCharges::where('user_id', auth()->id())->first();

        if ($userCahierCharges) {
            $this->fill($userCahierCharges->toArray());
        }
    }

    public function submit()
    {
        $validatedData = $this->validate();

        // Mettre à jour ou créer le cahier de charges pour l'utilisateur authentifié
        $cahierCharges = CahierCharges::updateOrCreate(
            ['user_id' => auth()->id()],
            $validatedData
        );

        // Envoyer l'email avec l'instance de CahierCharges
        Mail::to('contact@leaze.fr')->send(new CahierChargesSubmitted($cahierCharges));

        // Émettre un événement d'alerte sur le front-end ou afficher un message
        session()->flash('message', 'Cahier des charges sauvegardé avec succès!');
       }


    public function render()
    {
        return view('livewire.cahier-charges-form');
    }
}
