<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_municipio')->insert([
            ['descripcion' => 'BARBOSA', 'estado' => '1'],
            ['descripcion' => 'BELLO', 'estado' => '1'],
            ['descripcion' => 'CALDAS', 'estado' => '1'],
            ['descripcion' => 'COPACABANA', 'estado' => '1'],
            ['descripcion' => 'ENVIGADO', 'estado' => '1'],
            ['descripcion' => 'GIRARDOTA', 'estado' => '1'],
            ['descripcion' => 'ITAGÜI', 'estado' => '1'],
            ['descripcion' => 'LA ESTRELLA', 'estado' => '1'],
            ['descripcion' => 'LA UNION', 'estado' => '1'],
            ['descripcion' => 'MEDELLIN', 'estado' => '1'],
            ['descripcion' => 'SABANETA', 'estado' => '1'],
        ]);
    }
}
