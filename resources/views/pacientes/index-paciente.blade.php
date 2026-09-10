@extends('adminlte::page')

@section('title', 'Pacientes')

@section('plugins.Sweetalert2', true)

@section('plugins.DataTables', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Panel de Pacientes
                </h1>
                <p class="text-muted small mb-0">Gestión general e historial de expedientes</p>
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
    $alerts = ['success', 'update', 'destroy', 'error'];
@endphp

@foreach ($alerts as $alert)
    @if(session($alert))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: "{{ $alert == 'error' ? 'error' : 'success' }}",
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
    <div class="card card-outline card-primary shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-injured mr-2"></i> LISTADO DE PACIENTES
            </h3>
            <div class="card-tools">
                <a href="{{ route('pacientesFind') }}" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-plus mr-1"></i> NUEVO REGISTRO
                </a>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="dataTable" class="table table-hover table-striped align-middle w-100 border">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th class="font-weight-bold">CURP</th>
                            <th class="font-weight-bold">Nombre</th>      
                            <th class="font-weight-bold">No. Expediente</th>
                            <th class="font-weight-bold">Diagnóstico</th>
                            <th class="font-weight-bold">Derechohabiencia</th>
                            <th class="text-right font-weight-bold" style="width: 220px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes as $paciente)
                            <tr>
                                <td class="align-middle font-weight-bold text-uppercase">{{ $paciente->curp }}</td>
                                <td class="align-middle">{{ $paciente->nombre_completo }}</td>
                                <td class="align-middle">
                                    @if($paciente->no_expediente)
                                        <span class="badge bg-light text-dark border px-2 py-1 font-weight-normal">
                                            {{ $paciente->no_expediente }}
                                        </span>
                                    @else
                                        <span class="badge bg-light text-muted font-weight-normal">Sin asignar</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $paciente->diagnosticoMedico->clave_nombre ?? 'N/A' }}</td>
                                <td class="align-middle">{{ $paciente->derechohabiencia->derechohabiencia ?? 'N/A' }}</td>
                                <td class="text-right align-middle">
                                    <div class="btn-group" role="group">

                                        <a href="{{ route('pacientesShow', $paciente->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('pacientesEdit', $paciente->id) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar Registro">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('pacientesContactoCreate', $paciente->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Datos del Contacto del Paciente">
                                            <i class="fas fa-user-friends"></i>
                                        </a>

                                        <a href="{{ route('pacientesNoExpedienteCreate', $paciente->id) }}" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="Asignar Expediente">
                                            <i class="fas fa-file-alt"></i>
                                        </a>

                                        <a href="{{ route('pacientesDXMedicoCreate', $paciente->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Asignar Diagnóstico">
                                            <i class="fas fa-stethoscope"></i>
                                        </a>

                                        <a href="{{ route('pacientesResumenMedico', $paciente->id) }}" target="_blank" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Resumen Médico">
                                            <i class="fas fa-notes-medical"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-light py-3"></div>
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
    $(document).ready(function() {
        // Inicializar DataTable
        $('#dataTable').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sSearch":         "Buscar:",
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

        // Inicializar tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Manejador genérico para confirmar eliminación de registros con SweetAlert2
        $(document).on('submit', '.form-eliminar', function(e) {
            e.preventDefault();
            let form = this;

            Swal.fire({
                title: '¿Está seguro?',
                text: "El registro será eliminado del sistema.",
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