{{-- dashboardLeazer.blade.php --}}
@extends('layouts.contentNavbarLayout')

@php
$user = auth()->user(); // Récupérez l'utilisateur actuellement authentifié.
@endphp

@section('content')
<div class="container mx-auto p-6">
  <div class="max-w-2xl mx-auto">
    <!-- Assurez-vous que la route 'leazer.update-profile' est définie dans vos routes web -->
    <form method="POST" action="{{ route('leazer.update-profile') }}" enctype="multipart/form-data">
      @csrf {{-- Protection contre les attaques CSRF --}}
      @method('PUT') {{-- Pour une mise à jour, vous devez utiliser la méthode PUT --}}

      <!-- Message d'erreur général pour le formulaire -->
      @if ($errors->any())
        <div class="mb-4">
          <ul>
            @foreach ($errors->all() as $error)
              <li class="text-red-500 text-xs">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Message de succès après la mise à jour du profil -->
      @if (session('success'))
        <div class="mb-4 text-sm font-medium text-green-600">
          {{ session('success') }}
        </div>
      @endif

      <!-- Affichage et mise à jour de la photo de profil -->
      {{-- ... --}}



<!-- Prénom -->
<div class="mb-4">
  <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
  <input type="text" id="first_name" name="first_name" value="{{ old('first_name') ?? explode(' ', $user->name)[0] }}" required autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Nom -->
<div class="mb-4">
  <label for="last_name" class="block text-sm font-medium text-gray-700">Nom</label>
  <input type="text" id="last_name" name="last_name" value="{{ old('last_name') ?? (explode(' ', $user->name)[1] ?? '') }}" required autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Sexe -->
      <div class="mb-6">
  <label for="gender" class="block mb-2 text-sm font-medium text-gray-700">
    Sexe
  </label>
  <select id="gender" name="gender" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    <option value="male">Homme</option>
    <option value="female">Femme</option>
    <option value="other">Autre</option>
  </select>
</div>

<!-- Email -->
<div class="mb-4">
  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
  <input type="email" id="email" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Téléphone -->
<div class="mb-4">
  <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
  <input type="tel" id="phone" name="phone" value="{{ old('phone') ?? $user->phone }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Description personnelle -->
<div class="mb-4">
  <label for="about" class="block text-sm font-medium text-gray-700">Décrivez-vous en quelques lignes</label>
  <textarea id="about" name="about" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('about') ?? $user->about }}</textarea>
</div>

<!-- Description du cocon idéal -->
<div class="mb-4">
  <label for="home_description" class="block text-sm font-medium text-gray-700">Décrivez votre Cocon (votre chez-vous idéal) en 3 mots</label>
  <input type="text" id="home_description" name="home_description" value="{{ old('home_description') ?? $user->home_description }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Centres d'intérêts -->
<div class="mb-4">
  <label for="interests" class="block text-sm font-medium text-gray-700">Quels sont vos centres d'intérêts, passions, loisirs ?</label>
  <input type="text" id="interests" name="interests" value="{{ old('interests') ?? $user->interests }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Régions -->
<div class="mb-4">
  <label for="region" class="block text-sm font-medium text-gray-700">Région</label>
  <input type="text" id="region" name="region" value="{{ old('region') ?? $user->region }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Villes -->
<div class="mb-4">
  <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
  <input type="text" id="city" name="city" value="{{ old('city') ?? $user->city }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Zones de recherche -->
<div class="mb-4">
  <label for="search_zones" class="block text-sm font-medium text-gray-700">Quelles sont les zones où nous pouvons vous confier des recherches ?</label>
  <textarea id="search_zones" name="search_zones" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('search_zones') ?? $user->search_zones }}</textarea>
</div>

<!-- Langues parlées -->
<div class="mb-4">
  <label for="languages" class="block text-sm font-medium text-gray-700">Quelles langues parlez-vous ?</label>
  <input type="text" id="languages" name="languages" value="{{ old('languages') ?? $user->languages }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
</div>

<!-- Comment avez-vous connu Leaze -->
<div class="mb-4">
  <label for="source" class="block text-sm font-medium text-gray-700">Comment avez-vous connu Leaze ?</label>
  <input type="text" id="source" name="source" value="{{ old('source') ?? $user->source }}" required class="mt-1 block w-full rounded-md border

      <!-- Bouton de soumission -->
      <div class="flex justify-end">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          {{ __('Enregistrer') }}
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
