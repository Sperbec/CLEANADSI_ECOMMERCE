<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;

    protected $table = "facturas";
    protected $primaryKey = 'id_factura';
    protected $fillable= [
    'codigo', 
    'fecha',
    'id_persona',
    'subtotal', 
    'valor_iva',
    'total',
    'id_opcion_tipo_entrega',
    'id_opcion_tipo_pago',
    'costo_envio',
    'comentario',
    'estado'
    ];

   
}