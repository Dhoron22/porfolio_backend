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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company'); //Drugstore
            $table->string('position'); //Encargado
            $table->text('description'); //Responsable de la gestion del inventario y atencion al cliente.
            $table->string('location')->nullable(); //Ciudad, Pais
            $table->date('start_date'); //Fecha de inicio
            $table->date('end_date')->nullable(); //Fecha de fin (null si es actual)
            $table->boolean('current')->default(false); //Trabajo Actual
            $table->json('responsabilities')->nullable(); //["Rendcion de dinero","compras"]
            $table->string('reference_name')->nullable(); //Tomas Martin Altamirano
            $table->string('reference_phone')->nullable(); //+56912345678
            $table->integer('order')->default(0); //Orden de aparicion
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
