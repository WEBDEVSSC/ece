
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1><strong>Médicos</strong> <small class="text-muted">Vacaciones</small></h1>
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

<div class="row">
    <div class="col-12">
        <div class="card card-info card-outline shadow-sm">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-md text-info mr-2"></i>
                    Médico seleccionado
                </h3>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    

                    <div class="col-md-11">
                        <h4 class="mb-1 font-weight-bold">
                            {{ $medico->nombre_completo }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('createMedicosVacacion',$medico->id) }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> NUEVO REGISTRO</a>
    </div>
    <div class="card-body">

        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="80">#</th>
                        <th>Fecha</th>
                        <th>Concepto</th>
                        <th width="120" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicoVacaciones as $vacacion)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($vacacion->fecha)->format('d/m/Y') }}</td>
                            <td>{{ $vacacion->concepto }}</td>
                            <td class="text-center">
                            
                                <form action="{{ route('deleteMedicosVacacion', $vacacion->id) }}" method="POST" class="d-inline formulario-eliminar">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="ELIMINAR">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                <i class="fas fa-calendar-times fa-2x mb-2"></i><br>
                                No hay vacaciones registradas para este médico.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="card-footer"></div>
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
        document.addEventListener('DOMContentLoaded', function () {

            $('.formulario-eliminar').submit(function(e) {
                e.preventDefault();

                const form = this;

                Swal.fire({
                    title: '¿Eliminar registro?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fas fa-trash"></i> Sí, eliminar',
                    cancelButtonText: '<i class="fas fa-times"></i> Cancelar',
                    reverseButtons: true,
                    focusCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

        });
    </script>
@stop