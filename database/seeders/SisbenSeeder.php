<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SisbenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_sisben')->insert([
            ['descripcion' => 'A', 'estado' => '1'],
            ['descripcion' => 'B', 'estado' => '1'],
            ['descripcion' => 'C', 'estado' => '1'],
            ['descripcion' => 'D', 'estado' => '1'],
            ['descripcion' => 'NO ESTA EN SISBEN', 'estado' => '1'],
        ]);
    }
}
