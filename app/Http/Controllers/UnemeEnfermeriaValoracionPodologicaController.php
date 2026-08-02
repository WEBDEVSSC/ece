<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use App\Models\CitaConsultaExternaValoracionPodologica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnemeEnfermeriaValoracionPodologicaController extends Controller
{
    //
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
}
