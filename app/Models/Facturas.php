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

    static function factura($codigo,$id_persona,$subtotal,$valor_iva,$total,$id_opcion_tipo_entrega,$id_opcion_tipo_pago,$costo_envio,$comentario,$estado)
    {
        $data =producto::create([
            "codigo" =>$codigo,
            "fecha" => date("Y-m-d"),
            "id_persona" =>$id_persona,
            "subtotal" =>$subtotal,
            "valor_iva" =>$valor_iva,
            "total" =>$total,
            "id_opcion_tipo_entrega" =>$id_opcion_tipo_entrega,
            "id_opcion_tipo_pago" =>$id_opcion_tipo_pago,
            "costo_envio" =>$costo_envio,
            "comentario" =>$comentario,
            "estado" =>$estado,
        ]);

        return $data->id_factura;
    }
}