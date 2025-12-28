<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0"><i class="bi bi-person-plus me-2"></i>Nouvel Employé</h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('employees.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nom complet</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date d'embauche</label>
                                    <input type="date" class="form-control @error('hire_date') is-invalid @enderror" 
                                           name="hire_date" value="{{ old('hire_date') }}" required>
                                    @error('hire_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Département</label>
                                    <select class="form-select @error('department') is-invalid @enderror" name="department" required>
                                        <option value="">Choisir...</option>
                                        <option value="reception" {{ old('department') == 'reception' ? 'selected' : '' }}>Réception</option>
                                        <option value="housekeeping" {{ old('department') == 'housekeeping' ? 'selected' : '' }}>Ménage</option>
                                        <option value="maintenance" {{ old('department') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                        <option value="restaurant" {{ old('department') == 'restaurant' ? 'selected' : '' }}>Restaurant</option>
                                        <option value="security" {{ old('department') == 'security' ? 'selected' : '' }}>Sécurité</option>
                                        <option value="management" {{ old('department') == 'management' ? 'selected' : '' }}>Direction</option>
                                    </select>
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Poste</label>
                                    <select class="form-select @error('position') is-invalid @enderror" name="position" required>
                                        <option value="">Choisir...</option>
                                        <option value="staff" {{ old('position') == 'staff' ? 'selected' : '' }}>Employé</option>
                                        <option value="supervisor" {{ old('position') == 'supervisor' ? 'selected' : '' }}>Superviseur</option>
                                        <option value="manager" {{ old('position') == 'manager' ? 'selected' : '' }}>Manager</option>
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Salaire (FCFA)</label>
                                    <input type="number" step="0.01" class="form-control @error('salary') is-invalid @enderror" 
                                           name="salary" value="{{ old('salary') }}" required>
                                    @error('salary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresse</label>
                                <textarea class="form-control" name="address" rows="3">{{ old('address') }}</textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Créer
                                </button>
                                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>