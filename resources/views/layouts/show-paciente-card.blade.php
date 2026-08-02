{{-- resources/views/components/card-paciente.blade.php --}}
@props(['citaId'])

@php
    $fechaNacimiento = $citaId->paciente->fecha_nacimiento ?? null;
    $edad = $fechaNacimiento ? \Carbon\Carbon::parse($fechaNacimiento)->age : null;
@endphp

<!-- Tarjeta de Información del Paciente -->
<div class="card card-outline card-info shadow-sm border-0 mb-4">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h3 class="card-title text-bold text-dark mb-0" style="font-size: 1.1rem;">
            <i class="fas fa-user-injured text-info mr-2"></i>
            Datos del Paciente
        </h3>
        <span class="badge badge-light border text-muted px-2 py-1">
            Expediente: <strong class="text-dark">{{ $citaId->paciente->no_expediente ?? 'N/E' }}</strong>
        </span>
    </div>
    <div class="card-body bg-light">
        <div class="row align-items-center">
            <!-- Nombre y Datos Rápidos -->
            <div class="col-md-5 border-right">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-white shadow-sm d-flex align-items-center justify-content-center mr-3 text-info font-weight-bold" style="width: 50px; height: 50px; font-size: 1.2rem;">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5 class="font-weight-bold text-dark mb-1">
                            {{ $citaId->paciente->nombre ?? 'N/A' }} {{ $citaId->paciente->apellido_paterno ?? '' }} {{ $citaId->paciente->apellido_materno ?? '' }}
                        </h5>
                        <span class="badge badge-info">
                            DX : {{ $citaId->paciente->diagnosticoMedico->nombre ?? 'No especificado' }}
                        </span>
                        <span class="badge badge-secondary ml-1">
                            {{ $edad !== null ? $edad . ' Años' : '--' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Detalle de Cita y Documento -->
            <div class="col-md-7 mt-3 mt-md-0">
                <div class="row text-center text-md-left">
                    <div class="col-sm-4 border-right">
                        <small class="text-muted text-uppercase d-block font-weight-bold style-label">DNI / CURP</small>
                        <span class="font-weight-bold text-dark">{{ $citaId->paciente->curp ?? 'Sin registro' }}</span>
                    </div>
                    <div class="col-sm-4 border-right">
                        <small class="text-muted text-uppercase d-block font-weight-bold style-label">Fecha Nacimiento</small>
                        <span class="font-weight-bold text-dark">
                            {{ $fechaNacimiento ? \Carbon\Carbon::parse($fechaNacimiento)->format('d/m/Y') : 'N/A' }}
                        </span>
                    </div>
                    <div class="col-sm-4">
                        <small class="text-muted text-uppercase d-block font-weight-bold style-label">Teléfono</small>
                        <span class="font-weight-bold text-dark">{{ $citaId->paciente->celular ?? 'Sin teléfono' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>