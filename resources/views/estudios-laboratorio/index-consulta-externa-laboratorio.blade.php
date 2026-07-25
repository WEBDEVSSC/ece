
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Laboratorios</strong> <small class="text-muted">Resultados</small></h1>
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
        
    </div>
    <div class="card-body">

        <table class="table">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Paciente</th>                
                <th>Diagnóstico</th>                
                <th>Médico</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($citasHoy as $citaHoy)
                <tr>
                    <td>{{ $citaHoy->hora }}</td>
                    <td>{{ $citaHoy->paciente->nombre_completo }}</td>
                    <td>{{ $citaHoy->paciente->diagnosticoMedico->clave_nombre }}</td>
                    <td>{{ $citaHoy->medico->nombre_completo }}</td>
                    

                    <td class="text-right">
                        
                        @if ($citaHoy->status_laboratorios == 0)
                            <a href="{{ route('ConsultaExternaLaboratorioCreate', $citaHoy->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="TOMA DE LABORATORIOS"><i class="fas fa-flask"></i></a>
                        @else
                            <a href="{{ route('ConsultaExternaLaboratorioShow', $citaHoy->id) }}" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="VER TOMA DE LABORATORIOS"><i class="fas fa-flask"></i></a>
                        @endif
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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