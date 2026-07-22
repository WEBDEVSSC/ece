<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use App\Models\Medico;
use App\Models\MedicoVacacion;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaConsultaExternaController extends Controller
{
    public function citasConsultaExternaSearch()
    {
        $login = Auth::user();

        $pacientes = Paciente::where('clues_id',$login->clues_id)->get();

        $medicos = Medico::where('clues_id',$login->clues_id)->get();

        $listaMedicos = Medico::where('clues_id',$login->clues_id)->get();

        return view('citas.consulta-externa.cita-search', compact('pacientes', 'medicos', 'listaMedicos'));
    }


    public function citasConsultaExternaFind(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required',
            'medico_id' => 'required',
            'fecha' => 'required',
        ]);

        $medico = Medico::findOrFail($request->medico_id);
        $paciente = Paciente::findOrFail($request->paciente_id);
        $fecha = $request->fecha;

        // Verificar vacaciones
        $medicoDeVacaciones = MedicoVacacion::where('medico_id', $request->medico_id)
            ->whereDate('fecha', $fecha)
            ->exists();

        if ($medicoDeVacaciones) 
        {
            return back()->withErrors([
                'fecha' => 'El médico seleccionado se encuentra de vacaciones en la fecha indicada.'
            ])->withInput();
        }

        // Citas del día
        $citasMedico = CitaConsultaExterna::where('medico_id', $request->medico_id)
            ->whereDate('fecha', $fecha)
            ->orderBy('hora')
            ->get();

        // Obtener día de la semana
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

        $entrada = $medico->{$dia.'_entrada'};
        $salida = $medico->{$dia.'_salida'};

        if(!$entrada || !$salida){
            return back()
                ->withErrors([
                    'fecha'=>'El médico no tiene horario asignado para este día.'
                ])
                ->withInput();
        }

        $horarios = [];

        $inicio = \Carbon\Carbon::parse($entrada);
        $fin = \Carbon\Carbon::parse($salida);

        while($inicio < $fin)
        {
            $horarios[] = $inicio->format('H:i');
            $inicio->addMinutes(30);
        }

        return view('citas.consulta-externa.cita-find',compact('paciente','medico','citasMedico','fecha','entrada','salida','horarios'));
    }

    public function citasConsultaExternaStore(Request $request)
    {
        $request->validate([
            'medico_id' => 'required',
            'paciente_id' => 'required',
            'fecha'=>'required',
            'hora'=>'required'
        ],[]);

        $login = Auth::user();

        $citaConsultaExterna = new CitaConsultaExterna();

        $citaConsultaExterna->fecha = $request->fecha;
        $citaConsultaExterna->hora = $request->hora;
        $citaConsultaExterna->paciente_id = $request->paciente_id;
        $citaConsultaExterna->medico_id = $request->medico_id;
        $citaConsultaExterna->clues_id  = $login->clues_id;

        $citaConsultaExterna->save();

        return redirect()->route('citasConsultaExternaSearch')->with('success', 'La cita ha sido agendada correctamente.');
    }

}