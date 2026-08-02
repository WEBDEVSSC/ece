@extends('adminlte::page')

@section('title', 'Asignar Diagnóstico')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Asignar Diagnóstico
                </h1>
                <p class="text-muted small mb-0">Gestión de expediente clínico del paciente</p>
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

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <h5 class="alert-heading font-weight-bold">
                <i class="fas fa-exclamation-triangle mr-1"></i> Se encontraron los siguientes errores:
            </h5>
            <ul class="mb-0 pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Tarjeta de Información del Paciente --}}
    <div class="card card-outline card-info shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-info mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-md mr-2"></i> PACIENTE SELECCIONADO
            </h3>
        </div>
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="mb-1 font-weight-bold text-dark">
                        {{ $paciente->nombre_completo }}
                    </h4>
                    <span class="text-muted small">
                        <i class="fas fa-id-card mr-1"></i> CURP: <strong>{{ $paciente->curp ?? 'N/A' }}</strong>
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- Tarjeta Formulario de Diagnóstico --}}
    <div class="card card-outline card-primary shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-stethoscope mr-2"></i> DIAGNÓSTICO MÉDICO
            </h3>
            <div class="card-tools">
                <a href="{{ route('pacientesShow', $paciente->id) }}" class="btn btn-outline-success btn-sm font-weight-bold">
                    <i class="fas fa-folder-open mr-1"></i> EXPEDIENTE
                </a>
            </div>
        </div>

        <form action="{{ route('pacientesDXMedicoStore', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="diagnostico_medico_id" class="font-weight-bold text-dark">
                            Diagnóstico Médico
                        </label>
                        <p class="text-muted small mb-2">Seleccione el diagnóstico correspondiente conforme al catálogo CIE-10.</p>

                        <div class="input-group">
                            <select name="diagnostico_medico_id" id="diagnostico_medico_id" class="form-control select2 @error('diagnostico_medico_id') is-invalid @enderror" style="width: 100%;">
                                <option value=""></option>
                                @foreach($diagnosticos as $diagnostico)
                                    <option value="{{ $diagnostico->id }}"
                                        {{ old('diagnostico_medico_id', $paciente->diagnostico_medico_id) == $diagnostico->id ? 'selected' : '' }}>
                                        {{ $diagnostico->clave_nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('diagnostico_medico_id')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light text-right py-3">
                <button type="submit" class="btn btn-success px-4 font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-2"></i> REGISTRAR DATOS
                </button>
            </div>
        </form>
    </div>

</div>

<br>

@stop

@include('layouts.footer')

@section('css')
<style>
    /* Homologación de Select2 con estilos Bootstrap 4 AdminLTE */
    .select2-container--default .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
        border-radius: 0.25rem !important;
        border: 1px solid #ced4da !important;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: calc(2.25rem - 2px) !important;
        padding-left: 0.75rem !important;
        color: #495057 !important;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: calc(2.25rem + 2px) !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #6c757d !important;
    }

    .style-label {
        font-size: 0.65rem;
        letter-spacing: 0.8px;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Inicialización del Select2
        $('#diagnostico_medico_id').select2({
            placeholder: "-- Seleccione una opción --",
            allowClear: true,
            width: '100%'
        });

        // Inicialización de Tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop