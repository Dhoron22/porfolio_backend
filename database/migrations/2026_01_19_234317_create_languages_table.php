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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Ingles,Español
            $table->string('proficiency'); //Basico,Intermedio,Avanzado,Nativo
            $table->string('level_code')->nullable(); //A1,A2,B1,B2,C1,C2
            $table->text('description')->nullable(); //Descripción adicional
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
        Schema::dropIfExists('languages');
    }
};
