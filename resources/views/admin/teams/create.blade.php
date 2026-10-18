@extends('layouts.admin')

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>Registrar Nuevo Equipo</h1>
        <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.teams.store') }}" method="POST" class="admin-form">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre del Equipo</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="codigo">Código (Sigla)</label>
            <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}" class="form-control" maxlength="10" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" name="categoria" id="categoria" value="{{ old('categoria') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="zona">Zona / Conferencia</label>
            <input type="text" name="zona" id="zona" value="{{ old('zona') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="entrenador">Entrenador Principal</label>
            <input type="text" name="entrenador" id="entrenador" value="{{ old('entrenador') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="anio_fundacion">Año de Fundación</label>
            <input type="number" name="anio_fundacion" id="anio_fundacion" value="{{ old('anio_fundacion') }}" class="form-control" min="1900" max="{{ date('Y') }}" required>
        </div>

        <div class="form-group">
            <label for="bandera">Ruta / URL de la Bandera o Logo</label>
            <input type="text" name="bandera" id="bandera" value="{{ old('bandera') }}" class="form-control">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Guardar Equipo</button>
        </div>
    </form>
</div>
@endsection