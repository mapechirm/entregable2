<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class CreateVideogameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows("create-videogame");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => 'required|min:3',
            'precio' => 'required|numeric',
            'imagen' => 'required|mimes:jpeg,jpg,png',
        ];
    }

    public function messages () {
        return [
            "name.required" => "Por favor ingrese el nombre del videojuego",
            "name.min" => "Por favor agregue un nombre válido con minimo 3 letras",
            "precio.required" => "Por favor ingrese el precio de adquisición del videojuego",
            "precio.numeric" => "Por favor añada un valor numérico en este campo",
            "imagen.required" => "Por favor agregue una imagen del videojuego",
            "imagen.mimes" => "Ingrese una imagen con un formato valido: jpeg, jpg o png"
        ];
    }
}
