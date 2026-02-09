<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\PersonalInfo;
class PersonalInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonalInfo::create([
            'nombre_completo' => 'Lautaro Manuel Perez',
            'titulo' => 'Programador Web Full Stack Jr',
            'bio'=> 'Enfocado principalmente en el desarrollo de sitios web dinámicos, funcionales y escalables. Graduado en Diplomatura Universitaria en Desarrollo Web (UNNE).',
            'location' => 'Corrientes Capital, Argentina',
            'phone' => '3731551665',
            'email' => 'perezlautaro63@gmail.com',
            'github_url' => 'https://github.com/Dhoron22',
            'linkedin_url' => 'https://www.linkedin.com/in/lautaro-p%C3%A9rez-aa8981201/',
            'age' => 26,
            'profile_image' => 'images/profile/fotoPerfil.png',
        ]);
    }
}


