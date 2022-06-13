<?php

namespace App\Http\Resources;

use App\Models\Opciones_definidas;
use App\Models\Persona;
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
        $persona = Persona::all()->find($this->id_persona);
        $id_opcion_tipo_entrega = $this->id_opcion_tipo_entrega;
        $id_opcion_tipo_pago = $this->id_opcion_tipo_pago;
        $id_opcion_tipo_documento = $persona->id_opcion_tipo_documento;
        $id_opcion_genero = $persona->id_opcion_genero;
        $tipo_entrega = Opciones_definidas::all()->find($id_opcion_tipo_entrega);
        $tipo_pago = Opciones_definidas::all()->find($id_opcion_tipo_pago);
        $tipo_documento = Opciones_definidas::all()->find($id_opcion_tipo_documento);
        $genero = Opciones_definidas::all()->find($id_opcion_genero);

        return [
            'id_factura' => $this->id_factura,
            'codigo' => $this->codigo,
            'fecha' => $this->fecha,
            'id_persona' => $this->id_persona,
            'subtotal' => $this->subtotal,
            'valor_iva' => $this->valor_iva,
            'total' => $this->total,
            'id_opcion_tipo_entrega' => $tipo_entrega->nombre,
            'id_opcion_tipo_pago' => $tipo_pago->nombre,
            'costo_envio' => $this->costo_envio,
            'comentario' => $this->comentario,
            'estado' => $this->estado,
            'persona' => [
                'id_persona' => $persona->id_persona,
                'nombres' => $persona->nombres,
                'apellidos' => $persona->apellidos,
                'genero' => $genero->nombre,
                'tipo_documento' => $tipo_documento->nombre,
                'numero_documento' => $persona->numero_documento,
            ],
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
