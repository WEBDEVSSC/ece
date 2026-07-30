@extends('adminlte::page')

@section('title', 'Detalles del Usuario')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Detalles del Usuario
                </h1>
                <p class="text-muted small mb-0">Información general y asignación del usuario en el sistema</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('usuariosIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> REGRESAR AL LISTADO
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

    <!-- Tarjeta Principal de Información -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-id-card text-primary mr-2"></i>
                Información del Usuario
            </h3>
            <div class="card-tools">
                <a href="{{ route('usuariosEdit', $usuario->id) }}" class="btn btn-sm btn-outline-secondary font-weight-bold">
                    <i class="fas fa-edit mr-1"></i> EDITAR
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-user text-secondary mr-1"></i> Nombre Completo
                    </label>
                    <p class="text-dark font-weight-bold mb-0" style="font-size: 1rem;">
                        {{ $usuario->name }}
                    </p>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-envelope text-secondary mr-1"></i> Correo Electrónico
                    </label>
                    <p class="text-dark mb-0">
                        <a href="mailto:{{ $usuario->email }}" class="text-primary">
                            {{ $usuario->email }}
                        </a>
                    </p>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-hospital text-secondary mr-1"></i> Unidad / CLUES
                    </label>
                    <p class="text-dark mb-0">
                        {{ $usuario->clues->clues_nombre ?? 'No asignado' }}
                    </p>
                </div>

                <div class="col-md-2 mb-3">
                    <label class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                        <i class="fas fa-user-shield text-secondary mr-1"></i> Rol
                    </label>
                    <div>
                        @if($usuario->rol)
                            <span class="badge badge-soft-info px-2 py-1 font-weight-bold">
                                {{ $usuario->rol->rol }}
                            </span>
                        @elseif($usuario->role)
                            <span class="badge badge-soft-info px-2 py-1 font-weight-bold">
                                {{ $usuario->role }}
                            </span>
                        @else
                            <span class="badge badge-light text-muted">Sin Rol</span>
                        @endif
                    </div>
                </div>
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
            // Inicializaciones si son necesarias
        });
    </script>
@stop