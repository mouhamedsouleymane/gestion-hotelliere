<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0"><i class="bi bi-person-circle me-2"></i>Détails du Client: {{ $client->name }}</h2>
            <div>
                <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary me-2">
                    <i class="bi bi-pencil me-2"></i>Modifier
                </a>
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Retour à la liste
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Informations Personnelles</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Nom complet:</strong><br>
                            {{ $client->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong><br>
                            <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                        </div>
                        <div class="mb-3">
                            <strong>Téléphone:</strong><br>
                            <a href="tel:{{ $client->phone }}">{{ $client->phone }}</a>
                        </div>
                        @if ($client->address)
                            <div class="mb-3">
                                <strong>Adresse:</strong><br>
                                {{ $client->address }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <strong>Date d'inscription:</strong><br>
                            {{ $client->created_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Historique des Réservations</h5>
                    </div>
                    <div class="card-body">
                        @if ($client->reservations->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Chambre</th>
                                            <th>Arrivée</th>
                                            <th>Départ</th>
                                            <th>Prix Total</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($client->reservations as $reservation)
                                            <tr>
                                                <td>
                                                    Chambre {{ $reservation->room->number }}<br>
                                                    <small class="text-muted">{{ $reservation->room->type }}</small>
                                                </td>
                                                <td>{{ $reservation->check_in->format('d/m/Y') }}</td>
                                                <td>{{ $reservation->check_out->format('d/m/Y') }}</td>
                                                <td>{{ number_format($reservation->total_price, 0, ',', ' ') }} FCFA
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : ($reservation->status == 'cancelled' ? 'danger' : 'secondary')) }}">
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
                                                <td>
                                                    <a href="{{ route('reservations.show', $reservation) }}"
                                                        class="btn btn-sm btn-outline-info">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('invoices.show', $reservation) }}"
                                                        class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-receipt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h4 class="text-primary">{{ $client->reservations->count() }}</h4>
                                                <small class="text-muted">Total Réservations</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h4 class="text-success">
                                                    {{ number_format($client->reservations->sum('total_price'), 0, ',', ' ') }}
                                                    FCFA</h4>
                                                <small class="text-muted">Montant Total</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-light">
                                            <div class="card-body text-center">
                                                <h4 class="text-info">
                                                    {{ $client->reservations->where('status', 'confirmed')->count() }}
                                                </h4>
                                                <small class="text-muted">Réservations Confirmées</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                                <h5 class="text-muted mt-3">Aucune réservation trouvée</h5>
                                <p class="text-muted">Ce client n'a pas encore fait de réservation.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
