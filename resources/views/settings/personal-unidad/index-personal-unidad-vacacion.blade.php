@extends('adminlte::page')

@section('title', 'Vacaciones del Médico')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Vacaciones Registradas
                </h1>
                <p class="text-muted small mb-0">Listado de periodos y días de asueto asignados al personal de salud</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('personalUnidadIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> REGRESAR AL LISTADO
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')

<div class="container-fluid">

    {{-- Alertas con SweetAlert2 --}}
@php
    $alerts = ['success', 'update', 'destroy'];
@endphp

@foreach ($alerts as $alert)
    @if(session($alert))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "{{ session($alert) }}",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true
                });
            });
        </script>
    @endif
@endforeach

    <!-- Información del Médico Seleccionado -->
    <div class="card card-outline card-info shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-md text-info mr-2"></i>
                Tarjeta Informativa del Personal de Salud
            </h3>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="mb-0 font-weight-bold text-dark">
                        {{ $medico->nombre_completo }}
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Registros Vacacionales -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-calendar-alt text-primary mr-2"></i>
                Historial de Vacaciones
            </h3>
            <div class="card-tools">
                <a href="{{ route('createPersonalUnidadVacacion', $medico->id) }}" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-plus mr-1"></i> NUEVO REGISTRO
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-sm align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="px-3" width="80">#</th>
                            <th width="25%">Fecha</th>
                            <th>Concepto</th>
                            <th width="120" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medicoVacaciones as $vacacion)
                            <tr>
                                <td class="px-3 align-middle font-weight-bold text-secondary">{{ $loop->iteration }}</td>
                                <td class="align-middle font-weight-bold text-dark">
                                    <i class="far fa-calendar-check text-success mr-1"></i>
                                    {{ \Carbon\Carbon::parse($vacacion->fecha)->format('d/m/Y') }}
                                </td>
                                <td class="align-middle text-muted">
                                    {{ $vacacion->concepto }}
                                </td>
                                <td class="text-center align-middle">
                                    <form action="{{ route('deletePersonalUnidadVacacion', $vacacion->id) }}" method="POST" class="d-inline formulario-eliminar">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-outline-danger font-weight-bold" data-toggle="tooltip" data-placement="top" title="Eliminar registro">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="fas fa-calendar-times fa-3x text-secondary mb-3 d-block"></i>
                                    <span class="font-weight-bold" style="font-size: 1.05rem;">No hay vacaciones registradas para este médico.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top py-3"></div>
    </div>

</div>

<br>

@stop

@include('layouts.footer')

@section('css')
    <style>
        .style-label {
            font-size: 0.7rem;
            letter-spacing: 0.8px;
        }
    </style>
@stop

@section('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        document.addEventListener('DOMContentLoaded', function () {
            $('.formulario-eliminar').submit(function(e) {
                e.preventDefault();

                const form = this;

                Swal.fire({
                    title: '¿Eliminar registro?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fas fa-trash"></i> Sí, eliminar',
                    cancelButtonText: '<i class="fas fa-times"></i> Cancelar',
                    reverseButtons: true,
                    focusCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@stop