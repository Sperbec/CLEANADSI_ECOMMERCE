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
            'nombres'=>'max:7|alpha',
            'apellidos'=>'required|max:7|alpha',
            'numero'=>'numeric|max:6',
            'codigo c' => 'numeric',
            
        ];
    }
    public function messages()
    {
        return[
            'codigo c.numeric'=>'El campo codigo categoria solo debe contener numeros por favor intente nuevamente',

        ];

    }
}
