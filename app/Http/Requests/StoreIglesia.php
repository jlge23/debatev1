<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIglesia extends FormRequest
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
            'nombre' => 'required|max:255|regex:/(^([a-zA-zÑñÁÉÍÓÚáéíóú.\' ]+)$)/u',
            'descripcion' => 'required|max:512|regex:/(^([0-9a-zA-zÑñÁÉÍÓÚáéíóú.\' ]+)?$)/u'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'Nombre de la Iglesia',
            'descripcion' => 'Descripción de la iglesia'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Nombre de Iglesia Requerido',
            'nombre.max' => 'Cantidad máxima de caracteres permitidos (512)',
            'nombre.regex' => 'Sólo se permiten caracteres en Mayusculas, minusculas, números y cactacteres .\' y Espacios',
            'descripcion.required' => 'Descripción de la Iglesia Requerido',
            'descripcion.max' => 'Cantidad máxima de caracteres permitidos (512)',
            'descripcion.regex' => 'Sólo se permiten caracteres en Mayúsculas, minúsculas, números y cactacteres .\' y Espacios'
        ];
    }
}
