{{-- resources/views/dossier/create.blade.php --}}

@extends('layouts/layoutMaster')

@section('title', 'Dépôt du Dossier Locataire')

@section('content')
    <div class="container">
        {{-- Incluez le composant Livewire ici --}}
        @livewire('dossier-form')
    </div>
@endsection
