<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Idioma 1: Español (Nativo)
        Language::create([
            'name' => 'Español',
            'proficiency' => 'Nativo',
            'level_code' => 'C2',
            'description' => 'Lengua materna',
            'order' => 1,
        ]);

        // Idioma 2: Inglés (Básico)
        Language::create([
            'name' => 'Inglés',
            'proficiency' => 'Básico',
            'level_code' => 'A2',
            'description' => 'Lectura técnica de documentación',
            'order' => 2,
        ]);
    }
}
