<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Citas</title>

<style>
    body {
        font-family: DejaVu Sans, Arial, sans-serif;
        font-size: 9px;
        color: #333;
    }

    .header {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .header h1 {
        margin: 0;
        font-size: 16px;
    }

    .header p {
        margin: 2px;
    }

    .card {
        border: 1px solid #bfbfbf;
        border-radius: 6px;
        padding: 12px;
        margin-bottom: 20px;
    }

    .card-title {
        font-weight: bold;
        font-size: 13px;
        margin-bottom: 10px;
        border-bottom: 1px solid #bfbfbf;
        padding-bottom: 4px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .tabla-datos td {
        padding: 6px;
        border: 1px solid #ddd;
    }

    .tabla-citas th {
        background-color: #2c3e50;
        color: #fff;
        padding: 8px;
    }

    .tabla-citas td {
        border: 1px solid #ddd;
        padding: 7px;
        text-align: center;
    }

    .tabla-citas tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .sin-cita {
        color: #999;
        background-color: #f5f5f5;
    }

    .footer {
        margin-top: 20px;
        text-align: right;
        font-size: 10px;
    }
</style>

</head>

<body>

<!-- ENCABEZADO -->
<table style="width: 100%; border-bottom: 2px solid #000; margin-bottom: 20px;">
    <tr>

        <!-- LADO IZQUIERDO -->
        <td style="width: 60%; text-align: left; vertical-align: top;">

            <h1 style="margin: 0; font-size: 16px;">
                {{ $medico->clues?->nombre ?? 'UNIDAD MÉDICA' }}
            </h1>

            <p style="margin: 2px;">
                COAHUILA DE ZARAGOZA
            </p>

        </td>

        <!-- LADO DERECHO -->
        <td style="width: 40%; text-align: right; vertical-align: top;">

            <p style="margin: 2px;">
                <strong>REPORTE DE CITAS</strong>
            </p>

            <p style="margin: 2px;">
                Fecha: {{ $fecha }}
            </p>

        </td>

    </tr>
</table>


<!-- DATOS DEL MÉDICO -->
<div class="card">

    <div class="card-title">
        DATOS DEL MÉDICO
    </div>

    <table class="tabla-datos">

        <tr>

            <td>
                <strong>Nombre:</strong>
            </td>

            <td>
                {{ $medico->nombre_completo ?? $medico->name ?? 'N/A' }}
            </td>

            <td>
                <strong>Cédula:</strong>
            </td>

            <td>
                {{ $medico->personalUnidad?->cedula_profesional ?? 'N/A' }}
            </td>

        </tr>

        <tr>

            <td>
                <strong>Especialidad:</strong>
            </td>

            <td>
                {{ optional($medico->especialidad)->especialidad ?? 'N/A' }}
            </td>

            <td>
                <strong>Teléfono:</strong>
            </td>

            <td>
                {{ $medico->celular ?? 'N/A' }}
            </td>

        </tr>

        <tr>

            <td>
                <strong>Correo:</strong>
            </td>

            <td colspan="3">
                {{ $medico->email ?? 'N/A' }}
            </td>

        </tr>

    </table>

</div>


<!-- TABLA DE CITAS -->
<table class="tabla-citas">

    <thead>

        <tr>

            <th style="width: 12%;">
                Horario
            </th>

            <th style="width: 28%;">
                Paciente
            </th>

            <th style="width: 25%;">
                Diagnóstico
            </th>

            <th style="width: 20%;">
                Derechohabiencia
            </th>

            <th style="width: 15%;">
                Expediente
            </th>

        </tr>

    </thead>


    <tbody>

    @foreach ($horarios as $hora)

        @php
            $cita = $citasPorHora[$hora] ?? null;
        @endphp

        <tr>

            <!-- HORARIO -->
            <td>
                <strong>{{ $hora }}</strong>
            </td>


            @if ($cita)

                @php
                    $paciente = $cita->paciente;
                @endphp

                <!-- PACIENTE -->
                <td style="text-align: left;">

                    {{ $paciente->nombre_completo ?? 'N/A' }}

                </td>


                <!-- DIAGNÓSTICO -->
                <td style="text-align: left;">

                    {{ optional($paciente->diagnosticoMedico)->nombre ?? 'N/A' }}

                </td>


                <!-- DERECHOHABIENCIA -->
                <td>

                    {{ optional($paciente->derechohabiencia)->descripcion ?? 'N/A' }}

                </td>


                <!-- EXPEDIENTE -->
                <td>

                    {{ $paciente->no_expediente ?? 'N/A' }}

                </td>


            @else

                <!-- SIN CITA -->
                <td colspan="4" class="sin-cita">

                    SIN CITA

                </td>

            @endif

        </tr>

    @endforeach

    </tbody>

</table>


<!-- FOOTER -->
<div class="footer">

    Generado el
    {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}

</div>

</body>
</html>
