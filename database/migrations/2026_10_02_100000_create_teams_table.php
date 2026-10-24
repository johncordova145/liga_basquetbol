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
            $table->string('name', 100)->unique();
            $table->string('code', 3)->unique();              
            $table->string('category', 20)->default('Masculino')->index(); 
            $table->string('zone', 40)->nullable();          
            $table->string('flag', 100)->nullable();               
            $table->string('city', 100);
            $table->string('coach', 100)->nullable();
            $table->unsignedSmallInteger('founded')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};