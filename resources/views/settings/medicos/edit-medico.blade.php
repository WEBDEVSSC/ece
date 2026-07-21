
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Select2', true)

@section('content_header')
    <h1><strong>Médicos</strong> <small class="text-muted">Actualizar</small></h1>
@stop

@section('content')

<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('medicosIndex') }}" class="btn btn-success btn-sm">
            <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
        </a>
    </div>
    <div class="card-body">

        <form action="{{ route('medicosUpdate', $medico->id) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="row">

            <div class="col-md-3">
                <p><strong>Pais de nacimiento</strong></p>
                <select name="pais_nacimiento_id" id="pais_nacimiento_id" class="form-control select2">
                    <option value="">Seleccione una opción</option>
                    @foreach($paisesNacimiento as $paisNacimiento)
                        <option value="{{ $paisNacimiento->id }}" {{ old('pais_nacimiento_id', $medico->pais_nacimiento_id) == $paisNacimiento->id ? 'selected' : '' }}>
                            {{ $paisNacimiento->codigo_pais }} - {{ $paisNacimiento->pais }}
                        </option>
                    @endforeach
                </select>

                @error('pais_nacimiento_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>CURP</strong></p>
                <input type="text" name="curp" id="curp" class="form-control" value="{{ old('curp', $medico->curp) }}">

                @error('curp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Apellido Paterno</strong></p>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', $medico->apellido_paterno) }}">

                @error('apellido_paterno')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Apellido Materno</strong></p>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ old('apellido_materno', $medico->apellido_materno) }}">

                @error('apellido_materno')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row mt-3">

            <div class="col-md-3">
                <p><strong>Nombre(s)</strong></p>
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ old('nombres', $medico->nombres) }}">

                @error('nombres')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Cedula</strong></p>
                <input type="text" name="cedula" id="cedula" class="form-control" value="{{ old('cedula', $medico->cedula_profesional) }}">

                @error('nombres')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
             <div class="col-md-3">
                <p><strong>Tipo de personal</strong></p>
                <select name="tipo_personal_id" id="tipo_personal_id" class="form-control">
                    <option value="">Seleccione una opción</option>
                    @foreach($tiposPersonalMedico as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('tipo_personal_id', $medico->tipo_personal_id) == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->descripcion }}
                        </option>
                    @endforeach
                </select>

                @error('tipo_personal_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <p><strong>Servicio/Especialidad</strong></p>
                <select name="servicio_id" id="servicio_id" class="form-control">
                    <option value="">Seleccione una opción</option>
                    @foreach($servicioEspecialidadMedico as $servicio)
                        <option value="{{ $servicio->id }}" {{ old('servicio_id', $medico->servicio_id) == $servicio->id ? 'selected' : '' }}>
                            {{ $servicio->especialidad }}
                        </option>
                    @endforeach
                </select>

                @error('servicio_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <p><strong>¿Contrato por Programa U013?</strong></p>
                <select name="programa_smymg" id="programa_smymg" class="form-control">
                    <option value="0" {{ old('programa_smymg', $medico->programa_smymg) == 0 ? 'selected' : '' }}>NO</option>
                    <option value="1" {{ old('programa_smymg', $medico->programa_smymg) == 1 ? 'selected' : '' }}>SÍ</option>
                </select>

                @error('programa_smymg')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
           <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="25%">Día</th>
                        <th width="37.5%" class="text-center">Hora de Entrada</th>
                        <th width="37.5%" class="text-center">Hora de Salida</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><strong>Lunes</strong></td>
                        <td>
                            <input type="time" name="lunes_entrada" class="form-control" value="{{ old('lunes_entrada', $medico->lunes_entrada) }}">
                            @error('lunes_entrada')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="time" name="lunes_salida" class="form-control" value="{{ old('lunes_salida', $medico->lunes_salida) }}">
                            @error('lunes_salida')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Martes</strong></td>
                        <td>
                            <input type="time" name="martes_entrada" class="form-control" value="{{ old('martes_entrada', $medico->martes_entrada) }}">
                            @error('martes_entrada')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="time" name="martes_salida" class="form-control" value="{{ old('martes_salida', $medico->martes_salida) }}">
                            @error('martes_salida')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Miércoles</strong></td>
                        <td>
                            <input type="time" name="miercoles_entrada" class="form-control" value="{{ old('miercoles_entrada', $medico->miercoles_entrada) }}">
                            @error('miercoles_entrada')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="time" name="miercoles_salida" class="form-control" value="{{ old('miercoles_salida', $medico->miercoles_salida) }}">
                            @error('miercoles_salida')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Jueves</strong></td>
                        <td>
                            <input type="time" name="jueves_entrada" class="form-control" value="{{ old('jueves_entrada', $medico->jueves_entrada) }}">
                            @error('jueves_entrada')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="time" name="jueves_salida" class="form-control" value="{{ old('jueves_salida', $medico->jueves_salida) }}">
                            @error('jueves_salida')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Viernes</strong></td>
                        <td>
                            <input type="time" name="viernes_entrada" class="form-control" value="{{ old('viernes_entrada', $medico->viernes_entrada) }}">
                            @error('viernes_entrada')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="time" name="viernes_salida" class="form-control" value="{{ old('viernes_salida', $medico->viernes_salida) }}">
                            @error('viernes_salida')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Sábado</strong></td>
                        <td>
                            <input type="time" name="sabado_entrada" class="form-control" value="{{ old('sabado_entrada', $medico->sabado_entrada) }}">
                            @error('sabado_entrada')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="time" name="sabado_salida" class="form-control" value="{{ old('sabado_salida', $medico->sabado_salida) }}">
                            @error('sabado_salida')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Domingo</strong></td>
                        <td>
                            <input type="time" name="domingo_entrada" class="form-control" value="{{ old('domingo_entrada', $medico->domingo_entrada) }}">
                            @error('domingo_entrada')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="time" name="domingo_salida" class="form-control" value="{{ old('domingo_salida', $medico->domingo_salida) }}">
                            @error('domingo_salida')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Festivos</strong></td>
                        <td>
                            <input type="time" name="festivos_entrada" class="form-control" value="{{ old('festivos_entrada', $medico->festivos_entrada) }}">
                            @error('festivos_entrada')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="time" name="festivos_salida" class="form-control" value="{{ old('festivos_salida', $medico->festivos_salida) }}">
                            @error('festivos_salida')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fas fa-save mr-1"></i> REGISTRAR DATOS
        </button>
    </div>
    </form>
</div>

<br>

@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <style>
        /* Asegura que Select2 tenga el mismo alto y bordes redondeados */
        .select2-container--default .select2-selection--single {
            height: calc(2.25rem + 2px) !important; /* Ajuste de altura */
            border-radius: 0.25rem !important; /* Bordes redondeados */
            border: 1px solid #ced4da !important; /* Color del borde */
        }
        
        /* Alineación del texto */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: calc(2.25rem - 2px) !important;
            padding-left: 0.75rem !important;
        }
        
        /* Ajuste del ícono desplegable */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(2.25rem + 2px) !important;
        }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script>
        $(document).ready(function() {
            $('#pais_nacimiento_id').select2({
                placeholder: "-- Seleccione una opcion --",
                allowClear: true
            });
        });
    </script>
@stop