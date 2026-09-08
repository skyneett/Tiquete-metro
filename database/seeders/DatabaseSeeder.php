<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            MotivoDiligenciarFormularioSeeder::class,
            TipoDocumentoSeeder::class,
            GeneroSeeder::class,
            MunicipioSeeder::class,
            EstratoSeeder::class,
            SisbenSeeder::class,
            DiscapacidadSeeder::class,
            NivelAcademicoSeeder::class,
            GradoSeeder::class,
            FondoSeeder::class,
            TipoViaSeeder::class,
            OrientacionSeeder::class,
            SinoSeeder::class,
            TipoDiscapacidadSeeder::class,
            ComunaBarrioSeeder::class,
        ]);
    }
}