<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersona extends FormRequest
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
        //para crear esta validacion ponemos antes en el terminal php artisan make:request y el metodo
        //al cual validaremos en este caso store y se crea la carpeta REQUEST
        return [
            'nombres'=>'required|max:3',
            'apellidos'=>'required|max:2',
            'numero'=>'required|max:3',
             
    
            
        ];
    }
    
}
