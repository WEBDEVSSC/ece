<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use App\Models\CitaConsultaExternaSignosVitales;
use Illuminate\Http\Request;

class CitaConsultaExternaSignosVitalesController extends Controller
{
    public function SignosVitalesConsultaExternaIndex()
    {
        $citasHoy = CitaConsultaExterna::whereDate('fecha', today())
            ->get();

        return view('signos-vitales.index-enfermeria-signos-vitales', compact('citasHoy'));
    }

    public function SignosVitalesShow(String $id)
    {
        $signosVitales = CitaConsultaExternaSignosVitales::where('cita_id',$id)->first();

        return view('signos-vitales.show-enfermeria-signos-vitales', compact('signosVitales'));
    }

    public function SignosVitalesCreate(String $id)
    {
        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('signos-vitales.create-enfermeria-signos-vitales',compact('citaId'));
    }

    public function SignosVitalesStore(Request $request, String $id)
    {
        $request->validate([
            'temperatura'                  => 'nullable|numeric|between:30,45',
            'frecuencia_cardiaca'          => 'nullable|integer|between:20,250',
            'frecuencia_respiratoria'      => 'nullable|integer|between:5,80',
            'saturacion_oxigeno'           => 'nullable|integer|between:0,100',

            'tension_arterial_sistolica'   => 'nullable|integer|between:40,300',
            'tension_arterial_diastolica'  => 'nullable|integer|between:20,200',

            'glicemia_capilar'             => 'nullable|integer|between:20,1000',
            'glicemia_capilar_medicion'    => 'required|integer|in:1,2',

            'circunferencia_cintura'       => 'nullable|numeric|',
            'peso'                         => 'nullable|numeric|between:0.5,500',
            'talla'                        => 'nullable|numeric|',
        ],[
            'temperatura.numeric' => 'La temperatura debe ser un valor numérico.',
            'temperatura.between' => 'La temperatura debe estar entre 30 y 45 °C.',

            'frecuencia_cardiaca.integer' => 'La frecuencia cardíaca debe ser un número entero.',
            'frecuencia_cardiaca.between' => 'La frecuencia cardíaca debe estar entre 20 y 250 lpm.',

            'frecuencia_respiratoria.integer' => 'La frecuencia respiratoria debe ser un número entero.',
            'frecuencia_respiratoria.between' => 'La frecuencia respiratoria debe estar entre 5 y 80 rpm.',

            'saturacion_oxigeno.integer' => 'La saturación de oxígeno debe ser un número entero.',
            'saturacion_oxigeno.between' => 'La saturación de oxígeno debe estar entre 0 y 100%.',

            'tension_arterial_sistolica.integer' => 'La presión sistólica debe ser un número entero.',
            'tension_arterial_sistolica.between' => 'La presión sistólica debe estar entre 40 y 300 mmHg.',

            'tension_arterial_diastolica.integer' => 'La presión diastólica debe ser un número entero.',
            'tension_arterial_diastolica.between' => 'La presión diastólica debe estar entre 20 y 200 mmHg.',

            'glicemia_capilar.integer' => 'La glicemia capilar debe ser un número entero.',
            'glicemia_capilar.between' => 'La glicemia capilar debe estar entre 20 y 1000 mg/dL.',

            'glicemia_capilar_medicion.required' => 'Seleccione el tipo de medición de la glicemia capilar.',
            'glicemia_capilar_medicion.in' => 'El tipo de medición seleccionado no es válido.',

            'circunferencia_cintura.numeric' => 'La circunferencia de cintura debe ser un valor numérico.',
            'circunferencia_cintura.between' => 'La circunferencia de cintura debe estar entre 0.20 y 3.00 metros.',

            'peso.numeric' => 'El peso debe ser un valor numérico.',
            'peso.between' => 'El peso debe estar entre 0.5 y 500 kg.',

            'talla.numeric' => 'La talla debe ser un valor numérico.',
            'talla.between' => 'La talla debe estar entre 0.30 y 2.50 metros.',
        ]);
        
        $tallaMetros = $request->talla / 100;

        $imc = round($request->peso / ($tallaMetros * $tallaMetros), 2);

        $citaConsultaExterna = new CitaConsultaExternaSignosVitales();

        $citaConsultaExterna->cita_id = $id;
        $citaConsultaExterna->temperatura = $request->temperatura;
        $citaConsultaExterna->frecuencia_cardiaca = $request->frecuencia_cardiaca;
        $citaConsultaExterna->frecuencia_respiratoria = $request->frecuencia_respiratoria;
        $citaConsultaExterna->saturacion_oxigeno = $request->saturacion_oxigeno;
        $citaConsultaExterna->tension_arterial_sistolica = $request->tension_arterial_sistolica;
        $citaConsultaExterna->tension_arterial_diastolica = $request->tension_arterial_diastolica;
        $citaConsultaExterna->glicemia_capilar = $request->glicemia_capilar;
        $citaConsultaExterna->glicemia_capilar_medicion = $request->glicemia_capilar_medicion;
        $citaConsultaExterna->circunferencia_cintura = $request->circunferencia_cintura;
        $citaConsultaExterna->peso = $request->peso;
        $citaConsultaExterna->talla = $request->talla;
        $citaConsultaExterna->imc = $imc;

        $citaConsultaExterna->save();

        $cita = CitaConsultaExterna::findOrFail($id);

        $cita->status_signos_vitales = 1;

        $cita->save();

        //$citasHoy = CitaConsultaExterna::whereDate('fecha', today())            ->get();

        return redirect()->route('SignosVitalesConsultaExternaIndex')->with('success', 'Signos vitales registrados correctamente.');
    }
}
