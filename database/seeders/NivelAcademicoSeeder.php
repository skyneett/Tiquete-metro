<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_nivel_academico')->insert([
            ['descripcion' => 'PRIMARIA', 'estado' => '1'],
            ['descripcion' => 'SECUNDARIA', 'estado' => '1'],
            ['descripcion' => 'MEDIA', 'estado' => '1'],
            ['descripcion' => 'SUPERIOR', 'estado' => '1'],
        ]);
    }
}
