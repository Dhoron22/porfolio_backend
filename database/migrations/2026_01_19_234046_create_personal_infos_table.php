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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo'); //Nombre completo
            $table->string('titulo'); //Programador, Diseñador, etc.
            $table->text('bio'); //Descripcon profesional
            $table->string('location'); //Ubicacion
            $table->string('phone'); //Mi numero de telefono
            $table->string('email'); //Mi email
            $table->string('github_url')->nullable(); //Link a mi github
            $table->string('linkedin_url')->nullable(); //Link a mi linkedin
            $table->integer('age')->nullable(); //Mi edad
            $table->string('profile_image')->nullable(); //URL o path de la imagen de perfil
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_infos');
    }
};
