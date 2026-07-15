
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Roles</strong> <small> Nuevo registro</small></h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('rolesIndex') }}" class="btn btn-success btn-sm">PANEL DE CONTROL</a>
    </div>
    <div class="card-body">

        <form action="{{ route('rolesStore') }}" method="POST">

        @csrf

        <div class="row">
            <div class="col-md-3">
                <p><strong>Rol</strong></p>
                <input type="text" name="rol" id="rol" class="form-control" value="{{ old('rol') }}">

                @error('rol')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-9">
                <p><strong>Descripción</strong></p>
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}">

                @error('descripcion')
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