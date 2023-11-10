<x-form-section submit="updateProfileInformation">
  <x-slot name="title">
    {{ __('Informations du Profil') }}
  </x-slot>

  <x-slot name="description">
    {{ __('Mettez à jour les informations de profil et l\'adresse e-mail de votre compte.') }}
  </x-slot>

  <x-slot name="form">

    <x-action-message on="saved">
      {{ __('Enregistré.') }}
    </x-action-message>

    <!-- Photo de Profil -->
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
      <div class="mb-3" x-data="{photoName: null, photoPreview: null}">
        <!-- Input de fichier pour la photo de profil -->
        <input type="file" hidden wire:model.live="photo" x-ref="photo"
          x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result;}; reader.readAsDataURL($refs.photo.files[0]);" />

        <!-- Photo de Profil Actuelle -->
        <div class="mt-2" x-show="! photoPreview">
          <img src="{{ $this->user->profile_photo_url }}" alt="{{ __('Photo de profil actuelle') }}" class="rounded-circle" height="80px" width="80px">
        </div>

        <!-- Aperçu de la Nouvelle Photo de Profil -->
        <div class="mt-2" x-show="photoPreview">
          <img :src="photoPreview" alt="{{ __('Nouvelle photo de profil') }}" class="rounded-circle" width="80px" height="80px">
        </div>

        <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
          {{ __('Sélectionner une nouvelle photo') }}
        </x-secondary-button>

        @if ($this->user->profile_photo_path)
          <button type="button" class="btn btn-danger text-uppercase mt-2" wire:click="deleteProfilePhoto">
            {{ __('Supprimer la photo') }}
          </button>
        @endif

        <x-input-error for="photo" class="mt-2" />
      </div>
    @endif

    <!-- Nom -->
    <div class="mb-3">
      <x-label class="form-label" for="name" value="{{ __('Nom') }}" />
      <x-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
        wire:model="state.name" autocomplete="name" />
      <x-input-error for="name" />
    </div>

    <!-- Email -->
    <div class="mb-3">
      <x-label class="form-label" for="email" value="{{ __('E-mail') }}" />
      <x-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
        wire:model="state.email" />
      <x-input-error for="email" />
    </div>
  </x-slot>

  <x-slot name="actions">
    <div class="d-flex align-items-baseline">
      <x-button>
        {{ __('Enregistrer') }}
      </x-button>
    </div>
  </x-slot>
</x-form-section>
