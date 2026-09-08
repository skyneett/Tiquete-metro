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
        Schema::table('metro_datos_personales_actual', function (Blueprint $table) {
            $table->boolean('decision_manual')->default(false)->after('estado_validacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('metro_datos_personales_actual', function (Blueprint $table) {
            $table->dropColumn('decision_manual');
        });
    }
};
