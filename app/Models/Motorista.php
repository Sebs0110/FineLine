<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    protected $table = 'motoristas'; // Nome exato da  tabela
    protected $primaryKey = 'mot_id'; // chave primária personalizada

    protected $fillable = [
        'mot_usuario_id',
        'mot_numerocarteira',
        'mot_validade',
    ];

    // Relacionamento: Um motorista pertence a um usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'mot_usuario_id', 'usu_id');
    }
}

