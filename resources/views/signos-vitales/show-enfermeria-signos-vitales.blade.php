@extends('adminlte::page')

@section('title', 'Detalle Signos Vitales')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Detalles de Signos Vitales
                </h1>
                <p class="text-muted small mb-0">Consulta detallada de las mediciones registradas para la consulta</p>
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

<div class="container-fluid">

    {{-- Alertas con SweetAlert2 --}}
    @php
        $alerts = [
            'success',
            'update',
            'destroy',
        ];
    @endphp

    @foreach ($alerts as $alert)
        @if(session($alert))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: "{{ session($alert) }}",
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#28a745'
                    });
                });
            </script>
        @endif
    @endforeach

    @include('layouts.show-paciente-card', ['citaId' => $citaId])

    <!-- Detalles de las Mediciones -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-heartbeat text-primary mr-2"></i>
                Mediciones de Signos Vitales
            </h3>
        </div>

        <div class="card-body">
            <!-- Primera Fila: Constantes Vitales -->
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-thermometer-half text-secondary mr-1"></i> Temperatura
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->temperatura ? $signosVitales->temperatura . ' °C' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-heartbeat text-secondary mr-1"></i> Freq. Cardiaca
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->frecuencia_cardiaca ? $signosVitales->frecuencia_cardiaca . ' bpm' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-lungs text-secondary mr-1"></i> Freq. Respiratoria
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->frecuencia_respiratoria ? $signosVitales->frecuencia_respiratoria . ' rpm' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-wind text-secondary mr-1"></i> Sat. Oxígeno
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->saturacion_oxigeno ? $signosVitales->saturacion_oxigeno . ' %' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-stethoscope text-secondary mr-1"></i> Tensión Arterial
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->tension_arterial_sistolica ?? '--' }} / {{ $signosVitales->tension_arterial_diastolica ?? '--' }} mmHg
                    </div>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-tint text-secondary mr-1"></i> Glicemia Capilar
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->glicemia_capilar ?? 'N/A' }} mg/dL
                        <span class="badge badge-info ml-1">
                            {{ $signosVitales->glicemia_capilar_medicion == '1' ? 'AYUNO' : 'CASUAL' }}
                        </span>
                    </div>
                </div>
            </div>

            <hr class="my-3">

            <!-- Segunda Fila: Somatometría -->
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-tape text-secondary mr-1"></i> Circunf. Cintura
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->circunferencia_cintura ? $signosVitales->circunferencia_cintura . ' cm' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-weight text-secondary mr-1"></i> Peso
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->peso ? $signosVitales->peso . ' kg' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-ruler-vertical text-secondary mr-1"></i> Talla
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->talla ? $signosVitales->talla . ' cm' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-calculator text-secondary mr-1"></i> IMC
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $signosVitales->imc ?? 'N/A' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-white border-top text-right py-3">
            
        </div>
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
    </script>
@stop