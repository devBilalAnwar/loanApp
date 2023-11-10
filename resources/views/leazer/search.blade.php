{{-- search.blade.php --}}
@extends('layouts.contentNavbarLayout')

@section('content')
<div class="container">
    <h1>Recherche de logement</h1>
    <form action="{{ route('search.results') }}" method="GET" target="_blank">        <div>
            <label for="query">Recherche:</label>
            <input type="text" name="query" id="query" placeholder="Ville, adresse, etc.">
        </div>

        {{-- Ajoute des champs pour chaque critère de recherche de l'API --}}
        <div>
            <label for="bedroomMin">Chambres min:</label>
            <input type="number" name="bedroomMin" id="bedroomMin">
        </div>

        <div>
            <label for="bedroomMax">Chambres max:</label>
            <input type="number" name="bedroomMax" id="bedroomMax">
        </div>

        <div>
            <label for="budgetMin">Budget min (€):</label>
            <input type="number" name="budgetMin" id="budgetMin">
        </div>

        <div>
            <label for="budgetMax">Budget max (€):</label>
            <input type="number" name="budgetMax" id="budgetMax">
        </div>

        {{-- Répéter pour les autres critères tels que surface, frais de copropriété, année de construction, etc. --}}
        {{-- Utilise des sélecteurs ou des champs d'entrée appropriés pour les paramètres comme les catégories d'énergie, les codes postaux inclus/exclus, etc. --}}

        <div>
            <label for="transactionType">Type de transaction:</label>
            <select name="transactionType" id="transactionType">
                <option value="0">Vente</option>
                <option value="1">Location</option>
            </select>
        </div>

        {{-- Pour les critères qui acceptent plusieurs valeurs, tu peux permettre à l'utilisateur de sélectionner plusieurs options --}}
        <div>
            <label for="energyCategories">Catégories d'énergie:</label>
            <select name="energyCategories[]" id="energyCategories" multiple>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                {{-- Ajoute d'autres options selon les catégories disponibles --}}
            </select>
        </div>

        {{-- Plusieurs autres champs peuvent être ajoutés ici en fonction des paramètres de l'API --}}

        <button type="submit">Rechercher</button>
    </form>
</div>
@endsection
