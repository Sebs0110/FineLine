<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    use HasFactory;

    protected $table = 'paradas';
    protected $primaryKey = 'par_id';

    protected $fillable = [
        'par_nome',
        'par_endereco',
        'par_latitude',
        'par_longitude',
    ];
}
