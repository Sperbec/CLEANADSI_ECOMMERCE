<?php

namespace App\Http\Resources;

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
            'id_persona' => $this->id_persona,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'id_opcion_genero' => $this->id_opcion_genero,
            'id_opcion_tipo_documento' => $this->id_opcion_tipo_documento,
            'numero_documento' => $this->numero_documento,
            'natalicio' => $this->natalicio,
            'habilitado' => $this->habilitado,
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
