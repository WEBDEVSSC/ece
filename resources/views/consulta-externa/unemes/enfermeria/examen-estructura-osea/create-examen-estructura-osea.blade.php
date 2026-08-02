@extends('adminlte::page')

@section('title', 'Examen de Estructura Ósea')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Examen de Estructura Ósea
                </h1>
                <p class="text-muted small mb-0">Nuevo registro de deformidades óseas</p>
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
            document.addEventListener('DOMContentLoaded', function() {
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

    @include('layouts.show-paciente-card', ['citaId' => $citaId])

    <!-- Formulario de Evaluación Ósea -->
    <form action="{{ route('UnemeEnfermeriaExamenEstructuraOseaStore', $citaId->id) }}" method="POST">
        @csrf

        <div class="row">
            <!-- PIE DERECHO -->
            <div class="col-md-6 mb-4">
                <div class="card card-outline card-primary shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3">
                        <h3 class="card-title text-bold text-primary mb-0" style="font-size: 1.1rem;">
                            <i class="fas fa-bone mr-2"></i> PIE DERECHO
                        </h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Deformidades Óseas</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">a) Dedos de Garra</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_dedos_garra" value="{{ old('pd_dedos_garra', 0) }}">
                                            @error('pd_dedos_garra')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">b) Dedos de Martillo</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_dedos_martillo" value="{{ old('pd_dedos_martillo', 0) }}">
                                            @error('pd_dedos_martillo')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">c) Hallux Valgus</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_hallux_valgus" value="{{ old('pd_hallux_valgus', 0) }}">
                                            @error('pd_hallux_valgus')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">d) Infraducto</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_infraducto" value="{{ old('pd_infraducto', 0) }}">
                                            @error('pd_infraducto')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">e) Supraducto</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_supraducto" value="{{ old('pd_supraducto', 0) }}">
                                            @error('pd_supraducto')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">f) Hipercarga metatarsio</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_hipercarga_metatarsio" value="{{ old('pd_hipercarga_metatarsio', 0) }}">
                                            @error('pd_hipercarga_metatarsio')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">g) Pie de Charcot</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_pie_charcot" value="{{ old('pd_pie_charcot', 0) }}">
                                            @error('pd_pie_charcot')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm font-weight-bold" id="pd_subtotal" name="pd_subtotal" value="{{ old('pd_subtotal', 0) }}" readonly>
                                            @error('pd_subtotal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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
                            <i class="fas fa-bone mr-2"></i> PIE IZQUIERDO
                        </h3>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm text-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="60%">Deformidades Óseas</th>
                                        <th width="40%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">a) Dedos de Garra</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pi" name="pi_dedos_garra" value="{{ old('pi_dedos_garra', 0) }}">
                                            @error('pi_dedos_garra')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">b) Dedos de Martillo</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pi" name="pi_dedos_martillo" value="{{ old('pi_dedos_martillo', 0) }}">
                                            @error('pi_dedos_martillo')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">c) Hallux Valgus</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pi" name="pi_hallux_valgus" value="{{ old('pi_hallux_valgus', 0) }}">
                                            @error('pi_hallux_valgus')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">d) Infraducto</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pi" name="pi_infraducto" value="{{ old('pi_infraducto', 0) }}">
                                            @error('pi_infraducto')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">e) Supraducto</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pi" name="pi_supraducto" value="{{ old('pi_supraducto', 0) }}">
                                            @error('pi_supraducto')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">f) Hipercarga metatarsio</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pi" name="pi_hipercarga_metatarsio" value="{{ old('pi_hipercarga_metatarsio', 0) }}">
                                            @error('pi_hipercarga_metatarsio')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">g) Pie de Charcot</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pi" name="pi_pie_charcot" value="{{ old('pi_pie_charcot', 0) }}">
                                            @error('pi_pie_charcot')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm font-weight-bold" name="pi_subtotal" id="pi_subtotal" value="{{ old('pi_subtotal', 0) }}" readonly>
                                            @error('pi_subtotal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón de Registro Único -->
        <div class="row mb-4">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-success px-4 font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-2"></i> REGISTRAR DATOS
                </button>
            </div>
        </div>
    </form>
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
    $(document).ready(function() {
        // Inicializar tooltips
        $('[data-toggle="tooltip"]').tooltip();

        // Cálculo de subtotales para el Pie Derecho
        function calcularSubtotalPD() {
            let subtotal = 0;
            $('.sum-pd').each(function() {
                let valor = parseFloat($(this).val());
                if (!isNaN(valor)) {
                    subtotal += valor;
                }
            });
            $('#pd_subtotal').val(subtotal);
        }

        // Cálculo de subtotales para el Pie Izquierdo
        function calcularSubtotalPI() {
            let subtotal = 0;
            $('.sum-pi').each(function() {
                let valor = parseFloat($(this).val());
                if (!isNaN(valor)) {
                    subtotal += valor;
                }
            });
            $('#pi_subtotal').val(subtotal);
        }

        // Eventos de entrada
        $(document).on('input change', '.sum-pd', calcularSubtotalPD);
        $(document).on('input change', '.sum-pi', calcularSubtotalPI);

        // Inicializar cálculos en carga
        calcularSubtotalPD();
        calcularSubtotalPI();

        // Confirmación para formularios de eliminación si aplica
        $('.form-eliminar').submit(function(e) {
            e.preventDefault();
            let form = this;

            Swal.fire({
                title: '¿Está seguro?',
                text: "El registro será eliminado del sistema.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@stop