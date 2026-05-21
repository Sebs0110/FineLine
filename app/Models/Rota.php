<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rota extends Model
{
    use HasFactory;
    protected $table = 'rotas';
    protected $primaryKey = 'rot_id';
    protected $fillable = ['rot_nome', 'rot_origem', 'rot_destino', 'rot_duracao_estimada'];
}
