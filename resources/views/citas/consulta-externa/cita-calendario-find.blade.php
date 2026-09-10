@extends('adminlte::page')

@section('title', 'Valoración Podológica')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Calendario de Citas Consulta Externa
                </h1>
                <p class="text-muted small mb-0">Citas programadas para el día de {{ \Carbon\Carbon::parse($fecha)->format('d-m-Y') }}</p>
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
    $alerts = ['success', 'update', 'destroy', 'error'];
@endphp

@foreach ($alerts as $alert)
    @if(session($alert))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: "{{ $alert == 'error' ? 'error' : 'success' }}",
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

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <h5 class="alert-heading font-weight-bold">
                <i class="fas fa-exclamation-triangle mr-1"></i> Se encontraron los siguientes errores:
            </h5>
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Tarjetas Informativas (Info-Boxes) --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted font-weight-bold">TOTAL CITAS</span>
                    <span class="info-box-number text-dark">{{ $citasHoy->count() }}</span>
                    <small class="text-muted"><i class="fas fa-list mr-1"></i>Citas programadas</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted font-weight-bold">ATENDIDOS</span>
                    <span class="info-box-number text-dark">{{ $citasHoy->where('status_valoracion_podologica', '!=', 0)->count() }}</span>
                    <small class="text-muted"><i class="fas fa-user-check mr-1"></i>Valoración realizada</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted font-weight-bold">IMPRIMIR REPORTE</span>
                    <span class="info-box-number text-dark">{{ $citasHoy->where('status_valoracion_podologica', 0)->count() }}</span>
                    <small class="text-muted">
                    <i class="fas fa-hourglass-half mr-1"></i>
                    <a href="{{ route('UnemeEnfermeriaReporteDiarioPDF', ['fecha' => $fecha]) }}" target="_blank">
                        IMPRIMIR
                    </a>
                    </small>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabla de Citas --}}
    <div class="card card-outline card-info shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-info mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-shoe-prints mr-2"></i> PACIENTES EN AGENDA
            </h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-top-0 px-4">Hora</th>
                            <th class="border-top-0">Paciente</th>
                            <th class="border-top-0">Diagnóstico</th>
                            <th class="border-top-0">Médico</th>
                            <th class="border-top-0 text-right px-4">Modulos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($citasHoy as $citaHoy)
                            <tr>
                                <td class="px-4 font-weight-bold align-middle">
                                    <span class="badge bg-light text-dark border px-2 py-1">
                                        <i class="far fa-clock text-info mr-1"></i>
                                        {{ $citaHoy->hora }}
                                    </span>
                                </td>
                                <td class="align-middle font-weight-bold text-dark">
                                    {{ $citaHoy->paciente->nombre_completo }}
                                </td>
                                <td class="align-middle text-muted">
                                    {{ $citaHoy->paciente->diagnosticoMedico->clave_nombre ?? 'Sin diagnóstico' }}
                                </td>
                                <td class="align-middle text-muted">
                                    <i class="fas fa-user-md mr-1 text-secondary"></i>
                                    {{ $citaHoy->medico->nombre_completo ?? '' }}
                                </td>
                                <td class="text-right align-middle px-4">
                                    @if ($citaHoy->status_valoracion_podologica == 0)
                                        <a href="{{ route('UnemeEnfermeriaValoracionPodologicaCreate', $citaHoy->id) }}" 
                                           class="btn btn-primary btn-sm font-weight-bold shadow-sm" 
                                           data-toggle="tooltip" 
                                           data-placement="top" 
                                           title="REALIZAR VALORACIÓN PODOLÓGICA">
                                            <i class="fas fa-shoe-prints mr-1"></i> Atender
                                        </a>
                                    @else
                                        <a href="{{ route('UnemeEnfermeriaValoracionPodologicaShow', $citaHoy->id) }}" 
                                           class="btn btn-dark btn-sm font-weight-bold shadow-sm" 
                                           data-toggle="tooltip" 
                                           data-placement="top" 
                                           title="VER VALORACIÓN PODOLÓGICA">
                                            <i class="fas fa-eye mr-1"></i> Ver
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="fas fa-info-circle mr-1"></i> No hay citas programadas para el día {{ \Carbon\Carbon::parse($fecha)->format('d-m-Y') }}.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<br>

@stop

@include('layouts.footer')

@section('css')
<style>
    .table td, .table th {
        vertical-align: middle !important;
    }
</style>
@stop

@section('js')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        $('.form-eliminar').submit(function(e){
            e.preventDefault();
            let form = this;

            Swal.fire({
                title: '¿Está seguro?',
                text: "Esta acción no se podrá revertir.",
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