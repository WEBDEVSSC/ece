<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use Illuminate\Http\Request;

class CitaConsultaExternaEnfermeriaController extends Controller
{
    //

    public function citasHoyConsultaExternaEnfermeriaIndex()
    {
        $citasHoy = CitaConsultaExterna::whereDate('fecha', today())
            ->get();

        return view('consulta-externa.citas-hoy', compact('citasHoy'));
    }
}
