{{-- search_results.blade.php --}}
@extends('layouts.contentNavbarLayout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Résultats de la Recherche</h1>
    <div class="row">
        @foreach($properties as $property)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    {{-- Carousel pour les images --}}
                    @if(!empty($property['pictures']))
                        <div id="carouselExample{{$loop->index}}" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($property['pictures'] as $index => $picture)
                                    <li data-target="#carouselExample{{$loop->parent->index}}" data-slide-to="{{$index}}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($property['pictures'] as $index => $picture)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ $picture }}" class="d-block w-100" alt="Image de la propriété">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample{{$loop->index}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Précédent</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample{{$loop->index}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Suivant</span>
                            </a>
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $property['title'] ?? 'Titre non disponible' }}</h5>
                        <p class="card-text">{{ $property['description'] ?? 'Description non disponible' }}</p>
                        <p class="card-text">Prix : {{ $property['price'] ?? 'Non disponible' }} €</p>
                        <p class="card-text">Surface : {{ $property['surface'] ?? 'Non disponible' }} m²</p>
                        {{-- Icônes pour métro, RER, etc. --}}
                        @if(!empty($property['stations']))
                            <div class="mb-2">
                                <strong>Stations de métro proches :</strong>
                                <ul class="list-unstyled">
                                    @foreach($property['stations'] as $station)
                                        <li>
                                            <i class="fas fa-subway"></i> {{ $station['name'] }}
                                            @foreach($station['lines'] as $line)
                                                <span class="badge" style="background-color: {{ $line['color'] }};">{{ $line['number'] }}</span>
                                            @endforeach
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- Bouton pour la visite virtuelle --}}
                        @if(!empty($property['virtualTour']))
                            <a href="{{ $property['virtualTour'] }}" class="btn btn-info" target="_blank">Visite virtuelle</a>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ $property['url'] ?? '#' }}" class="btn btn-primary" target="_blank">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.carousel').carousel({
            interval: 3000
        });
    });
</script>
@endsection
