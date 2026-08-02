@extends('adminlte::page')

@section('title', 'Citas Consulta Externa')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Citas Consulta Externa
                </h1>
                <p class="text-muted small mb-0">Búsqueda y gestión de disponibilidad de citas médicas</p>
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

{{-- Alertas Emergentes (Toasts) --}}
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

    {{-- Tarjeta de Búsqueda --}}
    <div class="card card-outline card-primary shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-search mr-2"></i> BUSCAR CITAS DISPONIBLES
            </h3>
        </div>

        <form action="{{ route('citasConsultaExternaFind') }}" method="GET">
            <div class="card-body p-4">
                <div class="row">

                    {{-- Paciente --}}
                    <div class="col-md-4">
                        <div class="form-group mb-0">
                            <label for="paciente_id" class="font-weight-bold text-dark">Paciente</label>
                            <select name="paciente_id" id="paciente_id" class="form-control select2bs4" style="width: 100%;">
                                <option value="">-- Seleccione un paciente --</option>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}"
                                        {{ old('paciente_id', request('paciente_id')) == $paciente->id ? 'selected' : '' }}>
                                        {{ $paciente->nombre_completo }}
                                    </option>
                                @endforeach
                            </select>

                            @error('paciente_id')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Médico --}}
                    <div class="col-md-4">
                        <div class="form-group mb-0">
                            <label for="medico_id" class="font-weight-bold text-dark">Médico</label>
                            <select name="medico_id" id="medico_id" class="form-control select2bs4" style="width: 100%;">
                                <option value="">-- Seleccione un médico --</option>
                                @foreach($medicos as $medico)
                                    <option value="{{ $medico->id }}"
                                        {{ old('medico_id', request('medico_id')) == $medico->id ? 'selected' : '' }}>
                                        {{ $medico->nombre_completo }}
                                    </option>
                                @endforeach
                            </select>

                            @error('medico_id')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Fecha --}}
                    <div class="col-md-4">
                        <div class="form-group mb-0">
                            <label for="fecha" class="font-weight-bold text-dark">Fecha</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0"><i class="fas fa-calendar-alt text-muted"></i></span>
                                </div>
                                <input type="text" id="fecha" name="fecha" class="form-control border-left-0"
                                    value="{{ old('fecha', request('fecha')) }}" placeholder="Seleccionar fecha...">
                            </div>

                            @error('fecha')
                                <small class="text-danger d-block mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer bg-light py-3 text-right">
                <button type="submit" class="btn btn-success font-weight-bold px-4 shadow-sm">
                    <i class="fas fa-calendar-check mr-2"></i> BUSCAR CITAS DISPONIBLES
                </button>
            </div>
        </form>
    </div>

    {{-- Tabla de Disponibilidad --}}
    <div class="card card-outline card-info shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-info mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-user-clock mr-2"></i> DISPONIBILIDAD DE ATENCIÓN
            </h3>
        </div>

        <div class="card-body p-0 table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th class="py-3 pl-4">Médico</th>
                        <th class="text-center py-3">Lunes</th>
                        <th class="text-center py-3">Martes</th>
                        <th class="text-center py-3">Miércoles</th>
                        <th class="text-center py-3">Jueves</th>
                        <th class="text-center py-3">Viernes</th>
                        <th class="text-center py-3">Sábado</th>
                        <th class="text-center py-3">Domingo</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
                    @endphp

                    @forelse($listaMedicos as $listaMedico)
                        <tr>
                            <td class="align-middle pl-4 font-weight-bold text-dark">
                                <i class="fas fa-user-md text-info mr-2"></i>{{ $listaMedico->nombre_completo }}
                            </td>
                            @foreach($dias as $dia)
                                @php $campo = $dia . '_entrada'; @endphp
                                <td class="text-center align-middle">
                                    @if(!empty($listaMedico->$campo))
                                        <i class="fas fa-calendar-check text-success fa-lg"
                                           data-toggle="tooltip" data-placement="top" title="Disponible"></i>
                                    @else
                                        <i class="fas fa-calendar-times text-muted opacity-50 fa-lg"
                                           data-toggle="tooltip" data-placement="top" title="No disponible"></i>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="fas fa-info-circle mr-1"></i> No se encontraron médicos para mostrar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white py-2"></div>
    </div>

</div>

<br>

@stop

@include('layouts.footer')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css">

<style>
    .select2-container--bootstrap4 .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
    }
    .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
        line-height: 2.25rem !important;
    }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Inicializar Select2 con el tema nativo Bootstrap 4 de AdminLTE
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: '-- Seleccione una opción --',
        allowClear: true,
        language: {
            noResults: function () {
                return "No se encontraron resultados";
            }
        }
    });

    // Inicializar Flatpickr
    flatpickr("#fecha", {
        locale: "es",
        dateFormat: "Y-m-d",
        allowInput: true,
        minDate: "today"
    });

    // Inicializar Tooltips de Bootstrap
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop