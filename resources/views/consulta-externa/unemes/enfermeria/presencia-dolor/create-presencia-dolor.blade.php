@extends('adminlte::page')

@section('title', 'Proceso de Atención de Enfermería')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Proceso de Atención de Enfermería
                </h1>
                <p class="text-muted small mb-0">Toma y registro de valoración e intervenciones</p>
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

    <!-- Tarjeta Formulario de Proceso de Enfermería -->
    <div class="card card-outline card-primary shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-notes-medical text-primary mr-2"></i>
                Registro de Valoración e Intervenciones de Enfermería
            </h3>
        </div>

        <form action="{{ route('ConsultaExternaLaboratorioStore', $citaId->id) }}" method="POST">
            @csrf

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="presencia_dolor" class="form-label font-weight-bold text-muted small text-uppercase">Presencia de Dolor</label>
                        <select name="presencia_dolor" id="presencia_dolor" class="form-control @error('presencia_dolor') is-invalid @enderror">
                            <option value="">-- Seleccione una opción --</option>
                            <option value="PIES" {{ old('presencia_dolor') == 'PIES' ? 'selected' : '' }}>PIES</option>
                            <option value="MANOS" {{ old('presencia_dolor') == 'MANOS' ? 'selected' : '' }}>MANOS</option>
                            <option value="AMBOS" {{ old('presencia_dolor') == 'AMBOS' ? 'selected' : '' }}>AMBOS</option>
                        </select>
                        @error('presencia_dolor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-9 mb-3">
                        <label for="caracteristicas" class="form-label font-weight-bold text-muted small text-uppercase">Características del Dolor</label>
                        <input type="text" name="caracteristicas" id="caracteristicas" class="form-control @error('caracteristicas') is-invalid @enderror" value="{{ old('caracteristicas') }}">
                        @error('caracteristicas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="valoracion_henderson" class="form-label font-weight-bold text-muted small text-uppercase">Valoración de Enfermería por Necesidades Básicas de Virginia Henderson</label>
                        <textarea name="valoracion_henderson" id="valoracion_henderson" rows="2" class="form-control @error('valoracion_henderson') is-invalid @enderror">{{ old('valoracion_henderson') }}</textarea>
                        @error('valoracion_henderson')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="diagnostico_nanda" class="form-label font-weight-bold text-muted small text-uppercase">Diagnóstico de Enfermería | Clasificación de Etiquetas Diagnósticas de Enfermería (NANDA)</label>
                        <textarea name="diagnostico_nanda" id="diagnostico_nanda" rows="2" class="form-control @error('diagnostico_nanda') is-invalid @enderror">{{ old('diagnostico_nanda') }}</textarea>
                        @error('diagnostico_nanda')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="planeacion_noc" class="form-label font-weight-bold text-muted small text-uppercase">Planeación del Resultado Esperado (NOC)</label>
                        <textarea name="planeacion_noc" id="planeacion_noc" rows="2" class="form-control @error('planeacion_noc') is-invalid @enderror">{{ old('planeacion_noc') }}</textarea>
                        @error('planeacion_noc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="intervenciones_nic" class="form-label font-weight-bold text-muted small text-uppercase">Intervenciones "Clasificación de Intervenciones de Enfermería" (NIC)</label>
                        <textarea name="intervenciones_nic" id="intervenciones_nic" rows="2" class="form-control @error('intervenciones_nic') is-invalid @enderror">{{ old('intervenciones_nic') }}</textarea>
                        @error('intervenciones_nic')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="evaluacion_noc" class="form-label font-weight-bold text-muted small text-uppercase">Evaluación del Resultado Obtenido (NOC)</label>
                        <textarea name="evaluacion_noc" id="evaluacion_noc" rows="2" class="form-control @error('evaluacion_noc') is-invalid @enderror">{{ old('evaluacion_noc') }}</textarea>
                        @error('evaluacion_noc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="fuentes_consulta" class="form-label font-weight-bold text-muted small text-uppercase">Fuentes de consulta en la atención del paciente</label>
                        <textarea name="fuentes_consulta" id="fuentes_consulta" rows="2" class="form-control @error('fuentes_consulta') is-invalid @enderror">{{ old('fuentes_consulta') }}</textarea>
                        @error('fuentes_consulta')
                            <div class="invalid-feedback">{{ $message }}</div>
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