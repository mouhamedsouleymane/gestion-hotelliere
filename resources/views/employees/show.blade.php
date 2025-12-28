<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0"><i class="bi bi-person-circle me-2"></i>{{ $employee->name }}</h2>
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">
                <i class="bi bi-pencil me-2"></i>Modifier
            </a>
        </div>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Email:</strong><br>
                                <span class="text-muted">{{ $employee->email }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Téléphone:</strong><br>
                                <span class="text-muted">{{ $employee->phone }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Département:</strong><br>
                                <span class="badge bg-info">{{ $employee->department_label }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Poste:</strong><br>
                                <span class="text-muted">{{ ucfirst($employee->position) }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Salaire:</strong><br>
                                <span class="text-success">{{ number_format($employee->salary, 0, ',', ' ') }} FCFA</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Date d'embauche:</strong><br>
                                <span class="text-muted">{{ $employee->hire_date->format('d/m/Y') }}</span>
                            </div>
                        </div>
                        @if($employee->address)
                            <div class="mb-3">
                                <strong>Adresse:</strong><br>
                                <span class="text-muted">{{ $employee->address }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-person-circle text-primary mb-3" style="font-size: 4rem;"></i>
                        <h5>{{ $employee->name }}</h5>
                        <span class="badge bg-{{ $employee->status == 'active' ? 'success' : ($employee->status == 'vacation' ? 'warning' : 'danger') }} mb-3">
                            {{ ucfirst($employee->status) }}
                        </span>
                        <div class="d-grid gap-2">
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil me-2"></i>Modifier
                            </a>
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Retour
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>