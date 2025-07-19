<?php

namespace App\Http\Controllers;

use App\Models\Clue;
use App\Models\Medico;
use App\Models\ServiciosEspecialidadMedico;
use App\Models\TipoPersonalMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function medicosIndex()
    {
        $medicos = Medico::all();
        //
        return view('medicos.index-medico', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function medicosCreate()
    {
        $tiposPersonalMedico = TipoPersonalMedico::all();

        $servicioEspecialidadMedico = ServiciosEspecialidadMedico::all();

        $clues = Clue::orderBy('clues', 'asc')->get();
        
        $usuario = Auth::user();

        return view('medicos.create-medico', compact('tiposPersonalMedico','servicioEspecialidadMedico','clues','usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function medicosStore(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'curp' => 'required|string|size:18', // CURP tiene 18 caracteres exactos
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'nombres' => 'required|string|max:150',
            'cedula' => 'required|string|max:16',
            'tipo_personal_id' => 'required|integer|exists:tipos_personal_medico,id',
            'servicio_id' => 'required|integer|exists:servicios_especialidad_medicos,id',
            'clues_id' => 'required|integer|exists:clues,id',
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
        ]);

        // Consultamos el tipo de personal
        $tiposPersonalMedico = TipoPersonalMedico::findOrFail($request->tipo_personal_id);

        // Consultamos el tipo de personal
        $servicioEspecialidadMedico = ServiciosEspecialidadMedico::findOrFail($request->servicio_id);

        // Consultamos el tipo de personal
        $clues = Clue::findOrFail($request->clues_id);

        // Guardamos los datos
        $medico = new Medico();

        $medico->curp = $request->curp;
        $medico->apellido_paterno = $request->apellido_paterno;
        $medico->apellido_materno = $request->apellido_materno;
        $medico->nombres = $request->nombres;
        $medico->tipo_personal_id = $request->tipo_personal_id;
        $medico->tipo_personal_label = $tiposPersonalMedico->descripcion;
        $medico->cedula_profesional = $request->cedula;
        $medico->servicio_id = $request->servicio_id;
        $medico->servicio_label = $servicioEspecialidadMedico->especialidad;
        $medico->clues_id = $request->clues_id;
        $medico->clues_clues = $clues->clues ;
        $medico->clues_label = $clues->nombre;

        $medico->save();

        return redirect()->route('medicosIndex')->with('success', 'Registro realizado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
