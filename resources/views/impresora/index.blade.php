@extends('layouts.app')

@section('template_title')
    Impresoras
@endsection

@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="mb-3">
                            @include('layouts.search') {{-- Incluye el formulario de búsqueda --}}
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Impresoras') }}
                            </span>

                            <div>
                                <a href="{{ route('impresoras.create') }}" class="btn btn-primary">Añadir impresora</a>
                                <a href="{{ route('impresoras.importar.form') }}" class="btn btn-success">
                                    <i class="fas fa-file-import"></i> Importar CSV
                                </a>
                                        <a href="{{ route('impresoras.pdf.filter') }}" class="btn btn-info me-2">
                                            <i class="fas fa-filter"></i> Filtrar PDF
                                        </a>
                                <a href="{{ route('impresoras.pdfAll') }}" class="btn btn-danger" target="_blank"
                                    alt="Puede tardar un poco...">
                                    <i class="fas fa-file-pdf"></i> Descargar PDF
                                </a>

                            </div>
                        </div>
                    </div>

                    {{-- Mensaje de éxito --}}
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover w-100">
                                <colgroup>
                                    <col style="width: 12%">
                                    <col style="width: 12%">
                                    <col style="width: 12%">
                                    <col style="width: 12%">
                                    <col style="width: 12%">
                                    <col style="width: 12%">
                                    <col style="width: 8%">
                                    <col style="width: 20%">
                                </colgroup>
                                <thead class="thead">
                                    <style>
                                        .table td,
                                        .table th {
                                            padding: 1rem 1.5rem;
                                        }

                                        .table td {
                                            white-space: nowrap;
                                        }

                                        .table {
                                            margin-bottom: 0;
                                        }

                                        .table td:last-child {
                                            text-align: right;
                                        }

                                        .table th:last-child {
                                            text-align: right;
                                        }

                                        .estado-circle {
                                            display: inline-block;
                                            width: 12px;
                                            height: 12px;
                                            border-radius: 50%;
                                            background-color: gray;
                                        }

                                        .estado-circle.activo {
                                            background-color: #28a745;
                                            /* verde */
                                        }

                                        .estado-circle.inactivo {
                                            background-color: #dc3545;
                                            /* rojo */
                                        }
                                    </style>
                                    <tr>
                                        <th class="px-3">Tipo</th>
                                        <th class="px-3">Ubicación</th>
                                        <th class="px-3">IP</th>
                                        <th class="px-3">Usuario</th>
                                        <th class="px-3">Sede RCJA</th>
                                        <th class="px-3">Nº Serie</th>
                                        <th class="px-3">Organismo</th>
                                        <th class="px-3">Contrato</th>
                                        <th class="px-3">Color</th>
                                        <th class="px-3">Estado</th>
                                        <th class="px-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($impresoras as $index => $impresora)
                                        <tr>

                                            <td>{{ $impresora->tipo }}</td>
                                            <td>{{ $impresora->ubicacion }}</td>
                                            <td>{{ $impresora->ip }}</td>
                                            <td>{{ $impresora->usuario }}</td>
                                            <td>{{ $impresora->sede_rcja }}</td>
                                            <td>{{ $impresora->num_serie }}</td>
                                            <td>{{ $impresora->organismo }}</td>
                                            <td>{{ $impresora->contrato }}</td>
                                            <td>{{ $impresora->color ? 'Sí' : 'No' }}</td>
                                            <td class="px-3 text-center">
                                                <span
                                                    class="estado-circle {{ $impresora->activo ? 'activo' : 'inactivo' }}"
                                                    title="{{ $impresora->activo ? 'Activa' : 'Inactiva' }}"></span>
                                            </td>
                                            <td>
                                                <form action="{{ route('impresoras.destroy', $impresora->id) }}"
                                                    method="POST">
                                                    @if ($impresora->activo)
                                                        <a href="{{ route('impresoras.show', $impresora->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fa fa-fw fa-eye"></i> {{ __('Ver detalles') }}
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('impresoras.edit', $impresora->id) }}"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Estás seguro que quieres eliminar esta impresora?');">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Paginación --}}
                        <div class="pagination-container">
                            {!! $impresoras->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
