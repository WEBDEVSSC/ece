<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use App\Models\CitaConsultaExternaExamenVascular;
use Illuminate\Http\Request;

class UnemeEnfermeriaExamenVascularController extends Controller
{
    public function UnemeEnfermeriaExamenVascularShow(String $id)
    {
        $examenVascular = CitaConsultaExternaExamenVascular::where('cita_id', $id)->firstOrFail();
        
        $citaId = CitaConsultaExterna::findOrFail($id);    

        return view('consulta-externa.unemes.enfermeria.examen-vascular.show-examen-vascular', compact('id','citaId', 'examenVascular'));
    }

    public function UnemeEnfermeriaExamenVascularCreate(String $id)
    {
        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('consulta-externa.unemes.enfermeria.examen-vascular.create-examen-vascular', compact('id','citaId'));
    }

    public function UnemeEnfermeriaExamenVascularStore(Request $request, String $id)
    {   
        $request->validate([

            // Pie derecho - Sistema arterial
            'pd_pulso_pedio' => 'required|integer|min:0',
            'pd_pulso_pedio_calificacion' => 'required|integer|min:0',
            'pd_llenado_capilar' => 'required|integer|min:0',
            'pd_llenado_capilar_calificacion' => 'required|integer|min:0',
            'pd_sistema_arterial_subtotal' => 'required|integer|min:0',

            // Pie derecho - Sistema venoso
            'pd_varices' => 'required|integer|min:0',
            'pd_edema' => 'required|integer|min:0',
            'pd_sistema_venoso_subtotal' => 'required|integer|min:0',

            // Pie izquierdo - Sistema arterial
            'pi_pulso_pedio' => 'required|integer|min:0',
            'pi_pulso_pedio_calificacion' => 'required|integer|min:0',
            'pi_llenado_capilar' => 'required|integer|min:0',
            'pi_llenado_capilar_calificacion' => 'required|integer|min:0',
            'pi_sistema_arterial_subtotal' => 'required|integer|min:0',

            // Pie izquierdo - Sistema venoso
            'pi_varices' => 'required|integer|min:0',
            'pi_edema' => 'required|integer|min:0',
            'pi_sistema_venoso_subtotal' => 'required|integer|min:0',
        ],[
            // Pie derecho - Sistema arterial
            'pd_pulso_pedio.required' => 'El pulso pedio del pie derecho es obligatorio.',
            'pd_pulso_pedio.integer' => 'El pulso pedio del pie derecho debe ser un número entero.',
            'pd_pulso_pedio.min' => 'El pulso pedio del pie derecho no puede ser menor a 0.',

            'pd_pulso_pedio_calificacion.required' => 'La calificación del pulso pedio del pie derecho es obligatoria.',
            'pd_pulso_pedio_calificacion.integer' => 'La calificación del pulso pedio del pie derecho debe ser un número entero.',
            'pd_pulso_pedio_calificacion.min' => 'La calificación del pulso pedio del pie derecho no puede ser menor a 0.',

            'pd_llenado_capilar.required' => 'El llenado capilar del pie derecho es obligatorio.',
            'pd_llenado_capilar.integer' => 'El llenado capilar del pie derecho debe ser un número entero.',
            'pd_llenado_capilar.min' => 'El llenado capilar del pie derecho no puede ser menor a 0.',

            'pd_llenado_capilar_calificacion.required' => 'La calificación del llenado capilar del pie derecho es obligatoria.',
            'pd_llenado_capilar_calificacion.integer' => 'La calificación del llenado capilar del pie derecho debe ser un número entero.',
            'pd_llenado_capilar_calificacion.min' => 'La calificación del llenado capilar del pie derecho no puede ser menor a 0.',

            'pd_sistema_arterial_subtotal.required' => 'El subtotal del sistema arterial del pie derecho es obligatorio.',
            'pd_sistema_arterial_subtotal.integer' => 'El subtotal del sistema arterial del pie derecho debe ser un número entero.',
            'pd_sistema_arterial_subtotal.min' => 'El subtotal del sistema arterial del pie derecho no puede ser menor a 0.',

            // Pie derecho - Sistema venoso
            'pd_varices.required' => 'La calificación de várices del pie derecho es obligatoria.',
            'pd_varices.integer' => 'La calificación de várices del pie derecho debe ser un número entero.',
            'pd_varices.min' => 'La calificación de várices del pie derecho no puede ser menor a 0.',

            'pd_edema.required' => 'La calificación de edema del pie derecho es obligatoria.',
            'pd_edema.integer' => 'La calificación de edema del pie derecho debe ser un número entero.',
            'pd_edema.min' => 'La calificación de edema del pie derecho no puede ser menor a 0.',

            'pd_sistema_venoso_subtotal.required' => 'El subtotal del sistema venoso del pie derecho es obligatorio.',
            'pd_sistema_venoso_subtotal.integer' => 'El subtotal del sistema venoso del pie derecho debe ser un número entero.',
            'pd_sistema_venoso_subtotal.min' => 'El subtotal del sistema venoso del pie derecho no puede ser menor a 0.',

            // Pie izquierdo - Sistema arterial
            'pi_pulso_pedio.required' => 'El pulso pedio del pie izquierdo es obligatorio.',
            'pi_pulso_pedio.integer' => 'El pulso pedio del pie izquierdo debe ser un número entero.',
            'pi_pulso_pedio.min' => 'El pulso pedio del pie izquierdo no puede ser menor a 0.',

            'pi_pulso_pedio_calificacion.required' => 'La calificación del pulso pedio del pie izquierdo es obligatoria.',
            'pi_pulso_pedio_calificacion.integer' => 'La calificación del pulso pedio del pie izquierdo debe ser un número entero.',
            'pi_pulso_pedio_calificacion.min' => 'La calificación del pulso pedio del pie izquierdo no puede ser menor a 0.',

            'pi_llenado_capilar.required' => 'El llenado capilar del pie izquierdo es obligatorio.',
            'pi_llenado_capilar.integer' => 'El llenado capilar del pie izquierdo debe ser un número entero.',
            'pi_llenado_capilar.min' => 'El llenado capilar del pie izquierdo no puede ser menor a 0.',

            'pi_llenado_capilar_calificacion.required' => 'La calificación del llenado capilar del pie izquierdo es obligatoria.',
            'pi_llenado_capilar_calificacion.integer' => 'La calificación del llenado capilar del pie izquierdo debe ser un número entero.',
            'pi_llenado_capilar_calificacion.min' => 'La calificación del llenado capilar del pie izquierdo no puede ser menor a 0.',

            'pi_sistema_arterial_subtotal.required' => 'El subtotal del sistema arterial del pie izquierdo es obligatorio.',
            'pi_sistema_arterial_subtotal.integer' => 'El subtotal del sistema arterial del pie izquierdo debe ser un número entero.',
            'pi_sistema_arterial_subtotal.min' => 'El subtotal del sistema arterial del pie izquierdo no puede ser menor a 0.',

            // Pie izquierdo - Sistema venoso
            'pi_varices.required' => 'La calificación de várices del pie izquierdo es obligatoria.',
            'pi_varices.integer' => 'La calificación de várices del pie izquierdo debe ser un número entero.',
            'pi_varices.min' => 'La calificación de várices del pie izquierdo no puede ser menor a 0.',

            'pi_edema.required' => 'La calificación de edema del pie izquierdo es obligatoria.',
            'pi_edema.integer' => 'La calificación de edema del pie izquierdo debe ser un número entero.',
            'pi_edema.min' => 'La calificación de edema del pie izquierdo no puede ser menor a 0.',

            'pi_sistema_venoso_subtotal.required' => 'El subtotal del sistema venoso del pie izquierdo es obligatorio.',
            'pi_sistema_venoso_subtotal.integer' => 'El subtotal del sistema venoso del pie izquierdo debe ser un número entero.',
            'pi_sistema_venoso_subtotal.min' => 'El subtotal del sistema venoso del pie izquierdo no puede ser menor a 0.',
        ]);

        $examenVascular = new CitaConsultaExternaExamenVascular();

        $examenVascular->cita_id = $id;
        $examenVascular->pd_pulso_pedio = $request->pd_pulso_pedio;
        $examenVascular->pd_pulso_pedio_calificacion = $request->pd_pulso_pedio_calificacion;
        $examenVascular->pd_llenado_capilar = $request->pd_llenado_capilar;
        $examenVascular->pd_llenado_capilar_calificacion = $request->pd_llenado_capilar_calificacion;
        $examenVascular->pd_sistema_arterial_subtotal = $request->pd_sistema_arterial_subtotal;
        $examenVascular->pd_varices = $request->pd_varices;
        $examenVascular->pd_edema = $request->pd_edema;
        $examenVascular->pd_sistema_venoso_subtotal = $request->pd_sistema_venoso_subtotal;
        $examenVascular->pi_pulso_pedio = $request->pi_pulso_pedio;
        $examenVascular->pi_pulso_pedio_calificacion = $request->pi_pulso_pedio_calificacion;
        $examenVascular->pi_llenado_capilar = $request->pi_llenado_capilar;
        $examenVascular->pi_llenado_capilar_calificacion = $request->pi_llenado_capilar_calificacion;
        $examenVascular->pi_sistema_arterial_subtotal = $request->pi_sistema_arterial_subtotal;
        $examenVascular->pi_varices = $request->pi_varices;
        $examenVascular->pi_edema = $request->pi_edema;
        $examenVascular->pi_sistema_venoso_subtotal = $request->pi_sistema_venoso_subtotal;

        $examenVascular->save();

        $examenVascular->cita()->update([
                'status_examen_vascular' => 1,
            ]);

        return redirect()->route('citasHoyConsultaExternaEnfermeriaIndex')->with('success', 'Examen Vascular registrados correctamente.');
    }
}
