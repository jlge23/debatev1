<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvento extends FormRequest
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
            'descripcion' => 'required|max:255|regex:/(^([0-9a-zA-zÑñÁÉÍÓÚáéíóú.\' ]+)$)/u',
            'fecha' => 'required|date_format:Y-m-d|after:tomorrow',
            'iglesia_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'Nombre del evento',
            'descripcion' => 'Descripcion del evento',
            'fecha' => 'Fecha y hora de inicio del evento',
            'iglesia_id' => 'Iglesia o lugar del evento'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Nombre del Equipo Requerido',
            'nombre.max' => 'Cantidad máxima de caracteres permitidos (512)',
            'nombre.regex' => 'Sólo se permiten caracteres en Mayusculas, minusculas, números y cactacteres .\' y Espacios',
            'descripcion.required' => 'Nombre del Equipo Requerido',
            'descripcion.max' => 'Cantidad máxima de caracteres permitidos (512)',
            'descripcion.regex' => 'Sólo se permiten caracteres en Mayusculas, minusculas, números y cactacteres .\' y Espacios',
            'fecha.required' => 'Fecha de inicio del evento requerida',
            'fecha.date_format' => 'Tipée la fecha en el formato Año-Mes-dia. Ej: 2022-01-01',
            'fecha.after' => 'Elija una fecha a partir del dia de hoy en adelante',
            'iglesia_id.required' => 'Selecciones la Iglesia o lugar de procedencia'
        ];
    }
}
