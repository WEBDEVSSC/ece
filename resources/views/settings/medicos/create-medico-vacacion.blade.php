@extends('adminlte::page')

@section('title', 'Vacaciones del Médico')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Gestión de Vacaciones
                </h1>
                <p class="text-muted small mb-0">Registro e historial de periodos vacacionales del personal médico</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('medicosIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> REGRESAR AL LISTADO
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')

<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <h5 class="alert-heading font-weight-bold">
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

    <!-- Médico Seleccionado -->
    <div class="card card-outline card-info shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-md text-info mr-2"></i>
                Médico Seleccionado
            </h3>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="mb-0 font-weight-bold text-dark">
                        {{ $medico->nombre_completo }}
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de Registro de Vacaciones -->
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-calendar-plus text-primary mr-2"></i>
                Registrar Nueva Fecha Vacacional
            </h3>
        </div>
        
        <form action="{{ route('storeMedicosVacacion', $medico->id) }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="fecha" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="far fa-calendar-alt text-secondary mr-1"></i> Fecha de Vacación
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day text-primary"></i></span>
                            </div>
                            <input type="text" id="fecha" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha') }}" placeholder="Seleccione una fecha">
                        </div>
                        @error('fecha')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-8 mb-3">
                        <label for="concepto" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-pen text-secondary mr-1"></i> Concepto / Observaciones
                        </label>
                        <input type="text" name="concepto" id="concepto" class="form-control @error('concepto') is-invalid @enderror" value="{{ old('concepto') }}" placeholder="Ej. Periodo ordinario de vacaciones 2026">
                        @error('concepto')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-top text-right py-3">
                <a href="{{ route('medicosIndex') }}" class="btn btn-outline-secondary font-weight-bold mr-2">
                    CANCELAR
                </a>
                <button type="submit" class="btn btn-success font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-1"></i> REGISTRAR DATOS
                </button>
            </div>
        </form>
    </div>

</div>

<br>

@stop

@include('layouts.footer')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
    <style>
        .style-label {
            font-size: 0.7rem;
            letter-spacing: 0.8px;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#fecha", {
                locale: "es",
                dateFormat: "Y-m-d",
                allowInput: true,
                minDate: "today"
            });
        });
    </script>
@stop