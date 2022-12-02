<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePuntaje extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:255|regex:/(^([0-9a-zA-zÑñÁÉÍÓÚáéíóú.\' ]+)$)/u',
            'valor' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'Nombre del puntaje',
            'valor' => 'Ponderacion'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Nombre del puntaje Requerido',
            'nombre.max' => 'Cantidad máxima de caracteres permitidos (512)',
            'nombre.regex' => 'Sólo se permiten caracteres en Mayusculas, minusculas, números y cactacteres .\' y Espacios',
            'valor.required' => 'Descripción del puntaje Requerido'
        ];
    }
}
