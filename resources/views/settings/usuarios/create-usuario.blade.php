
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Usuarios</strong> <small class="text-muted">Panel de Control</small></h1>
@stop

@section('content')

<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('usuariosIndex') }}" class="btn btn-success btn-sm">
            <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
        </a>
    </div>
    <div class="card-body">

        <form action="{{ route('usuariosStore') }}" method="POST">

        @csrf

        <input type="hidden" name="clues_id" value="{{ $usuario->clues_id }}">

        <div class="row">

            <div class="col-md-3">
                <p><strong>Nombre</strong></p>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>E-mail</strong></p>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">

                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Contraseña</strong></p>
                <input type="password" name="password" id="password" class="form-control">

                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <p><strong>Rol</strong></p>
                <select name="rol" id="rol" class="form-control">
                    <option value="">Seleccione una opción</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}" {{ old('rol') == $rol->id ? 'selected' : '' }}>
                            {{ $rol->rol }}
                        </option>
                    @endforeach
                </select>

                @error('rol')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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