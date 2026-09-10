<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MedicoConsultaExternaController extends Controller
{
    //
    public function medicoMisCitasIndex()
    {
        $medico = Auth::user();

        $misCitas = CitaConsultaExterna::with('paciente')
            ->where('medico_id', $medico->personal_id)
            ->whereDate('fecha', today())
            ->orderBy('hora', 'ASC')
            ->get();

    $eventos = $misCitas->map(function ($cita) {

        // Fecha y hora de inicio
        $inicio = $cita->fecha->copy()->setTimeFromTimeString($cita->hora);

        // Duración de la consulta (30 minutos)
        $fin = $inicio->copy()->addMinutes(30);

        // Color según el estado
        switch ($cita->status) {
            case 'ATENDIDO':
                $color = '#28a745';
                break;

            case 'CANCELADO':
                $color = '#dc3545';
                break;

            default:
                $color = '#17a2b8';
                break;
        }

        return [
            'id' => $cita->id,
            'title' => $cita->paciente->nombre_completo,
            'start' => $inicio->format('Y-m-d\TH:i:s'),
            'end' => $fin->format('Y-m-d\TH:i:s'),

            'backgroundColor' => $color,
            'borderColor' => $color,
            'textColor' => '#ffffff',

            'extendedProps' => [
                'paciente'   => $cita->paciente->nombre_completo,
                'expediente' => $cita->paciente->no_expediente,
                'status'     => $cita->status,
            ],
        ];
    });

    return view(
        'medicos.consulta-externa-mis-citas',
        compact('medico', 'misCitas', 'eventos')
    );
    }

    public function medicoCitasUnidadIndex()
    {
        $medico = Auth::user();

        $citasHoy = CitaConsultaExterna::where('clues_id',$medico->clues_id)
            ->whereDate('fecha', today())
            ->orderBy('hora', 'ASC')
            ->get();

        return view(
            'medicos.consulta-externa-citas-unidad',
            compact('medico', 'citasHoy')
        );
    }
}