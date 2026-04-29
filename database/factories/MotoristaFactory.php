<?php

namespace Database\Factories;

use App\Models\Motorista;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotoristaFactory extends Factory
{
    protected $model = Motorista::class;

    public function definition(): array
    {
        return [
            'mot_usuario_id' => User::factory(),
            'mot_numerocarteira' => 'CNH-'. fake()->numerify('###########'),
            'mot_validade' => fake()->dateTimeBetween('+1 year', '+5 years'),
        ];
    }
}
