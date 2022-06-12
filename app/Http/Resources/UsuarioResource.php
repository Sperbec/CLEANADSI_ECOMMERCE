<?php

namespace App\Http\Resources;

use App\Models\Opciones_definidas;
use App\Models\Persona;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
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
        $id_opcion_tipo_documento = $persona->id_opcion_tipo_documento;
        $id_opcion_genero = $persona->id_opcion_genero;
        $tipo_documento = Opciones_definidas::all()->find($id_opcion_tipo_documento);
        $genero = Opciones_definidas::all()->find($id_opcion_genero);

        return [
            'id_usuario' => $this->id_usuario,
            'id_persona' => $this->id_persona,
            'email' => $this->email,
            'password' => $this->password,
            'email_verified_at' => $this->email_verified_at,
            'password_code' => $this->password_code,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
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
