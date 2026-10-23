@extends('layouts.app')

@section('content')
<div class="container my-5 text-white">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-warning">Noticias y Afiches Oficiales</h2>
        <span class="badge bg-danger">Guerreros del Ampay - F.D.P.B.</span>
    </div>

    <div class="row g-4">
        @forelse($noticias as $noticia)
            <div class="col-md-4">
                <div class="card bg-dark border-secondary h-100 shadow-sm text-white">
                    @if($noticia->imagen)
                        <img src="{{ asset('storage/' . $noticia->imagen) }}" class="card-img-top" alt="{{ $noticia->titulo }}" style="height: 220px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-center py-5 text-dark fw-bold">Sin Afiche</div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <small class="text-warning mb-1">{{ $noticia->created_at->format('d/m/Y') }}</small>
                        <h5 class="card-title fw-bold">{{ $noticia->titulo }}</h5>
                        <p class="card-text text-secondary small flex-grow-1">
                            {{ Str::limit($noticia->resumen ?? $noticia->contenido, 100) }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-dark text-center text-secondary border-secondary">
                    No hay noticias o comunicados publicados por el momento.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection