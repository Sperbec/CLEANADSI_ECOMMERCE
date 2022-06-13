<?php

namespace App\Http\Resources;

use App\Models\Opciones_definidas;
use App\Models\Persona;
use App\Models\Proveedor;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdenCompraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $proveedor = Proveedor::all()->find($this->id_proveedor);
        $persona = Persona::all()->find($proveedor->id_persona);
        $id_opcion_tipo_documento = $persona->id_opcion_tipo_documento;
        $id_opcion_genero = $persona->id_opcion_genero;
        $tipo_documento = Opciones_definidas::all()->find($id_opcion_tipo_documento);
        $genero = Opciones_definidas::all()->find($id_opcion_genero);

        return [
            'id_orden' => $this->id_orden,
            'codigo' => $this->codigo,
            'fecha' => $this->fecha,
            'proveedor' => $proveedor->nombre,
            'total' => $this->total,
            'valor_iva' => $this->valor_iva,
            'subtotal' => $this->subtotal,
            'comentario' => $this->comentario,
            'estado' => $this->estado,
            'persona' => [
                'id_persona' => $persona->id_persona,
                'nombres' => $persona->nombres,
                'apellidos' => $persona->apellidos,
                'genero' => $genero->nombre,
                'tipo_documento' => $tipo_documento->nombre,
                'numero_documento' => $persona->numero_documento
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
