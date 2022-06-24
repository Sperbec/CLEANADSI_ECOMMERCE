<?php

namespace App\Http\Resources;

use App\Models\ModelHasRoles;
use Illuminate\Http\Resources\Json\JsonResource;

class ModelHasRoleResource extends JsonResource
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
            'role_id' => (int) $this->role_id,
            'model_id' => (int) $this->model_id,
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Charset', 'utf-8');
        $response->header('Content-Type', 'application/json');
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
