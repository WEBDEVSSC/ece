
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Enfermeria</strong> <small class="text-muted">Toma de Signos Vitales</small></h1>
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

        <form action="{{ route('SignosVitalesStore',$citaId->id); }}" method="POST">

        @csrf

        <div class="row">
            <div class="col-md-2">
                <p><strong>Temperatura (°C)</strong></p>
                <input type="number" name="temperatura" id="temperatura" class="form-control" value="{{ old('temperatura') }}">
                @error('temperatura')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Frecuencia Cardiaca (lpm)</strong></p>
                <input type="number" name="frecuencia_cardiaca" id="frecuencia_cardiaca" class="form-control" value="{{ old('frecuencia_cardiaca') }}">
                @error('frecuencia_cardiaca')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Frecuencia Respitaroria (rpm)</strong></p>
                <input type="number" name="frecuencia_respiratoria" id="frecuencia_respiratoria" class="form-control" value="{{ old('frecuencia_respiratoria') }}">
                @error('frecuencia_respiratoria')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Saturación de Oxigeno (%)</strong></p>
                <input type="number" name="saturacion_oxigeno" id="saturacion_oxigeno" class="form-control" value="{{ old('saturacion_oxigeno') }}">
                @error('saturacion_oxigeno')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Tensión Arterial (mmHg)</strong></p>

                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="tension_arterial_sistolica" id="tension_arterial_sistolica" class="form-control" value="{{ old('tension_arterial_sistolica') }}">
                        @error('tension_arterial_sistolica')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="tension_arterial_diastolica" id="tension_arterial_diastolica" class="form-control" value="{{ old('tension_arterial_diastolica') }}">
                        @error('tension_arterial_diastolica')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <p><strong>Glisemia Capilar (mg/dL)</strong></p>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="glicemia_capilar" id="glicemia_capilar" class="form-control" value="{{ old('glicemia_capilar') }}">
                        @error('glicemia_capilar')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <select name="glicemia_capilar_medicion" id="glicemia_capilar_medicion" class="form-control">
                            <option value="1">AYUNO</option>
                            <option value="2">CASUAL</option>
                        </select>
                        @error('glicemia_capilar_medicion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-2">
                <p><strong>Circunferencia Cintura (Mts)</strong></p>
                <input type="number" name="circunferencia_cintura" id="circunferencia_cintura" class="form-control" value="{{ old('circunferencia_cintura') }}">
                @error('circunferencia_cintura')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Peso (Kg)</strong></p>
                <input type="number" name="peso" id="peso" class="form-control" value="{{ old('peso') }}">
                @error('peso')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-2">
                <p><strong>Talla (cm)</strong></p>
                <input type="number" name="talla" id="talla" class="form-control" value="{{ old('talla') }}">
                @error('talla')
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