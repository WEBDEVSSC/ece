<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaConsultaExternaExamenVascular extends Model
{
    protected $table = 'citas_consulta_externa_examen_vascular';

    protected $fillable = [
        'cita_id',

        // Pie derecho - Sistema arterial
        'pd_pulso_pedio',
        'pd_pulso_pedio_calificacion',
        'pd_llenado_capilar',
        'pd_llenado_capilar_calificacion',
        'pd_sistema_arterial_subtotal',

        // Pie derecho - Sistema venoso
        'pd_varices',
        'pd_edema',
        'pd_sistema_venoso_subtotal',

        // Pie izquierdo - Sistema arterial
        'pi_pulso_pedio',
        'pi_pulso_pedio_calificacion',
        'pi_llenado_capilar',
        'pi_llenado_capilar_calificacion',
        'pi_sistema_arterial_subtotal',

        // Pie izquierdo - Sistema venoso
        'pi_varices',
        'pi_edema',
        'pi_sistema_venoso_subtotal',
    ];

    /**
     * Relación con la cita de consulta externa.
     */
    public function cita()
    {
        return $this->belongsTo(CitaConsultaExterna::class, 'cita_id');
    }
}
