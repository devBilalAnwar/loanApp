<div>
    {{-- Gérer l'affichage des messages de succès ou d'erreur --}}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Début du formulaire --}}
    <form wire:submit.prevent="submit">
        @csrf
        {{-- Ici, remplacez chaque input par un champ wire:model --}}
        {{-- Exemple pour le type de logement --}}
        <div class="mb-4">
            <h5>Type de logement</h5>
            <div class="d-flex">
                {{-- Utilisez wire:model pour lier vos champs à votre composant Livewire --}}
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" wire:model="type_logement" id="house" autocomplete="off" value="Maison" required>
                    <label class="btn btn-outline-primary" for="house">Maison</label>

                    <input type="radio" class="btn-check" wire:model="type_logement" id="apartment" autocomplete="off" value="Appartement" required>
                    <label class="btn btn-outline-primary" for="apartment">Appartement</label>
                </div>
            </div>
        </div>

        {{-- Continuez à remplacer chaque champ input avec wire:model --}}
        {{-- ... --}}

                <!-- Lieux de recherche -->
                <div class="mb-4">
                    <h5>Lieux de recherche</h5>
                    <div class="mb-3">
                        <label for="searchPlaces" class="form-label">Lieux de recherche (250/250)</label>
                        <input type="text" class="form-control" id="searchPlaces" required wire:model="lieux_recherche" >
                    </div>
                </div>

                <!-- Surface et Budget -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Surface (m²)</h5>
                        <input type="range" class="form-range" min="0" max="500" step="10" id="surfaceRange" oninput="updateSurfaceValue(this.value)" required wire:model="surface_min" >
                        <div id="surfaceValue" class="text-center">250 m²</div>
                    </div>
                    <div class="col-md-6">
                        <h5>Budget (€)</h5>
                        <input type="range" class="form-range" min="0" max="10000" step="100" id="budgetRange" oninput="updateBudgetValue(this.value)" required wire:model="budget_max" >
                        <div id="budgetValue" class="text-center">5000 €</div>
                    </div>
                </div>

   <!-- Taille -->
<div class="mb-4">
    <h5>Taille</h5>
    <select class="form-select" wire:model="taille" id="size" required>
        <option selected disabled value="">Sélectionner la taille</option>
        <option>T1</option>
        <option>T2</option>
        <option>T3</option>
        <option>T4</option>
        <option>T5+</option>
    </select>
</div>

<!-- Nombre de chambres -->
<div class="mb-4">
        <label for="nombre_chambres" class="form-label">Nombre de chambres</label>
        <select class="form-select" wire:model="nombre_chambres" id="nombre_chambres" required>
            <option value="">Sélectionnez le nombre de chambres</option>
            <option value="1">1 Chambre</option>
            <option value="2">2 Chambres</option>
            <option value="3">3 Chambres</option>
            <option value="3">4 Chambres</option>
            <option value="3">5 Chambres et +</option>
            <!-- Add more options as needed -->
        </select>
    </div>

<!-- étage -->
    <div class="mb-4">
        <label for="etage" class="form-label">Étage</label>
        <select class="form-select" wire:model="etage" id="etage" required>
            <option value="">Sélectionnez l'étage</option>
            <option value="rez-de-chaussee">Rez-de-chaussée</option>
            <option value="premier_etage">Premier étage</option>
            <!-- Add more options as needed -->
        </select>
    </div>

    <!-- Meublé ou Non Meublé -->
    <input type="radio" class="btn-check" wire:model="meuble" id="meuble" value="Meublé" required>
<label class="btn btn-outline-primary" for="meuble">Meublé</label>

<input type="radio" class="btn-check" wire:model="meuble" id="non_meuble" value="Non Meublé" required>
<label class="btn btn-outline-primary" for="non_meuble">Non Meublé</label>

<input type="radio" class="btn-check" wire:model="meuble" id="peu_importe" value="Peu importe" required>
<label class="btn btn-outline-primary" for="peu_importe">Peu importe</label>




<!-- Dead Line -->
<div class="mb-4">
    <h5>Dead Line</h5>
    <input type="date" class="form-control" id="deadline" required wire:model="deadline" >
</div>


  <!-- Custom Option Radio Image -->
  <div class="col-xl-6">
    <div class="card">
      <h5 class="card-header">Quelle est votre style préféré parmi :</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-image custom-option-image-radio">
              <label class="form-check-label custom-option-content" for="customRadioImg1">
                <span class="custom-option-body">
                  <img src="{{ asset('assets/img/backgrounds/speaker.png') }}" alt="radioImg" />
                </span>
              </label>
              <input class="form-check-input" type="radio" value="customRadioImg1" id="customRadioImg1" checked  wire:model="style_prefere" />
            </div>
          </div>
          <div class="col-md mb-md-0 mb-2">
            <div class="form-check custom-option custom-option-image custom-option-image-radio">
              <label class="form-check-label custom-option-content" for="customRadioImg2">
                <span class="custom-option-body">
                  <img src="{{ asset('assets/img/backgrounds/airpods.png') }}" alt="radioImg" />
                </span>
              </label>
              <input class="form-check-input" type="radio" value="customRadioImg2" id="customRadioImg2"  wire:model="style_prefere" />
            </div>
          </div>
          <div class="col-md">
            <div class="form-check custom-option custom-option-image custom-option-image-radio">
              <label class="form-check-label custom-option-content" for="customRadioImg3">
                <span class="custom-option-body">
                  <img src="{{ asset('assets/img/backgrounds/headphones.png') }}" alt="radioImg" />
                </span>
              </label>
              <input class="form-check-input" type="radio" value="customRadioImg3" id="customRadioImg3"  wire:model="style_prefere" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Custom Option Radio Image -->


                <!-- Autres Détails -->
                <div class="mb-4">
                    <h5>Autres Détails et Préférences</h5>
                    <textarea class="form-control" rows="4" placeholder="Nombre de chambres, étage, meublé, etc." ></textarea>
                </div>

        {{-- Bouton de soumission --}}
        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </div>


</form>
</div>

@push('scripts')
    <script>
        // Ajoutez ici du JavaScript personnalisé si nécessaire pour interagir avec le formulaire Livewire
        window.livewire.on('formSubmitted', () => {
            // Vous pouvez utiliser cette section pour gérer les événements après soumission
        });
    </script>
@endpush
