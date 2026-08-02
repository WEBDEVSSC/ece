@extends('adminlte::page')

@section('title', 'Pacientes')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Búsqueda de Pacientes
                </h1>
                <p class="text-muted small mb-0">Consulta e identificación por CURP</p>
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
    $alerts = ['success', 'update', 'destroy', 'error'];
@endphp

@foreach ($alerts as $alert)
    @if(session($alert))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: "{{ $alert == 'error' ? 'error' : 'success' }}",
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
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-outline card-primary shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                        <i class="fas fa-search mr-2"></i> CONSULTA DE PACIENTE
                    </h3>
                </div>

                <form action="{{ route('pacientesSearch') }}" method="GET">
                    @csrf
                    <div class="card-body p-4">
                        <div class="form-group mb-0">
                            <label for="curp" class="font-weight-bold text-dark mb-2">
                                Ingrese la CURP del Paciente
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0">
                                        <i class="fas fa-id-card text-muted"></i>
                                    </span>
                                </div>
                                <input type="text" 
                                       name="curp" 
                                       id="curp" 
                                       class="form-control text-uppercase @error('curp') is-invalid @enderror" 
                                       placeholder="Ej. ABCD900101HDFRXX01" 
                                       value="{{ old('curp') }}" 
                                       maxlength="18" 
                                       required 
                                       autofocus>
                            </div>
                            @error('curp')
                                <div class="text-danger small mt-2">
                                    <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer bg-light text-right py-3">
                        <button type="submit" class="btn btn-primary px-4 font-weight-bold shadow-sm">
                            <i class="fas fa-search mr-2"></i> BUSCAR DATOS
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>

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
    $(document).ready(function() {
        // Inicializar tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Convertir automáticamente el texto a mayúsculas mientras el usuario escribe
        $('#curp').on('input', function() {
            this.value = this.value.toUpperCase();
        });
    });
</script>
@stop