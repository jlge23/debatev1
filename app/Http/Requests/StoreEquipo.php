<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipo extends FormRequest
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
            'nombre' => 'required|max:255|regex:/(^([a-zA-zÑñÁÉÍÓÚáéíóú.\' ]+)$)/u',
            'iglesia_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'Nombre del Equipo',
            'iglesia_id' => 'Iglesia o lugar de procedencia'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Nombre del Equipo Requerido',
            'nombre.max' => 'Cantidad máxima de caracteres permitidos (512)',
            'nombre.regex' => 'Sólo se permiten caracteres en Mayusculas, minusculas, números y cactacteres .\' y Espacios',
            'iglesia_id.required' => 'Selecciones la Iglesia o lugar de procedencia'
        ];
    }
}
