<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t1_grado')->insert([
            ['descripcion' => '1', 'estado' => '1', 'nivel_academico_id' => 1],
            ['descripcion' => '2', 'estado' => '1', 'nivel_academico_id' => 1],
            ['descripcion' => '3', 'estado' => '1', 'nivel_academico_id' => 1],
            ['descripcion' => '4', 'estado' => '1', 'nivel_academico_id' => 1],
            ['descripcion' => '5', 'estado' => '1', 'nivel_academico_id' => 1],
            ['descripcion' => '6', 'estado' => '1', 'nivel_academico_id' => 2],
            ['descripcion' => '7', 'estado' => '1', 'nivel_academico_id' => 2],
            ['descripcion' => '8', 'estado' => '1', 'nivel_academico_id' => 2],
            ['descripcion' => '9', 'estado' => '1', 'nivel_academico_id' => 2],
            ['descripcion' => '10', 'estado' => '1', 'nivel_academico_id' => 3],
            ['descripcion' => '11', 'estado' => '1', 'nivel_academico_id' => 3],
        ]);
    }
}