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
        Schema::create('metro_datos_personales_actual', function (Blueprint $table) {
            $table->id();
            $table->integer('periodo');
            $table->foreignId('motivo')->constrained('t1_motivo_diligenciar_formulario');
            $table->foreignId('tipo_documento')->constrained('t1_tipo_documento');
            $table->string('documento', 20);
            $table->foreignId('genero')->constrained('t1_genero');
            $table->string('cual_genero', 45)->nullable();
            $table->text('primer_nombre');
            $table->text('segundo_nombre')->nullable();
            $table->text('primer_apellido');
            $table->text('segundo_apellido')->nullable();
            $table->string('civica', 20)->nullable();
            $table->string('nombre_civica', 100)->nullable();
            $table->date('fecha_nacimiento');
            $table->string('edad', 20);

            // Dirección
            $table->foreignId('dirCampo1')->nullable()->constrained('t1_tipo_via');
            $table->string('dirCampo2', 20)->nullable();
            $table->string('dirCampo3', 20)->nullable();
            $table->foreignId('dirCampo4')->nullable()->constrained('t1_orientacion');
            $table->string('dirCampo5', 20)->nullable();
            $table->string('dirCampo6', 20)->nullable();
            $table->foreignId('dirCampo7')->nullable()->constrained('t1_orientacion');
            $table->string('dirCampo8', 20)->nullable();
            $table->text('dirCampo9')->nullable();
            $table->longText('direccion')->nullable();

            $table->foreignId('municipio')->constrained('t1_municipio');
            $table->foreignId('comuna')->nullable()->constrained('t1_comuna');
            $table->foreignId('barrio')->nullable()->constrained('t1_barrio');
            $table->string('OtroBarrio', 200)->nullable();

            $table->foreignId('estrato')->constrained('t1_estrato');
            $table->foreignId('puntajeSisben')->nullable()->constrained('t1_sisben');
            $table->foreignId('discapacidad')->constrained('t1_discapacidad');
            $table->string('tipo_discapacidad', 45)->nullable();

            $table->text('correo');
            $table->text('celular');
            $table->text('telefonoFijo')->nullable();

            $table->foreignId('nivel_academico')->constrained('t1_nivel_academico');
            $table->foreignId('fondo')->constrained('t1_fondo');
            $table->integer('semestre')->nullable();
            $table->foreignId('grado')->nullable()->constrained('t1_grado');

            $table->string('fecha_registro', 20);
            $table->string('acepta', 20);
            $table->integer('estado')->default(1);

            $table->string('archivo_documento_identidad')->nullable();
            $table->string('archivo_servicios_publicos')->nullable();
            $table->string('archivo_tarjeta_civica')->nullable();
            $table->string('archivo_certificado_discapacidad')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metro_datos_personales_actual');
    }
};
