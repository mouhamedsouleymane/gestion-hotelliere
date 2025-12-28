<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0"><i class="bi bi-pencil me-2"></i>Modifier {{ $employee->name }}</h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('employees.update', $employee) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nom complet</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           name="name" value="{{ old('name', $employee->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email', $employee->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           name="phone" value="{{ old('phone', $employee->phone) }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Date d'embauche</label>
                                    <input type="date" class="form-control @error('hire_date') is-invalid @enderror" 
                                           name="hire_date" value="{{ old('hire_date', $employee->hire_date->format('Y-m-d')) }}" required>
                                    @error('hire_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Département</label>
                                    <select class="form-select @error('department') is-invalid @enderror" name="department" required>
                                        <option value="reception" {{ old('department', $employee->department) == 'reception' ? 'selected' : '' }}>Réception</option>
                                        <option value="housekeeping" {{ old('department', $employee->department) == 'housekeeping' ? 'selected' : '' }}>Ménage</option>
                                        <option value="maintenance" {{ old('department', $employee->department) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                        <option value="restaurant" {{ old('department', $employee->department) == 'restaurant' ? 'selected' : '' }}>Restaurant</option>
                                        <option value="security" {{ old('department', $employee->department) == 'security' ? 'selected' : '' }}>Sécurité</option>
                                        <option value="management" {{ old('department', $employee->department) == 'management' ? 'selected' : '' }}>Direction</option>
                                    </select>
                                    @error('department')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Poste</label>
                                    <select class="form-select @error('position') is-invalid @enderror" name="position" required>
                                        <option value="staff" {{ old('position', $employee->position) == 'staff' ? 'selected' : '' }}>Employé</option>
                                        <option value="supervisor" {{ old('position', $employee->position) == 'supervisor' ? 'selected' : '' }}>Superviseur</option>
                                        <option value="manager" {{ old('position', $employee->position) == 'manager' ? 'selected' : '' }}>Manager</option>
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Salaire (FCFA)</label>
                                    <input type="number" step="0.01" class="form-control @error('salary') is-invalid @enderror" 
                                           name="salary" value="{{ old('salary', $employee->salary) }}" required>
                                    @error('salary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Statut</label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                                        <option value="active" {{ old('status', $employee->status) == 'active' ? 'selected' : '' }}>Actif</option>
                                        <option value="inactive" {{ old('status', $employee->status) == 'inactive' ? 'selected' : '' }}>Inactif</option>
                                        <option value="vacation" {{ old('status', $employee->status) == 'vacation' ? 'selected' : '' }}>En congé</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adresse</label>
                                <textarea class="form-control" name="address" rows="3">{{ old('address', $employee->address) }}</textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Mettre à jour
                                </button>
                                <a href="{{ route('employees.show', $employee) }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>