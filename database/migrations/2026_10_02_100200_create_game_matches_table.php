<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_matches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('home_team_id')->constrained('teams')->restrictOnDelete();
            $table->foreignId('away_team_id')->constrained('teams')->restrictOnDelete();
            $table->dateTime('fecha_partido');
            $table->string('fase', 80)->nullable();           
            $table->string('lugar', 120)->nullable();
            $table->string('estado', 12)->default('scheduled'); 
            $table->unsignedSmallInteger('goles_local')->nullable();
            $table->unsignedSmallInteger('goles_visitante')->nullable();
            $table->timestamps();


            $table->index('fecha_partido');
            $table->index(['estado', 'fecha_partido']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_matches');
    }
};
