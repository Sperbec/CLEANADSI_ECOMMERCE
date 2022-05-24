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

            //Validación municipios

            'codigo_municipio'=>'numeric',
            'nombre_municipio'=>'alpha_spaces',
            'codigomunicipioeditar'=>'numeric',

            //Validacion de barrios

            'codigo_barrio'=>'numeric',
            'nombre_barrio'=>'alpha_spaces',
            'codigobarrioeditar'=>'numeric',
            'nombrebarrioeditar'=>'alpha_spaces',

            //Validacion de cuenta

            'nombres_cuenta'=>'alpha_spaces',
            'apellidos_cuenta'=>'alpha_spaces',
            'email_cuenta'=>'max:80|email',

           
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
            'correo_proveedor'=>'max:80|email',
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
             'codigo_pais.alpha_num'=>'El campo código país solo debe contener números o letras.',
             'nombre_pais.alpha_spaces'=>'El campo nombre país solo debe contener letras.',
             'pais.alpha_spaces'=>'El campo país solo debe contener letras',

             //validacion departamentos
             'codigo_departamento.numeric'=>'El campo código departamento solo debe contener números.',
             'nombre_departamento.alpha_spaces'=>'El campo nombre departamento solo debe contener letras.',

             //Validacion municipios:FALTA DEL EDITAR DE MUNICIPIOS PORQUE ES CSS

             'codigo_municipio.numeric'=>'El campo código municipio solo debe contener números.',
             'nombre_municipio.alpha_spaces'=>'El campo nombre municipio solo debe contener letras.',

             //Validacion de barrio

             'codigo_barrio.numeric'=>'El campo código barrio solo debe contener números.',
             'nombre_barrio.alpha_spaces'=>'El campo nombre barrio solo debe contener letras.',
             'codigobarrioeditar.numeric'=>'El campo código barrio solo debe contener números.',
            'nombrebarrioeditar'=>'El campo nombre barrio solo debe contener letras.',

            //Validación de cuenta

            'nombres_cuenta.alpha_spaces'=>'El campo nombres solo debe contener letras.',
            'apellidos_cuenta.alpha_spaces'=>'El campo apellidos solo debe contener letras.',
            'email_cuenta.email'=>'El campo correo principal debe contener el simbolo @ para tener acceso.',

             
        
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
            'correo_proveedor.email'=>'El campo correo debe contener el simbolo @ para tener acceso.',
            
            //validacion clientes
            'nombres_cliente.alpha_spaces'=>'El campo nombres solo debe contener letras.',
            'apellidos_cliente.alpha_spaces'=>'El campo apellidos solo debe contener letras.',
           
        ];

    }
}
