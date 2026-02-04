<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Educación 1: Diplomatura UNNE
        Education::create([
            'institution' => 'Universidad Nacional del Nordeste (UNNE)',
            'degree' => 'Diplomatura Universitaria en Desarrollo Web',
            'field_of_study' => 'Desarrollo Web',
            'description' => 'Diplomatura universitaria enfocada en el desarrollo web fullstack, cubriendo tecnologías como Laravel, Angular, MySQL y desarrollo de APIs REST. Certificado en trámite.',
            'start_date' => '2024-08-01',
            'end_date' => '2025-07-01',
            'current' => false,
            'status' => 'completed',
            'certificate_url' => null,
            'location' => 'Corrientes, Argentina',
            'order' => 1,
        ]);

        // Educación 2: Machine Learning (Google) - En progreso
        Education::create([
            'institution' => 'Google',
            'degree' => 'Curso Machine Learning',
            'field_of_study' => 'Inteligencia Artificial',
            'description' => 'Formación activa en algoritmos de ML, análisis de datos y modelos predictivos.',
            'start_date' => '2026-01-01',
            'end_date' => null,
            'current' => true,
            'status' => 'in_progress',
            'certificate_url' => null,
            'location' => null,
            'order' => 2,
        ]);

        // Educación 3: Formación de Preceptores
        Education::create([
            'institution' => 'Universidad Nacional del Chaco Austral (UNCAUS)',
            'degree' => 'Formación de Preceptores',
            'field_of_study' => 'Educación',
            'description' => 'Curso de formación de preceptores universitarios.',
            'start_date' => '2022-05-01',
            'end_date' => '2022-05-01',
            'current' => false,
            'status' => 'completed',
            'certificate_url' => null,
            'location' => 'Chaco, Argentina',
            'order' => 3,
        ]);

        // Educación 4: Operador de PC
        Education::create([
            'institution' => 'Instituto Argentino Computación (IAC)',
            'degree' => 'Operador de PC Microsoft Office Full',
            'field_of_study' => 'Computación',
            'description' => 'Curso de formación en herramientas de Microsoft Office.',
            'start_date' => '2015-01-09',
            'end_date' => '2015-01-09',
            'current' => false,
            'status' => 'completed',
            'certificate_url' => null,
            'location' => 'Corrientes, Argentina',
            'order' => 4,
        ]);

        // Educación 5: Secundario
        Education::create([
            'institution' => 'E.E.S Nº16 "Pedro Goyena"',
            'degree' => 'Educación Polimodal',
            'field_of_study' => 'Ciencias Naturales - Perfil Ambiente',
            'description' => 'Educación secundaria con modalidad Ciencias Naturales, perfil Ambiente.',
            'start_date' => null,
            'end_date' => null,
            'current' => false,
            'status' => 'completed',
            'certificate_url' => null,
            'location' => 'Corrientes, Argentina',
            'order' => 5,
        ]);
    }
}
