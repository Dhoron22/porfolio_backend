<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use SoftDeletes;
    /**
     * Tabla asociada al modelo.
     */
    protected $table = 'projects';
    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'type',
        'image',
        'url_demo',
        'url_github',
        'technologies',
        'featured',
        'order',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     */
    protected $casts = [
        'start_date' => 'date', //convierte  a objeto carbon
        'end_date' => 'date', //convierte  a objeto carbon
        'technologies' => 'array', //JSON -> Array automaticamente
        'featured' => 'boolean', //1/0 -> true/false
        'order' => 'integer', //string -> integer
    ];

    protected $appends = [
        'is_current',
        'period',
        'duration_in_months',
    ];

    /**
     * Calcular si el proyecto esta en curso
     */
    public function getIsCurrentAttribute(): bool
    {
        return $this->end_date === null;
    }

    /**
     * Obtener el periodo formateado
     */
    public function getPeriodAttribute(): string
    {
        $start = $this->start_date->format('m/Y');
        $end = $this->end_date ? $this->end_date->format('m/Y'): 'Actualidad';
        return "{$start} - {$end}";
    }

    /**
     * Obtener la duracion del proyecto en meses
     */
    public function getDurationInMonthsAttribute(): int
    {
        $end = $this->end_date ?? now();
        return $this->start_date->diffInMonths($end);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeCurrent($query)
    {
        return $query->whereNull('end_date');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeAcademic($query)
    {
        return $query->where('type', 'academic');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('start_date', 'desc');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

}
