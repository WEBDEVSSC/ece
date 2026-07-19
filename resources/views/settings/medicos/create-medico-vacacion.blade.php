
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Médicos</strong> <small>Vacaciones</small></h1>
@stop

@section('content')



<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline shadow-sm">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-md text-info mr-2"></i>
                    Médico seleccionado
                </h3>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    

                    <div class="col-md-11">
                        <h4 class="mb-1 font-weight-bold">
                            {{ $medico->nombre_completo }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('medicosIndex') }}" class="btn btn-success btn-sm">
            <i class="fas fa-desktop mr-1"></i> PANEL DE CONTROL
        </a>
    </div>
    <div class="card-body">

        

        <form action="{{ route('storeMedicosVacacion', $medico->id) }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-3">
                <p><strong>Seleccione la fecha</strong></p>
                <input type="text" id="fecha" name="fecha" class="form-control" value="{{ old('fecha') }}">             

                @error('fecha')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <p><strong>Concepto</strong></p>
                <input type="text" name="concepto" id="concepto" class="form-control" value="{{ old('concepto') }}">

                @error('concepto')
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        flatpickr("#fecha", {
            locale: "es",
            dateFormat: "Y-m-d",
            allowInput: true,
            minDate: "today"
        });

    });
    </script>
@stop