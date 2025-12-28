<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0"><i class="bi bi-door-open me-2"></i>Modifier la Chambre</h2>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Informations de la Chambre</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('rooms.update', $room) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="number" class="form-label">Numéro de chambre <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror"
                                        id="number" name="number" value="{{ old('number', $room->number) }}"
                                        required>
                                    @error('number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Type de chambre <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" id="type"
                                        name="type" required>
                                        <option value="">Sélectionner un type</option>
                                        <option value="Standard"
                                            {{ old('type', $room->type) == 'Standard' ? 'selected' : '' }}>Standard
                                        </option>
                                        <option value="Deluxe"
                                            {{ old('type', $room->type) == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                                        <option value="Suite"
                                            {{ old('type', $room->type) == 'Suite' ? 'selected' : '' }}>Suite</option>
                                        <option value="Familiale"
                                            {{ old('type', $room->type) == 'Familiale' ? 'selected' : '' }}>Familiale
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Prix par nuit (FCFA) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" step="0.01"
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        name="price" value="{{ old('price', $room->price) }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Statut <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="">Sélectionner un statut</option>
                                        <option value="available"
                                            {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>
                                            Disponible</option>
                                        <option value="occupied"
                                            {{ old('status', $room->status) == 'occupied' ? 'selected' : '' }}>Occupée
                                        </option>
                                        <option value="maintenance"
                                            {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>En
                                            maintenance</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3">{{ old('description', $room->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('rooms.index') }}" class="btn btn-secondary me-2">Annuler</a>
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
