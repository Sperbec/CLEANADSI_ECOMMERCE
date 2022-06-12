<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "personas";

    protected $primaryKey = 'id_persona';

    protected $fillable = [
        'nombres',
        'apellidos',
        'id_opcion_genero',
        'id_opcion_tipo_documento',
        'numerodocumento',
        'natalicio',
        'habilitado'
    ];

}
