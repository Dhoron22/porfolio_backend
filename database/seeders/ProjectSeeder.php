<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projects;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Proyecto 1: Análisis de Sentimientos con IA
        Projects::create([
            'title' => 'Análisis de Sentimientos con IA - Consultas Ciudadanas',
            'description' => 'Implementé un sistema de análisis automático de sentimientos utilizando modelos BERT multilingües de Hugging Face Transformers, que permite clasificar consultas ciudadanas en tres categorías —Positivo, Neutral y Negativo— con una puntuación de 1 a 5 estrellas. El sistema procesa en español feedback real sobre trámites gubernamentales como DNI, AFIP y otros servicios públicos, generando automáticamente estadísticas y reportes sobre la satisfacción ciudadana.',
            'start_date' => '2026-01-30',
            'end_date' => '2026-01-30',
            'status' => 'completed',
            'type' => 'professional',
            'image' => null,
            'url_demo' => null,
            'url_github' => 'https://github.com/Dhoron22/python-basico-scripts',
            'technologies' => ['Python 3.12', 'Hugging Face Transformers', 'BERT', 'Google Colab', 'NLP'],
            'featured' => true,
            'order' => 1,
        ]);

        // Proyecto 2: Script de Análisis de Datos en Python
        Projects::create([
            'title' => 'Script de Análisis de Datos en Python',
            'description' => 'Desarrollé un script de análisis de datos en Python utilizando funciones built-in como sum, len, max e index para el procesamiento de listas, el cálculo de promedios y la búsqueda de valores máximos. La salida se formateó profesionalmente mediante f-strings y el módulo datetime para el registro automático de timestamps, demostrando capacidad sólida en Python para análisis básico de datos.',
            'start_date' => '2026-01-30',
            'end_date' => '2026-01-30',
            'status' => 'completed',
            'type' => 'professional',
            'image' => null,
            'url_demo' => null,
            'url_github' => 'https://github.com/Dhoron22/python-basico-scripts',
            'technologies' => ['Python 3.12'],
            'featured' => false,
            'order' => 2,
        ]);

        // Proyecto 3: Sistema de Gestión de Eventos Deportivos
        Projects::create([
            'title' => 'Sistema de Gestión de Eventos Deportivos Online',
            'description' => 'Desarrollo colaborativo de sistema de gestión de eventos deportivos. Implementé el backend en Laravel con CRUD, base de datos relacional y autenticación con Sanctum, testeado con Postman. Desarrollé el frontend completo de la plataforma web consumiendo la API desde Angular.',
            'start_date' => '2025-06-12',
            'end_date' => '2025-07-12',
            'status' => 'completed',
            'type' => 'academic',
            'image' => null,
            'url_demo' => null,
            'url_github' => 'https://github.com/Dhoron22/Project_Event_BackEnd.git',
            'technologies' => ['Laravel 12', 'PHP', 'Angular', 'TypeScript', 'MySQL', 'Sanctum', 'Bootstrap', 'HTML5', 'CSS', 'Postman', 'Git'],
            'featured' => true,
            'order' => 3,
        ]);

        // Proyecto 4: Sistema de Gestión de Cursos Online
        Projects::create([
            'title' => 'Sistema de Gestión de Cursos Online - API RESTful',
            'description' => 'Desarrollo de una API RESTful utilizando Laravel 12 para un sistema de gestión integral de cursos en línea. La aplicación permite a los administradores gestionar registros de usuarios, cursos, categorías, inscripciones y evaluaciones. Se implementó autenticación mediante token a través de Laravel Sanctum, asegurando un acceso protegido y seguro a la API.',
            'start_date' => '2025-05-19',
            'end_date' => '2025-06-30',
            'status' => 'completed',
            'type' => 'academic',
            'image' => null,
            'url_demo' => null,
            'url_github' => 'https://github.com/Dhoron22/ApiRestful.git',
            'technologies' => ['Laravel 12', 'PHP', 'MySQL', 'Sanctum', 'API RESTful', 'Postman', 'Git'],
            'featured' => true,
            'order' => 4,
        ]);

        // Proyecto 5: Diseño e Implementación de Base de Datos
        Projects::create([
            'title' => 'Diseño e Implementación de Base de Datos Relacional',
            'description' => 'Desarrollo de una base de datos desde cero, basada en un caso de estudio real "Gestión de Pedidos para una Tienda en Línea" y partiendo de una especificación de requerimientos. El objetivo del proyecto fue identificar y modelar todos los elementos esenciales de una base de datos relacional (entidades, relaciones, claves primarias/foráneas y normalización), y posteriormente implementarla en el motor MySQL.',
            'start_date' => '2025-03-25',
            'end_date' => '2025-04-07',
            'status' => 'completed',
            'type' => 'academic',
            'image' => null,
            'url_demo' => null,
            'url_github' => 'https://drive.google.com/file/d/19isSxbB6S9ZX_kRstobp_iYK9qNOnsYF/view?usp=drive_link',
            'technologies' => ['Docker', 'MySQL', 'SQL', 'DBeaver', 'Normalización'],
            'featured' => false,
            'order' => 5,
        ]);

        // Proyecto 6: Landing Page Colitas Felices
        Projects::create([
            'title' => 'Landing Page Estático - Colitas Felices',
            'description' => 'Desarrollo de landing page centrada en la adopción de mascotas y productos para mascotas. Utilicé Angular para estructurar la aplicación en componentes reutilizables, lo que facilitó la organización del código y permitió preparar el proyecto para futuras funcionalidades dinámicas, incluso si en esta etapa es estático.',
            'start_date' => '2025-02-07',
            'end_date' => '2025-02-24',
            'status' => 'completed',
            'type' => 'academic',
            'image' => null,
            'url_demo' => null,
            'url_github' => 'https://github.com/Dhoron22/Colitas-Felices',
            'technologies' => ['Angular', 'TypeScript', 'CSS', 'HTML5', 'Bootstrap', 'Git'],
            'featured' => false,
            'order' => 6,
        ]);
    }
}
