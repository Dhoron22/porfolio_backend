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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('institution'); //UNNE
            $table->string('degree'); //Diplomatura Universitaria en Desarrollo Web
            $table->string('field_of_study')->nullable(); //Desarrollo Web
            $table->text('description')->nullable(); //Descripción adicional
            $table->date('start_date')->nullable(); //Fecha de inicio
            $table->date('end_date')->nullable(); //Fecha de finalización
            $table->boolean('current')->default(false); //En curso
            $table->string('status')->default('completed'); //completed, in_progress, dropped_out
            $table->string('certificate_url')->nullable(); //URL del certificado
            $table->string('location')->nullable(); //Corrientes. Argentina
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
        Schema::dropIfExists('education');
    }
};
