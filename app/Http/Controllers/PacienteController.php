<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CatEscolaridad;
use App\Models\CatEstadoCivil;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PacienteController extends Controller
{
    public function pacientesFind()
    {
        return view('pacientes.find-curp-paciente');
    }

    public function pacientesSearch(Request $request)
    {
        $request->validate([
            'curp' => 'required|string|size:18|alpha_num|unique:pacientes,curp',
        ],[
            'curp.required' => 'Debe capturar la CURP.',
            'curp.string' => 'La CURP debe ser una cadena de texto.',
            'curp.size' => 'La CURP debe contener exactamente 18 caracteres.',
            'curp.regex' => 'La CURP no tiene un formato válido.',
            'curp.unique' => 'La CURP ya se encuentra registrada.',
        ]);

        $curp = strtoupper($request->curp);

        return redirect()->route('pacientesCreate')->with([
            'curp' => $curp,
            ]);
    }

    public function pacientesCreate()
    {    
        $curp = session('curp');

        if (!$curp) 
        {
            return redirect()
                ->route('pacientesSearch')
                ->with('error', 'Debe capturar una CURP.');
        }
    
        $anio = substr($curp, 4, 2);
        $mes = substr($curp, 6, 2);
        $dia = substr($curp, 8, 2);

        $anio = ((int)$anio <= (int)date('y'))
            ? '20'.$anio
            : '19'.$anio;

        $fechaNacimiento = Carbon::createFromFormat(
            'Y-m-d',
            "$anio-$mes-$dia"
        )->format('Y-m-d');

        $sexo = substr($curp, 10, 1);

        $escolaridades = CatEscolaridad::all();

        $estadosCivil = CatEstadoCivil::all();

        return view('pacientes.create-paciente', compact('curp','fechaNacimiento','sexo','escolaridades','estadosCivil'));
    }


}
