<?php

namespace App\Http\Resources;

use App\Models\ModelHasRoles;
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
        $role = ModelHasRoles::where('model_id', $persona->id_persona)->first();

        return [
            'id_usuario' => $this->id_usuario,
            'id_persona' =>  $persona->id_persona,
            'email' => $this->email,
            'password' => $this->password,
            'email_verified_at' => $this->email_verified_at,
            'password_code' => $this->password_code,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'persona' => new PersonaResource(Persona::all()->find($persona->id_persona)),
            'role' => new ModelHasRoleResource($role),
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
