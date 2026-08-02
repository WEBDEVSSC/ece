@extends('adminlte::page')

@section('title', 'Examen Neurológico')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Examen Neurológico
                </h1>
                <p class="text-muted small mb-0">Nuevo registro de examen neurológico</p>
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
    <form action="{{ route('UnemeEnfermeriaExamenNeurologicoStore', $citaId->id) }}" method="POST">
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
                        
                        <!-- Sistema Perceptual -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Sistema perceptual</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Sensibilidad táctil</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pd-perceptual-calc" name="pd_sensibilidad_tactil" value="{{ old('pd_sensibilidad_tactil', 0) }}">
                                            @error('pd_sensibilidad_tactil')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Sensibilidad vibratoria</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pd-perceptual-calc" name="pd_sensibilidad_vibratoria" value="{{ old('pd_sensibilidad_vibratoria', 0) }}">
                                            @error('pd_sensibilidad_vibratoria')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold pd_subtotal_perceptual" name="pd_subtotal_sistema_perceptual" value="{{ old('pd_subtotal_sistema_perceptual', 0) }}" readonly>
                                            @error('pd_subtotal_sistema_perceptual')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Sistema Motor -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Sistema motor</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Reflejo rotuliano</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pd-motor-calc" name="pd_reflejo_rotuliano" value="{{ old('pd_reflejo_rotuliano', 0) }}">
                                            @error('pd_reflejo_rotuliano')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Dorsiflexión del pie</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pd-motor-calc" name="pd_dorsiflexion" value="{{ old('pd_dorsiflexion', 0) }}">
                                            @error('pd_dorsiflexion')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Apertura dedos en abanico</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pd-motor-calc" name="pd_apertura_dedos" value="{{ old('pd_apertura_dedos', 0) }}">
                                            @error('pd_apertura_dedos')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold pd_subtotal_motor" name="pd_subtotal_sistema_motor" value="{{ old('pd_subtotal_sistema_motor', 0) }}" readonly>
                                            @error('pd_subtotal_sistema_motor')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Total Pie Derecho -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <tbody>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right" width="60%">Calificación total</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold pd_calificacion_total" name="pd_calificacion_total" value="{{ old('pd_calificacion_total', 0) }}" readonly>
                                            @error('pd_calificacion_total')<div class="text-danger small">{{ $message }}</div>@enderror
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
                        
                        <!-- Sistema Perceptual -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Sistema perceptual</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Sensibilidad táctil</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pi-perceptual-calc" name="pi_sensibilidad_tactil" value="{{ old('pi_sensibilidad_tactil', 0) }}">
                                            @error('pi_sensibilidad_tactil')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Sensibilidad vibratoria</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pi-perceptual-calc" name="pi_sensibilidad_vibratoria" value="{{ old('pi_sensibilidad_vibratoria', 0) }}">
                                            @error('pi_sensibilidad_vibratoria')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold pi_subtotal_perceptual" name="pi_subtotal_sistema_perceptual" value="{{ old('pi_subtotal_sistema_perceptual', 0) }}" readonly>
                                            @error('pi_subtotal_sistema_perceptual')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Sistema Motor -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Sistema motor</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Reflejo rotuliano</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pi-motor-calc" name="pi_reflejo_rotuliano" value="{{ old('pi_reflejo_rotuliano', 0) }}">
                                            @error('pi_reflejo_rotuliano')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Dorsiflexión del pie</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pi-motor-calc" name="pi_dorsiflexion" value="{{ old('pi_dorsiflexion', 0) }}">
                                            @error('pi_dorsiflexion')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Apertura dedos en abanico</td>
                                        <td>
                                            <input type="number" step="any" class="form-control form-control-sm pi-motor-calc" name="pi_apertura_dedos" value="{{ old('pi_apertura_dedos', 0) }}">
                                            @error('pi_apertura_dedos')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold pi_subtotal_motor" name="pi_subtotal_sistema_motor" value="{{ old('pi_subtotal_sistema_motor', 0) }}" readonly>
                                            @error('pi_subtotal_sistema_motor')<div class="text-danger small">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Total Pie Izquierdo -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <tbody>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right" width="60%">Calificación total</td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm font-weight-bold pi_calificacion_total" name="pi_calificacion_total" value="{{ old('pi_calificacion_total', 0) }}" readonly>
                                            @error('pi_calificacion_total')<div class="text-danger small">{{ $message }}</div>@enderror
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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    document.addEventListener('DOMContentLoaded', function () {
        
        function calcularSuma(inputsSelector) {
            let total = 0;
            const inputs = document.querySelectorAll(inputsSelector);
            inputs.forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            return total;
        }

        function formatearNumero(valor) {
            return valor % 1 === 0 ? valor : valor.toFixed(2);
        }

        function actualizarCalculos() {
            // 1. Pie Derecho
            const pdPerceptual = calcularSuma('.pd-perceptual-calc');
            const pdMotor = calcularSuma('.pd-motor-calc');
            const pdTotal = pdPerceptual + pdMotor;

            const pdSubPerceptualInput = document.querySelector('.pd_subtotal_perceptual');
            const pdSubMotorInput = document.querySelector('.pd_subtotal_motor');
            const pdTotalInput = document.querySelector('.pd_calificacion_total');

            if (pdSubPerceptualInput) pdSubPerceptualInput.value = formatearNumero(pdPerceptual);
            if (pdSubMotorInput) pdSubMotorInput.value = formatearNumero(pdMotor);
            if (pdTotalInput) pdTotalInput.value = formatearNumero(pdTotal);

            // 2. Pie Izquierdo
            const piPerceptual = calcularSuma('.pi-perceptual-calc');
            const piMotor = calcularSuma('.pi-motor-calc');
            const piTotal = piPerceptual + piMotor;

            const piSubPerceptualInput = document.querySelector('.pi_subtotal_perceptual');
            const piSubMotorInput = document.querySelector('.pi_subtotal_motor');
            const piTotalInput = document.querySelector('.pi_calificacion_total');

            if (piSubPerceptualInput) piSubPerceptualInput.value = formatearNumero(piPerceptual);
            if (piSubMotorInput) piSubMotorInput.value = formatearNumero(piMotor);
            if (piTotalInput) piTotalInput.value = formatearNumero(piTotal);
        }

        // Escuchar eventos en todos los inputs editables de ambos pies
        const todosLosInputs = document.querySelectorAll('.pd-perceptual-calc, .pd-motor-calc, .pi-perceptual-calc, .pi-motor-calc');
        todosLosInputs.forEach(input => {
            input.addEventListener('input', actualizarCalculos);
            input.addEventListener('change', actualizarCalculos);
        });

        // Ejecución inicial para calcular valores si vienen de un "old()" de Blade
        actualizarCalculos();
    });
</script>
@stop