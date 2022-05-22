<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden_compra extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "orden_compras";

    protected $primaryKey = 'id_orden';
}
