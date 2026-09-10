<?php

namespace App\Http\Controllers;

use App\Models\CatPais;
use App\Models\CatServiciosEspecialidadMedico;
use App\Models\CatClue;
use App\Models\CatTipoPersonalUnidad;
use App\Models\PersonalUnidad;
use App\Models\PersonalUnidadVacacion;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalUnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function personalUnidadIndex()
    {
        $user = Auth::user();

        $personalUnidad = PersonalUnidad::where('clues_id', $user->clues_id)->get();
        
        return view('settings.personal-unidad.index-personal-unidad', compact('personalUnidad'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function personalUnidadCreate()
    {
        $tiposPersonalMedico = CatTipoPersonalUnidad::all();

        $servicioEspecialidadMedico = CatServiciosEspecialidadMedico::all();

        $clues = CatClue::orderBy('clues', 'asc')->get();
        
        $usuario = Auth::user();

        $paisesNacimiento = CatPais::orderBy('pais', 'asc')->get();

        return view('settings.personal-unidad.create-personal-unidad', compact('tiposPersonalMedico','servicioEspecialidadMedico','clues','usuario','paisesNacimiento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function personalUnidadStore(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'curp' => 'required|string|size:18|unique:personal_unidad,curp',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'nombres' => 'required|string|max:150',
            'pais_nacimiento_id' => 'required|integer|exists:cat_paises,id',
            'cedula' => 'required|string|max:16',
            'tipo_personal_id' => 'required|integer|exists:cat_tipos_personal_unidad,id',
            'servicio_id' => 'required|integer|exists:cat_servicios_especialidad_medicos,id',
            'clues_id' => 'required|integer|exists:cat_clues,id',
            'programa_smymg' => 'required|in:0,1',
            'medico_consulta_externa' => 'required|in:0,1',

            'lunes_entrada' => 'nullable|date_format:H:i',
            'lunes_salida' => 'nullable|date_format:H:i|after:lunes_entrada',
            'lunes_atiende' => 'nullable|boolean',

            'martes_entrada' => 'nullable|date_format:H:i',
            'martes_salida' => 'nullable|date_format:H:i|after:martes_entrada',
            'martes_atiende' => 'nullable|boolean',

            'miercoles_entrada' => 'nullable|date_format:H:i',
            'miercoles_salida' => 'nullable|date_format:H:i|after:miercoles_entrada',
            'miercoles_atiende' => 'nullable|boolean',

            'jueves_entrada' => 'nullable|date_format:H:i',
            'jueves_salida' => 'nullable|date_format:H:i|after:jueves_entrada',
            'jueves_atiende' => 'nullable|boolean',

            'viernes_entrada' => 'nullable|date_format:H:i',
            'viernes_salida' => 'nullable|date_format:H:i|after:viernes_entrada',
            'viernes_atiende' => 'nullable|boolean',

            'sabado_entrada' => 'nullable|date_format:H:i',
            'sabado_salida' => 'nullable|date_format:H:i|after:sabado_entrada',
            'sabado_atiende' => 'nullable|boolean',

            'domingo_entrada' => 'nullable|date_format:H:i',
            'domingo_salida' => 'nullable|date_format:H:i|after:domingo_entrada', 
            'domingo_atiende' => 'nullable|boolean',

            'festivos_entrada' => 'nullable|date_format:H:i',
            'festivos_salida' => 'nullable|date_format:H:i|after:festivos_entrada',
            'festivos_atiende' => 'nullable|boolean',

        ], [
            'curp.required' => 'El CURP es obligatorio.',
            'curp.size' => 'El CURP debe tener exactamente 18 caracteres.',
            'curp.unique' => 'Ya existe un médico registrado con esa CURP.',

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
            'lunes_atiende.boolean' => 'El campo atiende de lunes debe ser un valor válido.',

            'martes_entrada.date_format' => 'La hora de entrada del martes debe tener el formato HH:MM.',
            'martes_salida.date_format' => 'La hora de salida del martes debe tener el formato HH:MM.',
            'martes_salida.after' => 'La hora de salida del martes debe ser posterior a la hora de entrada.',
            'martes_atiende.boolean' => 'El campo atiende de martes debe ser un valor válido.',

            'miercoles_entrada.date_format' => 'La hora de entrada del miércoles debe tener el formato HH:MM.',
            'miercoles_salida.date_format' => 'La hora de salida del miércoles debe tener el formato HH:MM.',
            'miercoles_salida.after' => 'La hora de salida del miércoles debe ser posterior a la hora de entrada.',
            'miercoles_atiende.boolean' => 'El campo atiende de miércoles debe ser un valor válido.',

            'jueves_entrada.date_format' => 'La hora de entrada del jueves debe tener el formato HH:MM.',
            'jueves_salida.date_format' => 'La hora de salida del jueves debe tener el formato HH:MM.',
            'jueves_salida.after' => 'La hora de salida del jueves debe ser posterior a la hora de entrada.',
            'jueves_atiende.boolean' => 'El campo atiende de jueves debe ser un valor válido.',

            'viernes_entrada.date_format' => 'La hora de entrada del viernes debe tener el formato HH:MM.',
            'viernes_salida.date_format' => 'La hora de salida del viernes debe tener el formato HH:MM.',
            'viernes_salida.after' => 'La hora de salida del viernes debe ser posterior a la hora de entrada.',
            'viernes_atiende.boolean' => 'El campo atiende de viernes debe ser un valor válido.',

            'sabado_entrada.date_format' => 'La hora de entrada del sábado debe tener el formato HH:MM.',
            'sabado_salida.date_format' => 'La hora de salida del sábado debe tener el formato HH:MM.',
            'sabado_salida.after' => 'La hora de salida del sábado debe ser posterior a la hora de entrada.',
            'sabado_atiende.boolean' => 'El campo atiende de sábado debe ser un valor válido.',

            'domingo_entrada.date_format' => 'La hora de entrada del domingo debe tener el formato HH:MM.',
            'domingo_salida.date_format' => 'La hora de salida del domingo debe tener el formato HH:MM.',
            'domingo_salida.after' => 'La hora de salida del domingo debe ser posterior a la hora de entrada.',
            'domingo_atiende.boolean' => 'El campo atiende de domingo debe ser un valor válido.',

            'festivos_entrada.date_format' => 'La hora de entrada en días festivos debe tener el formato HH:MM.',
            'festivos_salida.date_format' => 'La hora de salida en días festivos debe tener el formato HH:MM.',
            'festivos_salida.after' => 'La hora de salida en días festivos debe ser posterior a la hora de entrada.',
            'festivos_atiende.boolean' => 'El campo atiende de festivos debe ser un valor válido.',

            'medico_consulta_externa.required' => 'Debe indicar si el médico es de consulta externa.',
            'medico_consulta_externa.in' => 'El valor seleccionado no es válido.',
        ]);

        // Guardamos los datos
        $personalUnidad = new PersonalUnidad();

        $personalUnidad->curp = $request->curp;
        $personalUnidad->apellido_paterno = $request->apellido_paterno;
        $personalUnidad->apellido_materno = $request->apellido_materno;
        $personalUnidad->nombres = $request->nombres;
        $personalUnidad->pais_nacimiento_id = $request->pais_nacimiento_id;
        $personalUnidad->tipo_personal_id = $request->tipo_personal_id;
        $personalUnidad->cedula_profesional = $request->cedula;
        $personalUnidad->servicio_id = $request->servicio_id;
        $personalUnidad->clues_id = $request->clues_id;
        $personalUnidad->programa_smymg = $request->programa_smymg;
        $personalUnidad->medico_consulta_externa = $request->medico_consulta_externa;

        $personalUnidad->lunes_entrada = $request->lunes_entrada;
        $personalUnidad->lunes_salida = $request->lunes_salida;
        $personalUnidad->lunes_atiende = $request->boolean('lunes_atiende');

        $personalUnidad->martes_entrada = $request->martes_entrada;
        $personalUnidad->martes_salida = $request->martes_salida;
        $personalUnidad->martes_atiende = $request->boolean('martes_atiende');

        $personalUnidad->miercoles_entrada = $request->miercoles_entrada;
        $personalUnidad->miercoles_salida = $request->miercoles_salida;
        $personalUnidad->miercoles_atiende = $request->boolean('miercoles_atiende');

        $personalUnidad->jueves_entrada = $request->jueves_entrada;
        $personalUnidad->jueves_salida = $request->jueves_salida;
        $personalUnidad->jueves_atiende = $request->boolean('jueves_atiende');

        $personalUnidad->viernes_entrada = $request->viernes_entrada;
        $personalUnidad->viernes_salida = $request->viernes_salida;
        $personalUnidad->viernes_atiende = $request->boolean('viernes_atiende');

        $personalUnidad->sabado_entrada = $request->sabado_entrada;
        $personalUnidad->sabado_salida = $request->sabado_salida;
        $personalUnidad->sabado_atiende = $request->boolean('sabado_atiende');

        $personalUnidad->domingo_entrada = $request->domingo_entrada;
        $personalUnidad->domingo_salida = $request->domingo_salida;
        $personalUnidad->domingo_atiende = $request->boolean('domingo_atiende');

        $personalUnidad->festivos_entrada = $request->festivos_entrada;
        $personalUnidad->festivos_salida = $request->festivos_salida;
        $personalUnidad->festivos_atiende = $request->boolean('festivos_atiende');

        $personalUnidad->save();

        return redirect()->route('personalUnidadIndex')->with('success', 'Registro realizado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function personalUnidadShow($id)
    {
        $personalUnidad = PersonalUnidad::findOrFail($id);

        return view('settings.personal-unidad.show-personal-unidad', compact('personalUnidad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function personalUnidadEdit($id)
    {
        $personalUnidad = PersonalUnidad::findOrFail($id);

        $tiposPersonalUnidad = CatTipoPersonalUnidad::all();

        $servicioEspecialidadMedico = CatServiciosEspecialidadMedico::all();

        $paisesNacimiento = CatPais::orderBy('pais', 'asc')->get();

        return view('settings.personal-unidad.edit-personal-unidad', compact('personalUnidad', 'tiposPersonalUnidad', 'servicioEspecialidadMedico', 'paisesNacimiento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function personalUnidadUpdate(Request $request, $id)
    {
        //dd($request->all());

        $request->validate([
            'curp' => 'required|string|size:18',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'nombres' => 'required|string|max:150',
            'programa_smymg' => 'required|in:0,1',
            'medico_consulta_externa' => 'required|in:0,1',
            'cedula' => 'required|string|max:16',
            'tipo_personal_id' => 'required|integer|exists:cat_tipos_personal_unidad,id',
            'servicio_id' => 'required|integer|exists:cat_servicios_especialidad_medicos,id',

            'lunes_entrada'     => 'nullable|date_format:H:i,H:i:s',
            'lunes_salida'      => 'nullable|date_format:H:i,H:i:s|required_with:lunes_entrada|after:lunes_entrada',
            'lunes_atiende'     => 'nullable|boolean',

            'martes_entrada'    => 'nullable|date_format:H:i,H:i:s',
            'martes_salida'     => 'nullable|date_format:H:i,H:i:s|required_with:martes_entrada|after:martes_entrada',
            'martes_atiende'    => 'nullable|boolean',

            'miercoles_entrada' => 'nullable|date_format:H:i,H:i:s',
            'miercoles_salida'  => 'nullable|date_format:H:i,H:i:s|required_with:miercoles_entrada|after:miercoles_entrada',
            'miercoles_atiende'  => 'nullable|boolean',

            'jueves_entrada'    => 'nullable|date_format:H:i,H:i:s',
            'jueves_salida'     => 'nullable|date_format:H:i,H:i:s|required_with:jueves_entrada|after:jueves_entrada',
            'jueves_atiende'    => 'nullable|boolean',

            'viernes_entrada'   => 'nullable|date_format:H:i,H:i:s',
            'viernes_salida'    => 'nullable|date_format:H:i,H:i:s|required_with:viernes_entrada|after:viernes_entrada',
            'viernes_atiende'   => 'nullable|boolean',

            'sabado_entrada'    => 'nullable|date_format:H:i,H:i:s',
            'sabado_salida'     => 'nullable|date_format:H:i,H:i:s|required_with:sabado_entrada|after:sabado_entrada',
            'sabado_atiende'    => 'nullable|boolean',

            'domingo_entrada'   => 'nullable|date_format:H:i,H:i:s',
            'domingo_salida'    => 'nullable|date_format:H:i,H:i:s|required_with:domingo_entrada|after:domingo_entrada',
            'domingo_atiende'   => 'nullable|boolean',

            'festivos_entrada'  => 'nullable|date_format:H:i,H:i:s',
            'festivos_salida'   => 'nullable|date_format:H:i,H:i:s|required_with:festivos_entrada|after:festivos_entrada',
            'festivos_atiende'  => 'nullable|boolean',
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

            'medico_consulta_externa.required' => 'Debe indicar si el médico es de consulta externa.',
            'medico_consulta_externa.in' => 'El valor seleccionado no es válido.',

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
        $personalUnidad = PersonalUnidad::findOrFail($id);

        $personalUnidad->curp = $request->curp;
        $personalUnidad->apellido_paterno = $request->apellido_paterno;
        $personalUnidad->apellido_materno = $request->apellido_materno;
        $personalUnidad->nombres = $request->nombres;
        $personalUnidad->tipo_personal_id = $request->tipo_personal_id;
        $personalUnidad->cedula_profesional = $request->cedula;
        $personalUnidad->servicio_id = $request->servicio_id;
        $personalUnidad->programa_smymg = $request->programa_smymg;
        $personalUnidad->medico_consulta_externa = $request->medico_consulta_externa;

        $personalUnidad->lunes_entrada = $request->lunes_entrada;
        $personalUnidad->lunes_salida = $request->lunes_salida;
        $personalUnidad->lunes_atiende = $request->boolean('lunes_atiende');

        $personalUnidad->martes_entrada = $request->martes_entrada;
        $personalUnidad->martes_salida = $request->martes_salida;
        $personalUnidad->martes_atiende = $request->boolean('martes_atiende');

        $personalUnidad->miercoles_entrada = $request->miercoles_entrada;
        $personalUnidad->miercoles_salida = $request->miercoles_salida;
        $personalUnidad->miercoles_atiende = $request->boolean('miercoles_atiende');

        $personalUnidad->jueves_entrada = $request->jueves_entrada;
        $personalUnidad->jueves_salida = $request->jueves_salida;
        $personalUnidad->jueves_atiende = $request->boolean('jueves_atiende');

        $personalUnidad->viernes_entrada = $request->viernes_entrada;
        $personalUnidad->viernes_salida = $request->viernes_salida;
        $personalUnidad->viernes_atiende = $request->boolean('viernes_atiende');

        $personalUnidad->sabado_entrada = $request->sabado_entrada;
        $personalUnidad->sabado_salida = $request->sabado_salida;
        $personalUnidad->sabado_atiende = $request->boolean('sabado_atiende');

        $personalUnidad->domingo_entrada = $request->domingo_entrada;
        $personalUnidad->domingo_salida = $request->domingo_salida;
        $personalUnidad->domingo_atiende = $request->boolean('domingo_atiende');

        $personalUnidad->festivos_entrada = $request->festivos_entrada;
        $personalUnidad->festivos_salida = $request->festivos_salida;
        $personalUnidad->festivos_atiende = $request->boolean('festivos_atiende');

        $personalUnidad->save();

        return redirect()->route('personalUnidadIndex')->with('update', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function personalUnidadDestroy($id)
    {
        $personalUnidad = PersonalUnidad::findOrFail($id);
        $personalUnidad->delete();

        return redirect()->route('personalUnidadIndex')->with('destroy', 'Registro eliminado correctamente');
    }

    public function indexPersonalUnidadVacacion($id)
    {
        $medico = PersonalUnidad::findOrFail($id);

        $medicoVacaciones = $medico->vacaciones()
            ->whereYear('fecha', now()->year)
            ->orderBy('fecha')
            ->get();

        return view('settings.personal-unidad.index-personal-unidad-vacacion',compact('medico', 'medicoVacaciones'));
    }

    public function createPersonalUnidadVacacion($id)
    {
        $medico = PersonalUnidad::findOrFail($id);

        $user = Auth::user();

        if ($medico->clues_id !== $user->clues_id) {
            abort(403, 'No tienes permiso para asignar vacaciones a este médico.');
        }

        return view('settings.personal-unidad.create-personal-unidad-vacacion', compact('medico'));
    }

    public function storePersonalUnidadVacacion(Request $request, $id)
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

        $consultaPersonalUnidadVacacion = PersonalUnidadVacacion::where('personal_unidad_id',$id)
            ->whereDate('fecha', $request->fecha)
            ->exists();

        if ($consultaPersonalUnidadVacacion) {
            return back()
                ->withErrors([
                    'fecha' => 'La fecha seleccionada ya fue asignada para este médico.'
                ])
                ->withInput();
        }

        $personalUnidadVacacion = new PersonalUnidadVacacion();

        $personalUnidadVacacion->personal_unidad_id = $id;
        $personalUnidadVacacion->fecha = $request->fecha;
        $personalUnidadVacacion->concepto = $request->concepto;

        $personalUnidadVacacion->save();

        return redirect()->route('indexPersonalUnidadVacacion',$id)->with('success', 'Fecha registrada correctamente');
    }

    public function deletePersonalUnidadVacacion($id)
    {
        $personalUnidadVacacion = PersonalUnidadVacacion::findOrFail($id);

        $user = Auth::user();

        if ($personalUnidadVacacion->personal_unidad->clues_id !== $user->clues_id) {
            abort(403, 'No tienes permiso para eliminar vacaciones a este médico.');
        }

        $personalUnidadVacacion->delete();

        return redirect()->route('indexPersonalUnidadVacacion',$personalUnidadVacacion->personal_unidad_id)->with('destroy', 'Fecha eliminada correctamente');
    }
}
