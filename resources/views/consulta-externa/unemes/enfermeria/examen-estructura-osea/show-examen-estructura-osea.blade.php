@extends('adminlte::page')

@section('title', 'Detalle Valoración Podológica')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Detalles de Examen de Estructura Ósea
                </h1>
                <p class="text-muted small mb-0">Consulta detallada del examen de estructura osea del paciente</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('UnemeEnfermeriaValoracionPodologicaIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
                    <i class="fas fa-arrow-left mr-1"></i> REGRESAR AL LISTADO
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')

<div class="container-fluid">

    {{-- Alertas con SweetAlert2 --}}
    @php
        $alerts = ['success', 'update', 'destroy'];
    @endphp

    @foreach ($alerts as $alert)
        @if(session($alert))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: "{{ session($alert) }}",
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#28a745'
                    });
                });
            </script>
        @endif
    @endforeach

    @include('layouts.show-paciente-card', ['citaId' => $citaId])

    <!-- Evaluación Podológica (Comparativa de Pies) -->
    <div class="row">
        <!-- PIE DERECHO -->
        <div class="col-md-6 mb-4">
            <div class="card card-outline card-primary shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                        <i class="fas fa-shoe-prints mr-2"></i> PIE DERECHO
                    </h3>
                </div>
                <div class="card-body p-3">
                    
                    <!-- Hiperqueratosis -->
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered table-hover table-sm text-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th width="60%">Deformidades óseas</th>
                                    <th width="40%" class="text-center">Calificación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">a) Dedos de garra</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pd_dedos_garra ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">b) Dedos de Martillo</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pd_dedos_martillo ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">c) Hallux Valgus</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pd_hallux_valgus ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">d) Infraducto</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pd_infraducto ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">e) Supraducto</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pd_supraducto ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">f) Hipercarga metatarsio</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pd_hipercarga_metatarsio ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">g) Pie de Charcot</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pd_pie_charcot ?? '--' }}</td>
                                </tr>
                                <tr class="bg-light font-weight-bold">
                                    <td class="align-middle text-right">Subtotal</td>
                                    <td class="text-center align-middle">
                                        <span class="badge badge-primary px-3 py-1 font-weight-bold">{{ $examenEstructuraOsea->pd_subtotal ?? '0' }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- PIE IZQUIERDO -->
        <div class="col-md-6 mb-4">
            <div class="card card-outline card-primary shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                        <i class="fas fa-shoe-prints mr-2"></i> PIE IZQUIERDO
                    </h3>
                </div>
                <div class="card-body p-3">
                    
                    <!-- Hiperqueratosis -->
                    <div class="table-responsive mb-3">
                        <table class="table table-bordered table-hover table-sm text-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th width="60%">Deformidades óseas</th>
                                    <th width="40%" class="text-center">Calificación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">a) Dedos de garra</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pi_dedos_garra ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">b) Dedos de Martillo</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pi_dedos_martillo ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">c) Hallux Valgus</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pi_hallux_valgus ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">d) Infraducto</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pi_infraducto ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">e) Supraducto</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pi_supraducto ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">f) Hipercarga metatarsio</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pi_hipercarga_metatarsio ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle">g) Pie de Charcot</td>
                                    <td class="text-center font-weight-bold align-middle">{{ $examenEstructuraOsea->pi_pie_charcot ?? '--' }}</td>
                                </tr>
                                <tr class="bg-light font-weight-bold">
                                    <td class="align-middle text-right">Subtotal</td>
                                    <td class="text-center align-middle">
                                        <span class="badge badge-primary px-3 py-1 font-weight-bold">{{ $examenEstructuraOsea->pi_subtotal ?? '0' }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    

                    
                </div>
            </div>
        </div>
    </div>

    <!-- Acciones Finales -->
    <div class="row mb-4">
        <div class="col-12 text-right">
            <a href="{{ route('citasHoyConsultaExternaEnfermeriaIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
                <i class="fas fa-arrow-left mr-1"></i> REGRESAR
            </a>
        </div>
    </div>
</div>

<br>

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