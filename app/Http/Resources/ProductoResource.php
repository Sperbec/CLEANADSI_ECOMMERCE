<?php

namespace App\Http\Resources;

use App\Http\Controllers\ImageController;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $producto = Producto::all()->find($this->id_producto);
        $id_categoria = $producto->id_categoria;
        $categoria = Categoria::all()->find($id_categoria);

        // image controller instance
        // $imageController = new ImageController();
        // $img = $imageController->getImgForJson($producto->imagen);

        return [
            'id_producto' => $this->id_producto,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'sku' => $this->sku,
            'precio' => number_format($producto->precio, 2, ',', '.'),
            'cantidad_existencia' => (double) $producto->cantidad_existencia,
            'categoria' => $categoria->nombre,
            'imagen' => $this->imagen,
        ];
    }
}
