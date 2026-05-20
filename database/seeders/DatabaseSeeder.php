<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Aqui inserimos os tipos de usuário necessários para o banco não dar erro
        $tipos = [
            ['tus_id' => 1, 'tus_nome' => 'Administrador'],
            ['tus_id' => 2, 'tus_nome' => 'Passageiro'],
            ['tus_id' => 3, 'tus_nome' => 'Motorista'],
        ];

        foreach ($tipos as $tipo) {
            DB::table('tiposusuarios')->updateOrInsert(
                ['tus_id' => $tipo['tus_id']],
                ['tus_nome' => $tipo['tus_nome'], 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
