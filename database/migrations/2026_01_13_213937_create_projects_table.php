<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //Titulo del Proyecto
            $table->text('description'); //Descripcion larga del proyecto
            $table->date('start_date'); // Fecha de inicio del proyecto
            $table->date('end_date'); // Fecha de finalizacion del proyecto
            $table->string('status')->default('completed'); //completed, in_progress
            $table->string('type')->default('academic'); //academic, professonal)
            $table->string('image')->nullable(); //URL o path de la imagen
            $table->string('url_demo')->nullable(); //link del demo del proyecto
            $table->string('url_github')->nullable(); //link del repositorio del proyecto
            $table->json('technologies'); //Array de tecnologias
            $table->boolean('featured')->default(false); //Proyecto destacado
            $table->integer('order')->default(0); //Orden de visualizacion
            $table->timestamps(); //created_at y updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
