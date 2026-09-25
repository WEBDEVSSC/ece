<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CatDiagnosticosMedicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DiagnosticoMedicoController extends Controller
{
    public function diagnosticosMedicosIndex()
    {
        $login = Auth::user();
    
        $diagnosticos = CatDiagnosticosMedicos::where('tipo_unidad', $login->tipo_unidad)->get();

        return view('settings.diagnosticos-medicos.index-diagnosticos-medicos',compact('diagnosticos'));
    }

    public function diagnosticosMedicosCreate()
    {
        $login = Auth::user();    

        return view('settings.diagnosticos-medicos.create-diagnosticos-medicos', compact('login'));
    }

    public function diagnosticosMedicosStore(Request $request)
    {    
        //dd($request->tipo_unidad);
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cat_diagnosticos_medicos', 'nombre')->where(function ($query) use ($request) {
                    return $query->where('tipo_unidad', $request->tipo_unidad);
                }),
            ],
            'tipo_unidad' => 'required',
        ], [
            'nombre.required' => 'El nombre del diagnóstico es obligatorio.',
            'nombre.unique' => 'Este diagnóstico ya se encuentra registrado para el tipo de unidad seleccionado.',
            'tipo_unidad.required' => 'El tipo de unidad es obligatorio.',
        ]);

        CatDiagnosticosMedicos::create([
            'nombre' => trim($request->nombre),
            'tipo_unidad' => $request->tipo_unidad,
        ]);

        return redirect()->route('diagnosticosMedicosIndex')
            ->with('success', 'Diagnóstico Médico registrado correctamente.');
    }

    public function diagnosticosMedicosEdit(String $id)
    {
        $diagnostico = CatDiagnosticosMedicos::findOrFail($id);

        return view('settings.diagnosticos-medicos.edit-diagnosticos-medicos', compact('diagnostico'));
    }
    
    public function diagnosticosMedicosUpdate(Request $request, String $id)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cat_diagnosticos_medicos', 'nombre')
                    ->where(function ($query) use ($request) {
                        return $query->where('tipo_unidad', $request->tipo_unidad);
                    })
                    ->ignore($id), // Evita la colisión de unicidad con el mismo registro
            ],
            'tipo_unidad' => 'required',
        ], [
            'nombre.required' => 'El nombre del diagnóstico es obligatorio.',
            'nombre.unique' => 'Este diagnóstico ya se encuentra registrado para el tipo de unidad seleccionado.',
            'tipo_unidad.required' => 'El tipo de unidad es obligatorio.',
        ]);

        // Buscar el registro o lanzar una excepción 404 si no existe
        $diagnostico = CatDiagnosticosMedicos::findOrFail($id);

        // Actualizar los datos del registro
        $diagnostico->update([
            'nombre' => trim($request->nombre),
            'tipo_unidad' => $request->tipo_unidad,
        ]);

        return redirect()->route('diagnosticosMedicosIndex')
            ->with('success', 'Diagnóstico Médico actualizado correctamente.');
    }

    public function diagnosticosMedicosDelete(String $id)
    {
        // Buscar el diagnóstico por ID o lanzar un error 404 si no existe
        $diagnostico = CatDiagnosticosMedicos::findOrFail($id);

        // Eliminar el registro de la base de datos
        $diagnostico->delete();

        // Redireccionar al listado con un mensaje de éxito
        return redirect()->route('diagnosticosMedicosIndex')
            ->with('success', 'Diagnóstico Médico eliminado correctamente.');
    }
}
