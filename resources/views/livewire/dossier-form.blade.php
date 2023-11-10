<div>
    {{-- Afficher les erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Afficher un message de succès --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


        <div>
    <form wire:submit.prevent="submit">
        @csrf
        <!-- Informations personnelles -->
        <h3>Informations Personnelles</h3>

        <!-- Prénom -->
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" wire:model.defer="prenom" readonly>
        </div>

        <!-- Nom -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" wire:model.defer="nom" readonly>
        </div>

        <!-- Date de naissance -->
        <div class="mb-3">
            <label for="date_naissance" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" wire:model.defer="date_naissance" required>
        </div>

        <!-- Adresse actuelle -->
        <div class="mb-3">
            <label for="adresse_actuelle" class="form-label">Adresse actuelle</label>
            <input type="text" class="form-control" wire:model.defer="adresse_actuelle" required>
        </div>

        <!-- Situation professionnelle -->
        <h3>Situation Professionnelle</h3>

        <!-- Profession -->
        <div class="mb-3">
            <label for="profession" class="form-label">Profession</label>
            <input type="text" class="form-control" wire:model.defer="profession" required>
        </div>

        <!-- Revenus -->
        <div class="mb-3">
            <label for="revenus" class="form-label">Revenus mensuels (€)</label>
            <input type="number" class="form-control" wire:model.defer="revenus" required>
        </div>

        <!-- Documents requis -->
        <h3>Documents Requis</h3>

        <!-- Pièce d'identité -->
        <div class="mb-3">
            <label for="piece_identite" class="form-label">Pièce d'identité</label>
            <input type="file" class="form-control" wire:model="piece_identite" required>
        </div>

        <!-- Justificatifs de revenus -->
        <div class="mb-3">
            <label for="justificatifs_revenus" class="form-label">Justificatifs de revenus</label>
            <input type="file" class="form-control" wire:model="justificatifs_revenus" required>
        </div>

        <!-- Justificatif de domicile -->
        <div class="mb-3">
            <label for="justificatif_domicile" class="form-label">Justificatif de domicile</label>
            <input type="file" class="form-control" wire:model="justificatif_domicile" required>
        </div>

        <!-- Dernières quittances de loyer -->
        <div class="mb-3">
            <label for="quittances_loyer" class="form-label">Dernières quittances de loyer</label>
            <input type="file" class="form-control" wire:model="quittances_loyer">
        </div>

        <!-- Garanties -->
        <h3>Garanties</h3>

        <!-- Garant -->
        <div class="mb-3">
            <label for="garant" class="form-label">Garant (si applicable)</label>
            <input type="text" class="form-control" wire:model.defer="garant">
        </div>

        <!-- Dossier de caution solidaire -->
        <div class="mb-3">
            <label for="dossier_caution" class="form-label">Dossier de caution solidaire</label>
            <input type="file" class="form-control" wire:model="dossier_caution">
        </div>

        <!-- Bouton de soumission -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Soumettre le Dossier</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Ajoutez ici du JavaScript personnalisé si nécessaire
</script>
@endpush
