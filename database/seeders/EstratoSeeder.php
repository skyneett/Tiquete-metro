<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_estrato')->insert([
            ['descripcion' => '1', 'estado' => '1'],
            ['descripcion' => '2', 'estado' => '1'],
            ['descripcion' => '3', 'estado' => '1'],
            ['descripcion' => '4', 'estado' => '1'],
            ['descripcion' => '5', 'estado' => '1'],
            ['descripcion' => '6', 'estado' => '1'],
        ]);
    }
}
