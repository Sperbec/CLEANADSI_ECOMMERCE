<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona_contacto extends Model
{

    protected $table = "persona_contacto";
    use SoftDeletes;

    protected $primaryKey = 'id_persona_contacto';
    use HasFactory;
}
