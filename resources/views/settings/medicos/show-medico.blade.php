@extends('adminlte::page')

@section('title', 'Detalle del Médico')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Expediente del Médico
                </h1>
                <p class="text-muted small mb-0">Información detallada del profesional de la salud y sus horarios</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('medicosIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> REGRESAR AL LISTADO
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

    <!-- Tarjetas Informativas / KPIs del Registro -->
    <div class="row mb-3">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-md"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Cédula Profesional</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.2rem;">
                        {{ $medico->cedula_profesional ?? 'Sin Registro' }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-stethoscope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Especialidad</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.1rem;">
                        {{ $medico->servicioEspecialidadMedico->especialidad ?? 'No especificado' }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-contract"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Programa U013</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.2rem;">
                        @if($medico->programa_smymg == 1)
                            <span class="text-success"><i class="fas fa-check-circle mr-1"></i> Contratado</span>
                        @else
                            <span class="text-secondary"><i class="fas fa-times-circle mr-1"></i> No Aplica</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Datos Generales -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-id-card text-primary mr-2"></i>
                Información Personal y Profesional
            </h3>
            <a href="{{ route('medicosEdit', $medico->id) }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-edit mr-1"></i> Editar Información
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block">CURP</label>
                    <span class="font-weight-bold text-dark h6"><code>{{ $medico->curp }}</code></span>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block">Nombre Completo</label>
                    <span class="font-weight-bold text-dark h6">{{ $medico->nombre_completo }}</span>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block">País de Nacimiento</label>
                    <span class="text-dark"><i class="fas fa-globe-americas text-secondary mr-1"></i> {{ $medico->paisNacimiento->pais ?? 'No especificado' }}</span>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block">Cédula Profesional</label>
                    <span class="text-dark"><i class="fas fa-id-badge text-secondary mr-1"></i> {{ $medico->cedula_profesional ?? 'Sin Registro' }}</span>
                </div>
            </div>

            <hr class="my-2">

            <div class="row mt-3">
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block">Tipo de Personal</label>
                    <span class="badge badge-light border text-dark px-2 py-1">
                        {{ $medico->tipoPersonal->descripcion ?? 'No especificado' }}
                    </span>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block">Servicio / Especialidad</label>
                    <span class="text-dark font-weight-bold">{{ $medico->servicioEspecialidadMedico->especialidad ?? 'No especificado' }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block">Unidad de Adscripción (CLUES)</label>
                    <span class="text-dark"><i class="fas fa-hospital text-secondary mr-1"></i> {{ $medico->clues->clues_nombre ?? 'No especificado' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Horarios de Atención -->
    <div class="card card-outline card-secondary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-calendar-alt text-secondary mr-2"></i>
                Jornada Laboral y Horarios de Atención
            </h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-sm align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="px-3" width="30%">Día Semanal</th>
                            <th width="35%" class="text-center">Hora de Entrada</th>
                            <th width="35%" class="text-center">Hora de Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $dias = [
                                'Lunes' => ['entrada' => $medico->lunes_entrada, 'salida' => $medico->lunes_salida],
                                'Martes' => ['entrada' => $medico->martes_entrada, 'salida' => $medico->martes_salida],
                                'Miércoles' => ['entrada' => $medico->miercoles_entrada, 'salida' => $medico->miercoles_salida],
                                'Jueves' => ['entrada' => $medico->jueves_entrada, 'salida' => $medico->jueves_salida],
                                'Viernes' => ['entrada' => $medico->viernes_entrada, 'salida' => $medico->viernes_salida],
                                'Sábado' => ['entrada' => $medico->sabado_entrada, 'salida' => $medico->sabado_salida],
                                'Domingo' => ['entrada' => $medico->domingo_entrada, 'salida' => $medico->domingo_salida],
                                'Festivos' => ['entrada' => $medico->festivos_entrada, 'salida' => $medico->festivos_salida],
                            ];
                        @endphp

                        @foreach ($dias as $dia => $horario)
                            <tr>
                                <td class="px-3 align-middle font-weight-bold text-dark">
                                    {{ $dia }}
                                </td>
                                <td class="text-center align-middle">
                                    @if($horario['entrada'])
                                        <span class="badge bg-light text-dark border px-3 py-1">
                                            <i class="far fa-clock text-success mr-1"></i> {{ $horario['entrada'] }}
                                        </span>
                                    @else
                                        <span class="text-muted font-italics">—</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    @if($horario['salida'])
                                        <span class="badge bg-light text-dark border px-3 py-1">
                                            <i class="far fa-clock text-danger mr-1"></i> {{ $horario['salida'] }}
                                        </span>
                                    @else
                                        <span class="text-muted font-italics">—</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white border-top-0"></div>
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
    code {
        color: #2b5797;
        font-size: 0.9rem;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop