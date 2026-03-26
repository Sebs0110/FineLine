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
        Schema::create('motoristas', function (Blueprint $table) {
            $table->id("mot_id");
            $table->integer("mot_usuario_id");
            $table->string("mot_numerocarteira");
            $table->date("mot_validade");
            $table->timestamps();
            $table->foreign("mot_usuario_id")->references("usu_id")->on("usuarios");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motoristas');
    }
};
