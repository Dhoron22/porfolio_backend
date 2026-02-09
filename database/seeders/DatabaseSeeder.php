<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PersonalInfoSeeder;
use Database\Seeders\ProjectSeeder;
use Database\Seeders\WorkExperienceSeeder;
use Database\Seeders\EducationSeeder;
use Database\Seeders\SkillSeeder;
use Database\Seeders\LanguageSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PersonalInfoSeeder::class,
            ProjectSeeder::class,
            WorkExperienceSeeder::class,
            EducationSeeder::class,
            SkillSeeder::class,
            LanguageSeeder::class,
        ]);
    }
}
