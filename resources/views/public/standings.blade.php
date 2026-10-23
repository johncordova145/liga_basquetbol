<div class="container my-5 text-white">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-warning m-0">Tabla de Posiciones</h2>
        
        <!-- Filtro por Categorías -->
        <div class="btn-group" role="group">
            <a href="?categoria=Mayores Varones" class="btn btn-outline-warning btn-sm {{ $categoria == 'Mayores Varones' ? 'active' : '' }}">Mayores</a>
            <a href="?categoria=U19" class="btn btn-outline-warning btn-sm {{ $categoria == 'U19' ? 'active' : '' }}">U19</a>
            <a href="?categoria=U14" class="btn btn-outline-warning btn-sm {{ $categoria == 'U14' ? 'active' : '' }}">U14</a>
        </div>
    </div>

    <div class="table-responsive card bg-black border-secondary p-3">
        <table class="table table-dark table-hover align-middle mb-0 text-center">
            <thead>
                <tr class="text-secondary border-bottom border-secondary small text-uppercase">
                    <th class="text-start">#</th>
                    <th class="text-start">Equipo</th>
                    <th>PJ</th>
                    <th>PG</th>
                    <th>PP</th>
                    <th>PF</th>
                    <th>PC</th>
                    <th>DIF</th>
                    <th class="text-warning">PTS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equipos as $index => $row)
                    <tr>
                        <td class="text-start fw-bold {{ $index < 4 ? 'text-warning' : 'text-muted' }}">{{ $index + 1 }}</td>
                        <td class="text-start fw-bold fs-6">{{ $row->equipo }}</td>
                        <td>{{ $row->pj }}</td>
                        <td class="text-success fw-bold">{{ $row->pg }}</td>
                        <td class="text-danger">{{ $row->pp }}</td>
                        <td class="text-muted">{{ $row->pf }}</td>
                        <td class="text-muted">{{ $row->pc }}</td>
                        <td class="{{ $row->dif >= 0 ? 'text-success' : 'text-danger' }}">
                            {{ $row->dif > 0 ? '+'.$row->dif : $row->dif }}
                        </td>
                        <td class="fw-bold fs-5 text-warning bg-dark">{{ $row->puntos }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-muted py-4">No hay datos registrados para esta categoría.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>