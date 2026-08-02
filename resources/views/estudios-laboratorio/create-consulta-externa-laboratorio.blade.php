@extends('adminlte::page')

@section('title', 'Toma de Resultados de Laboratorio')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Laboratorios
                </h1>
                <p class="text-muted small mb-0">Toma y registro de resultados de laboratorio</p>
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
    $alerts = ['success', 'update', 'destroy'];
@endphp

@foreach ($alerts as $alert)
    @if(session($alert))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
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

    @include('layouts.show-paciente-card', ['citaId' => $citaId])

    <!-- Tarjeta Formulario de Resultados de Laboratorio -->
    <div class="card card-outline card-primary shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-vials text-primary mr-2"></i>
                Registro de Resultados de Laboratorio
            </h3>
        </div>

        <form action="{{ route('ConsultaExternaLaboratorioStore', $citaId->id) }}" method="POST">
            @csrf

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="hemoglobina" class="form-label font-weight-bold text-muted small text-uppercase">HbA1c (%)</label>
                        <input type="number" step="0.01" name="hemoglobina" id="hemoglobina" class="form-control" value="{{ old('hemoglobina') }}" placeholder="Ej. 6.5">
                        @error('hemoglobina')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="glucosa_serica" class="form-label font-weight-bold text-muted small text-uppercase">Glucosa Sérica (mg/dL)</label>
                        <input type="number" step="0.01" name="glucosa_serica" id="glucosa_serica" class="form-control" value="{{ old('glucosa_serica') }}" placeholder="70 - 100">
                        @error('glucosa_serica')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="trigliceridos" class="form-label font-weight-bold text-muted small text-uppercase">Triglicéridos (mg/dL)</label>
                        <input type="number" step="0.01" name="trigliceridos" id="trigliceridos" class="form-control" value="{{ old('trigliceridos') }}" placeholder="Ej. 150">
                        @error('trigliceridos')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="colesterol_ldl" class="form-label font-weight-bold text-muted small text-uppercase">Colesterol (LDL)</label>
                        <input type="number" step="0.01" name="colesterol_ldl" id="colesterol_ldl" class="form-control" value="{{ old('colesterol_ldl') }}" placeholder="Ej. 100">
                        @error('colesterol_ldl')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="colesterol_hdl" class="form-label font-weight-bold text-muted small text-uppercase">Colesterol (HDL)</label>
                        <input type="number" step="0.01" name="colesterol_hdl" id="colesterol_hdl" class="form-control" value="{{ old('colesterol_hdl') }}" placeholder="Ej. 50">
                        @error('colesterol_hdl')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="colesterol_total" class="form-label font-weight-bold text-muted small text-uppercase">Colesterol Total</label>
                        <input type="number" step="0.01" name="colesterol_total" id="colesterol_total" class="form-control" value="{{ old('colesterol_total') }}" placeholder="Ej. 200">
                        @error('colesterol_total')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row border-top pt-3 mt-2">
                    <div class="col-md-2 mb-3">
                        <label for="microalbuminuria" class="form-label font-weight-bold text-muted small text-uppercase">Microalbuminuria (mg)</label>
                        <input type="number" step="0.01" name="microalbuminuria" id="microalbuminuria" class="form-control" value="{{ old('microalbuminuria') }}" placeholder="Ej. 30">
                        @error('microalbuminuria')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light text-right py-3">
                <button type="submit" class="btn btn-success px-4 font-weight-bold">
                    <i class="fas fa-save mr-2"></i> REGISTRAR DATOS
                </button>
            </div>
        </form>
    </div>
</div>

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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop