<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoViaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('t1_tipo_via')->insert([
            ['descripcion' => 'AVENIDA', 'estado' => '1'],
            ['descripcion' => 'AVENIDA CALLE', 'estado' => '1'],
            ['descripcion' => 'AVENIDA CARRERA', 'estado' => '1'],
            ['descripcion' => 'BULEVAR', 'estado' => '1'],
            ['descripcion' => 'CALLE', 'estado' => '1'],
            ['descripcion' => 'CARRERA', 'estado' => '1'],
            ['descripcion' => 'CIRCULAR', 'estado' => '1'],
            ['descripcion' => 'CIRCUNVALAR', 'estado' => '1'],
            ['descripcion' => 'CTAS CORRIDAS', 'estado' => '1'],
            ['descripcion' => 'DIAGONAL', 'estado' => '1'],
            ['descripcion' => 'KILOMETRO', 'estado' => '1'],
            ['descripcion' => 'PASAJE', 'estado' => '1'],
            ['descripcion' => 'PASEO', 'estado' => '1'],
            ['descripcion' => 'PEATONAL', 'estado' => '1'],
            ['descripcion' => 'TRANSVERSAL', 'estado' => '1'],
            ['descripcion' => 'TRONCAL', 'estado' => '1'],
            ['descripcion' => 'VARIANTE', 'estado' => '1'],
            ['descripcion' => 'VIA', 'estado' => '1'],
            ['descripcion' => 'OTROS', 'estado' => '1'],
        ]);
    }
}
