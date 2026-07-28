<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaConsultaExternaValoracionPodologica extends Model
{
    protected $table = 'citas_consulta_externa_valoracion_podologica';

    protected $fillable = [
        'cita_id',

        // Pie derecho - Hiperqueratosis
        'pd_plantar',
        'pd_dorsal',
        'pd_talar',
        'pd_subtotal',

        // Pie derecho - Alteraciones ungueales
        'pd_onicogrifosis',
        'pd_onicomicosis',
        'pd_onicocriptosis',

        // Pie derecho - Otras localizadas
        'pd_bullosis',
        'pd_ulcera',
        'pd_necrosis',
        'pd_grietas_fisuras',
        'pd_lesiones_superficiales',
        'pd_otras',
        'pd_anhidrosis',
        'pd_tinas',
        'pd_proceso_infeccioso',
        'pd_subtotal_otras_localizadas',

        // Pie izquierdo - Hiperqueratosis
        'pi_plantar',
        'pi_dorsal',
        'pi_talar',
        'pi_subtotal',

        // Pie izquierdo - Alteraciones ungueales
        'pi_onicogrifosis',
        'pi_onicomicosis',
        'pi_onicocriptosis',

        // Pie izquierdo - Otras localizadas
        'pi_bullosis',
        'pi_ulcera',
        'pi_necrosis',
        'pi_grietas_fisuras',
        'pi_lesiones_superficiales',
        'pi_otras',
        'pi_anhidrosis',
        'pi_tinas',
        'pi_proceso_infeccioso',
        'pi_subtotal_otras_localizadas',
    ];

    /**
     * Cita de consulta externa.
     */
    public function cita()
    {
        return $this->belongsTo(CitaConsultaExterna::class, 'cita_id');
    }
}
