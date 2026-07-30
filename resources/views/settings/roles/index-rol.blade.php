@extends('adminlte::page')

@section('title', 'Gestión de Roles')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Gestión de Roles
                </h1>
                <p class="text-muted small mb-0">Administración de roles y niveles de acceso en el sistema</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('rolesCreate') }}" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-plus mr-1"></i> NUEVO REGISTRO
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
            'delete',
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

    <!-- Tabla Principal de Roles -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-shield text-primary mr-2"></i>
                Listado de Roles Registrados
            </h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 text-sm align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="px-3">Rol</th>
                            <th>Descripción</th>
                            <th width="150" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $rol)
                            <tr>
                                <td class="px-3 align-middle">
                                    <span class="badge badge-soft-info px-2 py-1 font-weight-bold">
                                        <i class="fas fa-shield-alt mr-1"></i>
                                        {{ $rol->rol }}
                                    </span>
                                </td>
                                <td class="align-middle text-muted">
                                    {{ $rol->descripcion ?? 'Sin descripción asignada' }}
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('rolesEdit', $rol->id) }}" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Editar rol">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form id="delete-form-{{ $rol->id }}" action="{{ route('rolesDelete', $rol->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Eliminar rol" onclick="confirmarEliminacion({{ $rol->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    <i class="fas fa-user-shield fa-3x text-secondary mb-3 d-block"></i>
                                    <span class="font-weight-bold" style="font-size: 1.05rem;">No se encontraron roles registrados.</span>
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
        });

        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Eliminar rol?',
                text: 'El rol será eliminado del sistema de manera permanente.',
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