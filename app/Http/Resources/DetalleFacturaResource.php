<?php

namespace App\Http\Resources;

use App\Models\Producto;
use Illuminate\Http\Resources\Json\JsonResource;

class DetalleFacturaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $producto = Producto::where('id_producto', $this->id_producto)->first();

        return [
            'id_detalle_factura' => (int) $this->id_detalle_factura,
            'producto' => $producto->nombre,
            'imagen' => $producto->imagen,
            'cantidad' => (int) $this->cantidad,
        ];
    }
}
