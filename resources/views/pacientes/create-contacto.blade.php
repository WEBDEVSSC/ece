@extends('adminlte::page')

@section('title', 'Nuevo Registro de Paciente')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Registro de Contacto del Paciente
                </h1>
                <p class="text-muted small mb-0">Nuevo ingreso al expediente clínico</p>
            </div>
            <div class="col-sm-6 text-right">
                <span class="badge bg-white shadow-sm px-3 py-2 text-dark font-weight-normal border">
                    <i class="far fa-calendar-alt text-primary mr-2"></i>
                    {{ \Carbon\Carbon::now()->isoFormat('D [de] MMMM, YYYY') }}
                </span>
            </div>
        </div>
    </div>
@stop

@section('content')

@php
    $alerts = ['success', 'update', 'destroy', 'error'];
@endphp

@foreach ($alerts as $alert)
    @if(session($alert))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: "{{ $alert == 'error' ? 'error' : 'success' }}",
                    title: "{{ session($alert) }}",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true
                });
            });
        </script>
    @endif
@endforeach

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

    <div class="card card-outline card-primary shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-plus mr-2"></i> DATOS GENERALES DEL PACIENTE
            </h3>
            <div class="card-tools">
                {{-- <a href="{{ route('pacientesIndex') }}" class="btn btn-outline-secondary btn-sm font-weight-bold">
                    <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
                </a> --}}
            </div>
        </div>

        <form action="{{ route('pacientesStore') }}" method="POST">
            @csrf

            <div class="card-body p-4">
                
                {{-- Fila 1: CURP, Nombre y Apellidos --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                    <label for="parentesco" class="font-weight-bold text-dark">Parentesco</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-users text-muted"></i>
                            </span>
                        </div>

                        <select name="parentesco" id="parentesco" class="form-control bg-light">
                            <option value="">Seleccione...</option>
                            <option value="Padre" {{ old('parentesco', $parentesco ?? '') == 'Padre' ? 'selected' : '' }}>Padre</option>
                            <option value="Madre" {{ old('parentesco', $parentesco ?? '') == 'Madre' ? 'selected' : '' }}>Madre</option>
                            <option value="Hijo/a" {{ old('parentesco', $parentesco ?? '') == 'Hijo/a' ? 'selected' : '' }}>Hijo/a</option>
                            <option value="Hermano/a" {{ old('parentesco', $parentesco ?? '') == 'Hermano/a' ? 'selected' : '' }}>Hermano/a</option>
                            <option value="Esposo/a" {{ old('parentesco', $parentesco ?? '') == 'Esposo/a' ? 'selected' : '' }}>Esposo/a</option>
                            <option value="Pareja" {{ old('parentesco', $parentesco ?? '') == 'Pareja' ? 'selected' : '' }}>Pareja</option>
                            <option value="Abuelo/a" {{ old('parentesco', $parentesco ?? '') == 'Abuelo/a' ? 'selected' : '' }}>Abuelo/a</option>
                            <option value="Nieto/a" {{ old('parentesco', $parentesco ?? '') == 'Nieto/a' ? 'selected' : '' }}>Nieto/a</option>
                            <option value="Tío/a" {{ old('parentesco', $parentesco ?? '') == 'Tío/a' ? 'selected' : '' }}>Tío/a</option>
                            <option value="Sobrino/a" {{ old('parentesco', $parentesco ?? '') == 'Sobrino/a' ? 'selected' : '' }}>Sobrino/a</option>
                            <option value="Primo/a" {{ old('parentesco', $parentesco ?? '') == 'Primo/a' ? 'selected' : '' }}>Primo/a</option>
                            <option value="Tutor/a" {{ old('parentesco', $parentesco ?? '') == 'Tutor/a' ? 'selected' : '' }}>Tutor/a</option>
                            <option value="Representante legal" {{ old('parentesco', $parentesco ?? '') == 'Representante legal' ? 'selected' : '' }}>Representante legal</option>
                            <option value="Amigo/a" {{ old('parentesco', $parentesco ?? '') == 'Amigo/a' ? 'selected' : '' }}>Amigo/a</option>
                            <option value="Cuidador/a" {{ old('parentesco', $parentesco ?? '') == 'Cuidador/a' ? 'selected' : '' }}>Cuidador/a</option>
                            <option value="Otro" {{ old('parentesco', $parentesco ?? '') == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>

                    @error('parentesco')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                    <div class="col-md-3 mb-3">
                        <label for="nombre" class="font-weight-bold text-dark">Nombre(s)</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Nombre(s)">
                        @error('nombre')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="apellido_paterno" class="font-weight-bold text-dark">Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno') }}" placeholder="Primer apellido">
                        @error('apellido_paterno')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="apellido_materno" class="font-weight-bold text-dark">Apellido Materno</label>
                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno') }}" placeholder="Segundo apellido">
                        @error('apellido_materno')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>

                {{-- Fila 2: Sexo, Fecha Nacimiento, Escolaridad y Estado Civil --}}
                <div class="row">
                    {{--<div class="col-md-3 mb-3">
                        <label class="font-weight-bold text-dark">Sexo</label>
                        <input type="text" class="form-control bg-light" value="{{ $sexo == 'H' ? 'MASCULINO' : 'FEMENINO' }}" readonly>
                        <input type="hidden" name="sexo" value="{{ old('sexo', $sexo) }}">
                        @error('sexo')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>--}}

                    {{--<div class="col-md-3 mb-3">
                        <label for="fecha_nacimiento" class="font-weight-bold text-dark">Fecha de Nacimiento</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-calendar text-muted"></i></span>
                            </div>
                            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control bg-light" value="{{ old('fecha_nacimiento', $fechaNacimiento) }}" readonly>
                        </div>
                        @error('fecha_nacimiento')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>--}}

                    {{--<div class="col-md-3 mb-3">
                        <label for="escolaridad_id" class="font-weight-bold text-dark">Escolaridad</label>
                        <select name="escolaridad_id" id="escolaridad_id" class="form-control @error('escolaridad_id') is-invalid @enderror">
                            <option value="">-- Seleccione una opción --</option>
                            @foreach($escolaridades as $escolaridad)
                                <option value="{{ $escolaridad->id }}" {{ old('escolaridad_id') == $escolaridad->id ? 'selected' : '' }}>
                                    {{ $escolaridad->escolaridad }}
                                </option>
                            @endforeach
                        </select>
                        @error('escolaridad_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>--}}

                    {{--<div class="col-md-3 mb-3">
                        <label for="estado_civil_id" class="font-weight-bold text-dark">Estado Civil</label>
                        <select name="estado_civil_id" id="estado_civil_id" class="form-control @error('estado_civil_id') is-invalid @enderror">
                            <option value="">-- Seleccione una opción --</option>
                            @foreach($estadosCivil as $estadoCivil)
                                <option value="{{ $estadoCivil->id }}" {{ old('estado_civil_id') == $estadoCivil->id ? 'selected' : '' }}>
                                    {{ $estadoCivil->estado_civil }}
                                </option>
                            @endforeach
                        </select>
                        @error('estado_civil_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>--}}
                </div>

                {{-- Fila 3: Celular, Email y Derechohabiencia --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="celular" class="font-weight-bold text-dark">Teléfono Celular</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-phone text-muted"></i></span>
                            </div>
                            <input type="text" name="celular" id="celular" class="form-control @error('celular') is-invalid @enderror" value="{{ old('celular') }}" placeholder="10 dígitos">
                        </div>
                        @error('celular')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="email" class="font-weight-bold text-dark">Correo Electrónico</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="ejemplo@correo.com">
                        </div>
                        @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    {{--<div class="col-md-6 mb-3">
                        <label for="derechohabiencia_id" class="font-weight-bold text-dark">Derechohabiencia</label>
                        <select name="derechohabiencia_id" id="derechohabiencia_id" class="form-control @error('derechohabiencia_id') is-invalid @enderror">
                            <option value="">-- Seleccione una opción --</option>
                            @foreach($derechohabiencias as $derecho)
                                <option value="{{ $derecho->id }}" {{ old('derechohabiencia_id') == $derecho->id ? 'selected' : '' }}>
                                    {{ $derecho->derechohabiencia }}
                                </option>
                            @endforeach
                        </select>
                        @error('derechohabiencia_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>--}}
                </div>

                {{-- Fila 4: Alergias --}}
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="alergias" class="font-weight-bold text-dark">Alergias Conocidas</label>
                        <textarea name="alergias" id="alergias" rows="4" maxlength="500" class="form-control @error('alergias') is-invalid @enderror" placeholder="Especifique alergias a medicamentos, alimentos u otros elementos..." oninput="contadorCaracteres()">{{ old('alergias') }}</textarea>
                        
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <div>
                                @error('alergias')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>
                            <small class="text-muted">Caracteres utilizados: <span id="contador" class="font-weight-bold">0</span>/500</small>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer bg-light text-right py-3">
                <button type="submit" class="btn btn-success px-4 font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-2"></i> REGISTRAR DATOS
                </button>
            </div>
        </form>
    </div>
</div>

<br>

@stop

@include('layouts.footer')

@section('css')
<style>
    .style-label {
        font-size: 0.65rem;
        letter-spacing: 0.8px;
    }
</style>
@stop

@section('js')
<script>
    function contadorCaracteres() {
        let texto = document.getElementById('alergias');
        let contador = document.getElementById('contador');
        if (texto && contador) {
            contador.textContent = texto.value.length;
        }
    }

    $(document).ready(function() {
        // Inicializar tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Inicializar el contador al cargar por si la sesión contiene `old('alergias')`
        contadorCaracteres();
    });
</script>
@stop