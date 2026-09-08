<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t1_sino')->insert([
            ['id' => 1, 'descripcion' => 'SI', 'estado' => '1'],
            ['id' => 2, 'descripcion' => 'NO', 'estado' => '1'],
        ]);
    }
}
