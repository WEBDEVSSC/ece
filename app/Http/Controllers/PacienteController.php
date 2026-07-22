<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CatCIE10;
use App\Models\CatDerechohabiencia;
use App\Models\CatEscolaridad;
use App\Models\CatEstadoCivil;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $derechohabiencias = CatDerechohabiencia::all();

        return view('pacientes.create-paciente', compact('curp','fechaNacimiento','sexo','escolaridades','estadosCivil','derechohabiencias'));
    }

    public function pacientesStore(Request $request)
    {
     
    
        $request->validate([
            'curp' => 'required|string|size:18',
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required|date',
            'escolaridad_id' => 'required|exists:cat_escolaridad,id',
            'estado_civil_id' => 'required|exists:cat_estado_civil,id',
            'celular' => 'nullable|digits:10',
            'email' => 'nullable|email|max:255',
            'derechohabiencia_id' => 'required|exists:cat_derechohabiencia,id',
            'alergias' => 'required|string|max:500',
        ],[
            'curp.required' => 'La CURP es obligatoria.',
            'curp.size' => 'La CURP debe contener exactamente 18 caracteres.',

            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',

            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'apellido_paterno.max' => 'El apellido paterno no puede superar los 100 caracteres.',

            'apellido_materno.required' => 'El apellido materno es obligatorio.',
            'apellido_materno.max' => 'El apellido materno no puede superar los 100 caracteres.',

            'sexo.required' => 'Debe seleccionar el sexo.',

            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento no tiene un formato válido.',

            'escolaridad_id.required' => 'Debe seleccionar una escolaridad.',
            'escolaridad_id.exists' => 'La escolaridad seleccionada no existe.',

            'estado_civil_id.required' => 'Debe seleccionar un estado civil.',
            'estado_civil_id.exists' => 'El estado civil seleccionado no existe.',

            'celular.required' => 'El número de celular es obligatorio.',
            'celular.digits' => 'El celular debe contener exactamente 10 dígitos.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede superar los 255 caracteres.',

            'derechohabiencia_id.required' => 'Debe seleccionar una derechohabiencia.',
            'derechohabiencia_id.exists' => 'La derechohabiencia seleccionada no existe.',

            'alergias.required' => 'El campo alergias es obligatorio.',
            'alergias.max' => 'El campo alergias no puede superar los 500 caracteres.',
        ]); 

        $login = Auth::user();

        $paciente = new Paciente();

        $paciente->curp = $request->curp;
        $paciente->nombre = $request->nombre;
        $paciente->apellido_paterno = $request->apellido_paterno;
        $paciente->apellido_materno = $request->apellido_materno;
        $paciente->sexo = $request->sexo;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->escolaridad_id  = $request->escolaridad_id ;
        $paciente->estado_civil_id  = $request->estado_civil_id ;
        $paciente->alergias = $request->alergias;
        $paciente->diagnostico_medico_id  = $request->diagnostico_medico_id ;
        $paciente->celular = $request->celular;
        $paciente->email = $request->email;
        $paciente->clues_id = $login->clues_id;
        $paciente->derechohabiencia_id  = $request->derechohabiencia_id ;

        $paciente->save();

        return redirect()->route('pacientesIndex')->with('success', 'Registro realizado correctamente');
    }

    public function pacientesIndex()
    {
        $login = Auth::user();
    
        $pacientes = Paciente::where('clues_id', $login->clues_id)->get(); 

        return view('pacientes.index-paciente', compact('pacientes'));
    }

    public function pacientesDXMedicoCreate(String $id)
    {
        $paciente = Paciente::findOrFail($id);

        $login = Auth::user();

        if ($paciente->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para modificar este paciente.');
        }

        $diagnosticos = CatCIE10::all();

        return view('pacientes.create-diagnostico-medico', compact('paciente','diagnosticos'));
    }

    public function pacientesDXMedicoStore(Request $request, String $id)
    {
        $request->validate([
            'diagnostico_medico_id' => 'required|exists:cat_cie_10,id',
        ],[
            'diagnostico_medico_id.required' => 'Debe seleccionar un diagnóstico médico.',
            'diagnostico_medico_id.exists'   => 'El diagnóstico médico seleccionado no es válido.',
        ]);

        $paciente = Paciente::findOrFail($id);

        $paciente->diagnostico_medico_id = $request->diagnostico_medico_id;

        $paciente->save();

        return redirect()->route('pacientesIndex')->with('success', 'Diagnóstico Médico realizado correctamente');

    }

    public function pacientesNoExpedienteCreate(String $id)
    {
        $paciente = Paciente::findOrFail($id);

        $login = Auth::user();

        if ($paciente->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para modificar este paciente.');
        }

        return view('pacientes.create-no-expediente', compact('paciente'));
    }

    public function pacientesNoExpedienteStore(Request $request, String $id)
    {
        $request->validate([
            'no_expediente' => 'required|string|max:20|unique:pacientes,no_expediente,'.$id,
        ],[
            'no_expediente.required' => 'Debe capturar el número de expediente.',
            'no_expediente.string'   => 'El número de expediente debe ser un texto válido.',
            'no_expediente.max'      => 'El número de expediente no puede tener más de 20 caracteres.',
            'no_expediente.unique'   => 'El número de expediente ya está registrado.',
        ]);
        
        $paciente = Paciente::findOrFail($id);

        $paciente->no_expediente = $request->no_expediente;

        $paciente->save();

        return redirect()->route('pacientesIndex')->with('success', 'No. de Expediente realizado correctamente');
    }

    public function pacientesShow(String $id)
    {
        $paciente = Paciente::findOrFail($id);

        $login = Auth::user();

        if ($paciente->clues_id !== $login->clues_id) {
            abort(403, 'No tienes permiso para modificar este paciente.');
        }

        $edad = Carbon::parse($paciente->fecha_nacimiento)->age;

        return view('pacientes.show-paciente', compact('paciente','edad'));

    }

}
