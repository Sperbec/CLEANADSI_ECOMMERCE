<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    protected $table = "categorias";

    use SoftDeletes;

    protected $primaryKey = 'id_categoria';
    use HasFactory;
}
