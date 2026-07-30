@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Editar Rol
                </h1>
                <p class="text-muted small mb-0">Modifique la información y alcance del rol seleccionado</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('rolesIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
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

    <form action="{{ route('rolesUpdate', $rol->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tarjeta Principal de Edición -->
        <div class="card card-outline card-primary shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                    <i class="fas fa-user-shield text-primary mr-2"></i>
                    Modificar Datos del Rol
                </h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="rol" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-shield-alt text-secondary mr-1"></i> Nombre del Rol
                        </label>
                        <input type="text" name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror" value="{{ old('rol', $rol->rol) }}" placeholder="Ej. Administrador, Médico...">
                        @error('rol')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="descripcion" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-align-left text-secondary mr-1"></i> Descripción
                        </label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $rol->descripcion) }}" placeholder="Breve descripción del alcance del rol">
                        @error('descripcion')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-top text-right py-3">
                <a href="{{ route('rolesIndex') }}" class="btn btn-outline-secondary font-weight-bold mr-2">
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
            // Inicializaciones si son necesarias
        });
    </script>
@stop