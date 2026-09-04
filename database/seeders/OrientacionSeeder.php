<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrientacionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t1_orientacion')->insert([
            ['descripcion' => 'BIS', 'estado' => '1'],
            ['descripcion' => 'ESTE', 'estado' => '1'],
            ['descripcion' => 'NORTE', 'estado' => '1'],
            ['descripcion' => 'OESTE', 'estado' => '1'],
            ['descripcion' => 'SUR', 'estado' => '1'],
        ]);
    }
}