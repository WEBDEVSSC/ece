
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('plugins.Select2', true)

@section('content_header')
    <h1><strong>Pacientes</strong> <small class="text-muted">Detalles</small></h1>
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
                            {{ $paciente->nombre_completo }}
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
            <p><strong>CURP</strong></p>
            {{ $paciente->curp }}
        </div>

        <div class="col-md-2">
            <p><strong>Sexo</strong></p>
            {{ $paciente->sexo == 'H' ? 'MASCULINO' : 'FEMENINO' }}
        </div>

        <div class="col-md-2">
            <p><strong>Fecha de Nacimiento</strong></p>
            {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d-m-Y') }}
        </div>

        <div class="col-md-2">
            <p><strong>Edad</strong></p>
            {{ $edad }} Años
        </div>

        <div class="col-md-2">
            <p><strong>No. de Expediente</strong></p>
            {{ $paciente->no_expediente }}
        </div>

        <div class="col-md-2">
            <p><strong>Derechohabiencia</strong></p>
            {{ $paciente->derechohabiencia->derechohabiencia ?? '' }}
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-2">
            <p><strong>Escolaridad</strong></p>
            {{ $paciente->escolaridad->escolaridad ?? '' }}
        </div>

        <div class="col-md-2">
            <p><strong>Estado Civil</strong></p>
            {{ $paciente->estadoCivil->estado_civil ?? '' }}
        </div>

        <div class="col-md-4">
            <p><strong>Diagnóstico Médico</strong></p>
            {{ $paciente->diagnosticoMedico->clave_nombre ?? '' }}
        </div>

        <div class="col-md-2">
            <p><strong>Célular</strong></p>
            {{ $paciente->celular }}
        </div>

        <div class="col-md-2">
            <p><strong>E-mail</strong></p>
            {{ $paciente->email }}
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <p><strong>Alergias</strong></p>
            {{ $paciente->alergias }}
        </div>
    </div>

    

    </div>
    <div class="card-footer text-right">
        <div class="row mt-3">
            <div class="col-md-12">
                <p><strong>CLUES</strong>
                {{ $paciente->clues->clues_nombre }}</p>
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
                    text: "El médico será eliminado del sistema.",
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