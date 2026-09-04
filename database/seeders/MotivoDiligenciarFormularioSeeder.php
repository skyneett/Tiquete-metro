<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoDiligenciarFormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_motivo_diligenciar_formulario')->insert([
        ['descripcion' => 'SOLICITAR BENEFICIO', 'estado' => '1'],
        ['descripcion' => 'ACTUALIZAR INFORMACIÓN', 'estado' => '1'],
    ]);
    }
}
