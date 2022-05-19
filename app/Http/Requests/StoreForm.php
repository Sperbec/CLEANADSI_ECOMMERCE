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
            //Validación de paises
            'codigo_pais'=>'alpha_num',
            'nombre_pais'=>'alpha_spaces|max:80',

            //Validación departamentos
            'codigo_departamento'=>'numeric',
            'nombre_departamento'=>'alpha_spaces|max:80',

            //validación de categorías
            'codigo_categoria' => 'numeric',
            'nombre_categoria'=>'alpha_spaces|max:80',

            //validacion proveedor
            'nombres_proveedor'=>'alpha_spaces|max:50',
            'apellidos_proveedor'=>'alpha_spaces|max:50',
            'numero_documento'=> 'numeric',
            'nombre_juridico'=>'alpha_spaces|max:50',
            'nit'=>'numeric',
            'direccion_proveedor'=>'max:50',
            'correo_proveedor'=>'max:80',
            'contacto_proveedor'=>'alpha_spaces|max:50',
            'telefono_proveedor'=> 'numeric',

            //validacion cliente
            'nombres_cliente'=>'alpha_spaces|max:80',
            'apellidos_cliente'=>'alpha_spaces|max:80',
           

           
        ];
    }
    public function messages()
    {
        return[

             //Validación paises
             'codigo_pais.alpha_num'=>'El campo codigo país solo debe contener números o letras.',
             'nombre_pais.alpha_spaces'=>'El campo nombre país solo debe contener letras.',
             'pais.alpha_spaces'=>'El campo país solo debe contener letras',

             //validacion departamentos
             'codigo_departamento.numeric'=>'El campo código departamento solo debe contener numeros.',
             'nombre_departamento.alpha_spaces'=>'El campo nombre departamento solo debe contener letras.',

             //validacion para categoria
            'codigo_categoria.numeric'=>'El campo código categoría solo debe contener números.',
            'codigo_categoria.digits'=>'El campo código categoría solo debe contener 15 dígitos.',
            'nombre_categoria.alpha_spaces'=>'El campo nombre categoría solo debe contener letras.',
            'nombre_categoria.max'=>'El campo nombre categoría solo debe contener 80 caracteres.',

            //validacion para proveedor
            'nombres_proveedor.alpha_spaces'=>'El campo nombres solo debe contener letras.',
            'apellidos_proveedor.alpha_spaces'=>'El campo apellidos solo debe contener letras.',
            'nombre_juridico.alpha_spaces'=>'El campo nombre solo debe contener letras.',
            'contacto_proveedor.alpha_spaces'=>'el campo contacto solo debe contener letras',
            'nombres_proveedor.alpha'=>'El campo nombres solo debe contener letras.',
            
            //validacion clientes
            'nombres_cliente.alpha_spaces'=>'El campo nombres solo debe contener letras.',
            'apellidos_cliente.alpha_spaces'=>'El campo apellidos solo debe contener letras.',
           
        ];

    }
}
