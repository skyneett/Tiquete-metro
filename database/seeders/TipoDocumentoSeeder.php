<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_tipo_documento')->insert([
        ['descripcion' => 'CC', 'estado' => '1'],
        ['descripcion' => 'TI', 'estado' => '1'],
        ['descripcion' => 'RC', 'estado' => '1'],
        ['descripcion' => 'PPT', 'estado' => '1'],
        ['descripcion' => 'NES', 'estado' => '1'],
        ['descripcion' => 'NUIP', 'estado' => '1'],
        ['descripcion' => 'PAP', 'estado' => '1'],
        ['descripcion' => 'PED', 'estado' => '1'],
        ['descripcion' => 'CE', 'estado' => '1'],
    ]);
    }
}
