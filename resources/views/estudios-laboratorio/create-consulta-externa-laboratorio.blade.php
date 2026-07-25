
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Laboratorios</strong> <small class="text-muted">Toma de Resultados</small></h1>
@stop

@section('content')

<!-- -->

@php
    $alerts = [
        'success',
        'update',
        'destroy',
    ];
@endphp

@foreach ($alerts as $alert)
    @if(session($alert))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session($alert) }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            });
        </script>
    @endif
@endforeach

<!-- -->

<div class="card">
    <div class="card-header text-right">
        
    </div>
    <div class="card-body">

        <form action="{{ route('ConsultaExternaLaboratorioStore',$citaId->id); }}" method="POST">

        @csrf

        <div class="row">
            <div class="col-md-2">
                <p><strong>HbA1c (%)</strong></p>
                <input type="number" name="hemoglobina" id="hemoglobina" class="form-control" value="{{ old('hemoglobina') }}">
                @error('hemoglobina')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Glucosa Sérica (70 y 100 mg/dL.)</strong></p>
                <input type="number" name="glucosa_serica" id="glucosa_serica" class="form-control" value="{{ old('glucosa_serica') }}">
                @error('glucosa_serica')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Triglicéridos (mg/dL)</strong></p>
                <input type="number" name="trigliceridos" id="trigliceridos" class="form-control" value="{{ old('trigliceridos') }}">
                @error('trigliceridos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Colesterol (LDL)</strong></p>
                <input type="number" name="colesterol_ldl" id="colesterol_ldl" class="form-control" value="{{ old('colesterol_ldl') }}">
                @error('colesterol_ldl')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Colesterol (HDL)</strong></p>
                <input type="number" name="colesterol_hdl" id="colesterol_hdl" class="form-control" value="{{ old('colesterol_hdl') }}">
                @error('colesterol_hdl')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Colesterol (Total)</strong></p>
                <input type="number" name="colesterol_total" id="colesterol_total" class="form-control" value="{{ old('colesterol_total') }}">
                @error('colesterol_total')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-2">
                <p><strong>Microalbuminuria (mg)</strong></p>
                <input type="number" name="microalbuminuria" id="microalbuminuria" class="form-control" value="{{ old('microalbuminuria') }}">
                @error('microalbuminuria')
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

    
@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        $(function () {

            $('[data-toggle="tooltip"]').tooltip();

            $('.form-eliminar').submit(function(e){

                e.preventDefault();

                let form = this;

                Swal.fire({
                    title: '¿Está seguro?',
                    text: "El médico será eliminado del sistema.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {

                    if (result.isConfirmed) {
                        form.submit();
                    }

                });

            });

        });
        </script>
@stop