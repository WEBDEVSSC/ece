<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Clínico de Enfermería - Consulta de 1ra Vez</title>
    <style>
        /* Estilos globales y para impresión */
        @page {
            size: letter portrait;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8.5pt;
            color: #000;
            background-color: #fff;
            margin: 0;
            padding: 5mm; /* Margen de 5 mm en los cuatro lados */
        }

        .page {
            background: #fff;
            padding: 0;
            margin: 0 auto;
            width: 100%;
            max-width: 100%;
            border: 1px solid #000; /* Borde pequeño alrededor del marco */
            box-shadow: none;
            page-break-after: always;
        }

        .page:last-child {
            page-break-after: avoid;
        }

        /* Estilos de Tablas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid #000;
            padding: 3px 4px;
            vertical-align: middle;
            word-wrap: break-word;
        }

        .header-title {
            text-align: center;
            font-weight: bold;
            font-size: 11pt;
            background-color: #e6e6e6;
            padding: 6px;
            border: 1px solid #000;
            margin-bottom: 0;
            text-transform: uppercase;
        }

        .section-header {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            font-size: 8pt;
        }

        .sub-header {
            background-color: #f9f9f9;
            font-weight: bold;
            text-align: center;
        }

        .label {
            font-weight: bold;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-normal { font-weight: normal; }

        /* Ajustes específicos para impresión */
        @media print {
            body {
                background: none;
                padding: 5mm; /* Se respeta el margen de 5 mm al imprimir */
                margin: 0;
            }
            .page {
                box-shadow: none;
                width: 100%;
                max-width: 100%;
                padding: 0;
                margin: 0;
                border: 1px solid #000;
            }
            .no-print {
                display: none !important;
            }
        }

        /* Botón de Impresión */
        .btn-print {
            display: block;
            width: 200px;
            margin: 10px auto;
            padding: 10px;
            background-color: #0056b3;
            color: #fff;
            text-align: center;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-print:hover {
            background-color: #003d80;
        }
    </style>
</head>
<body>

    <!-- PÁGINA 1: REGISTRO CLÍNICO DE ENFERMERÍA -->
    <div class="page">
        <div class="header-title">
            Registro Clínico de Enfermería (Consulta de 1ra Vez)
        </div>

        <!-- 1 - 7: Datos Generales -->
        <table>
            <tr>
                <td colspan="14"><span class="label">1/ Nombre completo: </span><br>{{ $citaId->paciente->nombre_completo }}</td>
                <td colspan="10"><span class="label">2/ No. Expediente: </span><br>{{ $citaId->paciente->no_expediente }}</td>
            </tr>
            <tr>
                <td colspan="6">
                    <span class="label">3/ Sexo:</span><br>
                    [{!! $citaId->paciente->sexo == 'H' ? 'X' : '&nbsp;' !!}] M
                    &nbsp;&nbsp;
                    [{!! $citaId->paciente->sexo == 'M' ? 'X' : '&nbsp;' !!}] F
                </td>
                <td colspan="6"><span class="label">4/ Fecha Nac.: </span><br>{{ $citaId->paciente->fecha_nacimiento ? $citaId->paciente->fecha_nacimiento->format('d-m-Y') : '' }}</td>
                <td colspan="5"><span class="label">5/ Escolaridad: </span><br>{{ $citaId->paciente->escolaridad->escolaridad }}</td>
                <td colspan="4"><span class="label">6/ Est. Civil: </span><br>{{ $citaId->paciente->estadoCivil->estado_civil }}</td>
                <td colspan="3"><span class="label">7/ Edad: </span><br>{{ $citaId->paciente->fecha_nacimiento ? $citaId->paciente->fecha_nacimiento->age : '' }} años</td>
            </tr>
            <tr>
                <td colspan="10"><span class="label">8/ Alergias: </span><br>{{ $citaId->paciente->alergias }}</td>
                <td colspan="14"><span class="label">9/ Diagnóstico médico: </span><br>{{ $citaId->paciente->diagnosticoMedico?->nombre }}</td>
            </tr>
        </table>

        <!-- Signos Vitales y Somatometría -->
        <table>
            <tr class="section-header">
                <td colspan="7">Signos Vitales y Somatometría</td>
            </tr>
            <tr>
                <td class="label text-center">10/ Temp (°C)</td>
                <td class="label text-center">11/ FC (ppm)</td>
                <td class="label text-center">12/ FR (rpm)</td>
                <td class="label text-center">13/ SatO2 (%)</td>
                <td class="label text-center">14/ TA (mmHg)</td>
                <td class="label text-center" colspan="2">15/ Glicemia Capilar (mg/dL)</td>
            </tr>
            <tr>
                <td rowspan="2" style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->temperatura }}</td>
                <td rowspan="2" style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->frecuencia_cardiaca }}</td>
                <td rowspan="2" style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->frecuencia_respiratoria }}</td>
                <td rowspan="2" style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->saturacion_oxigeno }}</td>
                <td rowspan="2" style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->tension_arterial_sistolica }} / {{ $citaId->signosVitales?->tension_arterial_diastolica }}</td>
                
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->glicemia_capilar }}</td>
                <td>[{{ $citaId->signosVitales?->glicemia_capilar_medicion == 1 ? 'X' : ' ' }}] Ayuno</td>
            </tr>
            <tr>
                
                <td></td>
                <td>[{{ $citaId->signosVitales?->glicemia_capilar_medicion == 2 ? 'X' : ' ' }}] Casual</td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="label">16/ Circ. Cintura (cm):</td>
                <td class="label">17/ Peso (kg):</td>
                <td class="label">18/ Talla (m):</td>
                <td class="label">19/ IMC:</td>
                <td colspan="2" class="label">Clasificación IMC:</td>
            </tr>
            <tr>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->circunferencia_cintura }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->peso }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->talla }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->signosVitales?->imc }}</td>
                <td>[{{ $citaId->signosVitales?->imc < 18.5 ? 'X' : ' ' }}] Bajo peso<br>[{{ $citaId->signosVitales?->imc >= 18.5 && $citaId->signosVitales?->imc < 25 ? 'X' : ' ' }}] Peso normal</td>
                <td>[{{ $citaId->signosVitales?->imc >= 25 && $citaId->signosVitales?->imc < 30 ? 'X' : ' ' }}] Sobrepeso<br>[{{ $citaId->signosVitales?->imc >= 30 ? 'X' : ' ' }}] Obesidad</td>
            </tr>
        </table>

        <!-- Laboratorios -->
        <table>
            <tr class="section-header">
                <td colspan="7">Laboratorios</td>
            </tr>
            <tr>
                <td class="label text-center">20/ HbA1c</td>
                <td class="label text-center">21/ Glucosa Sérica</td>
                <td class="label text-center">22/ Triglicéridos</td>
                <td class="label text-center">23/ Colesterol-LDL</td>
                <td class="label text-center">24/ Colesterol-HDL</td>
                <td class="label text-center">25/ Colesterol Total</td>
                <td class="label text-center">26/ Microalbuminuria</td>
            </tr>
            <tr>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->laboratorio?->hemoglobina }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->laboratorio?->glucosa_serica }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->laboratorio?->trigliceridos }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->laboratorio?->colesterol_ldl }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->laboratorio?->colesterol_hdl }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->laboratorio?->colesterol_total }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $citaId->laboratorio?->microalbuminuria }}</td>
            </tr>
        </table>

        <!-- Valoración Podológica -->
        <table>
            <tr class="section-header">
                <td colspan="4">27/ Valoración Podológica</td>
            </tr>
            <tr class="sub-header">
                <td colspan="2" style="width: 50%;">PIE DERECHO</td>
                <td colspan="2" style="width: 50%;">PIE IZQUIERDO</td>
            </tr>
            <tr class="sub-header">
                <td colspan="4">EXAMEN DERMATOLÓGICO</td>
            </tr>
            <tr>
                <td><strong>Hiperqueratosis</strong></td>
                <td class="text-center" style="width: 15%;"><strong>Calificación</strong></td>
                <td><strong>Hiperqueratosis</strong></td>
                <td class="text-center" style="width: 15%;"><strong>Calificación</strong></td>
            </tr>
            <tr>
                <td>a) Plantar</td>
                <td>{{ $citaId->valoracionPodologica?->pd_plantar }}</td>
                <td>a) Plantar</td>
                <td>{{ $citaId->valoracionPodologica?->pi_plantar }}</td>
            </tr>
            <tr>
                <td>b) Dorsal</td>
                <td>{{ $citaId->valoracionPodologica?->pd_dorsal }}</td>
                <td>b) Dorsal</td>
                <td>{{ $citaId->valoracionPodologica?->pi_dorsal }}</td>
            </tr>
            <tr>
                <td>c) Talar</td>
                <td>{{ $citaId->valoracionPodologica?->pd_talar }}</td>
                <td>c) Talar</td>
                <td>{{ $citaId->valoracionPodologica?->pi_talar }}</td>
            </tr>
            <tr class="sub-header">
                <td>Subtotal</td>
                <td>{{ $citaId->valoracionPodologica?->pd_subtotal }}</td>
                <td>Subtotal</td>
                <td>{{ $citaId->valoracionPodologica?->pi_subtotal }}</td>
            </tr>
            <tr>
                <td><strong>Alteraciones ungueales</strong></td>
                <td class="text-center" style="width: 15%;"><strong>Calificación</strong></td>
                <td><strong>Alteraciones ungueales</strong></td>
                <td class="text-center" style="width: 15%;"><strong>Calificación</strong></td>
            </tr>
            <tr>
                <td>d) Onicogrifosis</td>
                <td>{{ $citaId->valoracionPodologica?->pd_onicogrifosis }}</td>
                <td>d) Onicogrifosis</td>
                <td>{{ $citaId->valoracionPodologica?->pi_onicogrifosis }}</td>
            </tr>
            <tr>
                <td>e) Onicomicosis</td>
                <td>{{ $citaId->valoracionPodologica?->pd_onicomicosis }}</td>
                <td>e) Onicomicosis</td>
                <td>{{ $citaId->valoracionPodologica?->pi_onicomicosis }}</td>
            </tr>
            <tr>
                <td>f) Onicocriptosis</td>
                <td>{{ $citaId->valoracionPodologica?->pd_onicocriptosis }}</td>
                <td>f) Onicocriptosis</td>
                <td>{{ $citaId->valoracionPodologica?->pi_onicocriptosis }}</td>
            </tr>
            <tr>
                <td><strong>Otras localizadas</strong></td>
                <td class="text-center" style="width: 15%;"><strong>Calificación</strong></td>
                <td><strong>Otras localizadas</strong></td>
                <td class="text-center" style="width: 15%;"><strong>Calificación</strong></td>
            </tr>
            <tr>
                <td>g) Bullosis</td>
                <td>{{ $citaId->valoracionPodologica?->pd_bullosis }}</td>
                <td>g) Bullosis</td>
                <td>{{ $citaId->valoracionPodologica?->pi_bullosis }}</td>
            </tr>
            <tr>
                <td>h) Úlcera</td>
                <td>{{ $citaId->valoracionPodologica?->pd_ulcera }}</td>
                <td>h) Úlcera</td>
                <td>{{ $citaId->valoracionPodologica?->pi_ulcera }}</td>
            </tr>
            <tr>
                <td>i) Necrosis</td>
                <td>{{ $citaId->valoracionPodologica?->pd_necrosis }}</td>
                <td>i) Necrosis</td>
                <td>{{ $citaId->valoracionPodologica?->pi_necrosis }}</td>
            </tr>
            <tr>
                <td>j) Grietas y fisuras</td>
                <td>{{ $citaId->valoracionPodologica?->pd_grietas_fisuras }}</td>
                <td>j) Grietas y fisuras</td>
                <td>{{ $citaId->valoracionPodologica?->pi_grietas_fisuras }}</td>
            </tr>
            <tr>
                <td>k) Lesiones superficiales</td>
                <td>{{ $citaId->valoracionPodologica?->pd_lesiones_superficiales }}</td>
                <td>k) Lesiones superficiales</td>
                <td>{{ $citaId->valoracionPodologica?->pi_lesiones_superficiales }}</td>
            </tr>
            <tr>
                <td>l) Otras</td>
                <td>{{ $citaId->valoracionPodologica?->pd_otras }}</td>
                <td>l) Otras</td>
                <td>{{ $citaId->valoracionPodologica?->pi_otras }}</td>
            </tr>
            <tr>
                <td style="padding-left: 30px;">Anhidrosis</td>
                <td>{{ $citaId->valoracionPodologica?->pi_lesiones_superficiales }}</td>
                <td style="padding-left: 30px;">Anhidrosis</td>
                <td>{{ $citaId->valoracionPodologica?->pi_lesiones_superficiales }}</td>
            </tr>
            <tr>
                <td style="padding-left: 30px;">Tiñas</td>
                <td>{{ $citaId->valoracionPodologica?->pd_tinas }}</td>
                <td style="padding-left: 30px;">Tiñas</td>
                <td>{{ $citaId->valoracionPodologica?->pi_tinas }}</td>
            </tr>
            <tr>
                <td style="padding-left: 30px;">Proceso infeccioso</td>
                <td>{{ $citaId->valoracionPodologica?->pd_proceso_infeccioso }}</td>
                <td style="padding-left: 30px;">Proceso infeccioso</td>
                <td>{{ $citaId->valoracionPodologica?->pi_proceso_infeccioso }}</td>
            </tr>
            <tr class="sub-header">
                <td>Subtotal</td>
                <td>{{ $citaId->valoracionPodologica?->pd_subtotal_otras_localizadas }}</td>
                <td>Subtotal</td>
                <td>{{ $citaId->valoracionPodologica?->pi_subtotal_otras_localizadas }}</td>
            </tr>
            
            <tr class="sub-header"><td colspan="4">EXAMEN DE ESTRUCTURA ÓSEA</td></tr>
            <tr>
                <td>a) Dedos en garra</td>
                <td>{{ $citaId->examenEstructuraOsea?->pd_dedos_garra }}</td>
                <td>a) Dedos en garra</td>
                <td>{{ $citaId->examenEstructuraOsea?->pi_dedos_garra }}</td>
            </tr>
            <tr>
                <td>b) Dedos en martillo</td>
                <td>{{ $citaId->examenEstructuraOsea?->pd_dedos_martillo }}</td>
                <td>b) Dedos en martillo</td>
                <td>{{ $citaId->examenEstructuraOsea?->pi_dedos_martillo }}</td>
            </tr>
            <tr>
                <td>c) Hallux valgus</td>
                <td>{{ $citaId->examenEstructuraOsea?->pd_hallux_valgus }}</td>
                <td>c) Hallux valgus</td>
                <td>{{ $citaId->examenEstructuraOsea?->pi_hallux_valgus }}</td>
            </tr>
            <tr>
                <td>d) Infraducto</td>
                <td>{{ $citaId->examenEstructuraOsea?->pd_infraducto }}</td>
                <td>d) Infraducto</td>
                <td>{{ $citaId->examenEstructuraOsea?->pi_infraducto }}</td>
            </tr>
            <tr>
                <td>e) Supraducto</td>
                <td>{{ $citaId->examenEstructuraOsea?->pd_supraducto }}</td>
                <td>e) Supraducto</td>
                <td>{{ $citaId->examenEstructuraOsea?->pi_supraducto }}</td>
            </tr>
            <tr>
                <td>f) Hipercarga metatarsiano</td>
                <td>{{ $citaId->examenEstructuraOsea?->pd_hipercarga_metatarsio }}</td>
                <td>f) Hipercarga metatarsiano</td>
                <td>{{ $citaId->examenEstructuraOsea?->pi_hipercarga_metatarsio }}</td>
            </tr>
            <tr>
                <td>g) Pie de Charcot</td>
                <td>{{ $citaId->examenEstructuraOsea?->pd_pie_charcot }}</td>
                <td>g) Pie de Charcot</td>
                <td>{{ $citaId->examenEstructuraOsea?->pi_pie_charcot }}</td>
            </tr>
            <tr class="sub-header">
                <td>Subtotal</td>
                <td>{{ $citaId->examenEstructuraOsea?->pd_subtotal }}</td>
                <td>Subtotal</td>
                <td>{{ $citaId->examenEstructuraOsea?->pi_subtotal }}</td>
            </tr>



            <tr class="sub-header"><td colspan="4">EXAMEN VASCULAR</td></tr>

            <tr class="sub-header">
                <td>Sistema arterial</td>
                <td>Calificación</td>
                <td>Sistema arterial</td>
                <td>Calificación</td>
            </tr>
            <tr>
                <td>Pulso pedio {{ $citaId->examenVascular?->pd_pulso_pedio }} por min</td>
                <td>{{ $citaId->examenVascular?->pd_pulso_pedio_calificacion }}</td>
                <td>Pulso pedio {{ $citaId->examenVascular?->pi_pulso_pedio }} por min</td>
                <td>{{ $citaId->examenVascular?->pi_pulso_pedio_calificacion }}</td>
            </tr>
            <tr>
                <td>Llenado capilar {{ $citaId->examenVascular?->pd_llenado_capilar }} seg.</td>
                <td>{{ $citaId->examenVascular?->pd_llenado_capilar_calificacion }}</td>
                <td>Llenado capilar {{ $citaId->examenVascular?->pi_llenado_capilar }} seg.</td>
                <td>{{ $citaId->examenVascular?->pi_llenado_capilar_calificacion }}</td>
            </tr>
            <tr class="sub-header">
                <td class="text-right">Subtotal</td>
                <td>{{ $citaId->examenVascular?->pd_sistema_arterial_subtotal }}</td>
                <td class="text-right">Subtotal</td>
                <td>{{ $citaId->examenVascular?->pi_sistema_arterial_subtotal }}</td>
            </tr>
            
            <tr class="sub-header">
                <td>Sistema venoso</td>
                <td>Calificación</td>
                <td>Sistema venoso</td>
                <td>Calificación</td>
            </tr>
            <tr>
                <td>Várices</td>
                <td>{{ $citaId->examenVascular?->pd_varices }}</td>
                <td>Várices</td>
                <td>{{ $citaId->examenVascular?->pi_varices }}</td>
            </tr>
            <tr>
                <td>Edema</td>
                <td>{{ $citaId->examenVascular?->pd_edema }}</td>
                <td>Edema</td>
                <td>{{ $citaId->examenVascular?->pi_edema }}</td>
            </tr>
            <tr class="sub-header">
                <td class="text-right">Subtotal</td>
                <td>{{ $citaId->examenVascular?->pd_sistema_venoso_subtotal }}</td>
                <td class="text-right">Subtotal</td>
                <td>{{ $citaId->examenVascular?->pi_sistema_venoso_subtotal }}</td>
            </tr>

            <tr class="sub-header">
                <td colspan="4">EXAMEN NEUROLÓGICO</td>
            </tr>
            <tr class="sub-header">
                <td>Sistema perceptual</td>
                <td>Calificación</td>
                <td>Sistema perceptual</td>
                <td>Calificación</td>
            </tr>
            <tr>
                <td>Sensibilidad táctil</td>
                <td>{{ $citaId->examenNeurologico?->pd_sensibilidad_tactil }}</td>
                <td>Sensibilidad táctil</td>
                <td>{{ $citaId->examenNeurologico?->pi_sensibilidad_tactil }}</td>
            </tr>
            <tr>
                <td>Sensibilidad vibratoria</td>
                <td>{{ $citaId->examenNeurologico?->pd_sensibilidad_vibratoria }}</td>
                <td>Sensibilidad vibratoria</td>
                <td>{{ $citaId->examenNeurologico?->pi_sensibilidad_vibratoria }}</td>
            </tr>
            <tr class="sub-header">
                <td class="text-right">Subtotal</td>
                <td>{{ $citaId->examenNeurologico?->pd_subtotal_sistema_perceptual }}</td>
                <td class="text-right">Subtotal</td>
                <td>{{ $citaId->examenNeurologico?->pi_subtotal_sistema_perceptual }}</td>
            </tr>
            <tr class="sub-header">
                <td>Sistema motor</td>
                <td>Calificación</td>
                <td>Sistema motor</td>
                <td>Calificación</td>
            </tr>
            <tr>
                <td>Reflejo rotuliano</td>
                <td>{{ $citaId->examenNeurologico?->pd_reflejo_rotuliano }}</td>
                <td>Reflejo rotuliano</td>
                <td>{{ $citaId->examenNeurologico?->pi_reflejo_rotuliano }}</td>
            </tr>
            <tr>
                <td>Dorsiflexión del pie</td>
                <td>{{ $citaId->examenNeurologico?->pd_dorsiflexion }}</td>
                <td>Dorsiflexión del pie</td>
                <td>{{ $citaId->examenNeurologico?->pi_dorsiflexion }}</td>
            </tr>
            <tr>
                <td>Apertura dedos en abanico</td>
                <td>{{ $citaId->examenNeurologico?->pd_apertura_dedos }}</td>
                <td>Apertura dedos en abanico</td>
                <td>{{ $citaId->examenNeurologico?->pi_apertura_dedos }}</td>
            </tr>
            <tr class="sub-header">
                <td class="text-right">Subtotal</td>
                <td>{{ $citaId->examenNeurologico?->pd_subtotal_sistema_motor }}</td>
                <td class="text-right">Subtotal</td>
                <td>{{ $citaId->examenNeurologico?->pi_subtotal_sistema_motor }}</td>
            </tr>
            <tr class="section-header">
                <td class="text-right">CALIFICACIÓN TOTAL</td>
                <td>{{ $citaId->examenNeurologico?->pd_calificacion_total }}</td>
                <td class="text-right">CALIFICACIÓN TOTAL</td>
                <td>{{ $citaId->examenNeurologico?->pi_calificacion_total }}</td>
            </tr>
        </table>

        <!-- Pain assessment -->
        <table>
            <tr>
                <td style="width: 30%;"><span class="label">28/ Presencia de dolor en:</span></td>
                <td style="width: 70%;"><span class="label">29/ Características:</span></td>
            </tr>
            <tr>
                <td>
                    [ ] Pies<br>
                    [ ] Manos<br>
                    [ ] Ambos
                </td>
                <td style="height: 35px;"></td>
            </tr>
        </table>

        <!-- Proceso de Atención de Enfermería (NANDA/NOC/NIC) -->
        <table>
            <tr class="section-header">
                <td style="width: 10%;">30/ Fecha y Hora</td>
                <td style="width: 25%;">31/ Valoración Necesidades Básicas (Henderson)</td>
                <td style="width: 20%;">32/ Diagnóstico Enfermería (NANDA)</td>
                <td style="width: 25%;">33/ Planeación Resultado (NOC)</td>
                <td style="width: 20%;">34/ Intervenciones (NIC)</td>
            </tr>
            <tr style="height: 120px;">
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <table style="width: 100%; border: none; font-size: 7.5pt;">
                        <tr style="border: none;">
                            <td style="border: none;"><strong>Indicador(es)</strong></td>
                            <td style="border: none;"><strong>MA</strong></td>
                            <td style="border: none;"><strong>AA</strong></td>
                            <td style="border: none;"><strong>EV</strong></td>
                        </tr>
                    </table>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                    <strong>35/ Evaluación del resultado obtenido (NOC):</strong>
                </td>
            </tr>
        </table>

        <!-- Pie de página de la hoja clínica -->
        <table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td colspan="2"><span class="label">36/ Fuentes de consulta en la Atención del Paciente:</span></td>
    </tr>
    
    <tr style="height: 35px;">
        <td colspan="2"></td>
    </tr>

    <tr>
        <td colspan="2"><span class="label">37/ Enfermera(o) Responsable / Nombre Completo / Núm. Cédula / Firma:</span></td>
    </tr>

    <tr>
        <!-- Datos de Identificación Centrados -->
        <td style="text-align: center; vertical-align: bottom; width: 55%; padding-top: 25px; padding-bottom: 5px;">
            <div style="font-size: 13px; font-weight: bold; color: #111; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.2;">
                {{ $user->name }}
            </div>
            <div style="font-size: 11px; color: #444; margin-top: 4px;">
                <strong>Cédula Prof.:</strong> {{ $user->personalUnidad->cedula_profesional ?? 'S/C' }}
            </div>
        </td>

        <!-- Área destinada a la Firma Autógrafa -->
        <td style="text-align: center; vertical-align: bottom; width: 45%; padding-top: 25px;">
            <div style="border-bottom: 1px solid #000; width: 85%; margin: 0 auto;"></div>
            <span style="font-size: 10px; color: #555; text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-top: 4px;">
                Firma Autógrafa
            </span>
        </td>
    </tr>
</table>
    </div>

</body>
</html>