<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FacturaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_factura' => $this->id_factura,
            'codigo' => $this->codigo,
            'fecha' => $this->fecha,
            'id_persona' => $this->id_persona,
            'subtotal' => $this->subtotal,
            'valor_iva' => $this->valor_iva,
            'total' => $this->total,
            'id_opcion_tipo_entrega' => $this->id_opcion_tipo_entrega,
            'id_opcion_tipo_pago' => $this->id_opcion_tipo_pago,
            'costo_envio' => $this->costo_envio,
            'comentario' => $this->comentario,
            'estado' => $this->estado,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
