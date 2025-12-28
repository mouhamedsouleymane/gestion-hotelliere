<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0"><i class="bi bi-calendar-event me-2"></i>Modifier la Réservation</h2>
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Informations de la Réservation</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reservations.update', $reservation) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="client_id" class="form-label">Client <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('client_id') is-invalid @enderror" id="client_id"
                                        name="client_id" required>
                                        <option value="">Sélectionner un client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"
                                                {{ old('client_id', $reservation->client_id) == $client->id ? 'selected' : '' }}>
                                                {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="room_id" class="form-label">Chambre <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('room_id') is-invalid @enderror" id="room_id"
                                        name="room_id" required>
                                        <option value="">Sélectionner une chambre</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}"
                                                {{ old('room_id', $reservation->room_id) == $room->id ? 'selected' : '' }}>
                                                {{ $room->number }} - {{ $room->type }} ({{ $room->price }}
                                                FCFA/nuit)
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="check_in" class="form-label">Date d'arrivée <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('check_in') is-invalid @enderror"
                                        id="check_in" name="check_in"
                                        value="{{ old('check_in', $reservation->check_in->format('Y-m-d')) }}"
                                        required>
                                    @error('check_in')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="check_out" class="form-label">Date de départ <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('check_out') is-invalid @enderror"
                                        id="check_out" name="check_out"
                                        value="{{ old('check_out', $reservation->check_out->format('Y-m-d')) }}"
                                        required>
                                    @error('check_out')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="total_price" class="form-label">Prix total (FCFA) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" step="0.01"
                                        class="form-control @error('total_price') is-invalid @enderror" id="total_price"
                                        name="total_price" value="{{ old('total_price', $reservation->total_price) }}"
                                        required>
                                    @error('total_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Statut <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="">Sélectionner un statut</option>
                                        <option value="pending"
                                            {{ old('status', $reservation->status) == 'pending' ? 'selected' : '' }}>En
                                            attente</option>
                                        <option value="confirmed"
                                            {{ old('status', $reservation->status) == 'confirmed' ? 'selected' : '' }}>
                                            Confirmée</option>
                                        <option value="cancelled"
                                            {{ old('status', $reservation->status) == 'cancelled' ? 'selected' : '' }}>
                                            Annulée</option>
                                        <option value="completed"
                                            {{ old('status', $reservation->status) == 'completed' ? 'selected' : '' }}>
                                            Terminée</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes', $reservation->notes) }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('reservations.index') }}" class="btn btn-secondary me-2">Annuler</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Mettre à jour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
