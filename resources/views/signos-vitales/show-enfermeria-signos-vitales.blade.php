
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('plugins.Select2', true)

@section('content_header')
    <h1><strong>Signos Vitales</strong> <small class="text-muted">Detalles</small></h1>
@stop

@section('content')

<!-- -->

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
                    title: 'Éxito',
                    text: "{{ session($alert) }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif
@endforeach

<!-- -->

<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline shadow-sm">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-md text-info mr-2"></i>
                    Paciente seleccionado
                </h3>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    

                    <div class="col-md-11">
                        <h4 class="mb-1 font-weight-bold">
                            {{ $signosVitales->cita->paciente->nombre_completo }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header text-right">
        
    </div>
    <div class="card-body">

    <div class="row">
        <div class="col-md-2">
            <p><strong>Temperatura</strong></p>
            {{ $signosVitales->temperatura }} °C
        </div>

        <div class="col-md-2">
            <p><strong>Frecuencia Cardiaca</strong></p>
            {{ $signosVitales->frecuencia_cardiaca }}
        </div>

        <div class="col-md-2">
            <p><strong>Frecuencia Respiratoria</strong></p>
            {{ $signosVitales->frecuencia_respiratoria }}
        </div>

        <div class="col-md-2">
            <p><strong>Saturación de Oxigeno</strong></p>
            {{ $signosVitales->saturacion_oxigeno }}
        </div>

        <div class="col-md-2">
            <p><strong>Tensión Arterial</strong></p>
            {{ $signosVitales->tension_arterial_sistolica }} / {{ $signosVitales->tension_arterial_diastolica }}
        </div>

        <div class="col-md-2">
            <p><strong>Glicema Capilar</strong></p>
            {{ $signosVitales->glicemia_capilar }} / {{ $signosVitales->glicemia_capilar_medicion == '1' ? 'AYUNO' : 'CASUAL' }}
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-2">
            <p><strong>Circunferencia Cintura</strong></p>
            {{ $signosVitales->circunferencia_cintura }}
        </div>

        <div class="col-md-2">
            <p><strong>Peso</strong></p>
            {{ $signosVitales->peso }}
        </div>

        <div class="col-md-2">
            <p><strong>Talla</strong></p>
            {{ $signosVitales->talla }}
        </div>

        <div class="col-md-2">
            <p><strong>IMC</strong></p>
            {{ $signosVitales->imc }}
        </div>
    </div>

    

    
</div>
</div>



    
@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <style>
        /* Asegura que Select2 tenga el mismo alto y bordes redondeados */
        .select2-container--default .select2-selection--single {
            height: calc(2.25rem + 2px) !important; /* Ajuste de altura */
            border-radius: 0.25rem !important; /* Bordes redondeados */
            border: 1px solid #ced4da !important; /* Color del borde */
        }
        
        /* Alineación del texto */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: calc(2.25rem - 2px) !important;
            padding-left: 0.75rem !important;
        }
        
        /* Ajuste del ícono desplegable */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(2.25rem + 2px) !important;
        }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script>
        $(document).ready(function() {
            $('#diagnostico_medico_id').select2({
                placeholder: "-- Seleccione una opcion --",
                allowClear: true
            });
        });
    </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        $(function () {

            $('[data-toggle="tooltip"]').tooltip();

            $('.form-eliminar').submit(function(e){

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