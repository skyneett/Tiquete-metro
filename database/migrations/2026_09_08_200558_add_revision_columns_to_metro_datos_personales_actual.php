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
            $table->string('estado_validacion', 20)->default('PENDIENTE')->after('estado');
            $table->string('estado_archivo_identidad', 20)->nullable()->after('archivo_documento_identidad');
            $table->text('obs_archivo_identidad')->nullable()->after('estado_archivo_identidad');
            $table->string('estado_archivo_servicios', 20)->nullable()->after('archivo_servicios_publicos');
            $table->text('obs_archivo_servicios')->nullable()->after('estado_archivo_servicios');
            $table->string('estado_archivo_civica', 20)->nullable()->after('archivo_tarjeta_civica');
            $table->text('obs_archivo_civica')->nullable()->after('estado_archivo_civica');
            $table->string('estado_archivo_discapacidad', 20)->nullable()->after('archivo_certificado_discapacidad');
            $table->text('obs_archivo_discapacidad')->nullable()->after('estado_archivo_discapacidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('metro_datos_personales_actual', function (Blueprint $table) {
            $table->dropColumn([
                'estado_validacion',
                'estado_archivo_identidad',
                'obs_archivo_identidad',
                'estado_archivo_servicios',
                'obs_archivo_servicios',
                'estado_archivo_civica',
                'obs_archivo_civica',
                'estado_archivo_discapacidad',
                'obs_archivo_discapacidad',
            ]);
        });
    }
};
