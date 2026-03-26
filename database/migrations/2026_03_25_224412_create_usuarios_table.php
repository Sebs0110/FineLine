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
        Schema::create("usuarios", function (Blueprint $table) {
            $table->id("usu_id");
            $table->string("usu_nome", 300);
            $table->string("usu_email")->unique();
            $table->timestamp("usu_email_verificacao")->nullable();
            $table->string("usu_senha");
            $table->integer("usu_tipousuario_id");
            $table->rememberToken();
            $table->timestamps();
            $table->foreign("usu_tipousuario_id")->references("tus_id")->on("tiposusuarios");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("usuarios");
    }
};
