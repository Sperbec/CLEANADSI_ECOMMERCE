<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;
    protected $table = "detalle_factura";
    protected $primaryKey = 'id_detalle_factura';
    protected $fillable= [
    'id_factura',
    'id_producto',
    'cantidad'
    
    ];

}