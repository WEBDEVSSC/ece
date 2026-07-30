@extends('adminlte::page')

@section('title', 'Mis Citas')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Agenda Médica
                </h1>
                <p class="text-muted small mb-0">Gestión e historial de citas del día</p>
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
            document.addEventListener('DOMContentLoaded', function () {
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
    <div class="row">
        <!-- Panel Izquierdo: Métricas Rápidas -->
        <div class="col-lg-3 col-md-4">
            <!-- Metric Card 1 -->
            <div class="card shadow-sm border-0 border-left-primary mb-3">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-uppercase text-muted font-weight-bold style-label">Citas Programadas</span>
                            <h2 class="font-weight-bold text-dark mb-0 mt-1">{{ $misCitas->count() }}</h2>
                        </div>
                        <div class="icon-shape bg-light-primary text-primary rounded-circle p-3">
                            <i class="fas fa-calendar-check fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel de Ayuda / Accesos Rápidos -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom-0 pb-0">
                    <h6 class="font-weight-bold text-uppercase text-muted style-label mb-0">Información Operativa</h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted">
                        Haga clic sobre cualquier cita programada para desplegar el expediente rápido y generar el <b>Resumen Médico PDF</b>.
                    </p>
                    <div class="d-flex align-items-center small text-muted mb-2">
                        <span class="badge badge-success mr-2" style="width: 12px; height: 12px; border-radius: 50%;"></span> Cita Confirmada
                    </div>
                    <div class="d-flex align-items-center small text-muted">
                        <span class="badge badge-info mr-2" style="width: 12px; height: 12px; border-radius: 50%;"></span> Atendido
                    </div>
                </div>
            </div>
        </div>

        <!-- Panel Derecho: Calendario -->
        <div class="col-lg-9 col-md-8">
            <div class="card card-outline card-primary shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-bold text-dark">
                        <i class="fas fa-clock text-primary mr-2"></i>
                        Programación Diaria
                    </h3>
                </div>
                <div class="card-body p-3">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@include('layouts.footer')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.css" rel="stylesheet">

<style>
    /* Estilos Generales e Institucionales */
    .style-label {
        font-size: 0.65rem;
        letter-spacing: 0.8px;
    }
    .border-left-primary {
        border-left: 4px solid #007bff !important;
    }
    .bg-light-primary {
        background-color: #e8f2ff;
    }
    .icon-shape {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Modificaciones FullCalendar para un look SaaS/Health */
    .fc {
        font-family: inherit;
    }
    .fc-toolbar-title {
        font-size: 1.15rem !important;
        font-weight: 700;
        color: #2c3e50;
        text-transform: capitalize;
    }
    .fc-event {
        cursor: pointer;
        border-radius: 4px;
        border: none !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        padding: 3px 6px;
        transition: transform 0.15s ease;
    }
    .fc-event:hover {
        transform: translateY(-1px);
    }
    .fc-timegrid-event {
        font-size: 0.85rem;
    }
    .fc-col-header-cell-cushion {
        text-transform: capitalize;
        font-weight: 600;
        color: #495057;
        padding: 8px 0 !important;
    }
    .fc-theme-standard td, .fc-theme-standard th {
        border-color: #f1f5f9;
    }
    .fc-timegrid-now-indicator-line {
        border-color: #e11d48;
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
        eventClick: function(info) {
            let paciente = info.event.extendedProps.paciente || 'Paciente General';
            let expediente = info.event.extendedProps.expediente || 'N/E';
            let status = info.event.extendedProps.status || 'Programada';
            let pacienteId = info.event.extendedProps.paciente_id || info.event.id; // Ajusta el parámetro según tu backend

            Swal.fire({
                title: '<span class="text-uppercase text-muted style-label d-block mb-1">Detalle de la Cita</span>' + paciente,
                html: `
                    <div class="text-left p-2 rounded bg-light border mb-3">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <small class="text-muted d-block text-uppercase font-weight-bold" style="font-size: 0.65rem;">No. Expediente</small>
                                <span class="font-weight-bold text-dark">${expediente}</span>
                            </div>
                            <div class="col-6 mb-2">
                                <small class="text-muted d-block text-uppercase font-weight-bold" style="font-size: 0.65rem;">Estatus</small>
                                <span class="badge badge-info">${status}</span>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/recepcion/pacientes/pacientesResumenMedico/${pacienteId}" 
                       target="_blank" 
                       class="btn btn-outline-primary btn-block text-uppercase font-weight-bold" 
                       style="font-size: 0.8rem; letter-spacing: 0.5px;">
                        <i class="fas fa-notes-medical mr-2"></i> Iniciar Consulta
                    </a>
                `,
                showConfirmButton: false,
                showCloseButton: true,
                customClass: {
                    popup: 'border-0 shadow'
                }
            });
        }
    });

    calendar.render();
});
</script>
@stop