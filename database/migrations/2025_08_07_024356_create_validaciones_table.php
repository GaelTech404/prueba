<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('validaciones', function (Blueprint $table) {
            $table->id(); // N° autoincremental
            $table->string('validador'); // Nombre del validador (quien inició sesión)
            $table->string('codigo_tienda');
            $table->string('pallet');
            $table->integer('bultos');
            $table->integer('cantidad');
            $table->date('fecha');
            $table->enum('tipo_sf', ['S', 'F']); // S = sobrante, F = faltante
            $table->string('codigo_producto');
            $table->string('usuario_picker');
            $table->string('turno');
            $table->string('nombre_picker');
            $table->timestamps(); // created_at y updated_at
            $table->string('tiempo_validacion')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validaciones');
    }
};
