<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_genero')->insert([
            ['descripcion' => 'MASCULINO', 'estado' => '1'],
            ['descripcion' => 'FEMENINO', 'estado' => '1'],
            ['descripcion' => 'OTRO', 'estado' => '1'],
        ]);
    }
}
