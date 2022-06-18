<?php

namespace App\Http\Resources;

use App\Models\Orden_compra;
use App\Models\Persona;
use App\Models\Proveedor;
use Illuminate\Http\Resources\Json\JsonResource;

class ProveedorResource extends JsonResource
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

        return [
            'id_proveedor' => $this->id_proveedor,
            'persona' => new PersonaResource(Persona::all()->find($proveedor->id_persona)),
            'nombre' => $this->nombre,
        ];
    }
}
