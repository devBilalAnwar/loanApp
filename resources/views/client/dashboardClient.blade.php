@extends('layouts/layoutMaster')

@php
    $configData = Helper::appClasses();
@endphp

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-academy-dashboard.js') }}"></script>
@endsection

@section('title', 'Dashboard Client')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/cards-advance.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Client /</span> Tableau de bord
    </h4>

    <div class="row">

        <!-- Graphique des heures -->
        <div class="card bg-transparent shadow-none my-4 border-0">
            <div class="card-body row p-0 pb-3">
                <div class="col-12 col-md-8 card-separator">
                    <h3>Ravi de vous revoir, {{ Auth::user()->name }} 👋🏻</h3>
                    <div class="col-12 col-lg-7">
                        <p>Votre prochain cocon est à portée de main !</p>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap gap-3 me-5">
                        <div class="d-flex align-items-center gap-3 me-4 me-sm-0">
                            <span class="bg-label-primary p-2 rounded">
                                <i class='ti ti-device-laptop ti-xl'></i>
                            </span>
                            <div class="content-right">
                                <p class="mb-0">Heures de recherche économisées</p>
                                <h4 class="text-primary mb-0">34h</h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="bg-label-info p-2 rounded">
                                <i class='ti ti-bulb ti-xl'></i>
                            </span>
                            <div class="content-right">
                                <p class="mb-0">Résultats des Tests</p>
                                <h4 class="text-info mb-0">82%</h4>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="bg-label-warning p-2 rounded">
                                <i class='ti ti-discount-check ti-xl'></i>
                            </span>
                            <div class="content-right">
                                <p class="mb-0">Chasses Terminées</p>
                                <h4 class="text-warning mb-0">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ps-md-3 ps-lg-4 pt-3 pt-md-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div>
                                <h5 class="mb-2">Vue d'ensemble</h5>
                                <p class="mb-5">Ici, retrouvez la complétion de votre mission éstimée par notre IA.</p>
                            </div>
                            <div class="time-spending-chart">
                                <h3 class="mb-2">231<span class="text-muted">h</span> 14<span class="text-muted">m</span>
                                </h3>
                                <span class="badge bg-label-success">+18.4%</span>
                            </div>
                        </div>
                        <div id="leadsReportChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du graphique des heures -->

        <a class="btn btn-primary" href="{{ route('assignChat') }}">Assign chat</a>


        <!-- TIMELINE -->

        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Vos prochaines étapes</span>
        </h4>

        <div class="row overflow-hidden">
            <div class="col-12">
                <ul class="timeline timeline-center mt-5">
                    <li class="timeline-item">
                        <span class="timeline-indicator timeline-indicator-primary" data-aos="zoom-in" data-aos-delay="200">
                            <i class="ti ti-upload ti-sm"></i>
                        </span>
                        <div class="timeline-event card p-0" data-aos="fade-right">
                            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="card-title mb-0">Dépôt du dossier</h6>
                                <div class="meta">
                                    <span class="badge rounded-pill bg-label-primary">Dossier</span>
                                    <span class="badge rounded-pill bg-label-success">En cours</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="mb-2">
                                    Vous avez déjà accompli cette étape en soumettant votre dossier locatif.
                                </p>
                            </div>
                            <div class="timeline-event-time">1er Janvier</div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-indicator timeline-indicator-success" data-aos="zoom-in" data-aos-delay="200">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                        <div class="timeline-event card p-0" data-aos="fade-left">
                            <div class="card-header">
                                <h6 class="card-title">Match avec votre leaser</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap mb-4">
                                    <div>
                                        <div class="avatar avatar-xs me-2">
                                            <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar"
                                                class="rounded-circle" />
                                        </div>
                                    </div>
                                    <span>Le match a été effectué avec succès par <span
                                            class="fw-medium">Sarah</span></span>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="d-flex">
                                        <div>
                                            <div class="avatar avatar-xs me-3">
                                                <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                        </div>
                                        <div class="mb-3 w-100">
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 48.7%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small>Match</small>
                                        </div>
                                    </li>
                                    <!-- Ajoutez des éléments similaires pour d'autres indicateurs de correspondance -->
                                </ul>
                            </div>
                            <div class="timeline-event-time">2 janvier</div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-indicator timeline-indicator-warning" data-aos="zoom-in"
                            data-aos-delay="200">
                            <i class="ti ti-book ti-sm"></i>
                        </span>
                        <div class="timeline-event card p-0" data-aos="fade-right">
                            <h6 class="card-header">Établissement du cahier des charges</h6>
                            <div class="card-body">
                                <p class="mb-2">Nous allons travailler sur les détails de vos exigences pour la recherche
                                    de logement.</p>
                            </div>
                            <div class="timeline-event-time">5 janvier</div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-indicator timeline-indicator-info" data-aos="zoom-in" data-aos-delay="200">
                            <i class="ti ti-search ti-sm"></i>
                        </span>
                        <div class="timeline-event card p-0" data-aos="fade-left">
                            <h6 class="card-header">Propositions de logement</h6>
                            <div class="card-body">
                                <p class="mb-2">Nous vous présenterons bientôt des options de logement correspondant à
                                    vos critères.</p>
                            </div>
                            <div class="timeline-event-time">10 janvier</div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-indicator timeline-indicator-danger" data-aos="zoom-in"
                            data-aos-delay="200">
                            <i class="ti ti-map ti-sm"></i>
                        </span>
                        <div class="timeline-event card p-0" data-aos="fade-right">
                            <h6 class="card-header">Visites prévues</h6>
                            <div class="card-body">
                                <p class="mb-2">Les visites des propriétés sélectionnées sont programmées.</p>
                            </div>
                            <div class="timeline-event-time">15 janvier</div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-indicator timeline-indicator-primary" data-aos="zoom-in"
                            data-aos-delay="200">
                            <i class="ti ti-check ti-sm"></i>
                        </span>
                        <div class="timeline-event card p-0" data-aos="fade-left">
                            <h6 class="card-header">Visites effectuées</h6>
                            <div class="card-body">
                                <p class="mb-2">Vous avez visité les propriétés et nous attendons votre feedback.</p>
                            </div>
                            <div class="timeline-event-time">20 janvier</div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-indicator timeline-indicator-success" data-aos="zoom-in"
                            data-aos-delay="200">
                            <i class="ti ti-file ti-sm"></i>
                        </span>
                        <div class="timeline-event card p-0" data-aos="fade-right">
                            <h6 class="card-header">Contrat de bail signé</h6>
                            <div class="card-body">
                                <p class="mb-2">Le contrat de bail a été signé avec succès.</p>
                            </div>
                            <div class="timeline-event-time">25 janvier</div>
                        </div>
                    </li>
                    <li class="timeline-item">
                        <span class="timeline-indicator timeline-indicator-info" data-aos="zoom-in" data-aos-delay="200">
                            <i class="ti ti-home ti-sm"></i>
                        </span>
                        <div class="timeline-event card p-0" data-aos="fade-left">
                            <h6 class="card-header">Post déménagement</h6>
                            <div class="card-body">
                                <p class="mb-2">Félicitations pour votre déménagement dans votre nouveau logement !</p>
                            </div>
                            <div class="timeline-event-time">30 janvier</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- TIMELINE -->



    </div>

@endsection
