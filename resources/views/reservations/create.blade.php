<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0"><i class="bi bi-plus-circle me-2"></i>Nouvelle Réservation</h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('reservations.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Client</label>
                                    <select class="form-select @error('client_id') is-invalid @enderror"
                                        name="client_id" required>
                                        <option value="">Choisir un client...</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"
                                                {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                                {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Chambre</label>
                                    <select class="form-select @error('room_id') is-invalid @enderror" name="room_id"
                                        required>
                                        <option value="">Choisir une chambre...</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}"
                                                {{ old('room_id') == $room->id ? 'selected' : '' }}>
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
                                    <label class="form-label">Date d'arrivée</label>
                                    <input type="date" class="form-control @error('check_in') is-invalid @enderror"
                                        name="check_in" value="{{ old('check_in') }}" required>
                                    @error('check_in')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date de départ</label>
                                    <input type="date" class="form-control @error('check_out') is-invalid @enderror"
                                        name="check_out" value="{{ old('check_out') }}" required>
                                    @error('check_out')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Prix total (FCFA)</label>
                                    <input type="number" step="0.01"
                                        class="form-control @error('total_price') is-invalid @enderror"
                                        name="total_price" value="{{ old('total_price') }}" required>
                                    @error('total_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Statut</label>
                                    <select class="form-select" name="status">
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>En
                                            attente</option>
                                        <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>
                                            Confirmée</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="3">{{ old('notes') }}</textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Créer
                                </button>
                                <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
