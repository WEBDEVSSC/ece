@extends('adminlte::page')

@section('title', 'Panel de Control Clínica')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    <i class="fas fa-chart-line text-primary mr-2"></i>Panel de Control
                </h1>
                <p class="text-muted small mb-0">Resumen operativo y estado del establecimiento de salud</p>
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
<div class="container-fluid">

    {{-- Banner de Unidad de Adscripción --}}
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">

                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                                 style="width: 70px; height: 70px; min-width: 70px;">
                                <i class="fas fa-hospital-alt fa-2x"></i>
                            </div>

                            <div class="ml-4">
                                <span class="badge badge-light border text-primary font-weight-bold text-uppercase px-2 py-1 mb-1 style-label">
                                    Unidad Médica Asignada
                                </span>
                                <h3 class="mb-1 font-weight-bold text-dark" style="font-size: 1.4rem;">
                                    {{ $user->clues->nombre }}
                                </h3>
                                <div class="d-flex align-items-center flex-wrap gap-2">
                                    <span class="badge bg-white text-muted border px-2 py-1 font-weight-normal mr-2">
                                        <i class="fas fa-id-card text-secondary mr-1"></i>
                                        CLUES: <strong>{{ $user->clues->clues }}</strong>
                                    </span>
                                    <span class="badge bg-success-light text-success border border-success px-2 py-1">
                                        <i class="fas fa-circle text-success mr-1" style="font-size: 0.5rem; vertical-align: middle;"></i>
                                        Operativa
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="text-right mt-3 mt-md-0 border-left-md pl-md-4">
                            <div class="d-flex align-items-center justify-content-end text-success mb-1">
                                <i class="fas fa-shield-alt fa-lg mr-2"></i>
                                <span class="font-weight-bold text-uppercase style-label">Sincronización Activa</span>
                            </div>
                            <small class="text-muted d-block">
                                Expediente Clínico Electrónico en línea.
                            </small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tarjetas Metrícas / Accesos Rápidos --}}
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-info"><i class="fas fa-user-injured"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-uppercase text-muted font-weight-bold style-label">Consultas del Día</span>
                    <span class="info-box-number text-dark">--</span>
                    <span class="progress-description text-muted small">
                        Atenciones registradas hoy
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-success"><i class="fas fa-user-nurse"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-uppercase text-muted font-weight-bold style-label">Procesos de Enfermería</span>
                    <span class="info-box-number text-dark">--</span>
                    <span class="progress-description text-muted small">
                        Valoraciones NANDA / NIC / NOC
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-warning text-white"><i class="fas fa-notes-medical"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-uppercase text-muted font-weight-bold style-label">Pendientes de Firma</span>
                    <span class="info-box-number text-dark">--</span>
                    <span class="progress-description text-muted small">
                        Expedientes por cerrar
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>
@stop

@section('css')
<style>
    .style-label {
        font-size: 0.68rem;
        letter-spacing: 0.6px;
    }
    .bg-success-light {
        background-color: #e8f8f0;
    }
    @media (min-width: 768px) {
        .border-left-md {
            border-left: 1px solid #dee2e6 !important;
        }
    }
</style>
@stop

@section('js')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop