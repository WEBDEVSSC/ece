<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agenda de Citas - UNEMES</title>
  <style>
    @page {
      size: letter landscape;
      margin: 8mm;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #000;
      background-color: #fff;
    }

    /* Encabezado con tablas para compatibilidad con DomPDF */
    .header-table, .date-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }

    .header-table td, .date-table td {
      border: none;
      padding: 0;
      vertical-align: top;
    }

    .logo-title {
      font-weight: bold;
      font-size: 16px;
      line-height: 1.1;
      text-align: right;
    }

    .logo-subtitle {
      font-size: 10px;
      color: #555;
      text-align: right;
    }

    .unemes-tag {
      border: 1px solid #000;
      padding: 3px 6px;
      text-align: center;
      font-weight: bold;
      font-size: 11px;
      margin-top: 4px;
      display: inline-block;
    }

    .date-table {
      font-weight: bold;
      font-size: 13px;
      margin-bottom: 12px;
    }

    .fecha-field {
      border-bottom: 1px solid #000;
      padding-bottom: 2px;
      display: inline-block;
      min-width: 180px;
    }

    /* Tabla Principal de Datos */
    table.main-table {
      width: 100%;
      border-collapse: collapse;
      table-layout: fixed;
    }

    table.main-table th, table.main-table td {
      border: 1px solid #000;
      text-align: center;
      vertical-align: middle;
      font-size: 9px;
      padding: 2px 1px;
      word-wrap: break-word;
    }

    table.main-table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    /* Anchos proporcionales de columnas */
    .col-hora { width: 6%; }
    .col-nombre { width: 22%; }
    .col-fecha-nac { width: 11%; }
    .col-exp { width: 6%; }
    .col-tel { width: 9%; }
    .col-area { width: 5%; }

    .row-schedule {
      height: 32px;
    }

    .sub-label {
      font-size: 7px;
      display: block;
      font-weight: normal;
    }
  </style>
</head>
<body>

  <!-- Encabezado con Logos -->
  <table class="header-table">
    <tr>
      <td>
        <i style="font-size: 10px;">Socios por la prevención.</i>
      </td>
      <td style="text-align: right;">
        <div class="logo-title">Gobierno de<br>Coahuila</div>
        <div class="logo-subtitle">Una nueva forma de Gobernar</div>
        <div class="unemes-tag">
          UNEMES<br>
          <span style="font-size: 8px; font-weight: normal;">ENFERMEDADES CRÓNICAS</span>
        </div>
      </td>
    </tr>
  </table>

  <!-- Fila de Fecha y Mes/Año -->
  <table class="date-table">
    <tr>
      <td style="text-align: left;">
        FECHA: <span class="fecha-field">{{ $fecha }}</span>
      </td>
      <td style="text-align: right; font-size: 16px;">
        {{ $mesAnio }}
      </td>
    </tr>
  </table>

  <!-- Tabla de Citas -->
  <table class="main-table">
    <thead>
      <tr>
        <th class="col-hora">HORA</th>
        <th class="col-nombre">NOMBRE</th>
        <th class="col-fecha-nac">FECHA DE<br>NACIMIENTO/<br>EDAD</th>
        <th class="col-exp"># EXP</th>
        <th class="col-tel">TELÉFONO</th>
        <th class="col-area">TS</th>
        <th class="col-area">ENF</th>
        <th class="col-area">MED</th>
        <th class="col-area">NUT</th>
        <th class="col-area">PSIC</th>
        <th class="col-area">ACT<br>FÍSICA</th>
        <th class="col-area">1°<br>VEZ</th>
        <th class="col-area">SUB</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($agenda as $hora => $item)
        @php
          $cita = $item['cita'];
        @endphp
        <tr class="row-schedule">
          <td>
            <strong>{{ $hora }}</strong>
            @if(!empty($item['etiqueta']))
              <span class="sub-label">{{ $item['etiqueta'] }}</span>
            @endif
          </td>
          <!-- Datos del paciente traídos del modelo CitaConsultaExterna -->
          <td>{{ $cita->nombre_paciente ?? ($cita->paciente->nombre_completo ?? '') }}</td>
          <td>{{ $cita->fecha_nacimiento_edad ?? ($cita->paciente->fecha_nacimiento ?? '') }}</td>
          <td>{{ $cita->expediente ?? ($cita->paciente->no_expediente ?? '') }}</td>
          <td>{{ $cita->telefono ?? ($cita->paciente->celular ?? '') }}</td>
          
          <!-- Secciones/Especialidades (ajusta a las columnas de tu BD) -->
          <td>{{ $cita->ts ?? '' }}</td>
          <td>{{ $cita->enf ?? '' }}</td>
          <td>{{ $cita->med ?? '' }}</td>
          <td>{{ $cita->nut ?? '' }}</td>
          <td>{{ $cita->psic ?? '' }}</td>
          <td>{{ $cita->act_fisica ?? '' }}</td>
          <td>{{ isset($cita->es_primera_vez) && $cita->es_primera_vez ? 'X' : '' }}</td>
          <td>{{ isset($cita->es_sub) && $cita->es_sub ? 'X' : '' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div style="margin-top: 10px; font-weight: bold; font-size: 11px;">
    TOTAL DE CITAS: {{ $totalCitas }}
</div>

</body>
</html>