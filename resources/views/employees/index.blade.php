<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0"><i class="bi bi-people-fill me-2"></i>Gestion du Personnel</h2>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus me-2"></i>Nouvel Employé
            </a>
        </div>
    </x-slot>

    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Statistiques par département -->
        <div class="row mb-4">
            @php
                $departments = $employees->groupBy('department');
            @endphp
            @foreach(['reception' => 'Réception', 'housekeeping' => 'Ménage', 'maintenance' => 'Maintenance', 'restaurant' => 'Restaurant'] as $key => $label)
                <div class="col-md-3 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-{{ $key == 'reception' ? 'headset' : ($key == 'housekeeping' ? 'house' : ($key == 'maintenance' ? 'tools' : 'cup-hot')) }} text-primary mb-2" style="font-size: 2rem;"></i>
                            <h5>{{ $label }}</h5>
                            <h3 class="text-primary">{{ $departments->get($key, collect())->count() }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Département</th>
                                <th>Poste</th>
                                <th>Salaire</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-circle me-2 text-primary"></i>
                                            <div>
                                                <strong>{{ $employee->name }}</strong><br>
                                                <small class="text-muted">{{ $employee->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $employee->department_label }}</span>
                                    </td>
                                    <td>{{ ucfirst($employee->position) }}</td>
                                    <td>{{ number_format($employee->salary, 0, ',', ' ') }} FCFA</td>
                                    <td>
                                        <span class="badge bg-{{ $employee->status == 'active' ? 'success' : ($employee->status == 'vacation' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($employee->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('employees.show', $employee) }}" class="btn btn-outline-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Supprimer cet employé?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>