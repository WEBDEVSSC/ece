
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Usuarios</strong> <small class="text-muted">Panel de Control</small></h1>
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
        <a href="{{ route('usuariosCreate') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> NUEVO REGISTRO</a>
    </div>
    <div class="card-body">

        <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Unidad</th>
                <th>Rol</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->clues->clues_nombre  ?? 'No asignado' }}</td>
                    <td>{{ $usuario->role }}</td>


                    <td class="text-right">
                        <a href="{{ route('usuariosShow', $usuario->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="DETALLES"><i class="fas fa-eye"></i></a>

                        <a href="{{ route('usuariosEdit', $usuario->id) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="EDITAR"><i class="fas fa-edit"></i></a>

                        <form action="{{ route('usuariosDestroy', $usuario->id) }}" method="POST" class="form-eliminar" style="display: inline-block;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="ELIMINAR"> <i class="fas fa-trash"></i> </button>
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