<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // nome tabela
    protected $table = 'usuarios';

    // nome chave primária
    protected $primaryKey = 'usu_id';

    // define quais campos podem ser preenchidos
    protected $fillable = [
        'usu_nome',
        'usu_email',
        'usu_senha',
        'usu_tipousuario_id',
    ];

    //Campos que devem ficar escondidos (como a senha)
    protected $hidden = [
        'usu_senha',
        'remember_token',
    ];

    // ajuste de conversão
    protected function casts(): array
    {
        return [
            'usu_email_verificacao' => 'datetime',
            'usu_senha' => 'hashed', // garantia de senha criptografada
        ];
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->usu_senha;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'usu_id';
    }

    // RELACIONAMENTOS (Agora dentro da classe)
    public function motorista()
    {
        return $this->hasOne(Motorista::class, 'mot_usuario_id', 'usu_id');
    }

    public function passageiro()
    {
        return $this->hasOne(Passageiro::class, 'pas_usuario_id', 'usu_id');
    }
}
