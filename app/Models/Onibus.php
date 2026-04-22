<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onibus extends Model {
    use HasFactory;
    protected $table = 'onibus';
    protected $primaryKey = 'oni_id';
    protected $fillable = ['oni_placa','oni_renavam', 'oni_modelo'];

}
