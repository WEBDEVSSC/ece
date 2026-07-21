<?php

namespace App\Http\Controllers;

use App\Models\CatPais;
use App\Models\CatServiciosEspecialidadMedico;
use App\Models\CatTipoPersonalMedico;
use App\Models\CatClue;
use App\Models\Medico;
use App\Models\MedicoVacacion;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function medicosIndex()
    {
        $user = Auth::user();

        $medicos = Medico::where('clues_id', $user->clues_id)->get();
        
        return view('settings.medicos.index-medico', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function medicosCreate()
    {
        $tiposPersonalMedico = CatTipoPersonalMedico::all();

        $servicioEspecialidadMedico = CatServiciosEspecialidadMedico::all();

        $clues = CatClue::orderBy('clues', 'asc')->get();
        
        $usuario = Auth::user();

        $paisesNacimiento = CatPais::orderBy('pais', 'asc')->get();

        return view('settings.medicos.create-medico', compact('tiposPersonalMedico','servicioEspecialidadMedico','clues','usuario','paisesNacimiento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function medicosStore(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'curp' => 'required|string|size:18',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'nombres' => 'required|string|max:150',
            'pais_nacimiento_id' => 'required|integer|exists:cat_paises,id',
            'cedula' => 'required|string|max:16',
            'tipo_personal_id' => 'required|integer|exists:cat_tipos_personal_medico,id',
            'servicio_id' => 'required|integer|exists:cat_servicios_especialidad_medicos,id',
            'clues_id' => 'required|integer|exists:cat_clues,id',
            'programa_smymg' => 'required|in:0,1',

            'lunes_entrada' => 'nullable|date_format:H:i',
            'lunes_salida' => 'nullable|date_format:H:i|after:lunes_entrada',
            'martes_entrada' => 'nullable|date_format:H:i',
            'martes_salida' => 'nullable|date_format:H:i|after:martes_entrada',
            'miercoles_entrada' => 'nullable|date_format:H:i',
            'miercoles_salida' => 'nullable|date_format:H:i|after:miercoles_entrada',
            'jueves_entrada' => 'nullable|date_format:H:i',
            'jueves_salida' => 'nullable|date_format:H:i|after:jueves_entrada',
            'viernes_entrada' => 'nullable|date_format:H:i',
            'viernes_salida' => 'nullable|date_format:H:i|after:viernes_entrada',
            'sabado_entrada' => 'nullable|date_format:H:i',
            'sabado_salida' => 'nullable|date_format:H:i|after:sabado_entrada',
            'domingo_entrada' => 'nullable|date_format:H:i',
            'domingo_salida' => 'nullable|date_format:H:i|after:domingo_entrada', 
            'festivos_entrada' => 'nullable|date_format:H:i',
            'festivos_salida' => 'nullable|date_format:H:i|after:festivos_entrada',

        ], [
            'curp.required' => 'El CURP es obligatorio.',
            'curp.size' => 'El CURP debe tener exactamente 18 caracteres.',

            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'apellido_paterno.max' => 'El apellido paterno no puede tener más de 100 caracteres.',

            'apellido_materno.required' => 'El apellido materno es obligatorio.',
            'apellido_materno.max' => 'El apellido materno no puede tener más de 100 caracteres.',

            'nombres.required' => 'El nombre es obligatorio.',
            'nombres.max' => 'El nombre no puede tener más de 150 caracteres.',

            'pais_nacimiento_id.required' => 'Debe seleccionar un país de nacimiento.',
            'pais_nacimiento_id.exists' => 'El país seleccionado no es válido.',

            'tipo_personal_id.required' => 'El tipo de personal es obligatorio.',
            'tipo_personal_id.integer' => 'El tipo de personal debe ser un número válido.',
            'tipo_personal_id.exists' => 'El tipo de personal seleccionado no existe.',

            'servicio_id.required' => 'El servicio o especialidad es obligatorio.',
            'servicio_id.integer' => 'El servicio o especialidad debe ser un número válido.',
            'servicio_id.exists' => 'El servicio o especialidad seleccionado no existe.',

            'clues_id.required' => 'La unidad CLUES es obligatoria.',
            'clues_id.integer' => 'La unidad CLUES debe ser un número válido.',
            'clues_id.exists' => 'La unidad CLUES seleccionada no existe.',

            'cedula.required' => 'La cédula profesional es obligatoria.',
            'cedula.string' => 'La cédula debe ser texto.',
            'cedula.max' => 'La cédula no debe exceder los 16 caracteres.',

            'programa_smymg.required' => 'Debe indicar si el médico pertenece al Programa U013.',
            'programa_smymg.boolean' => 'El valor seleccionado no es válido.',

            'lunes_entrada.date_format' => 'La hora de entrada del lunes debe tener el formato HH:MM.',
            'lunes_salida.date_format' => 'La hora de salida del lunes debe tener el formato HH:MM.',
            'lunes_salida.after' => 'La hora de salida del lunes debe ser posterior a la hora de entrada.',
            'martes_entrada.date_format' => 'La hora de entrada del martes debe tener el formato HH:MM.',
            'martes_salida.date_format' => 'La hora de salida del martes debe tener el formato HH:MM.',
            'martes_salida.after' => 'La hora de salida del martes debe ser posterior a la hora de entrada.',
            'miercoles_entrada.date_format' => 'La hora de entrada del miércoles debe tener el formato HH:MM.',
            'miercoles_salida.date_format' => 'La hora de salida del miércoles debe tener el formato HH:MM.',
            'miercoles_salida.after' => 'La hora de salida del miércoles debe ser posterior a la hora de entrada.',
            'jueves_entrada.date_format' => 'La hora de entrada del jueves debe tener el formato HH:MM.',
            'jueves_salida.date_format' => 'La hora de salida del jueves debe tener el formato HH:MM.',
            'jueves_salida.after' => 'La hora de salida del jueves debe ser posterior a la hora de entrada.',
            'viernes_entrada.date_format' => 'La hora de entrada del viernes debe tener el formato HH:MM.',
            'viernes_salida.date_format' => 'La hora de salida del viernes debe tener el formato HH:MM.',
            'viernes_salida.after' => 'La hora de salida del viernes debe ser posterior a la hora de entrada.',
            'sabado_entrada.date_format' => 'La hora de entrada del sábado debe tener el formato HH:MM.',
            'sabado_salida.date_format' => 'La hora de salida del sábado debe tener el formato HH:MM.',
            'sabado_salida.after' => 'La hora de salida del sábado debe ser posterior a la hora de entrada.',
            'domingo_entrada.date_format' => 'La hora de entrada del domingo debe tener el formato HH:MM.',
            'domingo_salida.date_format' => 'La hora de salida del domingo debe tener el formato HH:MM.',
            'domingo_salida.after' => 'La hora de salida del domingo debe ser posterior a la hora de entrada.',
            'festivos_entrada.date_format' => 'La hora de entrada en días festivos debe tener el formato HH:MM.',
            'festivos_salida.date_format' => 'La hora de salida en días festivos debe tener el formato HH:MM.',
            'festivos_salida.after' => 'La hora de salida en días festivos debe ser posterior a la hora de entrada.',
        ]);

        // Guardamos los datos
        $medico = new Medico();

        $medico->curp = $request->curp;
        $medico->apellido_paterno = $request->apellido_paterno;
        $medico->apellido_materno = $request->apellido_materno;
        $medico->nombres = $request->nombres;
        $medico->pais_nacimiento_id = $request->pais_nacimiento_id;
        $medico->tipo_personal_id = $request->tipo_personal_id;
        $medico->cedula_profesional = $request->cedula;
        $medico->servicio_id = $request->servicio_id;
        $medico->clues_id = $request->clues_id;
        $medico->programa_smymg = $request->programa_smymg;

        $medico->lunes_entrada = $request->lunes_entrada;
        $medico->lunes_salida = $request->lunes_salida;
        $medico->martes_entrada = $request->martes_entrada;
        $medico->martes_salida = $request->martes_salida;
        $medico->miercoles_entrada = $request->miercoles_entrada;
        $medico->miercoles_salida = $request->miercoles_salida;
        $medico->jueves_entrada = $request->jueves_entrada;
        $medico->jueves_salida = $request->jueves_salida;
        $medico->viernes_entrada = $request->viernes_entrada;
        $medico->viernes_salida = $request->viernes_salida;
        $medico->sabado_entrada = $request->sabado_entrada;
        $medico->sabado_salida = $request->sabado_salida;
        $medico->domingo_entrada = $request->domingo_entrada;
        $medico->domingo_salida = $request->domingo_salida;
        $medico->festivos_entrada = $request->festivos_entrada;
        $medico->festivos_salida = $request->festivos_salida;

        $medico->save();

        return redirect()->route('medicosIndex')->with('success', 'Registro realizado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function medicosShow($id)
    {
        $medico = Medico::findOrFail($id);

        return view('settings.medicos.show-medico', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function medicosEdit($id)
    {
        $medico = Medico::findOrFail($id);

        $tiposPersonalMedico = CatTipoPersonalMedico::all();

        $servicioEspecialidadMedico = CatServiciosEspecialidadMedico::all();

        $paisesNacimiento = CatPais::orderBy('pais', 'asc')->get();

        return view('settings.medicos.edit-medico', compact('medico', 'tiposPersonalMedico', 'servicioEspecialidadMedico', 'paisesNacimiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function medicosUpdate(Request $request, $id)
    {
        $request->validate([
            'curp' => 'required|string|size:18',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'nombres' => 'required|string|max:150',
            'programa_smymg' => 'required|in:0,1',
            'cedula' => 'required|string|max:16',
            'tipo_personal_id' => 'required|integer|exists:cat_tipos_personal_medico,id',
            'servicio_id' => 'required|integer|exists:cat_servicios_especialidad_medicos,id',

            'lunes_entrada' => 'nullable|date_format:H:i',
            'lunes_salida' => 'nullable|date_format:H:i|after:lunes_entrada',
            'martes_entrada' => 'nullable|date_format:H:i',
            'martes_salida' => 'nullable|date_format:H:i|after:martes_entrada',
            'miercoles_entrada' => 'nullable|date_format:H:i',
            'miercoles_salida' => 'nullable|date_format:H:i|after:miercoles_entrada',
            'jueves_entrada' => 'nullable|date_format:H:i',
            'jueves_salida' => 'nullable|date_format:H:i|after:jueves_entrada',
            'viernes_entrada' => 'nullable|date_format:H:i',
            'viernes_salida' => 'nullable|date_format:H:i|after:viernes_entrada',
            'sabado_entrada' => 'nullable|date_format:H:i',
            'sabado_salida' => 'nullable|date_format:H:i|after:sabado_entrada',
            'domingo_entrada' => 'nullable|date_format:H:i',
            'domingo_salida' => 'nullable|date_format:H:i|after:domingo_entrada', 
            'festivos_entrada' => 'nullable|date_format:H:i',
            'festivos_salida' => 'nullable|date_format:H:i|after:festivos_entrada',
        ], [
            'curp.required' => 'El CURP es obligatorio.',
            'curp.size' => 'El CURP debe tener exactamente 18 caracteres.',

            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'apellido_paterno.max' => 'El apellido paterno no puede tener más de 100 caracteres.',

            'apellido_materno.required' => 'El apellido materno es obligatorio.',
            'apellido_materno.max' => 'El apellido materno no puede tener más de 100 caracteres.',

            'nombres.required' => 'El nombre es obligatorio.',
            'nombres.max' => 'El nombre no puede tener más de 150 caracteres.',

            'tipo_personal_id.required' => 'El tipo de personal es obligatorio.',
            'tipo_personal_id.integer' => 'El tipo de personal debe ser un número válido.',
            'tipo_personal_id.exists' => 'El tipo de personal seleccionado no existe.',

            'servicio_id.required' => 'El servicio o especialidad es obligatorio.',
            'servicio_id.integer' => 'El servicio o especialidad debe ser un número válido.',
            'servicio_id.exists' => 'El servicio o especialidad seleccionado no existe.',

            'clues_id.required' => 'La unidad CLUES es obligatoria.',
            'clues_id.integer' => 'La unidad CLUES debe ser un número válido.',
            'clues_id.exists' => 'La unidad CLUES seleccionada no existe.',

            'cedula.required' => 'La cédula profesional es obligatoria.',
            'cedula.string' => 'La cédula debe ser texto.',
            'cedula.max' => 'La cédula no debe exceder los 16 caracteres.',

            'programa_smymg.required' => 'Debe indicar si el médico pertenece al Programa U013.',
            'programa_smymg.boolean' => 'El valor seleccionado no es válido.',

            'lunes_entrada.date_format' => 'La hora de entrada del lunes debe tener el formato HH:MM.',
            'lunes_salida.date_format' => 'La hora de salida del lunes debe tener el formato HH:MM.',
            'lunes_salida.after' => 'La hora de salida del lunes debe ser posterior a la hora de entrada.',
            'martes_entrada.date_format' => 'La hora de entrada del martes debe tener el formato HH:MM.',
            'martes_salida.date_format' => 'La hora de salida del martes debe tener el formato HH:MM.',
            'martes_salida.after' => 'La hora de salida del martes debe ser posterior a la hora de entrada.',
            'miercoles_entrada.date_format' => 'La hora de entrada del miércoles debe tener el formato HH:MM.',
            'miercoles_salida.date_format' => 'La hora de salida del miércoles debe tener el formato HH:MM.',
            'miercoles_salida.after' => 'La hora de salida del miércoles debe ser posterior a la hora de entrada.',
            'jueves_entrada.date_format' => 'La hora de entrada del jueves debe tener el formato HH:MM.',
            'jueves_salida.date_format' => 'La hora de salida del jueves debe tener el formato HH:MM.',
            'jueves_salida.after' => 'La hora de salida del jueves debe ser posterior a la hora de entrada.',
            'viernes_entrada.date_format' => 'La hora de entrada del viernes debe tener el formato HH:MM.',
            'viernes_salida.date_format' => 'La hora de salida del viernes debe tener el formato HH:MM.',
            'viernes_salida.after' => 'La hora de salida del viernes debe ser posterior a la hora de entrada.',
            'sabado_entrada.date_format' => 'La hora de entrada del sábado debe tener el formato HH:MM.',
            'sabado_salida.date_format' => 'La hora de salida del sábado debe tener el formato HH:MM.',
            'sabado_salida.after' => 'La hora de salida del sábado debe ser posterior a la hora de entrada.',
            'domingo_entrada.date_format' => 'La hora de entrada del domingo debe tener el formato HH:MM.',
            'domingo_salida.date_format' => 'La hora de salida del domingo debe tener el formato HH:MM.',
            'domingo_salida.after' => 'La hora de salida del domingo debe ser posterior a la hora de entrada.',
            'festivos_entrada.date_format' => 'La hora de entrada en días festivos debe tener el formato HH:MM.',
            'festivos_salida.date_format' => 'La hora de salida en días festivos debe tener el formato HH:MM.',
            'festivos_salida.after' => 'La hora de salida en días festivos debe ser posterior a la hora de entrada.',
        ]);

        // Guardamos los datos
        $medico = Medico::findOrFail($id);

        $medico->curp = $request->curp;
        $medico->apellido_paterno = $request->apellido_paterno;
        $medico->apellido_materno = $request->apellido_materno;
        $medico->nombres = $request->nombres;
        $medico->tipo_personal_id = $request->tipo_personal_id;
        $medico->cedula_profesional = $request->cedula;
        $medico->servicio_id = $request->servicio_id;
        $medico->programa_smymg = $request->programa_smymg;

        $medico->lunes_entrada = $request->lunes_entrada;
        $medico->lunes_salida = $request->lunes_salida;
        $medico->martes_entrada = $request->martes_entrada;
        $medico->martes_salida = $request->martes_salida;
        $medico->miercoles_entrada = $request->miercoles_entrada;
        $medico->miercoles_salida = $request->miercoles_salida;
        $medico->jueves_entrada = $request->jueves_entrada;
        $medico->jueves_salida = $request->jueves_salida;
        $medico->viernes_entrada = $request->viernes_entrada;
        $medico->viernes_salida = $request->viernes_salida;
        $medico->sabado_entrada = $request->sabado_entrada;
        $medico->sabado_salida = $request->sabado_salida;
        $medico->domingo_entrada = $request->domingo_entrada;
        $medico->domingo_salida = $request->domingo_salida;
        $medico->festivos_entrada = $request->festivos_entrada;
        $medico->festivos_salida = $request->festivos_salida;

        $medico->save();

        return redirect()->route('medicosIndex')->with('update', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function medicosDestroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect()->route('medicosIndex')->with('destroy', 'Registro eliminado correctamente');
    }

    public function indexMedicosVacacion($id)
    {
        $medico = Medico::findOrFail($id);

        $medicoVacaciones = $medico->vacaciones()
            ->whereYear('fecha', now()->year)
            ->orderBy('fecha')
            ->get();

        return view('settings.medicos.index-medico-vacacion',compact('medico', 'medicoVacaciones'));
    }

    public function createMedicosVacacion($id)
    {
        $medico = Medico::findOrFail($id);

        $user = Auth::user();

        if ($medico->clues_id !== $user->clues_id) {
            abort(403, 'No tienes permiso para asignar vacaciones a este médico.');
        }

        return view('settings.medicos.create-medico-vacacion', compact('medico'));
    }

    public function storeMedicosVacacion(Request $request, $id)
    {
        $request->validate([
            'fecha'=> 'date|required|after_or_equal:today',
            'concepto' => 'required|string|max:50',
        ],[
            'fecha.required' => 'Debe seleccionar una fecha.',
            'fecha.date' => 'La fecha seleccionada no es válida.',
            'fecha.after' => 'La fecha debe ser posterior al día de hoy.',

            'concepto.required' => 'Debe capturar el concepto.',
            'concepto.string' => 'El concepto debe ser un texto válido.',
            'concepto.max' => 'El concepto no puede exceder los 50 caracteres.',
        ]);

        $consultaMedicoVacacion = MedicoVacacion::where('medico_id',$id)
            ->whereDate('fecha', $request->fecha)
            ->exists();

        if ($consultaMedicoVacacion) {
            return back()
                ->withErrors([
                    'fecha' => 'La fecha seleccionada ya fue asignada para este médico.'
                ])
                ->withInput();
        }

        $medicoVacacion = new MedicoVacacion();

        $medicoVacacion->medico_id = $id;
        $medicoVacacion->fecha = $request->fecha;
        $medicoVacacion->concepto = $request->concepto;

        $medicoVacacion->save();

        return redirect()->route('indexMedicosVacacion',$id)->with('success', 'Fecha registrada correctamente');
    }

    public function deleteMedicosVacacion($id)
    {
        $medicoVacacion = MedicoVacacion::findOrFail($id);

        $user = Auth::user();

        if ($medicoVacacion->medico->clues_id !== $user->clues_id) {
            abort(403, 'No tienes permiso para eliminar vacaciones a este médico.');
        }

        $medicoVacacion->delete();

        return redirect()->route('indexMedicosVacacion',$medicoVacacion->medico_id)->with('destroy', 'Fecha eliminada correctamente');
    }
}
