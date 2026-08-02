<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaConsultaExternaExamenNeurologico extends Model
{
    protected $table = 'citas_consulta_externa_examen_neurologico';

    protected $fillable = [
        'cita_id',
        
        // Pie Derecho - Perceptual
        'pd_sensibilidad_tactil',
        'pd_sensibilidad_vibratoria',
        'pd_subtotal_sistema_perceptual',

        // Pie Derecho - Motor
        'pd_reflejo_rotuliano',
        'pd_dorsiflexion',
        'pd_apertura_dedos',
        'pd_subtotal_sistema_motor',

        // Pie Derecho - Total
        'pd_calificacion_total',

        // Pie Izquierdo - Perceptual
        'pi_sensibilidad_tactil',
        'pi_sensibilidad_vibratoria',
        'pi_subtotal_sistema_perceptual',

        // Pie Izquierdo - Motor
        'pi_reflejo_rotuliano',
        'pi_dorsiflexion',
        'pi_apertura_dedos',
        'pi_subtotal_sistema_motor',

        // Pie Izquierdo - Total
        'pi_calificacion_total',
    ];

    /**
     * Relación: Pertenece a una Cita de Consulta Externa.
     */
    public function cita()
    {
        return $this->belongsTo(CitaConsultaExterna::class, 'cita_id');
    }
}
