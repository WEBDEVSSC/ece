@extends('adminlte::page')

@section('title', 'Editar Paciente')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Editar Paciente
                </h1>
                <p class="text-muted small mb-0">Actualización de expediente clínico</p>
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
                <i class="fas fa-user-edit mr-2"></i> ACTUALIZAR DATOS DEL PACIENTE
            </h3>
            <div class="card-tools">
                <a href="{{ route('pacientesIndex') }}" class="btn btn-outline-secondary btn-sm font-weight-bold">
                    <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
                </a>
            </div>
        </div>

        <form action="{{ route('pacientesUpdate', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body p-4">
                
                {{-- Fila 1: CURP, Nombre y Apellidos --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="curp" class="font-weight-bold text-dark">CURP</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-id-card text-muted"></i></span>
                            </div>
                            <input type="text" name="curp" id="curp" class="form-control text-uppercase bg-light" value="{{ old('curp', $paciente->curp) }}" readonly>
                        </div>
                        @error('curp')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nombre" class="font-weight-bold text-dark">Nombre(s)</label>
                        <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $paciente->nombre) }}" placeholder="Nombre(s)">
                        @error('nombre')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="apellido_paterno" class="font-weight-bold text-dark">Apellido Paterno</label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" value="{{ old('apellido_paterno', $paciente->apellido_paterno) }}" placeholder="Primer apellido">
                        @error('apellido_paterno')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="apellido_materno" class="font-weight-bold text-dark">Apellido Materno</label>
                        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" value="{{ old('apellido_materno', $paciente->apellido_materno) }}" placeholder="Segundo apellido">
                        @error('apellido_materno')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>

                {{-- Fila 2: Sexo, Fecha Nacimiento, Escolaridad y Estado Civil --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="font-weight-bold text-dark">Sexo</label>
                        <input type="text" class="form-control bg-light" value="{{ $paciente->sexo == 'H' ? 'MASCULINO' : 'FEMENINO' }}" readonly>
                        <input type="hidden" name="sexo" value="{{ old('sexo', $paciente->sexo) }}">
                        @error('sexo')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="fecha_nacimiento" class="font-weight-bold text-dark">Fecha de Nacimiento</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-calendar text-muted"></i></span>
                            </div>
                            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control bg-light" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento ? $paciente->fecha_nacimiento->format('Y-m-d') : '') }}" readonly>
                        </div>
                        @error('fecha_nacimiento')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="escolaridad_id" class="font-weight-bold text-dark">Escolaridad</label>
                        <select name="escolaridad_id" id="escolaridad_id" class="form-control @error('escolaridad_id') is-invalid @enderror">
                            <option value="">-- Seleccione una opción --</option>
                            @foreach($escolaridades as $escolaridad)
                                <option value="{{ $escolaridad->id }}" {{ old('escolaridad_id', $paciente->escolaridad_id) == $escolaridad->id ? 'selected' : '' }}>
                                    {{ $escolaridad->escolaridad }}
                                </option>
                            @endforeach
                        </select>
                        @error('escolaridad_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="estado_civil_id" class="font-weight-bold text-dark">Estado Civil</label>
                        <select name="estado_civil_id" id="estado_civil_id" class="form-control @error('estado_civil_id') is-invalid @enderror">
                            <option value="">-- Seleccione una opción --</option>
                            @foreach($estadosCivil as $estadoCivil)
                                <option value="{{ $estadoCivil->id }}" {{ old('estado_civil_id', $paciente->estado_civil_id) == $estadoCivil->id ? 'selected' : '' }}>
                                    {{ $estadoCivil->estado_civil }}
                                </option>
                            @endforeach
                        </select>
                        @error('estado_civil_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>

                {{-- Fila 3: Celular, Email y Derechohabiencia --}}
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="celular" class="font-weight-bold text-dark">Teléfono Celular</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-phone text-muted"></i></span>
                            </div>
                            <input type="text" name="celular" id="celular" class="form-control @error('celular') is-invalid @enderror" value="{{ old('celular', $paciente->celular) }}" placeholder="10 dígitos">
                        </div>
                        @error('celular')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="email" class="font-weight-bold text-dark">Correo Electrónico</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $paciente->email) }}" placeholder="ejemplo@correo.com">
                        </div>
                        @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="derechohabiencia_id" class="font-weight-bold text-dark">Derechohabiencia</label>
                        <select name="derechohabiencia_id" id="derechohabiencia_id" class="form-control @error('derechohabiencia_id') is-invalid @enderror">
                            <option value="">-- Seleccione una opción --</option>
                            @foreach($derechohabiencias as $derecho)
                                <option value="{{ $derecho->id }}" {{ old('derechohabiencia_id', $paciente->derechohabiencia_id) == $derecho->id ? 'selected' : '' }}>
                                    {{ $derecho->derechohabiencia }}
                                </option>
                            @endforeach
                        </select>
                        @error('derechohabiencia_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>

                {{-- Fila 4: Alergias --}}
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="alergias" class="font-weight-bold text-dark">Alergias Conocidas</label>
                        <textarea name="alergias" id="alergias" rows="4" maxlength="500" class="form-control @error('alergias') is-invalid @enderror" placeholder="Especifique alergias a medicamentos, alimentos u otros elementos..." oninput="contadorCaracteres()">{{ old('alergias', $paciente->alergias) }}</textarea>
                        
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
                    <i class="fas fa-sync-alt mr-2"></i> ACTUALIZAR DATOS
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

        // Inicializar el contador al cargar con la información existente del paciente
        contadorCaracteres();
    });
</script>
@stop