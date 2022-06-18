<?php

namespace App\Http\Resources;

use App\Models\Opciones_definidas;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
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
            'id_persona' => (int) $this->id_persona,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'genero' => Opciones_definidas::all()->find($this->id_opcion_genero),
            'tipo_documento' => Opciones_definidas::all()->find($this->id_opcion_tipo_documento),
            'numero_documento' => $this->numero_documento,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
