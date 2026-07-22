@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Citas Consulta Externa</strong> <small class="text-muted">Nueva cita</small></h1>
@stop

@section('content')

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

<div class="card">

    <form action="{{ route('citasConsultaExternaFind') }}" method="GET">
        @csrf

        <div class="card-header text-right">
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="paciente_id">
                            <strong>Paciente</strong>
                        </label>

                        <select name="paciente_id" id="paciente_id" class="form-control">
                            <option value="">--Seleccione una opción --</option>

                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}"
                                    {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                    {{ $paciente->nombre_completo }}
                                </option>
                            @endforeach
                        </select>

                        @error('paciente_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="paciente_id">
                            <strong>Médico</strong>
                        </label>

                        <select name="medico_id" id="medico_id" class="form-control">
                            <option value="">--Seleccione una opción --</option>

                            @foreach($medicos as $medicos)
                                <option value="{{ $medicos->id }}"
                                    {{ old('medico_id') == $medicos->id ? 'selected' : '' }}>
                                    {{ $medicos->nombre_completo }}
                                </option>
                            @endforeach
                        </select>

                        @error('medico_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="fecha"><strong>Fecha</strong></label>

                    <input type="text" id="fecha" name="fecha" class="form-control" value="{{ old('fecha') }}">             

                    @error('fecha')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                
                </div>

            </div>

        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fas fa-calendar-check mr-1"></i> BUSCAR CITAS DISPONIBLES
            </button>
        </div>

    </form>

</div>

<div class="card">
    <div class="card-header">
        <label for="">Horarios disponibles</label>
    </div>
    <div class="card-body">

        <table class="table table-striped">
    <thead>
        <tr>
            <th>Médico</th>
            <th class="text-center">Lunes</th>
            <th class="text-center">Martes</th>
            <th class="text-center">Miércoles</th>
            <th class="text-center">Jueves</th>
            <th class="text-center">Viernes</th>
            <th class="text-center">Sábado</th>
            <th class="text-center">Domingo</th>
        </tr>
    </thead>

    <tbody>
        @foreach($listaMedicos as $listaMedico)
            <tr>
                <td>
                    {{ $listaMedico->nombre_completo }}
                </td>

                <td class="text-center align-middle">
                    @if($listaMedico->lunes_entrada)
                        <i class="fas fa-calendar-check text-success fa-lg"
                        title="Disponible"></i>
                    @else
                        <i class="fas fa-calendar-times text-muted fa-lg"
                        title="No disponible"></i>
                    @endif
                </td>

                <td class="text-center align-middle">
                    @if($listaMedico->martes_entrada)
                        <i class="fas fa-calendar-check text-success fa-lg"
                        title="Disponible"></i>
                    @else
                        <i class="fas fa-calendar-times text-muted fa-lg"
                        title="No disponible"></i>
                    @endif
                </td>

                <td class="text-center align-middle">
                    @if($listaMedico->miercoles_entrada)
                        <i class="fas fa-calendar-check text-success fa-lg"
                        title="Disponible"></i>
                    @else
                        <i class="fas fa-calendar-times text-muted fa-lg"
                        title="No disponible"></i>
                    @endif
                </td>

                <td class="text-center align-middle">
                    @if($listaMedico->jueves_entrada)
                        <i class="fas fa-calendar-check text-success fa-lg"
                        title="Disponible"></i>
                    @else
                        <i class="fas fa-calendar-times text-muted fa-lg"
                        title="No disponible"></i>
                    @endif
                </td>

                <td class="text-center align-middle">
                    @if($listaMedico->viernes_entrada)
                        <i class="fas fa-calendar-check text-success fa-lg"
                        title="Disponible"></i>
                    @else
                        <i class="fas fa-calendar-times text-muted fa-lg"
                        title="No disponible"></i>
                    @endif
                </td>

                <td class="text-center align-middle">
                    @if($listaMedico->sabado_entrada)
                        <i class="fas fa-calendar-check text-success fa-lg"
                        title="Disponible"></i>
                    @else
                        <i class="fas fa-calendar-times text-muted fa-lg"
                        title="No disponible"></i>
                    @endif
                </td>

                <td class="text-center align-middle">
                    @if($listaMedico->domingo_entrada)
                        <i class="fas fa-calendar-check text-success fa-lg"
                        title="Disponible"></i>
                    @else
                        <i class="fas fa-calendar-times text-muted fa-lg"
                        title="No disponible"></i>
                    @endif
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

    </div>
    <div class="card-footer"></div>
</div>

@include('layouts.footer')

@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>

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