<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0"><i class="bi bi-plus-circle me-2"></i>Nouvelle Chambre</h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('rooms.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Numéro</label>
                                    <input type="text" class="form-control @error('number') is-invalid @enderror"
                                        name="number" value="{{ old('number') }}" required>
                                    @error('number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Type</label>
                                    <select class="form-select @error('type') is-invalid @enderror" name="type"
                                        required>
                                        <option value="">Choisir...</option>
                                        <option value="Simple" {{ old('type') == 'Simple' ? 'selected' : '' }}>Simple
                                        </option>
                                        <option value="Double" {{ old('type') == 'Double' ? 'selected' : '' }}>Double
                                        </option>
                                        <option value="Suite" {{ old('type') == 'Suite' ? 'selected' : '' }}>Suite
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Prix (FCFA/nuit)</label>
                                    <input type="number" step="0.01"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price') }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Statut</label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status"
                                        required>
                                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>
                                            Disponible</option>
                                        <option value="occupied" {{ old('status') == 'occupied' ? 'selected' : '' }}>
                                            Occupée</option>
                                        <option value="maintenance"
                                            {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Créer
                                </button>
                                <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
