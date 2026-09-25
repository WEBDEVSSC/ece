@extends('adminlte::page')

@section('title', 'Nuevo Diagnóstico Médico')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Nuevo Registro de Diagnóstico Médico
                </h1>
                <p class="text-muted small mb-0">Complete la información solicitada para dar de alta un nuevo diagnóstico en el sistema</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('diagnosticosMedicosIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
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

    <form action="{{ route('diagnosticosMedicosStore') }}" method="POST">
        @csrf

        <!-- Tarjeta Principal de Registro -->
        <div class="card card-outline card-primary shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                    <i class="fas fa-notes-medical text-primary mr-2"></i>
                    Datos del Diagnóstico Médico
                </h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-stethoscope text-secondary mr-1"></i> Diagnóstico Médico
                        </label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Ej. Diabetes Mellitus Tipo 2, Hipertensión...">
                        @error('nombre')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="tipo_unidad" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-building text-secondary mr-1"></i> Tipo de Unidad
                        </label>
                        <input type="text" name="tipo_unidad" id="tipo_unidad" class="form-control @error('tipo_unidad') is-invalid @enderror" value="{{ old('tipo_unidad', $login->tipo_unidad) }}" readonly>
                        @error('tipo_unidad')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-top text-right py-3">
                <a href="{{ route('diagnosticosMedicosIndex') }}" class="btn btn-outline-secondary font-weight-bold mr-2">
                    CANCELAR
                </a>
                <button type="submit" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-1"></i> REGISTRAR DATOS
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
            // Inicializaciones personalizadas si son requeridas
        });
    </script>
@stop