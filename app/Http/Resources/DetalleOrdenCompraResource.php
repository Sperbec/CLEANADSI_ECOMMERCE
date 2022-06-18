<?php

namespace App\Http\Resources;

use App\Models\Producto;
use Illuminate\Http\Resources\Json\JsonResource;

class DetalleOrdenCompraResource extends JsonResource
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
            'id_detalle_orden' => (int) $this->id_detalle_orden,
            'producto' => $producto->nombre,
            'imagen' => $producto->imagen,
            'cantidad' => (int) $this->cantidad,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
