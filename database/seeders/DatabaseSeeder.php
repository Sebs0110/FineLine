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
        DB::table('tiposusuarios')->insert([
            ['tus_id' => 1, 'tus_nome' => 'Administrador'],
            ['tus_id' => 2, 'tus_nome' => 'Passageiro'],
            ['tus_id' => 3, 'tus_nome' => 'Motorista'],
        ]);
    }
}
