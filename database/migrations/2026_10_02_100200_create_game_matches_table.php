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
            $table->dateTime('played_at');
            $table->string('stage', 80)->nullable();          
            $table->string('venue', 120)->nullable();
            $table->string('status', 12)->default('scheduled'); 
            $table->unsignedSmallInteger('home_score')->nullable();
            $table->unsignedSmallInteger('away_score')->nullable();
            $table->timestamps();

            $table->index('played_at');
            $table->index(['status', 'played_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_matches');
    }
};