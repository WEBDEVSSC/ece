@extends('adminlte::page')

@section('title', 'Toma de Signos Vitales')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Enfermería
                </h1>
                <p class="text-muted small mb-0">Toma y registro de signos vitales</p>
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

    <!-- Tarjeta Formulario de Signos Vitales -->
    <div class="card card-outline card-primary shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-heartbeat text-primary mr-2"></i>
                Registro de Signos Vitales
            </h3>
        </div>

        <form action="{{ route('SignosVitalesStore', $citaId->id) }}" method="POST">
            @csrf

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="temperatura" class="form-label font-weight-bold text-muted small text-uppercase">Temperatura (°C)</label>
                        <input type="number" step="0.1" name="temperatura" id="temperatura" class="form-control" value="{{ old('temperatura') }}" placeholder="36.5">
                        @error('temperatura')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="frecuencia_cardiaca" class="form-label font-weight-bold text-muted small text-uppercase">Frec. Cardiaca (lpm)</label>
                        <input type="number" name="frecuencia_cardiaca" id="frecuencia_cardiaca" class="form-control" value="{{ old('frecuencia_cardiaca') }}" placeholder="80">
                        @error('frecuencia_cardiaca')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="frecuencia_respiratoria" class="form-label font-weight-bold text-muted small text-uppercase">Frec. Respiratoria (rpm)</label>
                        <input type="number" name="frecuencia_respiratoria" id="frecuencia_respiratoria" class="form-control" value="{{ old('frecuencia_respiratoria') }}" placeholder="18">
                        @error('frecuencia_respiratoria')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="saturacion_oxigeno" class="form-label font-weight-bold text-muted small text-uppercase">Sat. Oxígeno (%)</label>
                        <input type="number" name="saturacion_oxigeno" id="saturacion_oxigeno" class="form-control" value="{{ old('saturacion_oxigeno') }}" placeholder="98">
                        @error('saturacion_oxigeno')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label font-weight-bold text-muted small text-uppercase">Tensión Arterial (mmHg)</label>
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <input type="number" name="tension_arterial_sistolica" id="tension_arterial_sistolica" class="form-control" value="{{ old('tension_arterial_sistolica') }}" placeholder="Sis">
                                @error('tension_arterial_sistolica')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 pl-1">
                                <input type="number" name="tension_arterial_diastolica" id="tension_arterial_diastolica" class="form-control" value="{{ old('tension_arterial_diastolica') }}" placeholder="Dia">
                                @error('tension_arterial_diastolica')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label font-weight-bold text-muted small text-uppercase">Glicemia (mg/dL)</label>
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <input type="number" name="glicemia_capilar" id="glicemia_capilar" class="form-control" value="{{ old('glicemia_capilar') }}" placeholder="Val">
                                @error('glicemia_capilar')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 pl-1">
                                <select name="glicemia_capilar_medicion" id="glicemia_capilar_medicion" class="form-control px-1">
                                    <option value="1">AYUNO</option>
                                    <option value="2">CASUAL</option>
                                </select>
                                @error('glicemia_capilar_medicion')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row border-top pt-3 mt-2">
                    <div class="col-md-2 mb-3">
                        <label for="circunferencia_cintura" class="form-label font-weight-bold text-muted small text-uppercase">Circ. Cintura (Mts)</label>
                        <input type="number" step="0.01" name="circunferencia_cintura" id="circunferencia_cintura" class="form-control" value="{{ old('circunferencia_cintura') }}" placeholder="0.85">
                        @error('circunferencia_cintura')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="peso" class="form-label font-weight-bold text-muted small text-uppercase">Peso (Kg)</label>
                        <input type="number" step="0.1" name="peso" id="peso" class="form-control" value="{{ old('peso') }}" placeholder="70.5">
                        @error('peso')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2 mb-3">
                        <label for="talla" class="form-label font-weight-bold text-muted small text-uppercase">Talla (cm)</label>
                        <input type="number" name="talla" id="talla" class="form-control" value="{{ old('talla') }}" placeholder="170">
                        @error('talla')
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