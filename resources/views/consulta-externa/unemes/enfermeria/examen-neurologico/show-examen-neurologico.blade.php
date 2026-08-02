@extends('adminlte::page')

@section('title', 'Examen Neurológico')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Detalles de Examen Neurológico
                </h1>
                <p class="text-muted small mb-0">Consulta detallada de la evaluación neurológica del paciente</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('citasHoyConsultaExternaEnfermeriaIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
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
                                            {{ $citaId->examenNeurologico?->pd_sensibilidad_tactil }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Sensibilidad vibratoria</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pd_sensibilidad_vibratoria }}
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pd_subtotal_sistema_perceptual }}
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
                                            {{ $citaId->examenNeurologico?->pd_reflejo_rotuliano }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Dorsiflexión del pie</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pd_dorsiflexion }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Apertura dedos en abanico</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pd_apertura_dedos }}
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pd_subtotal_sistema_motor }}
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
                                            {{ $citaId->examenNeurologico?->pd_calificacion_total }}
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
                                            {{ $citaId->examenNeurologico?->pi_sensibilidad_tactil }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Sensibilidad vibratoria</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pi_sensibilidad_vibratoria }}
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pi_subtotal_sistema_perceptual }}
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
                                            {{ $citaId->examenNeurologico?->pi_reflejo_rotuliano }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Dorsiflexión del pie</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pi_dorsiflexion }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Apertura dedos en abanico</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pi_apertura_dedos }}
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            {{ $citaId->examenNeurologico?->pi_subtotal_sistema_motor }}
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
                                            {{ $citaId->examenNeurologico?->pi_calificacion_total }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones Finales -->
    <div class="row mb-4">
        <div class="col-12 text-right">
            <a href="{{ route('citasHoyConsultaExternaEnfermeriaIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
                <i class="fas fa-arrow-left mr-1"></i> REGRESAR
            </a>
        </div>
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