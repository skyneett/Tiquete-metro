<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscapacidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_discapacidad')->insert([
            ['descripcion' => 'SI', 'estado' => '1'],
            ['descripcion' => 'NO', 'estado' => '1'],
        ]);
    }
}
