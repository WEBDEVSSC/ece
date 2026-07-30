
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Roles</strong> <small class="text-muted">Panel de Control</small></h1>
@stop

@section('content')

<!-- -->

@php
    $alerts = [
        'success',
        'update',
        'delete',
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
    <div class="card-header d-flex justify-content-end">
        <a href="{{ route('rolesCreate') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> NUEVO REGISTRO
        </a>
    </div>
    <div class="card-body">

        <table class="table">
        <thead>
            <tr>
                <th>Rol</th>
                <th>Descripción</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $rol)
                <tr>
                    <td>{{ $rol->rol }}</td>
                    <td>{{ $rol->descripcion }}</td>
                    <td>
                        <a href="{{ route('rolesEdit', $rol->id) }}" class="btn btn-warning btn-sm text-white" data-toggle="tooltip" data-placement="top" title="EDITAR">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form id="delete-form-{{ $rol->id }}" action="{{ route('rolesDelete', $rol->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')

                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="ELIMINAR" onclick="confirmarEliminacion({{ $rol->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                    </td>
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

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás revertir esto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@stop