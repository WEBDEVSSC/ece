<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use App\Models\CitaConsultaExternaLaboratorio;
use Illuminate\Http\Request;

class CitaConsultaExternaLaboratorioController extends Controller
{
    //
    public function ConsultaExternaLaboratorioIndex()
    {
        $citasHoy = CitaConsultaExterna::whereDate('fecha', today())
            ->get();

        return view('estudios-laboratorio.index-consulta-externa-laboratorio', compact('citasHoy'));
    }

    public function ConsultaExternaLaboratorioShow(String $id)
    {
        $laboratorio = CitaConsultaExternaLaboratorio::where('cita_id',$id)->first();

        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('estudios-laboratorio.show-consulta-externa-laboratorio', compact('laboratorio','citaId'));
    }

    public function ConsultaExternaLaboratorioCreate(String $id)
    {
        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('estudios-laboratorio.create-consulta-externa-laboratorio',compact('citaId'));
    }

    public function ConsultaExternaLaboratorioStore(Request $request, String $id)
    {
        $request->validate([
            'hemoglobina'       => 'nullable|numeric|min:0|max:99.99',
            'glucosa_serica'    => 'nullable|numeric|min:0|max:999.99',
            'trigliceridos'     => 'nullable|numeric|min:0|max:999.99',
            'colesterol_ldl'    => 'nullable|numeric|min:0|max:999.99',
            'colesterol_hdl'    => 'nullable|numeric|min:0|max:999.99',
            'colesterol_total'  => 'nullable|numeric|min:0|max:999.99',
            'microalbuminuria'  => 'nullable|numeric|min:0|max:999.99',
        ], [
            'hemoglobina.numeric' => 'La hemoglobina debe ser un valor numérico.',
            'hemoglobina.min'     => 'La hemoglobina no puede ser menor que 0.',
            'hemoglobina.max'     => 'La hemoglobina excede el valor permitido.',

            'glucosa_serica.numeric' => 'La glucosa sérica debe ser un valor numérico.',
            'glucosa_serica.min'     => 'La glucosa sérica no puede ser menor que 0.',
            'glucosa_serica.max'     => 'La glucosa sérica excede el valor permitido.',

            'trigliceridos.numeric' => 'Los triglicéridos deben ser un valor numérico.',
            'trigliceridos.min'     => 'Los triglicéridos no pueden ser menores que 0.',
            'trigliceridos.max'     => 'Los triglicéridos exceden el valor permitido.',

            'colesterol_ldl.numeric' => 'El colesterol LDL debe ser un valor numérico.',
            'colesterol_ldl.min'     => 'El colesterol LDL no puede ser menor que 0.',
            'colesterol_ldl.max'     => 'El colesterol LDL excede el valor permitido.',

            'colesterol_hdl.numeric' => 'El colesterol HDL debe ser un valor numérico.',
            'colesterol_hdl.min'     => 'El colesterol HDL no puede ser menor que 0.',
            'colesterol_hdl.max'     => 'El colesterol HDL excede el valor permitido.',

            'colesterol_total.numeric' => 'El colesterol total debe ser un valor numérico.',
            'colesterol_total.min'     => 'El colesterol total no puede ser menor que 0.',
            'colesterol_total.max'     => 'El colesterol total excede el valor permitido.',

            'microalbuminuria.numeric' => 'La microalbuminuria debe ser un valor numérico.',
            'microalbuminuria.min'     => 'La microalbuminuria no puede ser menor que 0.',
            'microalbuminuria.max'     => 'La microalbuminuria excede el valor permitido.',
        ]);

        $laboratorio = new CitaConsultaExternaLaboratorio();

        $laboratorio->cita_id = $id;
        $laboratorio->hemoglobina = $request->hemoglobina;
        $laboratorio->glucosa_serica = $request->glucosa_serica;
        $laboratorio->trigliceridos = $request->trigliceridos;
        $laboratorio->colesterol_ldl = $request->colesterol_ldl;
        $laboratorio->colesterol_hdl = $request->colesterol_hdl;
        $laboratorio->colesterol_total = $request->colesterol_total;
        $laboratorio->microalbuminuria = $request->microalbuminuria;

        $laboratorio->save();

        $cita = CitaConsultaExterna::findOrFail($id);

        $cita->status_laboratorios = 1;

        $cita->save();

        //$citasHoy = CitaConsultaExterna::whereDate('fecha', today())            ->get();

        return redirect()->route('citasHoyConsultaExternaEnfermeriaIndex')->with('success', 'Laboratorios registrados correctamente.');
    }
}
