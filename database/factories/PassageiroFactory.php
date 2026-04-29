<?php

namespace Database\Factories;

use App\Models\Passageiro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassageiroFactory extends Factory
{
    protected $model = Passageiro::class;

    public function definition(): array
    {
        return [
            'pas_usuario_id' => User::factory(),
        ];
    }
}
