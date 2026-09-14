<?php

namespace App\Console\Commands;

use App\Mail\CitasMananaMail;
use App\Models\CitaConsultaExterna;
use App\Models\User;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class EnviarCitasManana extends Command
{
    /**
     * Nombre y firma del comando.
     */
    protected $signature = 'citas:enviar-manana';

    /**
     * Descripción del comando.
     */
    protected $description = 'Envía el PDF de citas del día siguiente a los médicos';

    /**
     * Ejecutar el comando.
     */
    public function handle()
    {
        // Fecha de mañana
        $manana = now()->addDay()->toDateString();

        // Médicos
        $medicos = User::where('role_id', 2)
            ->whereNotNull('email')
            ->where('email', '!=', '')
            ->get();

        if ($medicos->isEmpty()) {
            $this->warn('No se encontraron médicos con correo electrónico.');
            return Command::SUCCESS;
        }

        $totalEnviados = 0;

        foreach ($medicos as $medico) {

            $this->info(
                "Revisando citas del médico: {$medico->name} - {$manana}"
            );

            /*
             * Buscamos las citas del médico para mañana.
             */
            $citas = CitaConsultaExterna::with([
                'paciente.diagnosticoMedico',
                'paciente.derechohabiencia',
            ])
            ->where('medico_id', $medico->id)
            ->whereDate('fecha', $manana)
            ->orderBy('hora')
            ->get();

            /*
             * Si el médico no tiene citas mañana,
             * no enviamos correo.
             */
            if ($citas->isEmpty()) {

                $this->line(
                    "  Sin citas para mañana. No se envía correo."
                );

                continue;
            }

            /*
             * Horarios disponibles de 08:00 a 14:30
             * cada 30 minutos.
             */
            $horarios = [];

            $inicio = Carbon::createFromTime(8, 0);
            $fin = Carbon::createFromTime(14, 30);

            while ($inicio <= $fin) {

                $horarios[] = $inicio->format('H:i');

                $inicio->addMinutes(30);
            }

            /*
             * Organizamos las citas por hora.
             */
            $citasPorHora = $citas->keyBy(function ($cita) {

                return Carbon::parse($cita->hora)->format('H:i');

            });

            /*
             * Formato de fecha para mostrar en el PDF.
             */
            $fecha = Carbon::parse($manana)->format('d-m-Y');

            /*
             * Generamos el PDF.
             */
            $pdf = Pdf::loadView(
                'pdf.citas-manana-pdf',
                compact(
                    'horarios',
                    'citasPorHora',
                    'medico',
                    'fecha'
                )
            );

            /*
             * Enviamos el correo al email del médico.
             */
            Mail::to($medico->email)
                ->send(
                    new CitasMananaMail(
                        $medico,
                        $fecha,
                        $pdf
                    )
                );

            $this->info(
                "  Correo enviado a: {$medico->email}"
            );

            $totalEnviados++;
        }

        $this->info('');
        $this->info(
            "Proceso terminado. Correos enviados: {$totalEnviados}"
        );

        return Command::SUCCESS;
    }
}