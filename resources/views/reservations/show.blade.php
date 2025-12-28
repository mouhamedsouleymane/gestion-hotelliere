<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h3>Détails de la Réservation</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Client</dt>
                <dd class="col-sm-9">{{ $reservation->client->name }}</dd>

                <dt class="col-sm-3">Chambre</dt>
                <dd class="col-sm-9">{{ $reservation->room->number }}</dd>

                <dt class="col-sm-3">Date d'arrivée</dt>
                <dd class="col-sm-9">{{ $reservation->check_in->format('d/m/Y') }}</dd>

                <dt class="col-sm-3">Date de départ</dt>
                <dd class="col-sm-9">{{ $reservation->check_out->format('d/m/Y') }}</dd>

                <dt class="col-sm-3">Prix total</dt>
                <dd class="col-sm-9">{{ number_format($reservation->total_price, 0, ',', ' ') }} FCFA</dd>

                <dt class="col-sm-3">Statut</dt>
                <dd class="col-sm-9">
                    @switch($reservation->status)
                        @case('pending')
                            <span class="badge bg-warning">En attente</span>
                        @break

                        @case('confirmed')
                            <span class="badge bg-success">Confirmée</span>
                        @break

                        @case('cancelled')
                            <span class="badge bg-danger">Annulée</span>
                        @break

                        @case('completed')
                            <span class="badge bg-info">Terminée</span>
                        @break
                    @endswitch
                </dd>
            </dl>
        </div>
    </div>
</x-app-layout>
