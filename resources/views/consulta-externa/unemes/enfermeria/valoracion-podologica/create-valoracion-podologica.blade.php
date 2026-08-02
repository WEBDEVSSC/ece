@extends('adminlte::page')

@section('title', 'Valoración Podológica')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Valoración Podológica
                </h1>
                <p class="text-muted small mb-0">Nuevo registro de evaluación podológica</p>
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

    <!-- Tarjeta de Información del Paciente -->
    <div class="card card-outline card-info shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-injured text-info mr-2"></i>
                Datos del Paciente
            </h3>
            <span class="badge badge-light border text-muted px-2 py-1">
                Expediente: <strong class="text-dark">{{ $citaId->paciente->expediente ?? 'N/E' }}</strong>
            </span>
        </div>
        <div class="card-body bg-light">
            <div class="row align-items-center">
                <!-- Nombre y Datos Rápidos -->
                <div class="col-md-5 border-right">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-white shadow-sm d-flex align-items-center justify-content-center mr-3 text-info font-weight-bold" style="width: 50px; height: 50px; font-size: 1.2rem;">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <h5 class="font-weight-bold text-dark mb-1">
                                {{ $citaId->paciente->nombre ?? 'N/A' }} {{ $citaId->paciente->apellido_paterno ?? '' }} {{ $citaId->paciente->apellido_materno ?? '' }}
                            </h5>
                            <span class="badge badge-info">
                                {{ $citaId->paciente->genero ?? 'No especificado' }}
                            </span>
                            <span class="badge badge-secondary ml-1">
                                {{ $citaId->paciente->edad ?? '--' }} Años
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Detalle de Cita y Documento -->
                <div class="col-md-7 mt-3 mt-md-0">
                    <div class="row text-center text-md-left">
                        <div class="col-sm-4 border-right">
                            <small class="text-muted text-uppercase d-block font-weight-bold style-label">DNI / CURP</small>
                            <span class="font-weight-bold text-dark">{{ $citaId->paciente->curp ?? 'Sin registro' }}</span>
                        </div>
                        <div class="col-sm-4 border-right">
                            <small class="text-muted text-uppercase d-block font-weight-bold style-label">Fecha Nacimiento</small>
                            <span class="font-weight-bold text-dark">
                                {{ isset($citaId->paciente->fecha_nacimiento) ? \Carbon\Carbon::parse($citaId->paciente->fecha_nacimiento)->format('d/m/Y') : 'N/A' }}
                            </span>
                        </div>
                        <div class="col-sm-4">
                            <small class="text-muted text-uppercase d-block font-weight-bold style-label">Teléfono</small>
                            <span class="font-weight-bold text-dark">{{ $citaId->paciente->telefono ?? 'Sin teléfono' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de Evaluación Podológica -->
    <form action="{{ route('UnemeEnfermeriaValoracionPodologicaStore', $citaId->id) }}" method="POST">
        @csrf

        <div class="row">
            <!-- PIE DERECHO -->
            <div class="col-md-6 mb-4">
                <div class="card card-outline card-primary shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3">
                        <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                            <i class="fas fa-shoe-prints mr-2"></i> PIE DERECHO
                        </h3>
                    </div>
                    <div class="card-body p-3">
                        
                        <!-- Hiperqueratosis -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Hiperqueratosis</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">a) Plantar</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-calc" name="pd_plantar" value="{{ old('pd_plantar') }}">
                                            @error('pd_plantar')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">b) Dorsal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-calc" name="pd_dorsal" value="{{ old('pd_dorsal') }}">
                                            @error('pd_dorsal')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">c) Talar</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-calc" name="pd_talar" value="{{ old('pd_talar') }}">
                                            @error('pd_talar')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold pd_subtotal" name="pd_subtotal" value="{{ old('pd_subtotal') }}" readonly>
                                            @error('pd_subtotal')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Alteraciones Ungueales -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Alteraciones Ungueales</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">d) Onicogrifosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="pd_onicogrifosis" value="{{ old('pd_onicogrifosis') }}">
                                            @error('pd_onicogrifosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">e) Onicomicosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="pd_onicomicosis" value="{{ old('pd_onicomicosis') }}">
                                            @error('pd_onicomicosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">f) Onicocriptosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="pd_onicocriptosis" value="{{ old('pd_onicocriptosis') }}">
                                            @error('pd_onicocriptosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Otras Localizadas -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Otras Localizadas</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">g) Bullosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_bullosis" value="{{ old('pd_bullosis') }}">
                                            @error('pd_bullosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">h) Úlcera</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_ulcera" value="{{ old('pd_ulcera') }}">
                                            @error('pd_ulcera')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">i) Necrosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_necrosis" value="{{ old('pd_necrosis') }}">
                                            @error('pd_necrosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">j) Grietas y fisuras</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_grietas_fisuras" value="{{ old('pd_grietas_fisuras') }}">
                                            @error('pd_grietas_fisuras')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">k) Lesiones superficiales</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_lesiones_superficiales" value="{{ old('pd_lesiones_superficiales') }}">
                                            @error('pd_lesiones_superficiales')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">l) Otras</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_otras" value="{{ old('pd_otras') }}">
                                            @error('pd_otras')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Anhidrosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_anhidrosis" value="{{ old('pd_anhidrosis') }}">
                                            @error('pd_anhidrosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Tiñas</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_tinas" value="{{ old('pd_tinas') }}">
                                            @error('pd_tinas')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Proceso infeccioso</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pd-otras-calc" name="pd_proceso_infeccioso" value="{{ old('pd_proceso_infeccioso') }}">
                                            @error('pd_proceso_infeccioso')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold" name="pd_subtotal_otras_localizadas" value="{{ old('pd_subtotal_otras_localizadas') }}" readonly>
                                            @error('pd_subtotal_otras_localizadas')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- PIE IZQUIERDO -->
            <div class="col-md-6 mb-4">
                <div class="card card-outline card-primary shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3">
                        <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                            <i class="fas fa-shoe-prints mr-2"></i> PIE IZQUIERDO
                        </h3>
                    </div>
                    <div class="card-body p-3">
                        
                        <!-- Hiperqueratosis -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Hiperqueratosis</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">a) Plantar</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-calc" name="pi_plantar" value="{{ old('pi_plantar') }}">
                                            @error('pi_plantar')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">b) Dorsal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-calc" name="pi_dorsal" value="{{ old('pi_dorsal') }}">
                                            @error('pi_dorsal')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">c) Talar</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-calc" name="pi_talar" value="{{ old('pi_talar') }}">
                                            @error('pi_talar')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold pi_subtotal" name="pi_subtotal" value="{{ old('pi_subtotal') }}" readonly>
                                            @error('pi_subtotal')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Alteraciones Ungueales -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Alteraciones Ungueales</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">d) Onicogrifosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="pi_onicogrifosis" value="{{ old('pi_onicogrifosis') }}">
                                            @error('pi_onicogrifosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">e) Onicomicosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="pi_onicomicosis" value="{{ old('pi_onicomicosis') }}">
                                            @error('pi_onicomicosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">f) Onicocriptosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="pi_onicocriptosis" value="{{ old('pi_onicocriptosis') }}">
                                            @error('pi_onicocriptosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Otras Localizadas -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Otras Localizadas</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">g) Bullosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_bullosis" value="{{ old('pi_bullosis') }}">
                                            @error('pi_bullosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">h) Úlcera</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_ulcera" value="{{ old('pi_ulcera') }}">
                                            @error('pi_ulcera')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">i) Necrosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_necrosis" value="{{ old('pi_necrosis') }}">
                                            @error('pi_necrosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">j) Grietas y fisuras</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_grietas_fisuras" value="{{ old('pi_grietas_fisuras') }}">
                                            @error('pi_grietas_fisuras')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">k) Lesiones superficiales</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_lesiones_superficiales" value="{{ old('pi_lesiones_superficiales') }}">
                                            @error('pi_lesiones_superficiales')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">l) Otras</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_otras" value="{{ old('pi_otras') }}">
                                            @error('pi_otras')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Anhidrosis</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_anhidrosis" value="{{ old('pi_anhidrosis') }}">
                                            @error('pi_anhidrosis')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Tiñas</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_tinas" value="{{ old('pi_tinas') }}">
                                            @error('pi_tinas')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Proceso infeccioso</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm pi-otras-calc" name="pi_proceso_infeccioso" value="{{ old('pi_proceso_infeccioso') }}">
                                            @error('pi_proceso_infeccioso')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold" name="pi_subtotal_otras_localizadas" value="{{ old('pi_subtotal_otras_localizadas') }}" readonly>
                                            @error('pi_subtotal_otras_localizadas')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de Envío Único -->
        <div class="row mb-4">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-success px-4 font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-2"></i> REGISTRAR DATOS
                </button>
            </div>
        </div>
    </form>
</div>

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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    document.addEventListener('DOMContentLoaded', function () {
        function setupSubtotalGroup(inputsSelector, outputSelector) {
            const inputs = document.querySelectorAll(inputsSelector);
            const output = document.querySelector(outputSelector);

            function calcular() {
                let total = 0;
                inputs.forEach(input => {
                    total += parseFloat(input.value) || 0;
                });
                if (output) {
                    output.value = total % 1 === 0 ? total : total.toFixed(2);
                }
            }

            inputs.forEach(input => {
                input.addEventListener('input', calcular);
            });

            calcular();
        }

        // Pie Derecho - Hiperqueratosis
        setupSubtotalGroup('.pd-calc', 'input[name="pd_subtotal"]');

        // Pie Derecho - Otras Localizadas
        setupSubtotalGroup('.pd-otras-calc', 'input[name="pd_subtotal_otras_localizadas"]');

        // Pie Izquierdo - Hiperqueratosis
        setupSubtotalGroup('.pi-calc', 'input[name="pi_subtotal"]');

        // Pie Izquierdo - Otras Localizadas
        setupSubtotalGroup('.pi-otras-calc', 'input[name="pi_subtotal_otras_localizadas"]');
    });
</script>
@stop