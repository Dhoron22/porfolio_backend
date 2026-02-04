<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalInfo extends Model
{
    use SoftDeletes;

    /**
     * Tabla asociada al modelo
     */
    protected $table = 'personal_infos';

    /**
     * Los atributos que son asignables en masa.
     */
    protected $fillable = [
        'nombre_completo',
        'titulo',
        'bio',
        'location',
        'phone',
        'email',
        'github_url',
        'linkedin_url',
        'age',
        'profile_image',
    ];

    protected $casts = [
        'age' => 'integer',
    ];

    /**
     * Obtener el prmer nombre
     */
    public function getFirstNameAttribute(): string
    {
        $parts = explode(' ', $this->nombre_completo);
        return $parts[0] ?? '';
    }

    /**
     * Obtener las iniciales
     */
    public function getInitialsAttribute(): string
    {
        $words =explode (' ', $this->nombre_completo);
        $initials = '';

        foreach ($words as $word) {
            if(!empty($word)){
                $initials .= strtoupper($word[0]);
            }
        }
        return $initials;
    }
}
