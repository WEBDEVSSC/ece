
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Médicos</strong> <small>Panel de Control</small></h1>
@stop

@section('content')

<!-- -->

@php
    $alerts = [
        'success',
        'successCredencializacion',
        'updateCredencializacion',
        'successHorario',
        'successUpdateHorario',
        'successUpdatePuesto',
        'successSueldo',
        'updateSueldo',
        'successGradoAcademico',
        'updateGradoAcademico',
        'successAreaMedica',
        'updateAreaMedica',
        'successCertificacion',
        'updateCertificacion',
        'successCentrosDeSalud',
        'updateCentrosDeSalud',
        'successHospital',
        'updateHospital',
        'successOfJurisdiccional',
        'updateOfJurisdiccional',
        'successCriCree',
        'updateCriCree',
        'successSamuCrum',
        'updateSamuCrum',
        'successOficinaCentral',
        'updateOficinaCentral',
        'successAlmacen',
        'updateAlmacen'
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
    <div class="card-header">
        <a href="{{ route('medicosCreate') }}" class="btn btn-success btn-sm">NUEVO REGISTRO</a>
    </div>
    <div class="card-body">

        <table class="table">
        <thead>
            <tr>
                <th>CURP</th>
                <th>Nombres</th>
                <th>Tipo de Personal</th>
                <th>Cédula</th>
                <th>Servicio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
                <tr>
                    <td>{{ $medico->curp }}</td>
                    <td>{{ $medico->apellido_paterno }} {{ $medico->apellido_materno }} {{ $medico->nombres }}</td>
                    <td>{{ $medico->tipo_personal_label }}</td>
                    <td>{{ $medico->cedula_profesional }}</td>
                    <td>{{ $medico->servicio_label }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
    <div class="card-footer"></div>
</div>

    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop