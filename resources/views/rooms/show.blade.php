<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0"><i class="bi bi-door-open me-2"></i>Détails de la Chambre {{ $room->number }}</h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Informations de la Chambre</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Numéro:</strong> {{ $room->number }}</p>
                                <p><strong>Type:</strong> {{ $room->type }}</p>
                                <p><strong>Prix par nuit:</strong> {{ $room->price }} FCFA</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Statut:</strong>
                                    <span
                                        class="badge bg-{{ $room->status == 'available' ? 'success' : ($room->status == 'occupied' ? 'danger' : 'warning') }}">
                                        {{ $room->status == 'available' ? 'Disponible' : ($room->status == 'occupied' ? 'Occupée' : 'Maintenance') }}
                                    </span>
                                </p>
                                <p><strong>Créée le:</strong> {{ $room->created_at->format('d/m/Y H:i') }}</p>
                                <p><strong>Dernière mise à jour:</strong> {{ $room->updated_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Réservations récentes pour cette chambre -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Réservations Récentes</h5>
                    </div>
                    <div class="card-body">
                        @if ($room->reservations->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Arrivée</th>
                                            <th>Départ</th>
                                            <th>Statut</th>
                                            <th>Prix Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($room->reservations->take(5) as $reservation)
                                            <tr>
                                                <td>{{ $reservation->client->name }}</td>
                                                <td>{{ $reservation->check_in->format('d/m/Y') }}</td>
                                                <td>{{ $reservation->check_out->format('d/m/Y') }}</td>
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
                                                <td>{{ $reservation->total_price }} FCFA</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">Aucune réservation pour cette chambre.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Actions</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('rooms.edit', $room) }}" class="btn btn-primary w-100 mb-2">
                            <i class="bi bi-pencil me-2"></i>Modifier
                        </a>
                        <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')">
                                <i class="bi bi-trash me-2"></i>Supprimer
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Statistiques</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Réservations totales:</strong> {{ $room->reservations->count() }}</p>
                        <p><strong>Revenus totaux:</strong> {{ $room->reservations->sum('total_price') }} FCFA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
