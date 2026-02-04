<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkExperience;

class WorkExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Experiencia 1: Drugstore 24hs
        WorkExperience::create([
            'company' => 'Drugstore 24hs "La Vía"',
            'position' => 'Encargado',
            'description' => 'Inicio con funciones operativas: reposición de productos, atención al cliente, ventas y cierre de caja. Posteriormente promocionado a Encargado con funciones de gestión: rendición de dinero, compras de productos y control de stock.',
            'location' => 'Corrientes, Argentina',
            'start_date' => '2021-02-01',
            'end_date' => '2025-04-01',
            'current' => false,
            'responsabilities' => [
                'Reposición de productos',
                'Atención al cliente',
                'Ventas y cierre de caja',
                'Rendición de dinero',
                'Compras de productos',
                'Control de stock',
            ],
            'reference_name' => 'Tomas Martin Altamirano',
            'reference_phone' => '01139169111',
            'order' => 1,
        ]);

        // Experiencia 2: Gestoría Contable
        WorkExperience::create([
            'company' => 'GESTORIA CONTABLE',
            'position' => 'Administración y Gestión Documental',
            'description' => 'Realización de trámites bancarios y administrativos ante organismos como AFIP y DGR. Gestión eficiente de facturas, registros y elaboración de diversas planillas.',
            'location' => 'Corrientes, Argentina',
            'start_date' => '2019-05-01',
            'end_date' => '2020-12-01',
            'current' => false,
            'responsabilities' => [
                'Trámites bancarios',
                'Trámites ante AFIP y DGR',
                'Gestión de facturas',
                'Elaboración de planillas',
            ],
            'reference_name' => 'Perez Alicia Del Valle',
            'reference_phone' => '3794696240',
            'order' => 2,
        ]);

        // Experiencia 3: Alfa Construcciones
        WorkExperience::create([
            'company' => 'ALFA CONSTRUCCIONES',
            'position' => 'Ventas en Mostrador',
            'description' => 'Colaboración en tareas generales de ventas en mostrador.',
            'location' => 'Corrientes, Argentina',
            'start_date' => '2019-12-01',
            'end_date' => '2020-03-01',
            'current' => false,
            'responsabilities' => [
                'Atención al cliente',
                'Ventas en mostrador',
            ],
            'reference_name' => 'Natalia Molinas',
            'reference_phone' => '3794595086',
            'order' => 3,
        ]);

        // Experiencia 4: Kiosco Tan Rico
        WorkExperience::create([
            'company' => 'Kiosco y Comidas al paso "Tan Rico"',
            'position' => 'Atención al Cliente y Ventas',
            'description' => 'Reposición, ventas y atención al cliente.',
            'location' => 'Corrientes, Argentina',
            'start_date' => '2018-12-01',
            'end_date' => '2019-03-01',
            'current' => false,
            'responsabilities' => [
                'Reposición de productos',
                'Ventas',
                'Atención al cliente',
            ],
            'reference_name' => 'Carlos Altamirano',
            'reference_phone' => '3794353969',
            'order' => 4,
        ]);
    }
}
