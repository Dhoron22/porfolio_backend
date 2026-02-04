<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;
    /**
     * Tabla asociada al modelo
     */
    protected $table = 'skills';

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'name',
        'category',
        'subcategory',
        'proficiency',
        'icon',
        'description',
        'featured',
        'order',
    ];

    /**
     * Los atributos que debem ser convertidos a tipos nativos
     */
    protected $casts = [
        'proficiency' => 'integer',
        'featured' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Obtener el nivel en texto
     */
    public function getProficiencyLabelAttribute(): ?string
    {
        if ($this->proficiency === null){
            return null;
        }

        if($this->proficiency >=80){
            return 'Avanzado';
        }elseif ($this->proficiency >=60){
            return 'Intermedio-Avanzando';
        }elseif ($this->proficiency >=40){
            return 'Intermedio';
        }else{
            return 'Básico';
        }
    }

    /**
     * Scope para habilidades blandas
     */
    public function scopeSoft($query)
    {
        return $query->where('category', 'soft');
    }

    /**
     * Scope para herramientas
     */
    public function scopeTools($query)
    {
        return $query->where('category', 'tool');
    }
    /**
     * Scope para habilidades destacadas
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
    /**
     * Scope para ordenar por proficiencia
     */
    public function scopeByProficiency($query)
    {
        return $query->orderBy('proficiency', 'desc');
    }
    /**
     * Scope para ordenar por campo 'order'
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
    /**
     * Scope para filtrar por subcategoria
     */
    public function scopeBySubcategory($query, $subcategory)
    {
        return $query->where('subcategory', $subcategory);
    }
}
