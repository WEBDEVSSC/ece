
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Valoración Podológica</strong> <small class="text-muted">Nuevo Registro</small></h1>
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

<form action="{{ route('UnemeEnfermeriaValoracionPodologicaStore',$citaId->id); }}" method="POST">

@csrf

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><strong>PIE DERECHO</strong></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50%"><strong>Hiperqueratosis</strong></th>
                            <th><strong>Calificación</strong></th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <tr>
                            <td>a) Plantar</td>
                            <td>
                                <input type="text" class="form-control" name="pd_plantar" value="{{ old('pd_plantar') }}">
                                @error('pd_plantar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>b) Dorsal</td>
                            <td>
                                <input type="text" class="form-control" name="pd_dorsal" value="{{ old('pd_dorsal') }}">
                                @error('pd_dorsal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>c) Talar</td>
                            <td>
                                <input type="text" class="form-control" name="pd_talar" value="{{ old('pd_talar') }}">
                                @error('pd_talar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Subtotal</td>
                            <td>
                                <input type="text" class="form-control" name="pd_subtotal" value="{{ old('pd_subtotal') }}">
                                @error('pd_subtotal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50%"><strong>Alteraciones ungueales</strong></th>
                            <th><strong>Calificación</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>d) Onicogrifosis</td>
                            <td>
                                <input type="text" class="form-control" name="pc_onicogrifosis" value="{{ old('pd_onicogrifosis') }}">
                                @error('pc_onicogrifosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>e) Onicomicosis</td>
                            <td>
                                <input type="text" class="form-control" name="pd_onicomicosis" value="{{ old('pd_onicomicosis') }}">
                                @error('pd_onicomicosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>f) Onicocriptosis</td>
                            <td>
                                <input type="text" class="form-control" name="pd_onicocriptosis" value="{{ old('pd_onicocriptosis') }}">
                                @error('pd_onicocriptosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50%"><strong>Otras localizadas</strong></th>
                            <th><strong>Calificación</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>g) Bullosis</td>
                            <td>
                                <input type="text" class="form-control" name="pd_bullosis" value="{{ old('pd_bullosis') }}">
                                @error('pd_bullosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>h) Úlcera</td>
                            <td>
                                <input type="text" class="form-control" name="pd_ulcera" value="{{ old('pd_ulcera') }}">
                                @error('pd_ulcera')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>i) Necrosis</td>
                            <td>
                                <input type="text" class="form-control" name="pd_necrosis" value="{{ old('pd_necrosis') }}">
                                @error('pd_necrosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>j) Grietas y fisuras</td>
                            <td>
                                <input type="text" class="form-control" name="pd_grietas_fisuras" value="{{ old('pd_grietas_fisuras') }}">
                                @error('pd_grietas_fisuras')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>k) Lesiones superficiales</td>
                            <td>
                                <input type="text" class="form-control" name="pd_lesiones_superficiales" value="{{ old('pd_lesiones_superficiales') }}">
                                @error('pd_lesiones_superficiales')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>l) Otras</td>
                            <td>
                                <input type="text" class="form-control" name="pd_otras" value="{{ old('pd_otras') }}">
                                @error('pd_otras')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Anhidrosis</td>
                            <td>
                                <input type="text" class="form-control" name="pd_anhidrosis" value="{{ old('pd_anhidrosis') }}">
                                @error('pd_anhidrosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Tiñas</td>
                            <td>
                                <input type="text" class="form-control" name="pd_tinas" value="{{ old('pd_tinas') }}">
                                @error('pd_tinas')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Proceso infeccioso</td>
                            <td>
                                <input type="text" class="form-control" name="pd_proceso_infeccioso" value="{{ old('pd_proceso_infeccioso') }}">
                                @error('pd_proceso_infeccioso')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Subtotal</strong></td>
                            <td>
                                <input type="text" class="form-control" name="pd_subtotal_otras_localizadas" value="{{ old('pd_subtotal_otras_localizadas') }}">
                                @error('pd_subtotal_otras_localizadas')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><strong>PIE IZQUIERDO</strong></div>
            <div class="card-body">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50%"><strong>Hiperqueratosis</strong></th>
                            <th><strong>Calificación</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a) Plantar</td>
                            <td>
                                <input type="text" class="form-control" name="pi_plantar" value="{{ old('pi_plantar') }}">
                                @error('pi_plantar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>b) Dorsal</td>
                            <td>
                                <input type="text" class="form-control" name="pi_dorsal" value="{{ old('pi_dorsal') }}">
                                @error('pi_dorsal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>c) Talar</td>
                            <td>
                                <input type="text" class="form-control" name="pi_talar" value="{{ old('pi_talar') }}">
                                @error('pi_talar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Subtotal</td>
                            <td>
                                <input type="text" class="form-control" name="pi_subtotal" value="{{ old('pi_subtotal') }}">
                                @error('pi_subtotal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50%"><strong>Alteraciones ungueales</strong></th>
                            <th><strong>Calificación</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>d) Onicogrifosis</td>
                            <td>
                                <input type="text" class="form-control" name="pi_onicogrifosis" value="{{ old('pi_onicogrifosis') }}">
                                @error('pi_onicogrifosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>e) Onicomicosis</td>
                            <td>
                                <input type="text" class="form-control" name="pi_onicomicosis" value="{{ old('pi_onicomicosis') }}">
                                @error('pi_onicomicosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>f) Onicocriptosis</td>
                            <td>
                                <input type="text" class="form-control" name="pi_onicocriptosis" value="{{ old('pi_onicocriptosis') }}">
                                @error('pi_onicocriptosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="50%"><strong>Otras localizadas</strong></th>
                            <th><strong>Calificación</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>g) Bullosis</td>
                            <td>
                                <input type="text" class="form-control" name="pi_bullosis" value="{{ old('pi_bullosis') }}">
                                @error('pi_bullosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>h) Úlcera</td>
                            <td>
                                <input type="text" class="form-control" name="pi_ulcera" value="{{ old('pi_ulcera') }}">
                                @error('pi_ulcera')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>i) Necrosis</td>
                            <td>
                                <input type="text" class="form-control" name="pi_necrosis" value="{{ old('pi_necrosis') }}">
                                @error('pi_necrosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>j) Grietas y fisuras</td>
                            <td>
                                <input type="text" class="form-control" name="pi_grietas_fisuras" value="{{ old('pi_grietas_fisuras') }}">
                                @error('pi_grietas_fisuras')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>k) Lesiones superficiales</td>
                            <td>
                                <input type="text" class="form-control" name="pi_lesiones_superficiales" value="{{ old('pi_lesiones_superficiales') }}">
                                @error('pi_lesiones_superficiales')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>l) Otras</td>
                            <td>
                                <input type="text" class="form-control" name="pi_otras" value="{{ old('pi_otras') }}">
                                @error('pi_otras')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Anhidrosis</td>
                            <td>
                                <input type="text" class="form-control" name="pi_anhidrosis" value="{{ old('pi_anhidrosis') }}">
                                @error('pi_anhidrosis')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Tiñas</td>
                            <td>
                                <input type="text" class="form-control" name="pi_tinas" value="{{ old('pi_tinas') }}">
                                @error('pi_tinas')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Proceso infeccioso</td>
                            <td>
                                <input type="text" class="form-control" name="pi_proceso_infeccioso" value="{{ old('pi_proceso_infeccioso') }}">
                                @error('pi_proceso_infeccioso')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Subtotal</strong></td>
                            <td>
                                <input type="text" class="form-control" name="pi_subtotal_otras_localizadas" value="{{ old('pi_subtotal_otras_localizadas') }}">
                                @error('pi_subtotal_otras_localizadas')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-save mr-1"></i> REGISTRAR DATOS
                </button>
            </div>
        </div>
    </div>
</div>
    
@stop

@include('layouts.footer')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        $(function () {

            $('[data-toggle="tooltip"]').tooltip();

            $('.form-eliminar').submit(function(e){

                e.preventDefault();

                let form = this;

                Swal.fire({
                    title: '¿Está seguro?',
                    text: "El médico será eliminado del sistema.",
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