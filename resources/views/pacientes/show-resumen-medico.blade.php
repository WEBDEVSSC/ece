<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        /* ==========================================================
           RESET & CONFIGURACIÓN BASE (DomPDF Optimized)
           ========================================================== */
        @page {
            margin: 25px 30px;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 8.5pt;
            color: #1e293b;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        /* ==========================================================
           ENCABEZADO MODERN SAAS / BRANDING
           ========================================================== */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 12px;
        }

        .header-table td {
            vertical-align: middle;
        }

        .brand-title {
            font-size: 14pt;
            font-weight: bold;
            color: #0f172a; /* Slate 900 */
            letter-spacing: -0.3px;
            margin: 0;
            text-transform: uppercase;
        }

        .brand-subtitle {
            font-size: 7.5pt;
            color: #0d9488; /* Teal 600 */
            font-weight: bold;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-top: 3px;
        }

        .doc-meta {
            text-align: right;
            font-size: 7.5pt;
            color: #64748b;
            line-height: 1.4;
        }

        .doc-meta strong {
            color: #0f172a;
        }

        /* ==========================================================
           TÍTULOS DE SECCIÓN
           ========================================================== */
        .section-header {
            margin-top: 16px;
            margin-bottom: 10px;
            padding-bottom: 4px;
            border-bottom: 2px solid #0d9488;
        }

        .section-title {
            font-size: 8.5pt;
            font-weight: bold;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* ==========================================================
           REJILLA DE DATOS
           ========================================================== */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-bottom: 12px;
        }

        .data-table td {
            padding: 6px 8px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: top;
            word-wrap: break-word;
        }

        .label {
            font-size: 6.5pt;
            font-weight: bold;
            color: #64748b; /* Slate 500 */
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
        }

        .value {
            font-size: 8.5pt;
            color: #334155; /* Slate 700 */
            line-height: 1.25;
            font-weight: 500;
        }

        .value-bold {
            font-weight: bold;
            color: #0f172a; /* Slate 900 */
        }

        /* Tarjeta de Expediente Estilo Badge */
        .expediente-card {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            border-left: 3px solid #0d9488;
            padding: 6px 10px;
            text-align: center;
        }

        .expediente-card .label {
            color: #0d9488;
            margin-bottom: 1px;
        }

        .expediente-card .value {
            font-size: 10pt;
            font-weight: bold;
            color: #0f172a;
        }

        /* ==========================================================
           CAJAS DE ALERGIAS Y ADVERTENCIAS
           ========================================================== */
        .allergy-box {
            background-color: #fff1f2;
            border: 1px solid #fecdd3;
            border-left: 4px solid #e11d48;
            padding: 8px 12px;
            margin-bottom: 18px;
        }

        .allergy-box-title {
            font-size: 7pt;
            font-weight: bold;
            color: #e11d48;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 2px;
        }

        .allergy-box-content {
            font-size: 8.5pt;
            color: #9f1239;
            font-weight: bold;
        }

        .no-allergy-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #94a3b8;
            padding: 8px 12px;
            margin-bottom: 18px;
        }

        .no-allergy-box-title {
            font-size: 7pt;
            font-weight: bold;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 2px;
        }

        .no-allergy-box-content {
            font-size: 8pt;
            color: #475569;
        }

        /* ==========================================================
           TABLA DE HISTORIAL / CITAS SAAS
           ========================================================== */
        .history-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-bottom: 18px;
        }

        .history-table th {
            background-color: #0f172a; /* Slate Dark */
            color: #ffffff;
            font-size: 7pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 7px 10px;
            text-align: left;
        }

        .history-table td {
            padding: 7px 10px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 8pt;
            color: #334155;
            vertical-align: middle;
        }

        .history-table tr:nth-child(even) td {
            background-color: #f8fafc;
        }

        /* Badges de Estatus */
        .status-badge {
            display: inline-block;
            padding: 2px 7px;
            font-size: 6.5pt;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #f1f5f9;
            color: #0f172a;
            border: 1px solid #cbd5e1;
            letter-spacing: 0.4px;
        }

        /* ==========================================================
           PIE DE PÁGINA
           ========================================================== */
        .footer-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
        }

        .footer-text {
            font-size: 6.5pt;
            color: #94a3b8;
        }

        .footer-stamp {
            text-align: right;
            font-size: 7pt;
            color: #0d9488;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body>

    <!-- ENCABEZADO SAAS -->
    <table class="header-table">
        <tr>
            <td width="10%">
                {{-- <img src="{{ public_path('img/logo.png') }}" style="width: 48px; height: auto;"> --}}
            </td>
            <td width="62%">
                <h1 class="brand-title">Expediente Médico Resumido</h1>
                <div class="brand-subtitle">Expediente Clínico Electrónico &bull; S.S. Coahuila</div>
            </td>
            <td width="28%" class="doc-meta">
                <strong>Fecha de Emisión:</strong> {{ now()->format('d/m/Y') }}<br>
                <strong>Documento:</strong> Resumen Clínico
            </td>
        </tr>
    </table>

    <!-- SECCIÓN 1: DATOS DEL PACIENTE -->
    <div class="section-header">
        <span class="section-title">I. Datos Identificativos del Paciente</span>
    </div>

    <table class="data-table">
        <!-- Fila 1: Nombre completo y tarjeta de expediente -->
        <tr>
            <td colspan="3" width="75%">
                <div class="label">Nombre Completo del Paciente</div>
                <div class="value value-bold" style="font-size: 10.5pt; color: #0f172a;">{{ $paciente->nombre_completo }}</div>
            </td>
            <td width="25%">
                <div class="expediente-card">
                    <div class="label">No. Expediente</div>
                    <div class="value">{{ $paciente->no_expediente }}</div>
                </div>
            </td>
        </tr>

        <!-- Fila 2: CURP, Nacimiento, Edad, Sexo -->
        <tr>
            <td width="30%">
                <div class="label">CURP</div>
                <div class="value value-bold">{{ $paciente->curp }}</div>
            </td>
            <td width="25%">
                <div class="label">Fecha de Nacimiento</div>
                <div class="value">{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}</div>
            </td>
            <td width="20%">
                <div class="label">Edad</div>
                <div class="value">{{ $edad }} años</div>
            </td>
            <td width="25%">
                <div class="label">Sexo</div>
                <div class="value">{{ $paciente->sexo == 'H' ? 'Masculino' : 'Femenino' }}</div>
            </td>
        </tr>

        <!-- Fila 3: Derechohabiencia, Escolaridad, Estado Civil y Contacto en UNA SOLA FILA -->
        <tr>
            <td width="25%">
                <div class="label">Derechohabiencia</div>
                <div class="value">{{ $paciente->derechohabiencia->derechohabiencia ?? 'Sin Registro' }}</div>
            </td>
            <td width="20%">
                <div class="label">Escolaridad</div>
                <div class="value">{{ $paciente->escolaridad->escolaridad ?? 'N/E' }}</div>
            </td>
            <td width="20%">
                <div class="label">Estado Civil</div>
                <div class="value">{{ $paciente->estadoCivil->estado_civil ?? 'No Especificado' }}</div>
            </td>
            <td width="35%">
                <div class="label">Contacto</div>
                <div class="value">
                    @if($paciente->celular || $paciente->email)
                        {{ $paciente->celular ?? 'Sin tel.' }} <br> <span style="font-size: 7.5pt; color: #64748b;">{{ $paciente->email ?? '' }}</span>
                    @else
                        Sin datos
                    @endif
                </div>
            </td>
        </tr>

        <!-- Fila 4: CLUES -->
        <tr>
            <td colspan="4">
                <div class="label">CLUES / Unidad Médica</div>
                <div class="value">{{ $paciente->clues->clues_nombre ?? 'N/E' }}</div>
            </td>
        </tr>

        <!-- Fila 5: Diagnóstico Principal -->
        <tr>
            <td colspan="4" style="border-bottom: none; padding-top: 8px;">
                <div class="label">Diagnóstico Médico Principal</div>
                <div class="value value-bold" style="color: #0d9488;">{{ $paciente->diagnosticoMedico->clave_nombre ?? 'Sin diagnóstico registrado' }}</div>
            </td>
        </tr>
    </table>

    <!-- ALERGIAS -->
    @if($paciente->alergias)
        <div class="allergy-box">
            <div class="allergy-box-title">[!] Alergias y Contraindicaciones Importantes</div>
            <div class="allergy-box-content">{{ $paciente->alergias }}</div>
        </div>
    @else
        <div class="no-allergy-box">
            <div class="no-allergy-box-title">Alergias y Contraindicaciones</div>
            <div class="no-allergy-box-content">Sin alergias registradas en el expediente del paciente.</div>
        </div>
    @endif

    <!-- SECCIÓN 2: HISTORIAL DE CITAS -->
    <div class="section-header">
        <span class="section-title">II. Registro de Citas Médicas</span>
    </div>

    <table class="history-table">
        <thead>
            <tr>
                <th width="15%" align="center">Fecha</th>
                <th width="12%" align="center">Hora</th>
                <th width="53%">Médico Tratante</th>
                <th width="20%" align="center">Estatus</th>
            </tr>
        </thead>
        <tbody>
            @forelse($citasProgramadas as $cita)
                <tr>
                    <td align="center">
                        <strong>{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</strong>
                    </td>
                    <td align="center">{{ $cita->hora }}</td>
                    <td>{{ $cita->medico->nombre_completo ?? 'Médico No Asignado' }}</td>
                    <td align="center">
                        <span class="status-badge">{{ $cita->status }}</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center" style="padding: 14px; color: #64748b; font-style: italic;">
                        No existen registros de citas asociadas a este expediente.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- PIE DE PÁGINA -->
    <table class="footer-table">
        <tr>
            <td class="footer-text">
                Documento de carácter confidencial generado automáticamente por el Sistema de Consulta Externa.
            </td>
            <td class="footer-stamp">
                Expediente Verificado
            </td>
        </tr>
    </table>

</body>
</html>