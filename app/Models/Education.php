<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use SoftDeletes;

    /**
     * Tabla asociada al modelo
     */
    protected $table = 'education';

    /**
     * Los atributos que son asignados en masa
     */
    protected $fillable =[
        'institution',
        'degree',
        'field_of_study',
        'description',
        'start_date',
        'end_date',
        'current',
        'status',
        'certificate_url',
        'location',
        'order',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     */
    protected $casts= [
        'start_date' => 'date',
        'end_date' => 'date',
        'current' => 'integer',
    ];

    /**
     * Atributos que se agregan al JSON automaticamente
     */
    protected $appends = [
        'period',
    ];

    /**
     * Obtener periodo formateado
     */
    public function getPeriodAttribute(): string
    {
        $start= $this->start_date ? $this->start_date->format('m/Y'): '';

        if($this->current){
            $end = 'En curso';
        }elseif($this->end_date){
            $end = $this->end_date->format('m/Y');
        }else{
            $end= '';
        }
        return $start && $end ? "{$start} - {$end}" : ($start ?: $end);
    }

    /**
     * Scope para estudios en curso
    */
    public function scopeCurrent($query)
    {
        return $query->where('current', true);
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
