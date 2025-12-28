<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0"><i class="bi bi-speedometer2 me-2"></i>Tableau de bord</h2>
    </x-slot>

    <div class="container-fluid">
        <!-- Statistiques -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card text-white" style="background: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80') center/cover no-repeat;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Chambres Totales</h6>
                                <h3 class="mb-0">{{ $stats['rooms_total'] }}</h3>
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
                                <h3 class="mb-0">{{ $stats['rooms_available'] }}</h3>
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
                                <h3 class="mb-0">{{ $stats['rooms_occupied'] }}</h3>
                            </div>
                            <i class="bi bi-person-fill" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Clients</h6>
                                <h3 class="mb-0">{{ $stats['clients_total'] }}</h3>
                            </div>
                            <i class="bi bi-people" style="font-size: 2rem; opacity: 0.7;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions Rapides -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-lightning-charge me-2"></i>Actions Rapides</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <a href="{{ route('reservations.create') }}" class="btn btn-primary btn-lg w-100">
                                    <i class="bi bi-calendar-plus me-2"></i>
                                    Nouvelle Réservation
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('clients.create') }}" class="btn btn-success btn-lg w-100">
                                    <i class="bi bi-person-plus me-2"></i>
                                    Nouveau Client
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('rooms.create') }}" class="btn btn-info btn-lg w-100">
                                    <i class="bi bi-house-add me-2"></i>
                                    Nouvelle Chambre
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('invoices.index') }}" class="btn btn-warning btn-lg w-100">
                                    <i class="bi bi-receipt me-2"></i>
                                    Voir les Factures
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Réservations récentes -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-calendar-check me-2"></i>Réservations Récentes</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Chambre</th>
                                        <th>Arrivée</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stats['recent_reservations'] as $reservation)
                                        <tr>
                                            <td>{{ $reservation->client->name }}</td>
                                            <td>{{ $reservation->room->number }}</td>
                                            <td>{{ $reservation->check_in->format('d/m/Y') }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : ($reservation->status == 'cancelled' ? 'danger' : 'secondary')) }} badge-sm">
                                                    @switch($reservation->status)
                                                        @case('confirmed')
                                                            Confirmée
                                                        @break

                                                        @case('pending')
                                                            En attente
                                                        @break

                                                        @case('cancelled')
                                                            Annulée
                                                        @break

                                                        @case('completed')
                                                            Terminée
                                                        @break

                                                        @default
                                                            {{ ucfirst($reservation->status) }}
                                                    @endswitch
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="bi bi-graph-up me-2"></i>Statistiques</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <small class="text-muted">Taux d'occupation</small>
                            <div class="progress mt-1">
                                <div class="progress-bar" style="width: {{ $stats['occupation_rate'] }}%">
                                    {{ round($stats['occupation_rate']) }}%</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Réservations ce mois</small>
                            <h4 class="text-primary">{{ $stats['reservations_month'] }}</h4>
                        </div>
                        <div>
                            <small class="text-muted">Revenus estimés</small>
                            <h4 class="text-success">{{ $stats['revenue_month'] }} FCFA</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
