@extends('adminlte::page')

@section('title', 'Detalle Laboratorios')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Detalles de Laboratorio
                </h1>
                <p class="text-muted small mb-0">Consulta detallada de los resultados de análisis clínicos del paciente</p>
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

    <!-- Resultados de Laboratorio -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-vial text-primary mr-2"></i>
                Resultados de Exámenes Clínicos
            </h3>
        </div>

        <div class="card-body">
            <!-- Primera Fila: Glucosa y Lípidos (Parte 1) -->
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold" title="Hemoglobina Glicosilada">
                        <i class="fas fa-tint text-secondary mr-1"></i> HbA1c
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $laboratorio->hemoglobina ? $laboratorio->hemoglobina . ' %' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-cubes text-secondary mr-1"></i> Glucosa Sérica
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $laboratorio->glucosa_serica ? $laboratorio->glucosa_serica . ' mg/dL' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-flask text-secondary mr-1"></i> Triglicéridos
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $laboratorio->trigliceridos ? $laboratorio->trigliceridos . ' mg/dL' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-arrow-down text-secondary mr-1"></i> Colesterol LDL
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $laboratorio->colesterol_ldl ? $laboratorio->colesterol_ldl . ' mg/dL' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-arrow-up text-secondary mr-1"></i> Colesterol HDL
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $laboratorio->colesterol_hdl ? $laboratorio->colesterol_hdl . ' mg/dL' : 'N/A' }}
                    </div>
                </div>
            </div>

            <hr class="my-3">

            <!-- Segunda Fila: Colesterol Total y Función Renal -->
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-heartbeat text-secondary mr-1"></i> Colesterol Total
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $laboratorio->colesterol_total ? $laboratorio->colesterol_total . ' mg/dL' : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-microscope text-secondary mr-1"></i> Microalbuminuria
                    </label>
                    <div class="p-2 bg-light rounded border text-dark font-weight-bold">
                        {{ $laboratorio->microalbuminuria ? $laboratorio->microalbuminuria . ' mg/g' : 'N/A' }}
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