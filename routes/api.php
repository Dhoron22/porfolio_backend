<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PersonalInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\SkillController;


//Rutas para Projects
Route::apiResource('projects', ProjectsController::class)
    ->parameters(['projects' => 'projects']);

//Rutas para Personal Info
Route::apiResource('personal-info', PersonalInfoController::class);

//Rutas para Work Experience
Route::apiResource('work-experiences', WorkExperienceController::class);

//Rutas para Education
Route::apiResource('education', EducationController::class);

//Rutas para Skills
Route::apiResource('skills', SkillController::class);

//Rutas para Languages
Route::apiResource('languages', LanguageController::class);

//Ruta de autenticacion
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
