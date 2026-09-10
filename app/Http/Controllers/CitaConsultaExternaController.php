<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use App\Models\PersonalUnidad;
use App\Models\PersonalUnidadVacacion;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class CitaConsultaExternaController extends Controller
{
    public function citasConsultaExternaSearch()
    {
        $login = Auth::user();

        $pacientes = Paciente::where('clues_id',$login->clues_id)->get();

        $medicos = PersonalUnidad::where('clues_id',$login->clues_id)
                                ->where('medico_consulta_externa', 1)
                                ->get();

        $listaMedicos = PersonalUnidad::where('clues_id',$login->clues_id)
                                ->where('medico_consulta_externa', 1)    
                                ->get();

        return view('citas.consulta-externa.cita-search', compact('pacientes', 'medicos', 'listaMedicos'));
    }


    public function citasConsultaExternaFind(Request $request)
    {    
        $request->validate([
            'paciente_id' => 'required',
            'medico_id'   => 'required',
            'primera_vez' => 'required',
            'fecha'       => 'required',
        ]);

        $medico = PersonalUnidad::findOrFail($request->medico_id);
        $paciente = Paciente::findOrFail($request->paciente_id);
        $fecha = $request->fecha;
        $primeraVez = $request->primera_vez;

        // 1. Verificar vacaciones
        $medicoDeVacaciones = PersonalUnidadVacacion::where('personal_unidad_id', $request->medico_id)
            ->whereDate('fecha', $fecha)
            ->exists();

        if ($medicoDeVacaciones) 
        {
            return back()->withErrors([
                'fecha' => 'El médico seleccionado se encuentra de vacaciones en la fecha indicada.'
            ])->withInput();
        }

        // 2. Mapear el día de la semana con Carbon
        $numeroDia = \Carbon\Carbon::parse($fecha)->dayOfWeek;

        $dias = [
            1 => 'lunes',
            2 => 'martes',
            3 => 'miercoles',
            4 => 'jueves',
            5 => 'viernes',
            6 => 'sabado',
            0 => 'domingo',
        ];

        $dia = $dias[$numeroDia];

        // 3. Verificar si el médico atiende ese día de la semana
        $atiendeDia = $medico->{$dia.'_atiende'};

        if (!$atiendeDia) 
        {
            return back()->withErrors([
                'fecha' => 'El médico seleccionado no ofrece consulta el día ' . ucfirst($dia) . '.'
            ])->withInput();
        }

        // 4. Obtener horarios de entrada y salida
        $entrada = $medico->{$dia.'_entrada'};
        $salida = $medico->{$dia.'_salida'};

        if (!$entrada || !$salida) {
            return back()
                ->withErrors([
                    'fecha' => 'El médico no tiene horario asignado para este día.'
                ])
                ->withInput();
        }

        // 5. Citas agendadas para el día
        $citasMedico = CitaConsultaExterna::where('medico_id', $request->medico_id)
            ->whereDate('fecha', $fecha)
            ->orderBy('hora')
            ->get();

        // 6. Generar bloques de horarios de 30 minutos
        $horarios = [];
        $inicio = \Carbon\Carbon::parse($entrada);
        $fin = \Carbon\Carbon::parse($salida);

        while ($inicio < $fin)
        {
            $horarios[] = $inicio->format('H:i');
            $inicio->addMinutes(30);
        }

        return view('citas.consulta-externa.cita-find', compact(
            'paciente',
            'medico',
            'citasMedico',
            'fecha',
            'entrada',
            'salida',
            'horarios',
            'primeraVez'
        ));
    }

    public function citasConsultaExternaStore(Request $request)
    {
        $request->validate([
            'medico_id' => 'required',
            'paciente_id' => 'required',
            'primera_vez' => 'required',
            'fecha'=>'required',
            'hora'=>'required'
        ],[]);

        $login = Auth::user();

        $citaConsultaExterna = new CitaConsultaExterna();

        $citaConsultaExterna->fecha = $request->fecha;
        $citaConsultaExterna->hora = $request->hora;
        $citaConsultaExterna->paciente_id = $request->paciente_id;
        $citaConsultaExterna->medico_id = $request->medico_id;
        $citaConsultaExterna->primera_vez = $request->primera_vez;
        $citaConsultaExterna->clues_id  = $login->clues_id;

        $citaConsultaExterna->save();

        return redirect()->route('citasConsultaExternaSearch')->with('success', 'La cita ha sido agendada correctamente.');
    }

    public function citasConsultaExternaDelete(String $id)
    {
        $citaConsultaExterna = CitaConsultaExterna::findOrFail($id);

        $login = Auth::user();

        if ($citaConsultaExterna->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para eliminar esta cita.');
        }

        $citaConsultaExterna->delete();

        return redirect()->route('pacientesShow',$citaConsultaExterna->paciente_id)->with('success', 'La cita ha sido eliminada correctamente.');
    }

    public function CalendarioCitasConsultaExternaSearch()
    {
        $login = Auth::user();

        $medicos = PersonalUnidad::where('clues_id',$login->clues_id)
                                ->where('medico_consulta_externa', 1)
                                ->get();

        return view('citas.consulta-externa.cita-calendario-search', compact('medicos'));
    }

    public function CalendarioCitasConsultaExternaFind(Request $request)
    {
        $request->validate([
            'medico_id' => 'required',
            'fecha' => 'required',
        ]);

        $login = Auth::user();    

        $citasHoy = CitaConsultaExterna::where('medico_id', $request->medico_id)
            ->whereDate('fecha', $request->fecha)
            ->get();

        $fecha = $request->fecha;

        return view('citas.consulta-externa.cita-calendario-find', compact('fecha', 'citasHoy'));
    }

    public function UnemeEnfermeriaReporteDiarioPDF(string $fecha)
    {
        // 1. Procesar la fecha
        $fechaCarbon = Carbon::parse($fecha);
        $mesAnio = mb_strtoupper($fechaCarbon->translatedFormat('F Y'), 'UTF-8');
        $fechaFormateada = $fechaCarbon->format('d/m/Y');

        // 2. Consultar las citas cargando la relación del paciente (si la tienes configurada)
        $citasDelDia = CitaConsultaExterna::with('paciente') // Asegúrate de tener la relación paciente() en tu Modelo
            ->whereDate('fecha', $fecha)
            ->get();

        $totalCitas = $citasDelDia->count();

        // 3. Estructura fija de horarios
        $horarios = [
            '08:00' => ['etiqueta' => 'SUB'],
            '08:30' => ['etiqueta' => '1ERA VEZ'],
            '09:30' => ['etiqueta' => '1ERA VEZ'],
            '10:00' => ['etiqueta' => ''],
            '10:30' => ['etiqueta' => ''],
            '11:00' => ['etiqueta' => ''],
            '11:30' => ['etiqueta' => ''],
            '12:00' => ['etiqueta' => ''],
            '12:30' => ['etiqueta' => ''],
            '13:00' => ['etiqueta' => ''], // 01:00 PM en formato 24 horas
        ];

        $agenda = [];

        foreach ($horarios as $hora => $info) {
            // CORRECCIÓN: Se usa $item->hora (nombre real en tu BD)
            $cita = $citasDelDia->first(function ($item) use ($hora) {
                return Carbon::parse($item->hora)->format('H:i') === $hora;
            });

            // Etiqueta visual para la tabla PDF ('01:00' en lugar de '13:00')
            $horaVisual = ($hora === '13:00') ? '01:00' : $hora;

            $agenda[$horaVisual] = [
                'hora' => $horaVisual,
                'etiqueta' => $info['etiqueta'],
                'cita' => $cita
            ];
        }

        // 4. Pasar los datos a la vista
        $data = [
            'fecha' => $fechaFormateada,
            'mesAnio' => $mesAnio,
            'agenda' => $agenda,
            'totalCitas' => $totalCitas,
        ];

        // 5. Generar PDF
        $pdf = Pdf::loadView('pdf.uneme-reporte-diario-consulta-externa', $data)
                ->setPaper('letter', 'landscape');

        return $pdf->stream('UnemeEnfermeriaReporteDiario.pdf');
    }

}