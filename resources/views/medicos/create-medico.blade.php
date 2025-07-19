
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Médicos</strong> <small>Panel de Control</small></h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('medicosIndex') }}" class="btn btn-success btn-sm">PANEL DE CONTROL</a>
    </div>
    <div class="card-body">

        <form action="{{ route('medicosStore') }}" method="POST">

        @csrf

        <input type="hidden" name="clues_id" value="{{ $usuario->clues_id }}">

        <div class="row">
            <div class="col-md-3">
                <p><strong>CURP</strong></p>
                <input type="text" name="curp" id="curp" class="form-control" value="{{ old('curp') }}">

                @error('curp')
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

            <div class="col-md-3">
                <p><strong>Nombre(s)</strong></p>
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ old('nombres') }}">

                @error('nombres')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <p><strong>Cedula</strong></p>
                <input type="text" name="cedula" id="cedula" class="form-control" value="{{ old('cedula') }}">

                @error('nombres')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
             <div class="col-md-3">
                <p><strong>Tipo de personal</strong></p>
                <select name="tipo_personal_id" id="tipo_personal_id" class="form-control">
                    <option value="">Seleccione una opción</option>
                    @foreach($tiposPersonalMedico as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('tipo_personal_id') == $tipo->id ? 'selected' : '' }}>
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
                        <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>
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
            <div class="col-md-6">
                <p><strong>CLUES</strong></p>
                <select name="clues" id="clues" class="form-control" disabled>
                    <option value="">Seleccione una opción</option>
                    @foreach($clues as $clue)
                        <option value="{{ $clue->id }}" {{ (old('clues', $usuario->clues_id) == $clue->id) ? 'selected' : '' }}>
                            {{ $clue->clues }} - {{ $clue->nombre }}
                        </option>
                    @endforeach
                </select>

                @error('clues')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success btn-sm">REGISTRAR DATOS</button>

        </form>

    </div>
</div>

    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop