@extends('adminlte::page')

@section('title', 'Examen de Estructura Ósea')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2 align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark font-weight-bold" style="font-size: 1.6rem;">
                    Examen Vascular
                </h1>
                <p class="text-muted small mb-0">Nuevo registro de examen vascular</p>
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

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <h5><i class="icon fas fa-ban"></i> Se encontraron los siguientes errores:</h5>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="container-fluid">

    @include('layouts.show-paciente-card', ['citaId' => $citaId])

    <!-- Formulario de Evaluación Ósea -->
    <form action="{{ route('UnemeEnfermeriaExamenVascularStore', $citaId->id) }}" method="POST">
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
                                        <th width="60%">Sistema arterial</th>
                                        <th width="20%"></th>
                                        <th width="20%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Pulso pedio _____ por min</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_pulso_pedio" value="{{ old('pd_pulso_pedio', 0) }}">
                                            @error('pd_pulso_pedio')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_pulso_pedio_calificacion" value="{{ old('pd_pulso_pedio_calificacion', 0) }}">
                                            @error('pd_pulso_pedio_calificacion')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Llenado capilar _____ seg</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_llenado_capilar" value="{{ old('pd_llenado_capilar', 0) }}">
                                            @error('pd_llenado_capilar')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_llenado_capilar_calificacion" value="{{ old('pd_llenado_capilar_calificacion', 0) }}">
                                            @error('pd_llenado_capilar_calificacion')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td></td>
                                        <td class="align-middle text-right">Subtotal</td>                                        
                                        <td>
                                            <input type="number" class="form-control form-control-sm font-weight-bold" id="pd_sistema_arterial_subtotal" name="pd_sistema_arterial_subtotal" value="{{ old('pd_sistema_arterial_subtotal', 0) }}" readonly>
                                            @error('pd_sistema_arterial_subtotal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_varices" value="{{ old('pd_varices', 0) }}">
                                            @error('pd_varices')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Edema</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pd_edema" value="{{ old('pd_edema', 0) }}">
                                            @error('pd_edema')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>                                        
                                        <td>
                                            <input type="number" class="form-control form-control-sm font-weight-bold" id="pd_sistema_venoso_subtotal" name="pd_sistema_venoso_subtotal" value="{{ old('pd_sistema_venoso_subtotal', 0) }}" readonly>
                                            @error('pd_sistema_venoso_subtotal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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
                                        <th width="60%">Sistema arterial</th>
                                        <th width="20%"></th>
                                        <th width="20%">Calificación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Pulso pedio _____ por min</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pi_pulso_pedio" value="{{ old('pi_pulso_pedio', 0) }}">
                                            @error('pi_pulso_pedio')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pi_pulso_pedio_calificacion" value="{{ old('pi_pulso_pedio_calificacion', 0) }}">
                                            @error('pi_pulso_pedio_calificacion')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Llenado capilar _____ seg</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pi_llenado_capilar" value="{{ old('pi_llenado_capilar', 0) }}">
                                            @error('pi_llenado_capilar')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pi_llenado_capilar_calificacion" value="{{ old('pi_llenado_capilar_calificacion', 0) }}">
                                            @error('pi_llenado_capilar_calificacion')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td></td>
                                        <td class="align-middle text-right">Subtotal</td>                                        
                                        <td>
                                            <input type="number" class="form-control form-control-sm font-weight-bold" id="pi_sistema_arterial_subtotal" name="pi_sistema_arterial_subtotal" value="{{ old('pi_sistema_arterial_subtotal', 0) }}" readonly>
                                            @error('pi_sistema_arterial_subtotal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pi_varices" value="{{ old('pi_varices', 0) }}">
                                            @error('pi_varices')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Edema</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm sum-pd" name="pi_edema" value="{{ old('pi_edema', 0) }}">
                                            @error('pi_edema')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                        </td>
                                    </tr>
                                    <tr class="bg-light font-weight-bold">
                                        <td class="align-middle text-right">Subtotal</td>                                        
                                        <td>
                                            <input type="number" class="form-control form-control-sm font-weight-bold" id="pi_sistema_venoso_subtotal" name="pi_sistema_venoso_subtotal" value="{{ old('pi_sistema_venoso_subtotal', 0) }}" readonly>
                                            @error('pi_sistema_venoso_subtotal')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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
document.addEventListener('DOMContentLoaded', function () {

    const pulso = document.querySelector('[name="pd_pulso_pedio_calificacion"]');
    const llenado = document.querySelector('[name="pd_llenado_capilar_calificacion"]');
    const subtotal = document.getElementById('pd_sistema_arterial_subtotal');

    function calcularSistemaArterial() {
        const total =
            (parseFloat(pulso.value) || 0) +
            (parseFloat(llenado.value) || 0);

        subtotal.value = total;
    }

    pulso.addEventListener('input', calcularSistemaArterial);
    llenado.addEventListener('input', calcularSistemaArterial);

    calcularSistemaArterial();

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const pulsoCalificacion = document.querySelector('[name="pi_pulso_pedio_calificacion"]');
    const llenadoCalificacion = document.querySelector('[name="pi_llenado_capilar_calificacion"]');
    const subtotal = document.getElementById('pi_sistema_arterial_subtotal');

    function calcularSistemaArterialPI() {
        const total =
            (parseFloat(pulsoCalificacion.value) || 0) +
            (parseFloat(llenadoCalificacion.value) || 0);

        subtotal.value = total;
    }

    pulsoCalificacion.addEventListener('input', calcularSistemaArterialPI);
    llenadoCalificacion.addEventListener('input', calcularSistemaArterialPI);

    // Calcular al cargar la página
    calcularSistemaArterialPI();

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const varices = document.querySelector('[name="pd_varices"]');
    const edema = document.querySelector('[name="pd_edema"]');
    const subtotal = document.getElementById('pd_sistema_venoso_subtotal');

    function calcularSistemaVenosoPD() {
        const total =
            (parseFloat(varices.value) || 0) +
            (parseFloat(edema.value) || 0);

        subtotal.value = total;
    }

    varices.addEventListener('input', calcularSistemaVenosoPD);
    edema.addEventListener('input', calcularSistemaVenosoPD);

    // Calcular al cargar la página
    calcularSistemaVenosoPD();

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const varices = document.querySelector('[name="pi_varices"]');
    const edema = document.querySelector('[name="pi_edema"]');
    const subtotal = document.getElementById('pi_sistema_venoso_subtotal');

    function calcularSistemaVenosoPI() {
        const total =
            (parseFloat(varices.value) || 0) +
            (parseFloat(edema.value) || 0);

        subtotal.value = total;
    }

    varices.addEventListener('input', calcularSistemaVenosoPI);
    edema.addEventListener('input', calcularSistemaVenosoPI);

    // Calcular al cargar la página
    calcularSistemaVenosoPI();

});
</script>
@stop