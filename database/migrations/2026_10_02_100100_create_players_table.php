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
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->unsignedTinyInteger('jersey_number');
            $table->string('position', 20);
            $table->unsignedSmallInteger('height_cm')->nullable();
            $table->date('birth_date')->nullable();
            $table->timestamps();

            // Un dorsal no puede repetirse dentro del mismo equipo.
            $table->unique(['team_id', 'jersey_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
