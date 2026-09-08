<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDiscapacidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_tipo_discapacidad')->insert([
            ['id' => 1, 'descripcion' => 'FÍSICA', 'estado' => '1'],
            ['id' => 2, 'descripcion' => 'SENSORIAL', 'estado' => '1'],
            ['id' => 3, 'descripcion' => 'INTELECTUAL', 'estado' => '1'],
            ['id' => 4, 'descripcion' => 'PSÍQUICA', 'estado' => '1'],
            ['id' => 5, 'descripcion' => 'MÚLTIPLE', 'estado' => '1'],
        ]);
    }
}
