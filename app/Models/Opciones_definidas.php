<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opciones_definidas extends Model
{
    use HasFactory;

    protected $table = "opciones_definidas";

    protected $primaryKey = 'id_opcion';

    protected $fillable = [
        'variable',
        'valor',
        'nombre',
    ];
}
