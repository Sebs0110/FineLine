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
        Schema::create('passageiros', function (Blueprint $table) {
            $table->id("pas_id");
            $table->integer("pas_usuario_id");
            $table->timestamps();
            $table->foreign("pas_usuario_id")->references("usu_id")->on("usuarios");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passageiros');
    }
};
