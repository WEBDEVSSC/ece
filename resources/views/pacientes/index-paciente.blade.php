
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('plugins.DataTables', true)

@section('content_header')
    <h1><strong>Pacientes</strong> <small class="text-muted">Panel de Control</small></h1>
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
        <a href="{{ route('pacientesFind') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> NUEVO REGISTRO</a>
    </div>
    <div class="card-body">

        <table id="dataTable" class="table table-striped">
        <thead>
            <tr>
                <th>CURP</th>
                <th>Nombre</th>       
                <th>No. Expediente</th>
                <th>Diagnostico</th>
                <th>Derechohabiencia</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->curp }}</td>
                    <td>{{ $paciente->nombre_completo }}</td>
                    <td>{{ $paciente->no_expediente }}</td>
                    <td>{{ $paciente->diagnosticoMedico->clave_nombre ?? '' }}</td>
                    <td>{{ $paciente->derechohabiencia->derechohabiencia ?? ''}}</td>
                    

                    <td class="text-right">
                        <a href="{{ route('pacientesShow', $paciente->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="DETALLES"><i class="fas fa-eye"></i></a>

                        <a href="{{ route('pacientesEdit', $paciente->id) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fas fa-edit"></i></a>

                        <a href="{{ route('pacientesNoExpedienteCreate', $paciente->id) }}" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="NO. EXPEDIENTE"><i class="fas fa-file-alt"></i></a>

                        <a href="{{ route('pacientesDXMedicoCreate', $paciente->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="DIAGNOSTICO"><i class="fas fa-stethoscope"></i></a>

                        <a href="{{ route('pacientesResumenMedico',$paciente->id) }}" target="_blank" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="RESUMEN MÉDICO"><i class="fas fa-notes-medical"></i></a>
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

    <script>$(document).ready( function () {
        $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
    } );
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