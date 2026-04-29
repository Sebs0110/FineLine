<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'usu_nome' => fake()->name(),
            'usu_email' => fake()->unique()->safeEmail(),
            'usu_email_verificacao' => now(),
            'usu_senha' => static::$password ??= Hash::make('password'),
            'usu_tipousuario_id' => 1, // Ajuste conforme seus IDs de tipo
            'remember_token' => Str::random(10),
        ];
    }

    public function motorista(): static
    {
        return $this->afterCreating(function (User $user) {
            \App\Models\Motorista::factory()->create(['mot_usuario_id' => $user->usu_id]);
        });
    }

    public function passageiro(): static
    {
        return $this->afterCreating(function (User $user) {
            \App\Models\Passageiro::factory()->create(['pas_usuario_id' => $user->usu_id]);
        });
    }
}
