@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Editar Usuario
                </h1>
                <p class="text-muted small mb-0">Actualice la información general y permisos del usuario en el sistema</p>
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

    {{-- Alerta general de errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <h5 class="alert-heading font-weight-bold mb-2">
                <i class="fas fa-exclamation-triangle mr-1"></i> Se encontraron los siguientes errores:
            </h5>
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('usuariosUpdate', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="clues_id" value="{{ $usuario->clues_id }}">

        <!-- Tarjeta Principal de Edición -->
        <div class="card card-outline card-primary shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                    <i class="fas fa-user-edit text-primary mr-2"></i>
                    Modificar Datos de la Cuenta
                </h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="name" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-user text-secondary mr-1"></i> Nombre Completo
                        </label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $usuario->name) }}" placeholder="Nombre y apellidos">
                        @error('name')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="email" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-envelope text-secondary mr-1"></i> Correo Electrónico
                        </label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $usuario->email) }}" placeholder="ejemplo@dominio.com">
                        @error('email')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="password" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-lock text-secondary mr-1"></i> Contraseña
                        </label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Dejar en blanco para mantener la actual">
                        <small class="text-muted font-italic d-block mt-1">Llene solo si desea cambiar la contraseña.</small>
                        @error('password')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="rol" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-user-shield text-secondary mr-1"></i> Rol de Usuario
                        </label>
                        <select name="rol" id="rol" class="form-control custom-select @error('rol') is-invalid @enderror">
                            <option value="">Seleccione una opción</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('rol', $usuario->rol_id ?? $usuario->rol) == $rol->id ? 'selected' : '' }}>
                                    {{ $rol->rol }}
                                </option>
                            @endforeach
                        </select>
                        @error('rol')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-top text-right py-3">
                <a href="{{ route('usuariosIndex') }}" class="btn btn-outline-secondary font-weight-bold mr-2">
                    CANCELAR
                </a>
                <button type="submit" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-sync-alt mr-1"></i> ACTUALIZAR DATOS
                </button>
            </div>
        </div>
    </form>

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
    </style>
@stop

@section('js')
    <script>
        $(function () {
            // Inicializaciones personalizadas
        });
    </script>
@stop