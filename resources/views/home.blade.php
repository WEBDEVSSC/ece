@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Dashboard</strong></h1>
@stop

@section('content')
        <div class="row">
    <div class="col-12">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <div class="d-flex align-items-center">
                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center"
                             style="width:80px; height:80px;">
                            <i class="fas fa-hospital-alt fa-2x text-white"></i>
                        </div>

                        <div class="ml-4">
                            <small class="text-uppercase text-muted font-weight-bold">
                                Unidad de Adscripción
                            </small>

                            <h3 class="mb-1 font-weight-bold">
                                {{ $user->clues->nombre }}
                            </h3>

                            <span class="badge badge-success px-3 py-2">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                CLUES: {{ $user->clues->clues }}
                            </span>
                        </div>
                    </div>

                    <div class="text-right mt-3 mt-md-0">
                        <h5 class="text-success font-weight-bold mb-1">
                            <i class="fas fa-check-circle"></i> Unidad Activa
                        </h5>
                        <small class="text-muted">
                            Información de la unidad asignada al usuario.
                        </small>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop