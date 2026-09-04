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
        Schema::create('t1_comuna', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->string('estado')->default('1');
            $table->foreignId('municipio_id')->constrained('t1_municipio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t1_comuna');
    }
};
