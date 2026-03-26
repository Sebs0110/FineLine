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
        Schema::create('itinerarios', function (Blueprint $table) {
            $table->id("iti_id");
            $table->integer("iti_rota_id");
            $table->time("iti_horariosaida");
            $table->enum("iti_diadasemana", ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo']);
            $table->timestamps();
            $table->foreign("iti_rota_id")->references("rot_id")->on("rotas");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerarios');
    }
};
