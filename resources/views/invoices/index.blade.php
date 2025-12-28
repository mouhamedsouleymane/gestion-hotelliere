<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0"><i class="bi bi-receipt me-2"></i>Gestion des Factures</h2>
        </div>
    </x-slot>

    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID Réservation</th>
                                <th>Client</th>
                                <th>Chambre</th>
                                <th>Date d'arrivée</th>
                                <th>Date de départ</th>
                                <th>Montant Total</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>#{{ $reservation->id }}</td>
                                    <td>
                                        <i class="bi bi-person me-2 text-primary"></i>
                                        {{ $reservation->client->name }}
                                    </td>
                                    <td>
                                        <i class="bi bi-door-open me-2 text-info"></i>
                                        {{ $reservation->room->number }}
                                    </td>
                                    <td>{{ $reservation->check_in->format('d/m/Y') }}</td>
                                    <td>{{ $reservation->check_out->format('d/m/Y') }}</td>
                                    <td><strong>{{ number_format($reservation->total_price, 0, ',', ' ') }}
                                            FCFA</strong></td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : ($reservation->status == 'completed' ? 'info' : 'danger')) }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('invoices.show', $reservation) }}"
                                                class="btn btn-outline-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('invoices.download', $reservation) }}"
                                                class="btn btn-outline-primary">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($reservations->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $reservations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
