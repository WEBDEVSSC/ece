@extends('adminlte::page')

@section('title', 'Mis Citas')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>
        <strong>Médicos</strong>
        <small class="text-muted">Mis Citas</small>
    </h1>
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
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Éxito',
                    text: "{{ session($alert) }}",
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif
@endforeach

<div class="row mb-3">

    <div class="col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $misCitas->count() }}</h3>
                <p>Citas de Hoy</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card card-primary card-outline shadow-sm">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-calendar-day mr-2"></i>
                    Agenda del día
                </h3>

                <div class="card-tools">
                    <span class="badge badge-primary">
                        {{ now()->format('d/m/Y') }}
                    </span>
                </div>
            </div>

            <div class="card-body">
                <div id="calendar"></div>
            </div>

        </div>
    </div>

</div>

@stop

@include('layouts.footer')

@section('css')

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.css" rel="stylesheet">

<style>

.fc-toolbar-title{
    font-size:1.2rem !important;
    font-weight:bold;
}

.fc-event{
    cursor:pointer;
    border-radius:6px;
    border:none;
    padding:2px;
}

.fc-timegrid-event{
    font-size:.90rem;
}

.fc-col-header-cell-cushion{
    text-transform:capitalize;
    font-weight:bold;
    color:#343a40;
}

</style>

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/locales/es.global.min.js"></script>

<script>

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

document.addEventListener('DOMContentLoaded', function () {

    let calendarEl = document.getElementById('calendar');

    let calendar = new FullCalendar.Calendar(calendarEl, {

        locale: 'es',

        initialView: 'timeGridDay',

        events: @json($eventos),

        headerToolbar: {
            left: '',
            center: 'title',
            right: ''
        },

        allDaySlot: false,

        slotMinTime: "07:00:00",

        slotMaxTime: "21:00:00",

        slotDuration: "00:30:00",

        nowIndicator: true,

        height: "auto",

        expandRows: true,

        businessHours: {
            daysOfWeek: [1,2,3,4,5],
            startTime: '08:00',
            endTime: '20:00'
        },

        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },

        eventClick: function(info){

            Swal.fire({
                title: info.event.extendedProps.paciente,
                html:
                    '<b>Expediente:</b> ' + info.event.extendedProps.expediente +
                    '<br><b>Estado:</b> ' + info.event.extendedProps.status,
                icon: 'info',
                confirmButtonText: 'Aceptar'
            });

        }

    });

    calendar.render();

});

</script>

@stop
