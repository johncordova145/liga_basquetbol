<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->unique();
            $table->string('codigo', 3)->unique();              
            $table->string('categoria', 20)->default('hombres')->index(); 
            $table->string('zona', 40)->nullable();          
            $table->string('bandera', 100)->nullable();               
            $table->string('ciudad', 100);
            $table->string('entrenador', 100)->nullable();
            $table->unsignedSmallInteger('fundacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
