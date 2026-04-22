<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    use HasFactory;

    protected $table = 'avisos';
    protected $primaryKey = 'avi_id';
    public $timestamps = true;

    protected $fillable = [
        'avi_descricao',
        'avi_datacadastro',
    ];

    protected $casts = [
        'avi_datacadastro' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
