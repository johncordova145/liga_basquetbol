@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>Gestión de Equipos</h1>
        <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">Nuevo Equipo</a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Zona</th>
                    <th>Ciudad</th>
                    <th>Entrenador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teams as $team)
                    <tr>
                        <td>{{ $team->id }}</td>
                        <td>{{ $team->nombre }}</td>
                        <td>{{ $team->codigo }}</td>
                        <td>{{ $team->categoria }}</td>
                        <td>{{ $team->zona }}</td>
                        <td>{{ $team->ciudad }}</td>
                        <td>{{ $team->entrenador }}</td>
                        <td class="actions-cell">
                            <a href="{{ route('admin.teams.edit', $team) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('admin.teams.destroy', $team) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar este equipo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay equipos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $teams->links() }}
    </div>
</div>
@endsection