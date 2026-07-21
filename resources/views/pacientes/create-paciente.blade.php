
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Pacientes</strong> <small class="text-muted">Nuevo registro</small></h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <h5>
            <i class="fas fa-exclamation-triangle"></i>
            Se encontraron los siguientes errores:
        </h5>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('medicosIndex') }}" class="btn btn-success btn-sm">
            <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
        </a>
    </div>
    <div class="card-body">

        <form action="{{ route('medicosStore') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-3">
                <p><strong>CURP</strong></p>
                <input type="text" name="curp" id="curp" class="form-control text-uppercase" value="{{ old('curp', $curp) }}" readonly>

                @error('curp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Nombre</strong></p>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">

                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Apellido Paterno</strong></p>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ old('apellido_paterno') }}">

                @error('apellido_paterno')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Apellido Materno</strong></p>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ old('apellido_materno') }}">

                @error('apellido_materno')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row mt-3">

            <div class="col-md-3">
                <p><strong>Sexo</strong></p>

                <input type="text" class="form-control" value="{{ $sexo == 'H' ? 'MASCULINO' : 'FEMENINO' }}" readonly>
                
                <input type="hidden" name="sexo" value="{{ old('sexo', $sexo) }}">

                @error('sexo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Fecha de nacimiento</strong></p>
                <input type="text" name="fecha_nacimiento" id="curp" class="form-control" value="{{ old('fecha_nacimiento',$fechaNacimiento) }}" readonly>

                @error('fecha_nacimiento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Escolaridad</strong></p>

                <select name="escolaridad_id" id="escolaridad_id" class="form-control">

                    <option value="">-- Seleccione una opción --</option>

                    @foreach($escolaridades as $escolaridad)
                        <option 
                            value="{{ $escolaridad->id }}"
                            {{ old('escolaridad_id') == $escolaridad->id ? 'selected' : '' }}>
                            {{ $escolaridad->escolaridad }}
                        </option>
                    @endforeach

                </select>

                @error('escolaridad_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                
                    <p><strong>Estado civil</strong></p>

                <select name="estado_civil_id" id="estado_civil_id" class="form-control">

                    <option value="">-- Seleccione estado civiluna opción --</option>

                    @foreach($estadosCivil as $estadoCivil)
                        <option 
                            value="{{ $estadoCivil->id }}"
                            {{ old('estado_civil_id') == $estadoCivil->id ? 'selected' : '' }}>
                            {{ $estadoCivil->estado_civil }}
                        </option>
                    @endforeach

                </select>

                @error('estado_civil_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <p><strong>Célular</strong></p>
                <input type="text" name="celular" id="celular" class="form-control" value="{{ old('celular') }}">

                @error('celular')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>E-mail</strong></p>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">

                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <p><strong>Alergias</strong></p>
                <textarea name="alergias" id="alergias" cols="30" rows="10" class="form-control"></textarea>
            </div>
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

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop