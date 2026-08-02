<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use App\Models\CitaConsultaExternaExamenEstructuraOsea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UnemeEnfermeriaEstructuraOseaController extends Controller
{
    //
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
}
