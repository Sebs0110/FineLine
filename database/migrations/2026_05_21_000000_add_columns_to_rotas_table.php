<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rotas', function (Blueprint $table) {
            if (!Schema::hasColumn('rotas', 'rot_origem')) {
                $table->string('rot_origem', 255)->after('rot_nome');
            }
            if (!Schema::hasColumn('rotas', 'rot_destino')) {
                $table->string('rot_destino', 255)->after('rot_origem');
            }
            if (!Schema::hasColumn('rotas', 'rot_duracao_estimada')) {
                $table->string('rot_duracao_estimada', 255)->after('rot_destino');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rotas', function (Blueprint $table) {
            $table->dropColumn(['rot_origem', 'rot_destino', 'rot_duracao_estimada']);
        });
    }
};
