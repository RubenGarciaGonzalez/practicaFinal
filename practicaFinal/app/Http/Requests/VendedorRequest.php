<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedorRequest extends FormRequest
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
            'apellidos'=>['required','unique:vendedors'],
            'edad'=>['required'],
            'perfil'=>['image', 'nullable']
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=>'Debes introducir el nombre del vendedor!',
            'apellidos.required'=>'Debes introducir los apellidos del vendedor!',
            'apellidos.unique'=>'Estos apellidos ya están registrados en nuestra base de datos',
            'edad.required'=>'Debes introducir la edad del vendedor!',
            'perfil.image'=>'La imagen debe ser del tipo correspondiente!'
        ];
    }
}
