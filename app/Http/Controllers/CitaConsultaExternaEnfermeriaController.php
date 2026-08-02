<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CitaConsultaExterna;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class CitaConsultaExternaEnfermeriaController extends Controller
{
    //

    public function citasHoyConsultaExternaEnfermeriaIndex()
    {
        $citasHoy = CitaConsultaExterna::whereDate('fecha', today())
            ->orderBy('hora','ASC')
            ->get();

        return view('consulta-externa.citas-hoy', compact('citasHoy'));
    }

    public function pdfCitaConsultaExternaEnfermeriaPrimeraVez(String $id)
    {
        $user = Auth::user();

        $citaId = CitaConsultaExterna::findOrFail($id);

        $pdf = Pdf::loadView('pdf.uneme-enfermeria-primera-vez', compact('citaId', 'user'));
        return $pdf->stream('registro-enfermeria.pdf');
    }
}
