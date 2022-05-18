<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //validacion departamento
            'codigo_departamento'=>'numeric|max:3',
            'nombre_departamento'=>'alpha_spaces|max:4',


            'codigo_categoria' => 'numeric',
            'nombre_categoria'=>'alpha_spaces|max:80',

            'nombres_proveedor'=>'alpha|max:50',
            'apellidos_proveedor'=>'alpha|max:50',
            'numero_documento'=> 'numeric',
            'nombre_juridico'=>'alpha|max:50',
            'nit'=>'numeric',
            'direccion_proveedor'=>'max:50',
            'correo_proveedor'=>'max:80',
            'contacto_proveedor'=>'alpha|max:50',
            'telefono_proveedor'=> 'numeric',

           
        ];
    }
    public function messages()
    {
        return[
            


            'codigo_categoria.numeric'=>'El campo código categoría solo debe contener números.',
            'codigo_categoria.digits'=>'El campo código categoría solo debe contener 15 dígitos.',
            'nombre_categoria.alpha_spaces'=>'El campo nombre categoría solo debe contener letras.',
            'nombre_categoria.max'=>'El campo nombre categoría solo debe contener 80 caracteres.',

            'nombres_proveedor.alpha'=>'El campo nombres solo debe contener letras.',
            
            //validacion departamento
            'codigo_departamento.numeric'=>'El campo codigo departamento solo puede contener numeros. ',
            'nombre_departamento.alpha_spaces'=>'El campo nombre deparatamento solo puede contener letras.',
           
           
        ];

    }
}
