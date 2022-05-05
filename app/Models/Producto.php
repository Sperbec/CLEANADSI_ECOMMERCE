<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "productos";
    protected $primaryKey = 'id_producto';
    protected $fillable= [
    'nombre',
    'descripcion',
    'sku',
    'estado',
    'precio',
    'cantidad_existencia',
    'imagen',
    'id_categoria',
    ];
}