<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FondoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_fondo')->insert([
            ['descripcion' => 'VISION4RIOS', 'estado' => '1'],
            ['descripcion' => 'MATRICULA CERO', 'estado' => '1'],
            ['descripcion' => 'FONDOS PREGRADO', 'estado' => '1'],
            ['descripcion' => 'FONDOS POSGRADO', 'estado' => '1'],
            ['descripcion' => 'MEJORES BACHILLERES', 'estado' => '1'],
            ['descripcion' => 'MEJORES DEPORTISTAS', 'estado' => '1'],
            ['descripcion' => '@MEDELLIN', 'estado' => '1'],
            
        ]);
    }
}
