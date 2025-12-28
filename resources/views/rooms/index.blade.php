<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0"><i class="bi bi-door-open me-2"></i>Gestion des Chambres</h2>
            <a href="{{ route('rooms.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouvelle Chambre
            </a>
        </div>
    </x-slot>

    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title">Chambre {{ $room->number }}</h5>
                                <span
                                    class="badge bg-{{ $room->status == 'available' ? 'success' : ($room->status == 'occupied' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($room->status) }}
                                </span>
                            </div>
                            <p class="card-text">
                                <strong>Type:</strong> {{ $room->type }}<br>
                                <strong>Prix:</strong> {{ $room->price }} FCFA/nuit
                            </p>
                            @if ($room->description)
                                <p class="card-text text-muted">{{ $room->description }}</p>
                            @endif
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="btn-group w-100">
                                <a href="{{ route('rooms.show', $room) }}" class="btn btn-outline-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('rooms.edit', $room) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Supprimer cette chambre?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Liste des Chambres</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Type</th>
                            <th>Prix (FCFA)</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->numero }}</td>
                                <td>{{ $room->type }}</td>
                                <td>{{ number_format($room->prix, 0, ',', ' ') }} FCFA</td>
                                <td>
                                    @switch($room->statut)
                                        @case('disponible')
                                            <span class="badge bg-success">Disponible</span>
                                        @break

                                        @case('occupee')
                                            <span class="badge bg-danger">Occupée</span>
                                        @break

                                        @case('maintenance')
                                            <span class="badge bg-warning">En maintenance</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('rooms.edit', $room) }}"
                                        class="btn btn-sm btn-primary">Modifier</a>
                                    <a href="{{ route('rooms.show', $room) }}" class="btn btn-sm btn-info">Voir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if ($rooms->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $rooms->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
