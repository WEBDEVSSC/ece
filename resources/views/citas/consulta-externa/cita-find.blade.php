@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Citas Consulta Externa</strong> <small class="text-muted">Nueva cita</small></h1>
@stop


@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <h5>
            <i class="fas fa-exclamation-triangle"></i>
            Se encontraron los siguientes errores:
        </h5>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">

    {{-- Médico --}}
    <div class="col-md-4">
        <div class="info-box shadow-sm border-left border-info">
            <span class="info-box-icon bg-info">
                <i class="fas fa-user-md text-white"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text text-muted">
                    Médico seleccionado
                </span>

                <span class="info-box-number text-dark">
                    {{ $medico->nombre_completo }}
                </span>

                <small class="text-muted">
                    Médico tratante
                </small>
            </div>
        </div>
    </div>


    {{-- Paciente --}}
    <div class="col-md-4">
        <div class="info-box shadow-sm border-left border-success">
            <span class="info-box-icon bg-success">
                <i class="fas fa-user-injured text-white"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text text-muted">
                    Paciente seleccionado
                </span>

                <span class="info-box-number text-dark">
                    {{ $paciente->nombre_completo }}
                </span>

                <small class="text-muted">
                    Paciente de consulta externa
                </small>
            </div>
        </div>
    </div>


    {{-- Fecha --}}
    <div class="col-md-4">
        <div class="info-box shadow-sm border-left border-warning">
            <span class="info-box-icon bg-warning">
                <i class="fas fa-calendar-alt text-white"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text text-muted">
                    Fecha de consulta
                </span>

                <span class="info-box-number text-dark">
                    {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}
                </span>

                <small class="text-muted">
                    Día seleccionado
                </small>
            </div>
        </div>
    </div>

</div>



<div class="card shadow-sm mt-3">

    <div class="card-header bg-info text-white">
        <h3 class="card-title">
            <i class="fas fa-calendar-alt"></i>
            Agenda del día
        </h3>
    </div>

    <div class="card-body">
        <div id="calendar"></div>
    </div>

</div>






<br>

<div class="modal fade" id="modalNuevaCita" tabindex="-1">

    <div class="modal-dialog">

        <form action="{{ route('citasConsultaExternaStore') }}" method="POST">

            @csrf

            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
            <input type="hidden" name="medico_id" value="{{ $medico->id }}">

            <input type="hidden" name="fecha" id="fechaInput">
            <input type="hidden" name="hora" id="horaInput">

            <div class="modal-content">

                <div class="modal-header bg-info">

                    <h5 class="modal-title text-white">
                        Nueva cita
                    </h5>

                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>


                <div class="modal-body">

                    <div class="form-group">
                        <label>Médico</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $medico->nombre_completo }}"
                               readonly>
                    </div>

                    <div class="form-group">
                        <label>Paciente</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $paciente->nombre_completo }}"
                               readonly>
                    </div>

                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="text"
                               id="fechaMostrar"
                               class="form-control"
                               readonly>
                    </div>

                    <div class="form-group">
                        <label>Hora</label>
                        <input type="text"
                               id="horaMostrar"
                               class="form-control"
                               readonly>
                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-success">

                        <i class="fas fa-save"></i>

                        Registrar cita

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@include('layouts.footer')

@stop



@section('css')

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css" rel="stylesheet">

<style>

#calendar {
    max-width: 100%;
    margin: 20px auto;
}

.fc-timegrid-slot {
    height: 45px !important;
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

            let h = String(arg.date.getHours()).padStart(2,'0');
            let m = String(arg.date.getMinutes()).padStart(2,'0');

            return {
                html: h + ":" + m
            };

        },

        events: [
            @foreach($citasMedico as $cita)
            {
                title: @json('EXP : '.' '.$cita->paciente->no_expediente . ' - ' . $cita->paciente->nombre_completo),
                start: "{{ $cita->fecha->format('Y-m-d') }}T{{ $cita->hora }}",
                end: "{{ $cita->fecha->copy()->setTimeFromTimeString($cita->hora)->addMinutes(30)->format('Y-m-d\TH:i:s') }}",
                color: "{{ $cita->status == 'ATENDIDO' ? '#28a745' : '#17a2b8' }}"
            },
            @endforeach
            ],

        select: function(info){
            let inicio = info.start;
            let fecha = inicio.toISOString().substring(0,10);
            let hora = inicio.toLocaleTimeString('es-MX',{
                hour:'2-digit',
                minute:'2-digit',
                hour12:false
            });
            $('#fechaInput').val(fecha);
            $('#horaInput').val(hora);
            $('#fechaMostrar').val(fecha);
            $('#horaMostrar').val(hora);
            $('#modalNuevaCita').modal('show');
        },

        eventClick: function(info){
            alert("Paciente: " + info.event.title);
        }
    });
    calendar.render();
});

</script>

@stop