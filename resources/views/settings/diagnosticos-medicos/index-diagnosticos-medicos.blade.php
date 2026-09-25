@extends('adminlte::page')

@section('title', 'Diagnósticos Médicos')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Gestión de Diagnósticos Médicos
                </h1>
                <p class="text-muted small mb-0">Administración de diagnósticos médicos de la unidad</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('diagnosticosMedicosCreate') }}" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-plus mr-1"></i> NUEVO REGISTRO
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')

@php
    $alerts = ['success', 'update', 'delete', 'destroy', 'error'];
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

    <!-- Tarjetas Informativas / Resumen -->
    <div class="row mb-3">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-notes-medical"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Total Diagnósticos</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        {{ count($diagnosticos) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-stethoscope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Estado Catálogo</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        Activo
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-hospital-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted text-uppercase style-label">Módulo</span>
                    <span class="info-box-number text-dark font-weight-bold" style="font-size: 1.4rem;">
                        Catálogos Médicos
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla Principal de Diagnósticos Médicos -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-notes-medical text-primary mr-2"></i>
                Listado de Diagnósticos Médicos
            </h3>
            <span class="badge badge-light border text-muted px-2 py-1">
                Catálogo general
            </span>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-sm align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="px-3">Diagnóstico Médico</th>
                            <th width="150" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($diagnosticos as $diagnostico)
                            <tr>
                                <td class="px-3 align-middle">
                                    <span class="badge badge-soft-info px-2 py-1 font-weight-bold">
                                        <i class="fas fa-stethoscope mr-1"></i>
                                        {{ $diagnostico->nombre }}
                                    </span>
                                </td>
                                
                                <td class="text-center align-middle">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('diagnosticosMedicosEdit', $diagnostico->id) }}" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Editar diagnóstico">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form id="delete-form-{{ $diagnostico->id }}" action="{{ route('diagnosticosMedicosDelete', $diagnostico->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar diagnóstico" onclick="confirmarEliminacion({{ $diagnostico->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center py-5 text-muted">
                                    <i class="fas fa-notes-medical fa-3x text-secondary mb-3 d-block"></i>
                                    <span class="font-weight-bold" style="font-size: 1.05rem;">No se encontraron diagnósticos médicos registrados.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top-0 py-3"></div>
    </div>

</div>

@stop

@include('layouts.footer')

@section('css')
    <style>
        .style-label {
            font-size: 0.7rem;
            letter-spacing: 0.8px;
        }

        .badge-soft-info {
            color: #17a2b8;
            background-color: #e8f4f8;
            border: 1px solid #b8e2ec;
        }

        .btn-group .btn {
            margin: 0 1px;
            border-radius: 4px !important;
        }
    </style>
@stop

@section('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Eliminar diagnóstico?',
                text: 'El diagnóstico médico será eliminado del sistema de manera permanente.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-trash-alt"></i> Sí, eliminar',
                cancelButtonText: '<i class="fas fa-times"></i> Cancelar',
                reverseButtons: true,
                focusCancel: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@stop