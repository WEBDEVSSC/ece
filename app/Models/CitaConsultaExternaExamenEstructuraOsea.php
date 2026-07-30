<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaConsultaExternaExamenEstructuraOsea extends Model
{
    // Nombre explícito de la tabla
    protected $table = 'citas_consulta_externa_examen_estructura_osea';

    // Campos asignables masivamente
    protected $fillable = [
        'cita_id',

        // Pie Derecho
        'pd_dedos_garra',
        'pd_dedos_martillo',
        'pd_hallux_valgus',
        'pd_infraducto',
        'pd_supraducto',
        'pd_hipercarga_metatarsio',
        'pd_pie_charcot',
        'pd_subtotal',

        // Pie Izquierdo
        'pi_dedos_garra',
        'pi_dedos_martillo',
        'pi_hallux_valgus',
        'pi_infraducto',
        'pi_supraducto',
        'pi_hipercarga_metatarsio',
        'pi_pie_charcot',
        'pi_subtotal',
    ];

    /**
     * Relación Inversa: Pertenece a una Cita de Consulta Externa
     */
    public function cita()
    {
        return $this->belongsTo(CitaConsultaExterna::class, 'cita_id');
    }
}
