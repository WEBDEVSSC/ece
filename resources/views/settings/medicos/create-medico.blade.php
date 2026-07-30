@extends('adminlte::page')

@section('title', 'Registro de Médico')

@section('plugins.Select2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Registro de Nuevo Médico
                </h1>
                <p class="text-muted small mb-0">Ingrese los datos personales, profesionales y horarios del personal de salud</p>
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

    <form action="{{ route('medicosStore') }}" method="POST">
        @csrf
        <input type="hidden" name="clues_id" value="{{ $usuario->clues_id }}">

        <!-- Información Personal y Profesional -->
        <div class="card card-outline card-primary shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                    <i class="fas fa-id-card text-primary mr-2"></i>
                    Información Personal y Profesional
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="pais_nacimiento_id" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-globe-americas text-secondary mr-1"></i> País de Nacimiento
                        </label>
                        <select name="pais_nacimiento_id" id="pais_nacimiento_id" class="form-control select2 @error('pais_nacimiento_id') is-invalid @enderror">
                            <option value="">Seleccione una opción</option>
                            @foreach($paisesNacimiento as $paisNacimiento)
                                <option value="{{ $paisNacimiento->id }}" {{ old('pais_nacimiento_id') == $paisNacimiento->id ? 'selected' : '' }}>
                                    {{ $paisNacimiento->codigo_pais }} - {{ $paisNacimiento->pais }}
                                </option>
                            @endforeach
                        </select>
                        @error('pais_nacimiento_id')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="curp" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-fingerprint text-secondary mr-1"></i> CURP
                        </label>
                        <input type="text" name="curp" id="curp" class="form-control @error('curp') is-invalid @enderror" value="{{ old('curp') }}" placeholder="Ej. AAAA000000XXXXXX00">
                        @error('curp')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="apellido_paterno" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno') }}" placeholder="Primer apellido">
                        @error('apellido_paterno')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="apellido_materno" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">Apellido Materno</label>
                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno') }}" placeholder="Segundo apellido">
                        @error('apellido_materno')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="nombres" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">Nombre(s)</label>
                        <input type="text" name="nombres" id="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres') }}" placeholder="Nombre o nombres">
                        @error('nombres')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="cedula" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-id-badge text-secondary mr-1"></i> Cédula Profesional
                        </label>
                        <input type="text" name="cedula" id="cedula" class="form-control @error('cedula') is-invalid @enderror" value="{{ old('cedula') }}" placeholder="Número de cédula">
                        @error('cedula')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="tipo_personal_id" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">Tipo de Personal</label>
                        <select name="tipo_personal_id" id="tipo_personal_id" class="form-control custom-select @error('tipo_personal_id') is-invalid @enderror">
                            <option value="">Seleccione una opción</option>
                            @foreach($tiposPersonalMedico as $tipo)
                                <option value="{{ $tipo->id }}" {{ old('tipo_personal_id') == $tipo->id ? 'selected' : '' }}>
                                    {{ $tipo->descripcion }}
                                </option>
                            @endforeach
                        </select>
                        @error('tipo_personal_id')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="servicio_id" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-stethoscope text-secondary mr-1"></i> Servicio / Especialidad
                        </label>
                        <select name="servicio_id" id="servicio_id" class="form-control custom-select @error('servicio_id') is-invalid @enderror">
                            <option value="">Seleccione una opción</option>
                            @foreach($servicioEspecialidadMedico as $servicio)
                                <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>
                                    {{ $servicio->especialidad }}
                                </option>
                            @endforeach
                        </select>
                        @error('servicio_id')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="programa_smymg" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-file-contract text-secondary mr-1"></i> ¿Programa U013?
                        </label>
                        <select name="programa_smymg" id="programa_smymg" class="form-control custom-select @error('programa_smymg') is-invalid @enderror">
                            <option value="0" {{ old('programa_smymg', 0) == 0 ? 'selected' : '' }}>NO</option>
                            <option value="1" {{ old('programa_smymg') == 1 ? 'selected' : '' }}>SÍ</option>
                        </select>
                        @error('programa_smymg')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-9 mb-3">
                        <label for="clues" class="text-muted small text-uppercase mb-1 d-block font-weight-bold">
                            <i class="fas fa-hospital text-secondary mr-1"></i> Unidad de Adscripción (CLUES)
                        </label>
                        <select name="clues" id="clues" class="form-control custom-select" disabled>
                            <option value="">Seleccione una opción</option>
                            @foreach($clues as $clue)
                                <option value="{{ $clue->id }}" {{ (old('clues', $usuario->clues_id) == $clue->id) ? 'selected' : '' }}>
                                    {{ $clue->clues }} - {{ $clue->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('clues')
                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Jornada Laboral y Horarios -->
        <div class="card card-outline card-secondary shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                    <i class="fas fa-calendar-alt text-secondary mr-2"></i>
                    Jornada Laboral y Horarios de Atención
                </h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 text-sm align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th class="px-3" width="30%">Día Semanal</th>
                                <th width="35%" class="text-center">Hora de Entrada</th>
                                <th width="35%" class="text-center">Hora de Salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dias = [
                                    'Lunes' => ['entrada' => 'lunes_entrada', 'salida' => 'lunes_salida'],
                                    'Martes' => ['entrada' => 'martes_entrada', 'salida' => 'martes_salida'],
                                    'Miércoles' => ['entrada' => 'miercoles_entrada', 'salida' => 'miercoles_salida'],
                                    'Jueves' => ['entrada' => 'jueves_entrada', 'salida' => 'jueves_salida'],
                                    'Viernes' => ['entrada' => 'viernes_entrada', 'salida' => 'viernes_salida'],
                                    'Sábado' => ['entrada' => 'sabado_entrada', 'salida' => 'sabado_salida'],
                                    'Domingo' => ['entrada' => 'domingo_entrada', 'salida' => 'domingo_salida'],
                                    'Festivos' => ['entrada' => 'festivos_entrada', 'salida' => 'festivos_salida'],
                                ];
                            @endphp

                            @foreach ($dias as $nombreDia => $campos)
                                <tr>
                                    <td class="px-3 align-middle font-weight-bold text-dark">
                                        {{ $nombreDia }}
                                    </td>
                                    <td class="px-4">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-clock text-success"></i></span>
                                            </div>
                                            <input type="time" name="{{ $campos['entrada'] }}" class="form-control @error($campos['entrada']) is-invalid @enderror" value="{{ old($campos['entrada']) }}">
                                        </div>
                                        @error($campos['entrada'])
                                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="px-4">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-clock text-danger"></i></span>
                                            </div>
                                            <input type="time" name="{{ $campos['salida'] }}" class="form-control @error($campos['salida']) is-invalid @enderror" value="{{ old($campos['salida']) }}">
                                        </div>
                                        @error($campos['salida'])
                                            <small class="text-danger font-weight-bold d-block mt-1">{{ $message }}</small>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    
    /* Adaptación e integración limpia para Select2 */
    .select2-container--default .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
        border-radius: 0.25rem !important;
        border: 1px solid #ced4da !important;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: calc(2.25rem - 2px) !important;
        padding-left: 0.75rem !important;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: calc(2.25rem + 2px) !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #6c757d;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#pais_nacimiento_id').select2({
            placeholder: "-- Seleccione una opción --",
            allowClear: true,
            width: '100%'
        });
    });
</script>
@stop