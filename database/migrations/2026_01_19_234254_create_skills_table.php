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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Laravlel,Angular, etc
            $table->string('category'); //Technical,soft,tool
            $table->string('subcategory')->nullable(); //backend,frontend,etc
            $table->integer('proficiency')->nullable(); //1-100 (para tecnicas)
            $table->string('icon')->nullable(); //URL o clase  de icono
            $table->text('description')->nullable(); //Descripción adicional
            $table->boolean('featured')->default(false); //Destacar en el portafolio
            $table->integer('order')->default(0); //Orden de visualización
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
