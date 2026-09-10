@extends('adminlte::page')

@section('title', 'Nueva Cita')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Agendar Cita de Consulta Externa
                </h1>
                <p class="text-muted small mb-0">Seleccione el horario disponible en la agenda del médico</p>
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

    {{-- Tarjetas Informativas (Info-Boxes) --}}
    <div class="row mb-3">
        {{-- Médico --}}
        <div class="col-md-4">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-md"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted font-weight-bold">MÉDICO SELECCIONADO</span>
                    <span class="info-box-number text-dark">{{ $medico->nombre_completo }}</span>
                    <small class="text-muted"><i class="fas fa-user-tag mr-1"></i>Médico tratante</small>
                </div>
            </div>
        </div>

        {{-- Paciente --}}
        <div class="col-md-4">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-injured"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted font-weight-bold">PACIENTE SELECCIONADO</span>
                    <span class="info-box-number text-dark">{{ $paciente->nombre_completo }}</span>
                    <small class="text-muted"><i class="fas fa-id-card mr-1"></i><strong>EXP</strong>: {{ $paciente->no_expediente ?? 'Sin expediente' }} / <strong>CONSULTA DE PRIMERA VEZ</strong> : {{ $primeraVez }}</small>
                </div>
            </div>
        </div>

        {{-- Fecha --}}
        <div class="col-md-4">
            <div class="info-box shadow-sm border-0">
                <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fas fa-calendar-day"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-muted font-weight-bold">FECHA SELECCIONADA</span>
                    <span class="info-box-number text-dark">{{ \Carbon\Carbon::parse($fecha)->isoFormat('D [de] MMMM, YYYY') }}</span>
                    <small class="text-muted"><i class="fas fa-clock mr-1"></i>Día de la consulta</small>
                </div>
            </div>
        </div>
    </div>

    {{-- Calendario de Agenda --}}
    <div class="card card-outline card-info shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="card-title text-bold text-info mb-0" style="font-size: 1.1rem;">
                <i class="fas fa-calendar-alt mr-2"></i> AGENDA Y HORARIOS DISPONIBLES
            </h3>
        </div>
        <div class="card-body p-4">
            <div id="calendar"></div>
        </div>
    </div>

</div>

{{-- Modal para Nueva Cita --}}
<div class="modal fade" id="modalNuevaCita" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title font-weight-bold">
                    <i class="fas fa-calendar-plus mr-2"></i> Confirmar Nueva Cita
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('citasConsultaExternaStore') }}" method="POST">
                @csrf

                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                <input type="hidden" name="medico_id" value="{{ $medico->id }}">
                <input type="hidden" name="fecha" id="fechaInput">
                <input type="hidden" name="hora" id="horaInput">
                <input type="hidden" name="primera_vez" value="{{ $primeraVez }}">

                <div class="modal-body p-4">
    <div class="form-group mb-3">
        <label class="font-weight-bold text-dark">Médico</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light"><i class="fas fa-user-md text-muted"></i></span>
            </div>
            <input type="text" class="form-control bg-light" value="{{ $medico->nombre_completo }}" readonly>
        </div>
    </div>

    <div class="form-group mb-3">
        <label class="font-weight-bold text-dark">Paciente</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light"><i class="fas fa-user-injured text-muted"></i></span>
            </div>
            <input type="text" class="form-control bg-light" value="{{ $paciente->nombre_completo }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 form-group mb-3">
            <label class="font-weight-bold text-dark">Fecha</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-muted"></i></span>
                </div>
                <input type="text" id="fechaMostrar" class="form-control bg-light" readonly>
            </div>
        </div>

        <div class="col-md-4 form-group mb-3">
            <label class="font-weight-bold text-dark">Hora</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light"><i class="fas fa-clock text-muted"></i></span>
                </div>
                <input type="text" id="horaMostrar" class="form-control bg-light" readonly>
            </div>
        </div>

        <div class="col-md-4 form-group mb-3">
            <label class="font-weight-bold text-dark">¿Primera vez?</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light"><i class="fas fa-user-check text-muted"></i></span>
                </div>
                <input type="text" class="form-control bg-light" value="{{ $primeraVez }}" readonly>
            </div>
        </div>
    </div>
</div>

                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-outline-secondary font-weight-bold" data-dismiss="modal">
                        CANCELAR
                    </button>
                    <button type="submit" class="btn btn-success font-weight-bold px-4 shadow-sm">
                        <i class="fas fa-save mr-2"></i> REGISTRAR CITA
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<br>

@stop

@include('layouts.footer')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">

<style>
    #calendar {
        max-width: 100%;
        margin: 0 auto;
    }

    .fc-timegrid-slot {
        height: 45px !important;
    }

    .fc-theme-standard td, .fc-theme-standard th {
        border-color: #e9ecef !important;
    }

    .style-label {
        font-size: 0.65rem;
        letter-spacing: 0.8px;
    }
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/locales/es.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        dayHeaders: false,
        initialView: 'timeGridDay',
        initialDate: "{{ $fecha }}",
        selectOverlap: false,
        selectable: true,
        allDaySlot: false,
        height: 'auto',
        headerToolbar: false,
        slotMinTime: "{{ $entrada }}:00",
        slotMaxTime: "{{ $salida }}:00",
        slotDuration: "00:30:00",
        slotLabelInterval: "00:30:00",
        slotLabelContent: function(arg){
            let h = String(arg.date.getHours()).padStart(2, '0');
            let m = String(arg.date.getMinutes()).padStart(2, '0');
            return { html: h + ":" + m + " hrs" };
        },

        events: [
            @foreach($citasMedico as $cita)
            {
                title: @json('EXP: ' . $cita->paciente->no_expediente . ' - ' . $cita->paciente->nombre_completo),
                start: "{{ $cita->fecha->format('Y-m-d') }}T{{ $cita->hora }}",
                end: "{{ $cita->fecha->copy()->setTimeFromTimeString($cita->hora)->addMinutes(30)->format('Y-m-d\TH:i:s') }}",
                color: "{{ $cita->status == 'ATENDIDO' ? '#28a745' : '#17a2b8' }}"
            },
            @endforeach
        ],

        select: function(info){
            let inicio = info.start;
            let fecha = inicio.toISOString().substring(0, 10);
            let hora = inicio.toLocaleTimeString('es-MX', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            });

            $('#fechaInput').val(fecha);
            $('#horaInput').val(hora);
            $('#fechaMostrar').val(fecha);
            $('#horaMostrar').val(hora);
            $('#modalNuevaCita').modal('show');
        },

        eventClick: function(info){
            Swal.fire({
                title: 'Información de la Cita',
                text: info.event.title,
                icon: 'info',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#17a2b8'
            });
        }
    });

    calendar.render();
    
    // Tooltips
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop