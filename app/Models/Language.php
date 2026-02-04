<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;

    /**
     * Tabla asociada al modelo.
     */
    protected $table = 'languages';

    /**
     * Los atributos que son asignables en masa
     */
    protected $fillable = [
        'name',
        'proficiency',
        'level_code',
        'description',
        'order',
    ];
    /**
     * Los atributos que deben ser convertidos a tipos nativos
     */
    protected $casts = [
        'order' => 'integer',
    ];

    /**
     * Obtener el icono de la bandera segun el idioma
     */
    public function getFlagEmojiAttribute(): string
    {
        $flags = [
            'Español' => '🇪🇸',
            'Ingles' => '🇬🇧',
        ];

        return $flags[$this->name] ?? '🌐';
    }

    /**
     * Scope para ordenar por campo 'order'
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
