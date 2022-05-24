<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_orden_compra extends Model
{
    use HasFactory;
    protected $table = "detalle_orden_compra";
    protected $primaryKey = 'id_detalle_orden';
    public $timestamps = false;
}
