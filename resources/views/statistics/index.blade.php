<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0"><i class="bi bi-graph-up me-2"></i>Statistiques détaillées</h1>

        </div>
    </x-slot>
    <div class="container-fluid">
        <!-- Statistiques générales -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Total Chambres</h6>
                                <h3 class="mb-0">{{ $stats['rooms']['total'] }}</h3>
                            </div>
                            <i class="bi bi-door-open" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Disponibles</h6>
                                <h3 class="mb-0">{{ $stats['rooms']['available'] }}</h3>
                            </div>
                            <i class="bi bi-check-circle" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Occupées</h6>
                                <h3 class="mb-0">{{ $stats['rooms']['occupied'] }}</h3>
                            </div>
                            <i class="bi bi-person-fill" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Maintenance</h6>
                                <h3 class="mb-0">{{ $stats['rooms']['maintenance'] }}</h3>
                            </div>
                            <i class="bi bi-tools" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques des réservations -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-calendar-check me-2"></i>Statistiques des réservations</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6>Total réservations</h6>
                                        <h3 class="text-primary">{{ $stats['reservations']['total'] }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6>Confirmées</h6>
                                        <h3 class="text-success">{{ $stats['reservations']['confirmed'] }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6>En attente</h6>
                                        <h3 class="text-warning">{{ $stats['reservations']['pending'] }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6>Terminées</h6>
                                        <h3 class="text-info">{{ $stats['reservations']['completed'] }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-people me-2"></i>Statistiques des personnes</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6>Total clients</h6>
                                        <h3 class="text-info">{{ $stats['clients'] }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6>Total employés</h6>
                                        <h3 class="text-secondary">{{ $stats['employees']['total'] }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques mensuels -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-bar-chart me-2"></i>Évolution mensuelle</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $months = [
                                1 => 'Janvier',
                                2 => 'Février',
                                3 => 'Mars',
                                4 => 'Avril',
                                5 => 'Mai',
                                6 => 'Juin',
                                7 => 'Juillet',
                                8 => 'Août',
                                9 => 'Septembre',
                                10 => 'Octobre',
                                11 => 'Novembre',
                                12 => 'Décembre',
                            ];
                        @endphp
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Réservations par mois</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Mois</th>
                                                <th>Nombre</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <tr>
                                                    <td>{{ $months[$i] }}</td>
                                                    <td>{{ $stats['reservations']['monthly'][$i] ?? 0 }}</td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>Revenus par mois (FCFA)</h6>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Mois</th>
                                                <th>Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <tr>
                                                    <td>{{ $months[$i] }}</td>
                                                    <td>{{ number_format($stats['reservations']['revenue_monthly'][$i] ?? 0, 0, ',', ' ') }}
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
