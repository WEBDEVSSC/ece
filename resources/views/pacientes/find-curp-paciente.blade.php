
@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1><strong>Pacientes</strong> <small class="text-muted">Buscar CURP</small></h1>
@stop

@section('content')

<div class="card">
    <div class="card-header text-right">
        
    </div>
    <div class="card-body">

        <form action="{{ route('pacientesSearch') }}" method="GET">

        @csrf

        <div class="row">

            <div class="col-md-6">
                <p><strong>Ingresa la CURP</strong></p>
                <input type="text" name="curp" id="curp" class="form-control" value="{{ old('curp') }}">

                @error('curp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>     

    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fas fa-save mr-1"></i> BUSCAR DATOS
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