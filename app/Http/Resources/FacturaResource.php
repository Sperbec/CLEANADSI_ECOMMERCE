<?php

namespace App\Http\Resources;

use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Opciones_definidas;
use App\Models\Persona;
use App\Models\Producto;
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
        // Factura
        $factura = Factura::all()->find($this->id_factura);

        // get a collection of DetalleFactura where the id_factura is the same as the id_factura of the FacturaResource
        $detalles = DetalleFactura::where('id_factura', $this->id_factura)->get();

        return [
            'id_factura' => (int) $this->id_factura,
            'codigo' => $this->codigo,
            'fecha' => $this->fecha,
            'id_persona' =>  (int) $factura->id_persona,
            'subtotal' => number_format($factura->subtotal, 2, ',', '.'),
            'valor_iva' => number_format($factura->valor_iva, 2, ',', '.'),
            'total' => number_format($factura->total, 2, ',', '.'),
            'opcion_tipo_entrega' => Opciones_definidas::all()->find($factura->id_opcion_tipo_entrega),
            'opcion_tipo_pago' => Opciones_definidas::all()->find($factura->id_opcion_tipo_pago),
            'costo_envio' => number_format($this->costo_envio, 2, ',', '.'),
            'comentario' => $this->comentario,
            'estado' => (int) $factura->estado,
            'persona' => Persona::all()->find($factura->id_persona),
            'detalle_factura' => DetalleFacturaResource::collection($detalles),
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
