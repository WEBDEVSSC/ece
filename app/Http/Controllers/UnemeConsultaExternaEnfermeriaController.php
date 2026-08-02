<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use App\Models\CitaConsultaExternaExamenEstructuraOsea;
use App\Models\CitaConsultaExternaExamenNeurologico;
use App\Models\CitaConsultaExternaExamenVascular;
use App\Models\CitaConsultaExternaValoracionPodologica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnemeConsultaExternaEnfermeriaController extends Controller
{
    /********************************************************************************************************
     * 
     * 
     * VALORACION PODOLOGICA
     * 
     * 
     *******************************************************************************************************/

    public function UnemeEnfermeriaValoracionPodologicaIndex()
    {
        $login = Auth::user();    

        $citasHoy = CitaConsultaExterna::where('clues_id',$login->clues_id)
            ->whereDate('fecha', today())
            ->get();

        return view('consulta-externa.unemes.enfermeria.valoracion-podologica.index-valoracion-podologica', compact('citasHoy'));
    }

    public function UnemeEnfermeriaValoracionPodologicaCreate(String $id)
    {
        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('consulta-externa.unemes.enfermeria.valoracion-podologica.create-valoracion-podologica',compact('citaId'));
    }

    public function UnemeEnfermeriaValoracionPodologicaStore(Request $request, String $id)
    {
        $request->validate([
            // Pie derecho
            'pd_plantar'                        => 'nullable|string|max:255',
            'pd_dorsal'                         => 'nullable|string|max:255',
            'pd_talar'                          => 'nullable|string|max:255',
            'pd_subtotal'                       => 'nullable|string|max:255',

            'pd_onicogrifosis'                  => 'nullable|string|max:255',
            'pd_onicomicosis'                   => 'nullable|string|max:255',
            'pd_onicocriptosis'                 => 'nullable|string|max:255',

            'pd_bullosis'                       => 'nullable|string|max:255',
            'pd_ulcera'                         => 'nullable|string|max:255',
            'pd_necrosis'                       => 'nullable|string|max:255',
            'pd_grietas_fisuras'                => 'nullable|string|max:255',
            'pd_lesiones_superficiales'         => 'nullable|string|max:255',
            'pd_otras'                          => 'nullable|string|max:255',
            'pd_anhidrosis'                     => 'nullable|string|max:255',
            'pd_tinas'                          => 'nullable|string|max:255',
            'pd_proceso_infeccioso'             => 'nullable|string|max:255',
            'pd_subtotal_otras_localizadas'     => 'nullable|string|max:255',

            // Pie izquierdo
            'pi_plantar'                        => 'nullable|string|max:255',
            'pi_dorsal'                         => 'nullable|string|max:255',
            'pi_talar'                          => 'nullable|string|max:255',
            'pi_subtotal'                       => 'nullable|string|max:255',

            'pi_onicogrifosis'                  => 'nullable|string|max:255',
            'pi_onicomicosis'                   => 'nullable|string|max:255',
            'pi_onicocriptosis'                 => 'nullable|string|max:255',

            'pi_bullosis'                       => 'nullable|string|max:255',
            'pi_ulcera'                         => 'nullable|string|max:255',
            'pi_necrosis'                       => 'nullable|string|max:255',
            'pi_grietas_fisuras'                => 'nullable|string|max:255',
            'pi_lesiones_superficiales'         => 'nullable|string|max:255',
            'pi_otras'                          => 'nullable|string|max:255',
            'pi_anhidrosis'                     => 'nullable|string|max:255',
            'pi_tinas'                          => 'nullable|string|max:255',
            'pi_proceso_infeccioso'             => 'nullable|string|max:255',
            'pi_subtotal_otras_localizadas'     => 'nullable|string|max:255',
        ], [
            '*.string' => 'El campo :attribute debe ser un texto.',
            '*.max'    => 'El campo :attribute no debe exceder los 255 caracteres.',
        ], [
            'pd_plantar'                    => 'Plantar (Pie derecho)',
            'pd_dorsal'                     => 'Dorsal (Pie derecho)',
            'pd_talar'                      => 'Talar (Pie derecho)',
            'pd_subtotal'                   => 'Subtotal (Pie derecho)',
            'pd_onicogrifosis'              => 'Onicogrifosis (Pie derecho)',
            'pd_onicomicosis'               => 'Onicomicosis (Pie derecho)',
            'pd_onicocriptosis'             => 'Onicocriptosis (Pie derecho)',
            'pd_bullosis'                   => 'Bullosis (Pie derecho)',
            'pd_ulcera'                     => 'Úlcera (Pie derecho)',
            'pd_necrosis'                   => 'Necrosis (Pie derecho)',
            'pd_grietas_fisuras'            => 'Grietas y fisuras (Pie derecho)',
            'pd_lesiones_superficiales'     => 'Lesiones superficiales (Pie derecho)',
            'pd_otras'                      => 'Otras (Pie derecho)',
            'pd_anhidrosis'                 => 'Anhidrosis (Pie derecho)',
            'pd_tinas'                      => 'Tiñas (Pie derecho)',
            'pd_proceso_infeccioso'         => 'Proceso infeccioso (Pie derecho)',
            'pd_subtotal_otras_localizadas' => 'Subtotal otras localizadas (Pie derecho)',

            'pi_plantar'                    => 'Plantar (Pie izquierdo)',
            'pi_dorsal'                     => 'Dorsal (Pie izquierdo)',
            'pi_talar'                      => 'Talar (Pie izquierdo)',
            'pi_subtotal'                   => 'Subtotal (Pie izquierdo)',
            'pi_onicogrifosis'              => 'Onicogrifosis (Pie izquierdo)',
            'pi_onicomicosis'               => 'Onicomicosis (Pie izquierdo)',
            'pi_onicocriptosis'             => 'Onicocriptosis (Pie izquierdo)',
            'pi_bullosis'                   => 'Bullosis (Pie izquierdo)',
            'pi_ulcera'                     => 'Úlcera (Pie izquierdo)',
            'pi_necrosis'                   => 'Necrosis (Pie izquierdo)',
            'pi_grietas_fisuras'            => 'Grietas y fisuras (Pie izquierdo)',
            'pi_lesiones_superficiales'     => 'Lesiones superficiales (Pie izquierdo)',
            'pi_otras'                      => 'Otras (Pie izquierdo)',
            'pi_anhidrosis'                 => 'Anhidrosis (Pie izquierdo)',
            'pi_tinas'                      => 'Tiñas (Pie izquierdo)',
            'pi_proceso_infeccioso'         => 'Proceso infeccioso (Pie izquierdo)',
            'pi_subtotal_otras_localizadas' => 'Subtotal otras localizadas (Pie izquierdo)',
        ]);

        $valoracionPodologica = new CitaConsultaExternaValoracionPodologica();

        $valoracionPodologica->cita_id = $id;

        // Pie derecho - Hiperqueratosis
        $valoracionPodologica->pd_plantar = $request->pd_plantar;
        $valoracionPodologica->pd_dorsal = $request->pd_dorsal;
        $valoracionPodologica->pd_talar = $request->pd_talar;
        $valoracionPodologica->pd_subtotal = $request->pd_subtotal;

        // Pie derecho - Alteraciones ungueales
        $valoracionPodologica->pd_onicogrifosis = $request->pd_onicogrifosis;
        $valoracionPodologica->pd_onicomicosis = $request->pd_onicomicosis;
        $valoracionPodologica->pd_onicocriptosis = $request->pd_onicocriptosis;

        // Pie derecho - Otras localizadas
        $valoracionPodologica->pd_bullosis = $request->pd_bullosis;
        $valoracionPodologica->pd_ulcera = $request->pd_ulcera;
        $valoracionPodologica->pd_necrosis = $request->pd_necrosis;
        $valoracionPodologica->pd_grietas_fisuras = $request->pd_grietas_fisuras;
        $valoracionPodologica->pd_lesiones_superficiales = $request->pd_lesiones_superficiales;
        $valoracionPodologica->pd_otras = $request->pd_otras;
        $valoracionPodologica->pd_anhidrosis = $request->pd_anhidrosis;
        $valoracionPodologica->pd_tinas = $request->pd_tinas;
        $valoracionPodologica->pd_proceso_infeccioso = $request->pd_proceso_infeccioso;
        $valoracionPodologica->pd_subtotal_otras_localizadas = $request->pd_subtotal_otras_localizadas;

        // Pie izquierdo - Hiperqueratosis
        $valoracionPodologica->pi_plantar = $request->pi_plantar;
        $valoracionPodologica->pi_dorsal = $request->pi_dorsal;
        $valoracionPodologica->pi_talar = $request->pi_talar;
        $valoracionPodologica->pi_subtotal = $request->pi_subtotal;

        // Pie izquierdo - Alteraciones ungueales
        $valoracionPodologica->pi_onicogrifosis = $request->pi_onicogrifosis;
        $valoracionPodologica->pi_onicomicosis = $request->pi_onicomicosis;
        $valoracionPodologica->pi_onicocriptosis = $request->pi_onicocriptosis;

        // Pie izquierdo - Otras localizadas
        $valoracionPodologica->pi_bullosis = $request->pi_bullosis;
        $valoracionPodologica->pi_ulcera = $request->pi_ulcera;
        $valoracionPodologica->pi_necrosis = $request->pi_necrosis;
        $valoracionPodologica->pi_grietas_fisuras = $request->pi_grietas_fisuras;
        $valoracionPodologica->pi_lesiones_superficiales = $request->pi_lesiones_superficiales;
        $valoracionPodologica->pi_otras = $request->pi_otras;
        $valoracionPodologica->pi_anhidrosis = $request->pi_anhidrosis;
        $valoracionPodologica->pi_tinas = $request->pi_tinas;
        $valoracionPodologica->pi_proceso_infeccioso = $request->pi_proceso_infeccioso;
        $valoracionPodologica->pi_subtotal_otras_localizadas = $request->pi_subtotal_otras_localizadas;

        $valoracionPodologica->save();

        $valoracionPodologica->cita()->update([
                'status_valoracion_podologica' => 1,
            ]);
        
        return redirect()->route('citasHoyConsultaExternaEnfermeriaIndex')->with('success', 'Valoración Podológica registrados correctamente.');

    }

    public function UnemeEnfermeriaValoracionPodologicaShow(String $id)
    {
        $valoracionPodologica = CitaConsultaExternaValoracionPodologica::where('cita_id',$id)->first();

        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('consulta-externa.unemes.enfermeria.valoracion-podologica.show-valoracion-podologica', compact('valoracionPodologica','citaId'));
    }

    /********************************************************************************************************
     * 
     * 
     * EXAMEN DE ESTRUCTURA OSEA
     * 
     * 
     *******************************************************************************************************/

    public function UnemeEnfermeriaExamenEstructuraOseaCreate(String $id)
    {
        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('consulta-externa.unemes.enfermeria.examen-estructura-osea.create-examen-estructura-osea',compact('citaId'));
    }
    
    public function UnemeEnfermeriaExamenEstructuraOseaStore(Request $request, String $id)
    {
        $validatedData = $request->validate([
            // Pie Derecho
            'pd_dedos_garra'           => 'nullable',
            'pd_dedos_martillo'        => 'nullable',
            'pd_hallux_valgus'         => 'nullable',
            'pd_infraducto'            => 'nullable',
            'pd_supraducto'            => 'nullable',
            'pd_hipercarga_metatarsio' => 'nullable',
            'pd_pie_charcot'           => 'nullable',
            'pd_subtotal'              => 'nullable',

            // Pie Izquierdo
            'pi_dedos_garra'           => 'nullable',
            'pi_dedos_martillo'        => 'nullable',
            'pi_hallux_valgus'         => 'nullable',
            'pi_infraducto'            => 'nullable',
            'pi_supraducto'            => 'nullable',
            'pi_hipercarga_metatarsio' => 'nullable',
            'pi_pie_charcot'           => 'nullable',
            'pi_subtotal'              => 'nullable',
        ], [
            // Mensajes personalizados opcionales
        ]);

        // Instancia y asignación
        $examenEstructuraOsea = new CitaConsultaExternaExamenEstructuraOsea();

        $examenEstructuraOsea->cita_id = $id;

        // Pie Derecho
        $examenEstructuraOsea->pd_dedos_garra           = $request->pd_dedos_garra;
        $examenEstructuraOsea->pd_dedos_martillo        = $request->pd_dedos_martillo;
        $examenEstructuraOsea->pd_hallux_valgus         = $request->pd_hallux_valgus;
        $examenEstructuraOsea->pd_infraducto            = $request->pd_infraducto;
        $examenEstructuraOsea->pd_supraducto            = $request->pd_supraducto;
        $examenEstructuraOsea->pd_hipercarga_metatarsio = $request->pd_hipercarga_metatarsio;
        $examenEstructuraOsea->pd_pie_charcot           = $request->pd_pie_charcot;
        $examenEstructuraOsea->pd_subtotal              = $request->pd_subtotal;

        // Pie Izquierdo
        $examenEstructuraOsea->pi_dedos_garra           = $request->pi_dedos_garra;
        $examenEstructuraOsea->pi_dedos_martillo        = $request->pi_dedos_martillo;
        $examenEstructuraOsea->pi_hallux_valgus         = $request->pi_hallux_valgus;
        $examenEstructuraOsea->pi_infraducto            = $request->pi_infraducto;
        $examenEstructuraOsea->pi_supraducto            = $request->pi_supraducto;
        $examenEstructuraOsea->pi_hipercarga_metatarsio = $request->pi_hipercarga_metatarsio;
        $examenEstructuraOsea->pi_pie_charcot           = $request->pi_pie_charcot;
        $examenEstructuraOsea->pi_subtotal              = $request->pi_subtotal;

        $examenEstructuraOsea->save();

        $examenEstructuraOsea->cita()->update([
                'status_examen_estructura_osea' => 1,
            ]);
        
        return redirect()->route('citasHoyConsultaExternaEnfermeriaIndex')->with('success', 'Examen de Estructura Ósea registrados correctamente.');
    }

    public function UnemeEnfermeriaExamenEstructuraOseaShow(String $id)
    {    
        $examenEstructuraOsea = CitaConsultaExternaExamenEstructuraOsea::where('cita_id', $id)->first();

        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('consulta-externa.unemes.enfermeria.examen-estructura-osea.show-examen-estructura-osea',compact('examenEstructuraOsea','citaId'));
    }

    /********************************************************************************************************
     * 
     * 
     * EXAMEN VASCULAR
     * 
     * 
     *******************************************************************************************************/

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

    /********************************************************************************************************
     * 
     * 
     * EXAMEN NEUROLOGICO
     * 
     * 
     *******************************************************************************************************/

    public function UnemeEnfermeriaExamenNeurologicoShow(String $id)
    {
        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('consulta-externa.unemes.enfermeria.examen-neurologico.show-examen-neurologico', compact('citaId'));
    }

    public function UnemeEnfermeriaExamenNeurologicoCreate(String $id)
    {
        $citaId = CitaConsultaExterna::findOrFail($id);

        return view('consulta-externa.unemes.enfermeria.examen-neurologico.create-examen-neurologico', compact('citaId'));
    }

    public function UnemeEnfermeriaExamenNeurologicoStore(Request $request, String $id)
    {
        $validatedData = $request->validate([
            'pd_sensibilidad_tactil'         => 'required|integer|min:0',
            'pd_sensibilidad_vibratoria'     => 'required|integer|min:0',
            'pd_subtotal_sistema_perceptual' => 'required|integer|min:0',
            'pd_reflejo_rotuliano'           => 'required|integer|min:0',
            'pd_dorsiflexion'                => 'required|integer|min:0',
            'pd_apertura_dedos'              => 'required|integer|min:0',
            'pd_subtotal_sistema_motor'      => 'required|integer|min:0',
            'pd_calificacion_total'          => 'required|integer|min:0',

            'pi_sensibilidad_tactil'         => 'required|integer|min:0',
            'pi_sensibilidad_vibratoria'     => 'required|integer|min:0',
            'pi_subtotal_sistema_perceptual' => 'required|integer|min:0',
            'pi_reflejo_rotuliano'           => 'required|integer|min:0',
            'pi_dorsiflexion'                => 'required|integer|min:0',
            'pi_apertura_dedos'              => 'required|integer|min:0',
            'pi_subtotal_sistema_motor'      => 'required|integer|min:0',
            'pi_calificacion_total'          => 'required|integer|min:0',
        ],[

        ]);

        $examenNeurologico = new CitaConsultaExternaExamenNeurologico();

        $examenNeurologico->cita_id = $id;
        $examenNeurologico->pd_sensibilidad_tactil = $request->pd_sensibilidad_tactil;
        $examenNeurologico->pd_sensibilidad_vibratoria = $request->pd_sensibilidad_vibratoria;
        $examenNeurologico->pd_subtotal_sistema_perceptual = $request->pd_subtotal_sistema_perceptual;
        $examenNeurologico->pd_reflejo_rotuliano = $request->pd_reflejo_rotuliano;
        $examenNeurologico->pd_dorsiflexion = $request->pd_dorsiflexion;
        $examenNeurologico->pd_apertura_dedos = $request->pd_apertura_dedos;
        $examenNeurologico->pd_subtotal_sistema_motor = $request->pd_subtotal_sistema_motor;
        $examenNeurologico->pd_calificacion_total = $request->pd_calificacion_total;

        $examenNeurologico->pi_sensibilidad_tactil = $request->pi_sensibilidad_tactil;
        $examenNeurologico->pi_sensibilidad_vibratoria = $request->pi_sensibilidad_vibratoria;
        $examenNeurologico->pi_subtotal_sistema_perceptual = $request->pi_subtotal_sistema_perceptual;
        $examenNeurologico->pi_reflejo_rotuliano = $request->pi_reflejo_rotuliano;
        $examenNeurologico->pi_dorsiflexion = $request->pi_dorsiflexion;
        $examenNeurologico->pi_apertura_dedos = $request->pi_apertura_dedos;
        $examenNeurologico->pi_subtotal_sistema_motor = $request->pi_subtotal_sistema_motor;
        $examenNeurologico->pi_calificacion_total = $request->pi_calificacion_total;

        $examenNeurologico->save();

        $examenNeurologico->cita()->update([
                'status_examen_neurologico' => 1,
            ]);

        return redirect()->route('citasHoyConsultaExternaEnfermeriaIndex')->with('success', 'Examen Neurológico registrado correctamente.');
    }

}
