<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentasRequest extends FormRequest
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
            'cantidad'=>['required'],
            'fecha_venta'=>['required']
        ];
    }

    public function messages(){
        return [
            'cantidad.required'=>'El campo cantidad es obligatorio!',
            'fecha_venta.required'=>'El campo de la fecha de la venta es obligatorio!'
        ];
    }
}
