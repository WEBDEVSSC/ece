@extends('adminlte::page')

@section('title', 'Detalle Valoración Podológica')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Detalles de Examen Vascular
                </h1>
                <p class="text-muted small mb-0">Consulta detallada del examen vascular del paciente</p>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('citasHoyConsultaExternaEnfermeriaIndex') }}" class="btn btn-secondary font-weight-bold shadow-sm">
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
                                        <th width="60%">Sistema arterial</th>
                                        <th width="20%"></th>
                                        <th width="20%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Pulso pedio _____ por min</td>
                                        <td>
                                            {{ $examenVascular->pd_pulso_pedio }}
                                           
                                        </td>
                                        <td>
                                            {{ $examenVascular->pd_pulso_pedio_calificacion }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Llenado capilar _____ seg</td>
                                        <td>
                                            {{ $examenVascular->pd_llenado_capilar }}
                                        </td>
                                        <td>
                                            {{ $examenVascular->pd_llenado_capilar_calificacion }}
                                        </td>
                                    </tr>
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td></td>
                                        <td class="align-middle text-right">Subtotal</td>                                        
                                        <td>
                                            {{ $examenVascular->pd_sistema_arterial_subtotal }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Sistema venoso</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Varices</td>
                                        
                                        <td>
                                            {{ $examenVascular->pd_varices }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Edema</td>
                                        <td>
                                            {{ $examenVascular->pd_edema }}
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>                                        
                                        <td>
                                            {{ $examenVascular->pd_sistema_venoso_subtotal }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>

                    <!-- Alteraciones Ungueales -->
                    

                    <!-- Otras Localizadas -->
                    

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
                                        <th width="60%">Sistema arterial</th>
                                        <th width="20%"></th>
                                        <th width="20%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Pulso pedio _____ por min</td>
                                        <td>
                                            {{ $examenVascular->pi_pulso_pedio }}
                                        </td>
                                        <td>
                                            {{ $examenVascular->pi_pulso_pedio_calificacion }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Llenado capilar _____ seg</td>
                                        <td>
                                            {{ $examenVascular->pi_llenado_capilar }}
                                        </td>
                                        <td>
                                            {{ $examenVascular->pi_llenado_capilar_calificacion }}
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td></td>
                                        <td class="align-middle text-right">Subtotal</td>                                        
                                        <td>
                                            {{ $examenVascular->pi_sistema_arterial_subtotal }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Sistema venoso</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Varices</td>
                                        
                                        <td>
                                            {{ $examenVascular->pi_varices }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Edema</td>
                                        <td>
                                            {{ $examenVascular->pi_edema }}
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>                                        
                                        <td>
                                            {{ $examenVascular->pi_sistema_venoso_subtotal }}
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