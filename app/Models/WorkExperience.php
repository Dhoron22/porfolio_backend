<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkExperience extends Model
{
    use SoftDeletes;
    /**
     * Tabla asociada al modelo
     */
    protected $table = 'work_experiences';

    /**
     * Los atributos que son asignables en masa
     */

    protected $fillable = [
        'company',
        'position',
        'description',
        'location',
        'start_date',
        'end_date',
        'current',
        'responsabilities',
        'reference_name',
        'reference_phone',
        'order',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'current' =>'boolean',
        'responsabilities' => 'array', //JSON -> array
        'order' => 'integer',
    ];

    protected $appends = [
        'period',
        'duration_in_months',
    ];

    /**
     * Obtener el periodo formateado
     */
    public function getPeriodAttribute(): string
    {
        $start = $this->start_date->format('m/Y');
        $end = $this->current ? 'Actualidad' : $this->end_date->format('m/Y');
        return "{$start} - {$end}";
    }

    /**
     * Obtener la duracion en meses
     */
    public function getDurationInMonthsAttribute(): int
    {
        $end = $this->current ? now() : $this->end_date;
        return $this->start_date->diffInMonths($end);
    }

    /**
     * Obtener la duracion en años formateada
     */
    public function getDurationInYearsAttribute(): string
    {
        $months = $this->duration_in_months;
        $years = floor($months/12);
        $remainingMonths = $months % 12;

        if($years > 0 && $remainingMonths > 0) {
            return "{$years} año(s) y {$remainingMonths} mes(es)";
        }elseif ($years >0){
            return "{$years} año(s)";
        }else{
            return "{$remainingMonths} mes(es)";
        }
    }
    /**
     * scope para trabajos actuales
     */
    public function scopeCurrent($query)
    {
        return $query->where('current', true);
    }

    /**
     * Scope para trabajos pasados
     */
    public function scopePast($query)
    {
        return $query->where('current', false);
    }

    /**
     * Scope para ordenar por fecha mas reciente
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('start_date', 'desc');
    }

    /**
     * Scope para ordenar por campo 'order'
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }


}
