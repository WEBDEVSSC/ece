@extends('adminlte::page')

@section('title', 'Consulta Externa')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Consulta Externa
                </h1>
                <p class="text-muted small mb-0">Gestión de citas y valoraciones médicas del día</p>
            </div>
            <div class="col-sm-6 text-right">
                <span class="badge bg-white shadow-sm px-3 py-2 text-dark font-weight-normal border">
                    <i class="far fa-calendar-alt text-primary mr-2"></i>
                    {{ \Carbon\Carbon::now()->isoFormat('D [de] MMMM, YYYY') }}
                </span>
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
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Total Citas Hoy</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        {{ count($citasHoy) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-md"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Atención Médica</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        Activa
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-warning text-white elevation-1"><i class="fas fa-notes-medical"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Modulo</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        Enfermería / Consulta Externa
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla Principal de Citas -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-list-alt text-primary mr-2"></i>
                Pacientes Programados
            </h3>
            <span class="badge badge-light border text-muted px-2 py-1">
                Listado diario
            </span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-sm align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="px-3" width="10%">Hora</th>
                            <th width="25%">Paciente</th>
                            <th width="25%">Diagnóstico Médico</th>
                            <th width="20%">Médico Tratante</th>
                            <th class="text-center px-3" width="20%">Acciones / Módulos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($citasHoy as $citaHoy)
                            <tr>
                                <td class="px-3 align-middle font-weight-bold text-primary">
                                    <i class="far fa-clock mr-1 text-muted"></i>
                                    {{ $citaHoy->hora }}
                                </td>
                                <td class="align-middle">
                                    <div class="font-weight-bold text-dark">
                                        {{ $citaHoy->paciente->nombre_completo ?? 'N/A' }}
                                    </div>
                                    <small class="text-muted">
                                        Exp: {{ $citaHoy->paciente->expediente ?? 'S/E' }}
                                    </small>
                                </td>
                                <td class="align-middle text-muted">
                                    <span class="d-inline-block text-truncate" style="max-width: 250px;" title="{{ $citaHoy->paciente->diagnosticoMedico->clave_nombre ?? 'Sin diagnóstico' }}">
                                        {{ $citaHoy->paciente->diagnosticoMedico->clave_nombre ?? 'Sin diagnóstico' }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <div class="text-dark">
                                        <i class="fas fa-user-md text-secondary mr-1"></i>
                                        {{ $citaHoy->personalUnidad->nombre_completo ?? 'No asignado' }}
                                    </div>
                                </td>
                                <td class="text-center align-middle px-3">
                                    <div class="btn-group" role="group" aria-label="Módulos de Atención">
                                        <!-- Signos Vitales -->
                                        @if ($citaHoy->status_signos_vitales == 0)
                                            <a href="{{ route('SignosVitalesCreate', $citaHoy->id) }}" 
                                               class="btn btn-outline-danger btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Capturar Signos Vitales">
                                                <i class="fas fa-heartbeat"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('SignosVitalesShow', $citaHoy->id) }}" 
                                               class="btn btn-success btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Ver Signos Vitales (Completado)">
                                                <i class="fas fa-heartbeat"></i>
                                            </a>
                                        @endif

                                        <!-- Laboratorios -->
                                        @if ($citaHoy->status_laboratorios == 0)
                                            <a href="{{ route('ConsultaExternaLaboratorioCreate', $citaHoy->id) }}" 
                                               class="btn btn-outline-danger btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Capturar Laboratorios">
                                                <i class="fas fa-flask"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('ConsultaExternaLaboratorioShow', $citaHoy->id) }}" 
                                               class="btn btn-success btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Ver Laboratorios (Completado)">
                                                <i class="fas fa-flask"></i>
                                            </a>
                                        @endif

                                        <!-- Valoración Podológica -->
                                        @if ($citaHoy->status_valoracion_podologica == 0)
                                            <a href="{{ route('UnemeEnfermeriaValoracionPodologicaCreate', $citaHoy->id) }}" 
                                               class="btn btn-outline-danger btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Capturar Valoración Podológica">
                                                <i class="fas fa-shoe-prints"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('UnemeEnfermeriaValoracionPodologicaShow', $citaHoy->id) }}" 
                                               class="btn btn-success btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Ver Valoración Podológica (Completado)">
                                                <i class="fas fa-shoe-prints"></i>
                                            </a>
                                        @endif

                                        <!-- Examen Estructura Ósea -->
                                        @if ($citaHoy->status_examen_estructura_osea == 0)
                                            <a href="{{ route('UnemeEnfermeriaExamenEstructuraOseaCreate', $citaHoy->id) }}" 
                                               class="btn btn-outline-danger btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Capturar Estructura Ósea">
                                                <i class="fas fa-bone"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('UnemeEnfermeriaExamenEstructuraOseaShow', $citaHoy->id) }}" 
                                               class="btn btn-success btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Ver Estructura Ósea (Completado)">
                                                <i class="fas fa-bone"></i>
                                            </a>
                                        @endif

                                        <!-- Examen Vascular -->
                                        @if ($citaHoy->status_examen_vascular == 0)
                                            <a href="{{ route('UnemeEnfermeriaExamenVascularCreate', $citaHoy->id) }}" 
                                               class="btn btn-outline-danger btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Capturar Examen Vascular">
                                                <i class="fas fa-wave-square"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('UnemeEnfermeriaExamenVascularShow', $citaHoy->id) }}" 
                                               class="btn btn-success btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Ver Examen Vascular (Completado)">
                                                <i class="fas fa-wave-square"></i>
                                            </a>
                                        @endif

                                        <!-- Examen Neurologico -->
                                        @if ($citaHoy->status_examen_neurologico == 0)
                                            <a href="{{ route('UnemeEnfermeriaExamenNeurologicoCreate', $citaHoy->id) }}" 
                                               class="btn btn-outline-danger btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Capturar Examen Neurologico">
                                                <i class="fas fa-brain"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('UnemeEnfermeriaExamenNeurologicoShow', $citaHoy->id) }}" 
                                               class="btn btn-success btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="Ver Examen Neurologico (Completado)">
                                                <i class="fas fa-brain"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('pdfCitaConsultaExternaEnfermeriaPrimeraVez', $citaHoy->id) }}" 
                                               class="btn btn-outline-info btn-sm" 
                                               data-toggle="tooltip" 
                                               data-placement="top" 
                                               title="PDF">
                                                <i class="far fa-file-pdf"></i>
                                            </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="fas fa-calendar-times fa-2x d-block mb-2 text-secondary"></i>
                                    No hay citas programadas para el día de hoy.
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
    .btn-group .btn {
        margin: 0 2px;
        border-radius: 4px !important;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Inicializar Tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Confirmación genérica de eliminación (si se utiliza)
        $('.form-eliminar').submit(function(e) {
            e.preventDefault();
            let form = this;

            Swal.fire({
                title: '¿Está seguro?',
                text: "El registro será eliminado del sistema.",
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