<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained()->cascadeOnDelete();
            $table->string('primer_nombre', 80);
            $table->string('segundo_nombre', 80);
            $table->unsignedTinyInteger('camiseta_numero');
            $table->string('posicion', 20);
            $table->unsignedSmallInteger('altura_cm')->nullable();
            $table->date('cumpleaños')->nullable();
            $table->timestamps();

            $table->unique(['equipo_id', 'camiseta_numero']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
