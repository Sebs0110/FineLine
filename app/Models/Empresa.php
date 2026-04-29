<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'emp_usuario_id',
        'emp_razaosocial',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'emp_usuario_id', 'usu_id');
    }
}

