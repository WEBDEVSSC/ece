
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Roles</strong> <small>Panel de Control</small></h1>
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
    <div class="card-header">
        <a href="{{ route('rolesCreate') }}" class="btn btn-success btn-sm">NUEVO REGISTRO</a>
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
                        <a href="{{ route('rolesEdit', $rol->id)}}" class="btn btn-warning btn-sm">EDITAR</a>

                        <a href="javascript:void(0);" onclick="confirmarEliminacion({{ $rol->id }})" class="btn btn-danger btn-sm float-right mr-2">
                            ELIMINAR
                        </a>

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
        function confirmarEliminacion(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('rolesDelete', ['id' => '__id__']) }}".replace('__id__', id);
                }
            });
        }
    </script>
@stop