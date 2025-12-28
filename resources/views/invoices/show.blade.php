<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0"><i class="bi bi-receipt me-2"></i>Facture #{{ $reservation->id }}</h2>
            <a href="{{ route('invoices.download', $reservation) }}" class="btn btn-primary">
                <i class="bi bi-download me-2"></i>Télécharger PDF
            </a>
        </div>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-receipt me-2"></i>FACTURE</h5>
                    </div>
                    <div class="card-body">
                        <!-- En-tête de la facture -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="text-muted">DE:</h6>
                                <strong>{{ config('app.name') }}</strong><br>
                                Hôtel de Gestion<br>
                                Adresse: [Votre Adresse]<br>
                                Téléphone: [Votre Téléphone]<br>
                                Email: [Votre Email]
                            </div>
                            <div class="col-md-6 text-end">
                                <h6 class="text-muted">FACTURE #{{ $reservation->id }}</h6>
                                <p class="mb-1">Date: {{ now()->format('d/m/Y') }}</p>
                                <p class="mb-1">Statut:
                                    <span
                                        class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'completed' ? 'info' : 'warning') }}">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <!-- Informations client -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-muted">FACTURER À:</h6>
                                <strong>{{ $reservation->client->name }}</strong><br>
                                @if ($reservation->client->email)
                                    Email: {{ $reservation->client->email }}<br>
                                @endif
                                @if ($reservation->client->phone)
                                    Téléphone: {{ $reservation->client->phone }}<br>
                                @endif
                                @if ($reservation->client->address)
                                    Adresse: {{ $reservation->client->address }}
                                @endif
                            </div>
                        </div>

                        <!-- Détails de la réservation -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Description</th>
                                        <th>Chambre</th>
                                        <th>Arrivée</th>
                                        <th>Départ</th>
                                        <th>Nuits</th>
                                        <th>Prix/Nuit</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Réservation Chambre</td>
                                        <td>{{ $reservation->room->number }} - {{ $reservation->room->type }}</td>
                                        <td>{{ $reservation->check_in->format('d/m/Y') }}</td>
                                        <td>{{ $reservation->check_out->format('d/m/Y') }}</td>
                                        <td>{{ $reservation->check_in->diffInDays($reservation->check_out) }}</td>
                                        <td>{{ number_format($reservation->room->price, 0, ',', ' ') }} FCFA</td>
                                        <td><strong>{{ number_format($reservation->total_price, 0, ',', ' ') }}
                                                FCFA</strong></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-end"><strong>TOTAL:</strong></td>
                                        <td><strong>{{ number_format($reservation->total_price, 0, ',', ' ') }}
                                                FCFA</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Notes -->
                        @if ($reservation->notes)
                            <div class="mt-4">
                                <h6 class="text-muted">NOTES:</h6>
                                <p>{{ $reservation->notes }}</p>
                            </div>
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
                        <a href="{{ route('invoices.download', $reservation) }}" class="btn btn-primary w-100 mb-2">
                            <i class="bi bi-download me-2"></i>Télécharger PDF
                        </a>
                        <a href="{{ route('invoices.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-arrow-left me-2"></i>Retour aux Factures
                        </a>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">Informations Réservation</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>ID Réservation:</strong> #{{ $reservation->id }}</p>
                        <p><strong>Créée le:</strong> {{ $reservation->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>Dernière mise à jour:</strong> {{ $reservation->updated_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
