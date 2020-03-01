<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
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
            'nombre'=>['required'],
            'precio'=>['required'],
            'stock'=>['required'],
            'detalles'=>['required'],
            'categoria_id'=>['nullable'],
            'foto'=>['nullable', 'image']
        ];
    }


    public function messages()
    {
        return [
            'nombre.required'=>'El campo de nombre es obligatorio!!',
            'precio.required'=>'El campo del precio es obligatorio!!',
            'stock.required'=>'El campo del stock es obligatorio!!',
            'foto.image'=>'El archivo subido debe ser de tipo imagen!'
        ];
    }


}
