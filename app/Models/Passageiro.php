<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    use HasFactory;

    protected $table = 'passageiros';
    protected $primaryKey = 'pas_id';

    protected $fillable = [
        'pas_usuario_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'pas_usuario_id', 'usu_id');
    }
}
