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

        // Productos
        $productos = [];
        foreach ($detalles as $detalle) {
            $producto = Producto::all()->find($detalle->id_producto);
            $productos[] = $producto;
        }

        // Persona
        $persona = Persona::all()->find($this->id_persona);

        // OpcionesDefinidas
        $id_opcion_tipo_entrega = $this->id_opcion_tipo_entrega;
        $id_opcion_tipo_pago = $this->id_opcion_tipo_pago;
        $id_opcion_tipo_documento = $persona->id_opcion_tipo_documento;
        $id_opcion_genero = $persona->id_opcion_genero;
        $tipo_entrega = Opciones_definidas::all()->find($id_opcion_tipo_entrega);
        $tipo_pago = Opciones_definidas::all()->find($id_opcion_tipo_pago);
        $tipo_documento = Opciones_definidas::all()->find($id_opcion_tipo_documento);
        $genero = Opciones_definidas::all()->find($id_opcion_genero);

        return [
            'id_factura' => (int) $this->id_factura,
            'codigo' => $this->codigo,
            'fecha' => $this->fecha,
            'id_persona' =>  (int) $factura->id_persona,
            'subtotal' => number_format($factura->subtotal, 2, ',', '.'),
            'valor_iva' => number_format($factura->valor_iva, 2, ',', '.'),
            'total' => number_format($factura->total, 2, ',', '.'),
            'id_opcion_tipo_entrega' => $tipo_entrega->nombre,
            'id_opcion_tipo_pago' => $tipo_pago->nombre,
            'costo_envio' => number_format($this->costo_envio, 2, ',', '.'),
            'comentario' => $this->comentario,
            'estado' => (int) $factura->estado,
            'persona' => [
                'id_persona' => $persona->id_persona,
                'nombres' => $persona->nombres,
                'apellidos' => $persona->apellidos,
                'genero' => $genero->nombre,
                'tipo_documento' => $tipo_documento->nombre,
                'numero_documento' => $persona->numero_documento,
            ],
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
