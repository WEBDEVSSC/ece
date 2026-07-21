
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Médicos</strong> <small class="text-muted">Detalles</small></h1>
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

<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('medicosIndex') }}" class="btn btn-success btn-sm">
            <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
        </a>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-3">
                <p><strong>Pais de Nacimiento</strong></p>
                {{ $medico->paisNacimiento->pais ?? 'No especificado' }}
            </div>
            <div class="col-md-3">
                <p><strong>CURP</strong></p>
                {{ $medico->curp }}
            </div>
            <div class="col-md-3">
                <p><strong>Nombre</strong></p>
                {{ $medico->nombre_completo }}
            </div>
            <div class="col-md-3">
                <p><strong>Cedula Profesional</strong></p>
                {{ $medico->cedula_profesional }}
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <p><strong>Tipo de Personal</strong></p>
                {{ $medico->tipoPersonal->descripcion ?? 'No especificado' }}
            </div>
            <div class="col-md-3">
                <p><strong>Servicio / Especialidad</strong></p>
                {{ $medico->servicioEspecialidadMedico->especialidad ?? 'No especificado' }}
            </div>
            <div class="col-md-6">
                <p><strong>Unidad</strong></p>
                {{ $medico->clues->clues_nombre ?? 'No especificado' }}
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <p><strong>¿Contrato por Programa U013?</strong></p>
                {{ $medico->programa_smymg == 1 ? 'SI' : 'NO' }}
            </div>
        </div>

        <div class="row mt-3">
           <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="25%">Día</th>
                        <th width="37.5%" class="text-center">Hora de Entrada</th>
                        <th width="37.5%" class="text-center">Hora de Salida</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><strong>Lunes</strong></td>
                        <td class="text-center">{{ $medico->lunes_entrada ?? '' }}</td>
                        <td class="text-center">{{ $medico->lunes_salida ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><strong>Martes</strong></td>
                        <td class="text-center">{{ $medico->martes_entrada ?? '' }}</td>
                        <td class="text-center">{{ $medico->martes_salida ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><strong>Miércoles</strong></td>
                        <td class="text-center">{{ $medico->miercoles_entrada ?? '' }}</td>
                        <td class="text-center">{{ $medico->miercoles_salida ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><strong>Jueves</strong></td>
                        <td class="text-center">{{ $medico->jueves_entrada ?? '' }}</td>
                        <td class="text-center">{{ $medico->jueves_salida ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><strong>Viernes</strong></td>
                        <td class="text-center">{{ $medico->viernes_entrada ?? '' }}</td>
                        <td class="text-center">{{ $medico->viernes_salida ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><strong>Sábado</strong></td>
                        <td class="text-center">{{ $medico->sabado_entrada ?? '' }}</td>
                        <td class="text-center">{{ $medico->sabado_salida ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><strong>Domingo</strong></td>
                        <td class="text-center">{{ $medico->domingo_entrada ?? '' }}</td>
                        <td class="text-center">{{ $medico->domingo_salida ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><strong>Festivos</strong></td>
                        <td class="text-center">{{ $medico->festivos_entrada ?? '' }}</td>
                        <td class="text-center">{{ $medico->festivos_salida ?? '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer"></div>
</div>

@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop