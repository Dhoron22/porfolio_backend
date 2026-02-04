<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ===== BACKEND =====
        Skill::create([
            'name' => 'Laravel 12',
            'category' => 'technical',
            'subcategory' => 'backend',
            'proficiency' => 75,
            'description' => 'Desarrollo de APIs RESTful, autenticación con Sanctum, Eloquent ORM',
            'featured' => true,
            'order' => 1,
        ]);

        Skill::create([
            'name' => 'PHP',
            'category' => 'technical',
            'subcategory' => 'backend',
            'proficiency' => 70,
            'description' => 'Programación orientada a objetos, desarrollo web',
            'featured' => true,
            'order' => 2,
        ]);

        Skill::create([
            'name' => 'API RESTful',
            'category' => 'technical',
            'subcategory' => 'backend',
            'proficiency' => 75,
            'description' => 'Diseño e implementación de APIs REST',
            'featured' => true,
            'order' => 3,
        ]);

        // ===== FRONTEND =====
        Skill::create([
            'name' => 'Angular',
            'category' => 'technical',
            'subcategory' => 'frontend',
            'proficiency' => 70,
            'description' => 'Desarrollo de SPAs, componentes, servicios, routing',
            'featured' => true,
            'order' => 4,
        ]);

        Skill::create([
            'name' => 'TypeScript',
            'category' => 'technical',
            'subcategory' => 'frontend',
            'proficiency' => 65,
            'description' => 'Tipado estático, POO en TypeScript',
            'featured' => true,
            'order' => 5,
        ]);

        Skill::create([
            'name' => 'HTML5',
            'category' => 'technical',
            'subcategory' => 'frontend',
            'proficiency' => 80,
            'description' => 'Semántica, accesibilidad, estructura web',
            'featured' => false,
            'order' => 6,
        ]);

        Skill::create([
            'name' => 'CSS',
            'category' => 'technical',
            'subcategory' => 'frontend',
            'proficiency' => 75,
            'description' => 'Flexbox, Grid, diseño responsive',
            'featured' => false,
            'order' => 7,
        ]);

        Skill::create([
            'name' => 'Bootstrap',
            'category' => 'technical',
            'subcategory' => 'frontend',
            'proficiency' => 70,
            'description' => 'Framework CSS para diseño responsive',
            'featured' => false,
            'order' => 8,
        ]);

        // ===== PYTHON E IA =====
        Skill::create([
            'name' => 'Python 3.12',
            'category' => 'technical',
            'subcategory' => 'backend',
            'proficiency' => 65,
            'description' => 'Análisis de datos, scripts, automatización',
            'featured' => true,
            'order' => 9,
        ]);

        Skill::create([
            'name' => 'Hugging Face Transformers',
            'category' => 'technical',
            'subcategory' => 'ai',
            'proficiency' => 60,
            'description' => 'Modelos BERT, análisis de sentimientos, NLP',
            'featured' => true,
            'order' => 10,
        ]);

        Skill::create([
            'name' => 'NLP (Procesamiento de Lenguaje Natural)',
            'category' => 'technical',
            'subcategory' => 'ai',
            'proficiency' => 60,
            'description' => 'Análisis de sentimientos, clasificación de texto',
            'featured' => false,
            'order' => 11,
        ]);

        Skill::create([
            'name' => 'Google Colab',
            'category' => 'technical',
            'subcategory' => 'ai',
            'proficiency' => 65,
            'description' => 'Desarrollo de notebooks, experimentación con IA',
            'featured' => false,
            'order' => 12,
        ]);

        // ===== BASES DE DATOS =====
        Skill::create([
            'name' => 'MySQL',
            'category' => 'technical',
            'subcategory' => 'database',
            'proficiency' => 75,
            'description' => 'Diseño relacional, normalización, consultas SQL',
            'featured' => true,
            'order' => 13,
        ]);

        Skill::create([
            'name' => 'DBeaver',
            'category' => 'tool',
            'subcategory' => 'database',
            'proficiency' => 70,
            'description' => 'Gestión de bases de datos',
            'featured' => false,
            'order' => 14,
        ]);

        Skill::create([
            'name' => 'Diseño Relacional',
            'category' => 'technical',
            'subcategory' => 'database',
            'proficiency' => 75,
            'description' => 'Modelado ER, normalización 3FN',
            'featured' => false,
            'order' => 15,
        ]);

        // ===== HERRAMIENTAS =====
        Skill::create([
            'name' => 'Git',
            'category' => 'tool',
            'subcategory' => 'version_control',
            'proficiency' => 70,
            'description' => 'Control de versiones, branching, merging',
            'featured' => true,
            'order' => 16,
        ]);

        Skill::create([
            'name' => 'GitHub',
            'category' => 'tool',
            'subcategory' => 'version_control',
            'proficiency' => 70,
            'description' => 'Repositorios, colaboración, GitHub Pages',
            'featured' => false,
            'order' => 17,
        ]);

        Skill::create([
            'name' => 'Postman',
            'category' => 'tool',
            'subcategory' => 'testing',
            'proficiency' => 80,
            'description' => 'Testing de APIs, colecciones, automatización',
            'featured' => true,
            'order' => 18,
        ]);

        Skill::create([
            'name' => 'XAMPP',
            'category' => 'tool',
            'subcategory' => 'development',
            'proficiency' => 75,
            'description' => 'Servidor local Apache, MySQL, PHP',
            'featured' => false,
            'order' => 19,
        ]);

        Skill::create([
            'name' => 'Docker',
            'category' => 'tool',
            'subcategory' => 'containers',
            'proficiency' => 55,
            'description' => 'Contenedores, imágenes, docker-compose',
            'featured' => false,
            'order' => 20,
        ]);

        Skill::create([
            'name' => 'Claude AI',
            'category' => 'tool',
            'subcategory' => 'ai',
            'proficiency' => 80,
            'description' => 'Desarrollo asistido, prompt engineering, resolución de problemas',
            'featured' => true,
            'order' => 21,
        ]);

        // ===== AUTENTICACIÓN =====
        Skill::create([
            'name' => 'Laravel Sanctum',
            'category' => 'technical',
            'subcategory' => 'backend',
            'proficiency' => 70,
            'description' => 'Autenticación con tokens para APIs',
            'featured' => false,
            'order' => 22,
        ]);

        // ===== HABILIDADES BLANDAS =====
        Skill::create([
            'name' => 'Organización',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 23,
        ]);

        Skill::create([
            'name' => 'Ética laboral',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 24,
        ]);

        Skill::create([
            'name' => 'Responsabilidad',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 25,
        ]);

        Skill::create([
            'name' => 'Proactividad',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 26,
        ]);

        Skill::create([
            'name' => 'Comunicación efectiva',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 27,
        ]);

        Skill::create([
            'name' => 'Aprendizaje rápido',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 28,
        ]);

        Skill::create([
            'name' => 'Adaptabilidad',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 29,
        ]);

        Skill::create([
            'name' => 'Empatía',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 30,
        ]);

        Skill::create([
            'name' => 'Relaciones Interpersonales',
            'category' => 'soft',
            'subcategory' => 'soft_skill',
            'proficiency' => null,
            'description' => null,
            'featured' => false,
            'order' => 31,
        ]);
    }
}
