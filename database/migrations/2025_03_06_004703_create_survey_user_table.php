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
        Schema::create('survey_users', function (Blueprint $table) {
            $table->id();
            // Relación para indicar quién crea la encuesta:
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Relación para indicar la encuesta a la que se asocia:
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_user');
    }
};
