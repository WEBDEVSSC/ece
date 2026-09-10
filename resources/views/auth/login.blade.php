@extends('adminlte::auth.login')

@section('title', 'Acceso al Expediente Clínico Electrónico')

@section('auth_header')
    <div class="text-center py-2">
        <div class="mb-3">
            <span class="d-inline-flex align-items-center justify-content-center bg-purple text-white rounded-circle shadow" style="width: 60px; height: 60px;">
                <i class="fas fa-hospital-user fa-2x"></i>
            </span>
        </div>
        <h3 class="font-weight-bold text-dark mb-1" style="font-size: 1.4rem; letter-spacing: -0.5px;">
            Expediente Clínico
        </h3>
        <p class="text-muted small mb-0">Sistema de Gestión Médica e Historial Clínico</p>
    </div>
@stop

@section('auth_body')
    <form action="{{ route('login') }}" method="POST" class="mt-2">
        @csrf

        {{-- Usuario / Email --}}
        <div class="form-group mb-3">
            <label for="email" class="font-weight-bold text-muted small text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                Usuario o Correo Institucional
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light border-right-0 text-muted">
                        <i class="fas fa-user-md"></i>
                    </span>
                </div>
                <input type="email" id="email" name="email" 
                       class="form-control bg-light border-left-0 @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}" 
                       placeholder="ejemplo@hospital.com" 
                       required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Contraseña --}}
        <div class="form-group mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="font-weight-bold text-muted small text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                    Contraseña
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-purple small mb-1">
                        ¿Olvidaste tu clave?
                    </a>
                @endif
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light border-right-0 text-muted">
                        <i class="fas fa-key"></i>
                    </span>
                </div>
                <input type="password" id="password" name="password" 
                       class="form-control bg-light border-left-0 @error('password') is-invalid @enderror" 
                       placeholder="••••••••" 
                       required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Controles Inferiores --}}
        <div class="row align-items-center mb-3">
            <div class="col-12 mb-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label text-muted small" for="remember">
                        Mantener sesión activa en este equipo
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-purple btn-block font-weight-bold py-2 shadow-sm text-white" style="border-radius: 6px;">
                    <i class="fas fa-lock-open mr-2"></i> INICIAR SESIÓN
                </button>
            </div>
        </div>
    </form>
@stop

@section('auth_footer')
    <div class="text-center pt-2 border-top">
        <span class="text-muted small">
            <i class="fas fa-shield-alt text-purple mr-1"></i> Conexión Cifrada y Segura
        </span>
    </div>
@stop

@section('css')
<style>
    /* Clases personalizadas de tono morado */
    .bg-purple {
        background-color: #6f42c1 !important;
    }
    
    .text-purple {
        color: #6f42c1 !important;
    }

    .btn-purple {
        background-color: #6f42c1 !important;
        border-color: #6f42c1 !important;
    }

    .btn-purple:hover {
        background-color: #59339d !important;
        border-color: #59339d !important;
    }

    /* Estilos globales y comportamiento de enfoque */
    body.login-page {
        background: linear-gradient(135deg, #f3f0f7 0%, #dadaf0 100%) !important;
    }
    
    .login-box {
        width: 420px;
    }

    .card {
        border-radius: 12px !important;
        border: none !important;
        box-shadow: 0 10px 25px rgba(111, 66, 193, 0.12) !important;
    }

    .card-header {
        border-bottom: none !important;
        background: transparent !important;
    }

    .input-group-text {
        border-radius: 6px 0 0 6px !important;
    }

    .form-control {
        border-radius: 0 6px 6px 0 !important;
        height: calc(2.5rem + 2px);
    }

    .form-control:focus {
        background-color: #fff !important;
        box-shadow: none;
        border-color: #6f42c1 !important;
    }

    .input-group:focus-within .input-group-text {
        background-color: #fff !important;
        border-color: #6f42c1 !important;
        color: #6f42c1 !important;
    }

    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #6f42c1 !important;
        border-color: #6f42c1 !important;
    }
</style>
@stop