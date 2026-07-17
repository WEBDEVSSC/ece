
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Usuarios</strong> <small class="text-muted">Detalles</small></h1>
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
        <a href="{{ route('usuariosIndex') }}" class="btn btn-success btn-sm">
            <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
        </a>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-3">
                <p><strong>Nombre</strong></p>
                {{ $usuario->name }}
            </div>
            <div class="col-md-3">
                <p><strong>E-mail</strong></p>
                {{ $usuario->email }}
            </div>
            <div class="col-md-4">
                <p><strong>Clues</strong></p>
                {{ $usuario->clues->clues_nombre  ?? 'No asignado' }}
            </div>
            <div class="col-md-2">
                <p><strong>Rol</strong></p>
                {{ $usuario->role }}
            </div>
        </div>

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