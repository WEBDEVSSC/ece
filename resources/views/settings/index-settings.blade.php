
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Settings</strong> <small class="text-muted">Panel de Control</small></h1>
@stop

@section('content')

<!-- -->

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

<!-- -->

<div class="card">

    <div class="card-body">

        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('medicosIndex') }}" class="text-decoration-none">
                    <div class="small-box bg-gradient-info elevation-3">
                        <div class="inner">
                            <h4 class="font-weight-bold">MÉDICOS</h4>
                            <p>Catálogo de Médicos</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-user-md"></i>
                        </div>

                        <span class="small-box-footer">
                            Acceder <i class="fas fa-arrow-circle-right"></i>
                        </span>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('usuariosIndex') }}" class="text-decoration-none">
                    <div class="small-box bg-gradient-info elevation-3">
                        <div class="inner">
                            <h4 class="font-weight-bold">USUARIOS</h4>
                            <p>Catálogo de Usuarios</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <span class="small-box-footer">
                            Acceder <i class="fas fa-arrow-circle-right"></i>
                        </span>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('medicosIndex') }}" class="text-decoration-none">
                    <div class="small-box bg-gradient-info elevation-3">
                        <div class="inner">
                            <h4 class="font-weight-bold">MÉDICOS</h4>
                            <p>Catálogo de Médicos</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-user-md"></i>
                        </div>

                        <span class="small-box-footer">
                            Acceder <i class="fas fa-arrow-circle-right"></i>
                        </span>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('medicosIndex') }}" class="text-decoration-none">
                    <div class="small-box bg-gradient-info elevation-3">
                        <div class="inner">
                            <h4 class="font-weight-bold">MÉDICOS</h4>
                            <p>Catálogo de Médicos</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-user-md"></i>
                        </div>

                        <span class="small-box-footer">
                            Acceder <i class="fas fa-arrow-circle-right"></i>
                        </span>
                    </div>
                </a>
            </div>

        </div>

    </div>
    
</div>

<div class="form-group">
    <label>Fecha de nacimiento</label>

    <input
        type="text"
        id="fecha"
        name="fecha"
        class="form-control"
        placeholder="Seleccione una fecha">
</div>

    
@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    flatpickr("#fecha", {
        locale: "es",
        dateFormat: "Y-m-d",
        allowInput: true
    });

});
</script>

    
@stop