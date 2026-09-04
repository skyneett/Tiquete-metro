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
        Schema::table('t1_grado', function (Blueprint $table) {
            $table->foreignId('nivel_academico_id')
                  ->nullable()
                  ->after('estado')
                  ->constrained('t1_nivel_academico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t1_grado', function (Blueprint $table) {
            $table->dropForeign(['nivel_academico_id']);
            $table->dropColumn('nivel_academico_id');
        });
    }
};
