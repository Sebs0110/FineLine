<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    use HasFactory;

    protected $table = 'itinerarios';
    protected $primaryKey = 'iti_id';

    protected $fillable = [
        'iti_rota_id',
        'iti_horariosaida',
        'iti_diadasemana'
    ];

    public function rota()
    {
        return $this->belongsTo(Rota::class, 'iti_rota_id', 'rot_id');
    }
}
