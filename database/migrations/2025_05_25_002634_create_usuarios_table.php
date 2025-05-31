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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 100)->unique(); //
            $table->string('password', 255);       // 
            $table->string('telefono', 20)->nullable();
            $table->string('foto', 255)->nullable(); // nullable agregado
            $table->enum('rol', ['ADMINISTRADOR', 'RECEPCIONISTA', 'CLIENTE', 'INSTRUCTOR']);
            $table->boolean('requiere_cambio_contrasena')->default(true);
            $table->timestamp('fecha_registro')->useCurrent();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
