@extends('adminlte::page')

@section('title', 'Gestión de Médicos')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Personal Médico
                </h1>
                <p class="text-muted small mb-0">Catálogo general de médicos, especialidades y licencias</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('medicosCreate') }}" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-plus mr-1"></i> NUEVO MÉDICO
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')

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

<div class="container-fluid">

    <!-- Tarjetas Informativas / Resumen -->
    <div class="row mb-3">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-md"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Total Médicos</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        {{ count($medicos) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-stethoscope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Personal Activo</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        Registrado
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-hospital-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Módulo</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        Recursos Humanos
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla Principal de Médicos -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-id-card text-primary mr-2"></i>
                Listado de Médicos Registrados
            </h3>
            <span class="badge badge-light border text-muted px-2 py-1">
                Directorio general
            </span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-sm align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="px-3" width="15%">CURP</th>
                            <th width="22%">Nombre del Médico</th>
                            <th width="15%">Tipo Personal</th>
                            <th width="12%">Cédula</th>
                            <th width="15%">Especialidad / Servicio</th>
                            <th width="10%">Unidad (CLUES)</th>
                            <th class="text-right px-3" width="11%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medicos as $medico)
                            <tr>
                                <td class="px-3 align-middle font-weight-bold text-secondary">
                                    <code>{{ $medico->curp }}</code>
                                </td>
                                <td class="align-middle">
                                    <div class="font-weight-bold text-dark">
                                        {{ $medico->apellido_paterno }} {{ $medico->apellido_materno }} {{ $medico->nombres }}
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <span class="badge badge-soft-info text-dark border px-2 py-1">
                                        {{ $medico->tipoPersonal->descripcion ?? 'No asignado' }}
                                    </span>
                                </td>
                                <td class="align-middle text-muted">
                                    <i class="fas fa-id-badge text-muted mr-1"></i>
                                    {{ $medico->cedula_profesional ?? 'S/C' }}
                                </td>
                                <td class="align-middle text-muted">
                                    {{ $medico->servicioEspecialidadMedico->especialidad ?? 'No asignado' }}
                                </td>
                                <td class="align-middle text-muted">
                                    <small class="font-weight-bold">{{ $medico->clues->clues ?? 'N/A' }}</small>
                                </td>
                                <td class="text-right align-middle px-3">
                                    <div class="btn-group" role="group" aria-label="Acciones Médico">
                                        <!-- Detalle -->
                                        <a href="{{ route('medicosShow', $medico->id) }}" 
                                           class="btn btn-outline-primary btn-sm" 
                                           data-toggle="tooltip" 
                                           data-placement="top" 
                                           title="Ver Expediente">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Editar -->
                                        <a href="{{ route('medicosEdit', $medico->id) }}" 
                                           class="btn btn-outline-secondary btn-sm" 
                                           data-toggle="tooltip" 
                                           data-placement="top" 
                                           title="Editar Información">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Vacaciones -->
                                        <a href="{{ route('indexMedicosVacacion', $medico->id) }}" 
                                           class="btn btn-outline-dark btn-sm" 
                                           data-toggle="tooltip" 
                                           data-placement="top" 
                                           title="Gestión de Vacaciones">
                                            <i class="fas fa-suitcase"></i>
                                        </a>

                                        <!-- Eliminar -->
                                        <form action="{{ route('medicosDestroy', $medico->id) }}" method="POST" class="form-eliminar d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-outline-danger btn-sm" 
                                                    data-toggle="tooltip" 
                                                    data-placement="top" 
                                                    title="Eliminar Médico">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="fas fa-user-slash fa-2x d-block mb-2 text-secondary"></i>
                                    No hay médicos registrados en el sistema.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-top-0"></div>
    </div>
</div>

@stop

@include('layouts.footer')

@section('css')
<style>
    .style-label {
        font-size: 0.7rem;
        letter-spacing: 0.8px;
    }
    .badge-soft-info {
        background-color: #e8f4f8;
        color: #17a2b8;
    }
    .btn-group .btn {
        margin: 0 1px;
        border-radius: 4px !important;
    }
    code {
        color: #2b5797;
        font-size: 0.85rem;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Inicializar Tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Confirmación de eliminación con SweetAlert2
        $('.form-eliminar').submit(function(e) {
            e.preventDefault();
            let form = this;

            Swal.fire({
                title: '¿Está seguro?',
                text: "El médico será eliminado del sistema.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@stop