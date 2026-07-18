
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Usuarios</strong> <small class="text-muted">Panel de Control</small></h1>
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
        <a href="{{ route('usuariosIndex') }}" class="btn btn-success btn-sm">
            <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
        </a>
    </div>
    <div class="card-body">

        <form action="{{ route('updateUsuarioMedico', $usuario->id) }}" method="POST">

        @csrf

        @method('PUT')

        <div class="row">

            <div class="col-md-3">
                <p><strong>Seleccionar Médico</strong></p>
                <select name="medico_id" id="medico_id" class="form-control">
                    <option value="">Seleccione una opción</option>
                    @foreach($medicos as $medico)
                        <option value="{{ $medico->id }}" {{ old('medico_id') == $medico->id ? 'selected' : '' }}>
                            {{ $medico->nombre_completo }}
                        </option>
                    @endforeach
                </select>

                @error('medico_id')
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