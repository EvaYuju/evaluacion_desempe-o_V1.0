<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregamos la columna 'role' como ENUM con valores permitidos y un valor por defecto
            $table->enum('role', ['super_admin', 'admin', 'user'])->default('user');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminamos la columna en caso de rollback
            $table->dropColumn('role');
        });
    }
};
