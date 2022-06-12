<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
{
    /**
     * @var mixed
     */
    private $id_persona;
    /**
     * @var mixed
     */
    private $nombres;
    /**
     * @var mixed
     */
    private $apellidos;

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
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
