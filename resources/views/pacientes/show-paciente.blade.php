@extends('adminlte::page')

@section('title', 'Detalles del Paciente')

@section('plugins.Sweetalert2', true)

@section('plugins.Select2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Expediente del Paciente
                </h1>
                <p class="text-muted small mb-0">Consulta detallada e historial de citas programadas</p>
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

    {{-- Banner / Ficha Superior del Paciente --}}
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-injured mr-2"></i> FICHA DE IDENTIFICACIÓN
            </h3>
            <div class="card-tools">
                <a href="{{ route('pacientesIndex') }}" class="btn btn-outline-secondary btn-sm font-weight-bold">
                    <i class="fas fa-arrow-left mr-1"></i> VOLVER AL LISTADO
                </a>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="row align-items-center mb-4">
                <div class="col-md-8">
                    <h3 class="font-weight-bold text-dark mb-1">
                        {{ $paciente->nombre_completo }}
                    </h3>
                    <p class="text-muted mb-0">
                        <i class="fas fa-hospital-alt mr-1"></i> CLUES: <span class="font-weight-bold text-dark">{{ $paciente->clues->clues_nombre ?? 'N/A' }}</span>
                    </p>
                </div>
                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                    <span class="badge bg-light border px-3 py-2 text-dark">
                        <i class="fas fa-folder mr-1 text-primary"></i> No. Expediente: <strong>{{ $paciente->no_expediente ?? 'Sin asignar' }}</strong>
                    </span>
                </div>
            </div>

            <hr class="my-3">

            {{-- Fila 1: Datos Generales --}}
            <div class="row">
                <div class="col-md-2 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">CURP</span>
                    <span class="font-weight-bold text-dark">{{ $paciente->curp }}</span>
                </div>

                <div class="col-md-2 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Sexo</span>
                    <span class="font-weight-bold text-dark">{{ $paciente->sexo == 'H' ? 'MASCULINO' : 'FEMENINO' }}</span>
                </div>

                <div class="col-md-2 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Fecha Nacimiento</span>
                    <span class="font-weight-bold text-dark">{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}</span>
                </div>

                <div class="col-md-2 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Edad</span>
                    <span class="font-weight-bold text-dark">{{ $edad }} Años</span>
                </div>

                <div class="col-md-2 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Derechohabiencia</span>
                    <span class="font-weight-bold text-dark">{{ $paciente->derechohabiencia->derechohabiencia ?? 'N/A' }}</span>
                </div>

                <div class="col-md-2 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Escolaridad</span>
                    <span class="font-weight-bold text-dark">{{ $paciente->escolaridad->escolaridad ?? 'N/A' }}</span>
                </div>
            </div>

            {{-- Fila 2: Información Complementaria y Contacto --}}
            <div class="row mt-2">
                <div class="col-md-2 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Estado Civil</span>
                    <span class="font-weight-bold text-dark">{{ $paciente->estadoCivil->estado_civil ?? 'N/A' }}</span>
                </div>

                <div class="col-md-4 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Diagnóstico Médico</span>
                    <span class="font-weight-bold text-primary">{{ $paciente->diagnosticoMedico->clave_nombre ?? 'Sin diagnóstico registrado' }}</span>
                </div>

                <div class="col-md-3 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Teléfono Celular</span>
                    <span class="font-weight-bold text-dark">{{ $paciente->celular ?? 'N/A' }}</span>
                </div>

                <div class="col-md-3 mb-3">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">E-mail</span>
                    <span class="font-weight-bold text-dark">{{ $paciente->email ?? 'N/A' }}</span>
                </div>
            </div>

            {{-- Fila 3: Alergias --}}
            <div class="row mt-2">
                <div class="col-md-12">
                    <span class="text-uppercase text-muted font-weight-bold style-label d-block">Alergias Conocidas</span>
                    <div class="p-3 bg-light rounded border text-dark">
                        {{ $paciente->alergias ?: 'Sin alergias registradas.' }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabla de Citas Programadas --}}
    <div class="card card-outline card-secondary shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-calendar-check mr-2 text-primary"></i> CITAS PROGRAMADAS
            </h3>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle w-100 border">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th class="font-weight-bold">Fecha</th>
                            <th class="font-weight-bold">Hora</th>
                            <th class="font-weight-bold">Médico</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="text-center font-weight-bold" style="width: 120px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($citasProgramadas as $cita)
                            <tr>
                                <td class="align-middle font-weight-bold">{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
                                <td class="align-middle">{{ $cita->hora }}</td>
                                <td class="align-middle">{{ $cita->medico->nombre_completo ?? 'N/A' }}</td>
                                <td class="align-middle">
                                    @if($cita->status == 'NUEVA')
                                        <span class="badge bg-warning text-dark px-2 py-1 font-weight-normal">NUEVA</span>
                                    @elseif($cita->status == 'ATENDIDA')
                                        <span class="badge bg-success px-2 py-1 font-weight-normal">ATENDIDA</span>
                                    @elseif($cita->status == 'CANCELADA')
                                        <span class="badge bg-danger px-2 py-1 font-weight-normal">CANCELADA</span>
                                    @else
                                        <span class="badge bg-secondary px-2 py-1 font-weight-normal">{{ $cita->status }}</span>
                                    @endif
                                </td>

                                <td class="text-center align-middle">
                                    @if($cita->status == "NUEVA")
                                        <form action="{{ route('citasConsultaExternaDelete', $cita->id) }}" method="POST" class="form-eliminar" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar Cita">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('citasConsultaExternaShow', $cita->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Cita">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle mr-1"></i> No hay citas programadas para este paciente.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-light py-3"></div>
    </div>

</div>

<br>

@stop

@include('layouts.footer')

@section('css')
<style>
    .style-label {
        font-size: 0.65rem;
        letter-spacing: 0.8px;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Inicializar tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Inicializar Select2 si se llega a requerir en algún modal/campo
        if ($('#diagnostico_medico_id').length) {
            $('#diagnostico_medico_id').select2({
                placeholder: "-- Seleccione una opción --",
                allowClear: true
            });
        }

        // Manejador dinámico para eliminación de citas con SweetAlert2
        $(document).on('submit', '.form-eliminar', function(e) {
            e.preventDefault();
            let form = this;

            Swal.fire({
                title: '¿Está seguro?',
                text: "La cita será eliminada del sistema.",
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