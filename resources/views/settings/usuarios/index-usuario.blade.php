@extends('adminlte::page')

@section('title', 'Gestión de Usuarios')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Gestión de Usuarios
                </h1>
                <p class="text-muted small mb-0">Administración de acceso, roles, unidades y asignación de personal</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('usuariosCreate') }}" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-user-plus mr-1"></i> NUEVO REGISTRO
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')

<div class="container-fluid">

@php
    $alerts = ['success', 'update', 'destroy'];
@endphp

@foreach ($alerts as $alert)
    @if(session($alert))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "{{ session($alert) }}",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true
                });
            });
        </script>
    @endif
@endforeach

    <!-- Tabla Principal de Usuarios -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-users-cog text-primary mr-2"></i>
                Listado de Usuarios del Sistema
            </h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-sm align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="px-3">Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Unidad / CLUES</th>
                            <th>Rol</th>
                            <th>Personal Asignado</th>
                            <th width="200" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $usuario)
                            <tr>
                                <td class="px-3 align-middle font-weight-bold text-dark">
                                    <i class="fas fa-user-circle text-secondary mr-1"></i>
                                    {{ $usuario->name }}
                                </td>
                                <td class="align-middle text-muted">
                                    <i class="far fa-envelope mr-1"></i>
                                    {{ $usuario->email }}
                                </td>
                                <td class="align-middle text-muted">
                                    {{ $usuario->clues ? $usuario->clues->clues_nombre : 'N/A' }}
                                </td>
                                <td class="align-middle">
                                    @if($usuario->rol)
                                        <span class="badge badge-soft-info px-2 py-1 font-weight-bold">
                                            {{ $usuario->rol->rol }}
                                        </span>
                                    @else
                                        <span class="badge badge-light text-muted">Sin Rol</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($usuario->personalUnidad)
                                        <span class="text-primary font-weight-bold">
                                            <i class="fas fa-user-md mr-1"></i>
                                            {{ $usuario->personalUnidad->nombre_completo }}
                                        </span>
                                    @else
                                        <span class="text-muted small"><em>Sin asignar</em></span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('usuariosShow', $usuario->id) }}" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('usuariosEdit', $usuario->id) }}" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Editar usuario">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('createUsuarioPersonalUnidad', $usuario->id) }}" class="btn btn-sm btn-outline-info" data-toggle="tooltip" data-placement="top" title="Asignar Personal de Salud">
                                            <i class="fas fa-user-md"></i>
                                        </a>

                                        <form action="{{ route('usuariosDestroy', $usuario->id) }}" method="POST" class="d-inline form-eliminar">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar usuario">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fas fa-users-slash fa-3x text-secondary mb-3 d-block"></i>
                                    <span class="font-weight-bold" style="font-size: 1.05rem;">No se encontraron usuarios registrados.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-top py-3"></div>
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

        .badge-soft-info {
            color: #17a2b8;
            background-color: #e8f4f8;
            border: 1px solid #b8e2ec;
        }
    </style>
@stop

@section('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();

            $('.form-eliminar').submit(function(e){
                e.preventDefault();

                let form = this;

                Swal.fire({
                    title: '¿Eliminar usuario?',
                    text: 'El usuario será eliminado del sistema de manera permanente.',
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
                        form.submit();
                    }
                });
            });
        });
    </script>
@stop