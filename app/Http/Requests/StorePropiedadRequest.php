<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePropiedadRequest extends FormRequest
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
            'nombre' => ['required', 'string'],
            'condicion' => ['required', 'string'],
            'arriendo' => ['required', 'integer'],
            'venta' => ['required', 'integer'],
            'baños' => ['required', 'integer'],
            'piezas' => ['required', 'integer'],
            'estacionamiento' => ['required', 'integer'],
            'tipo' => ['required', Rule::in(['Oficina', 'Departamento', 'Casa'])],
            'construido' => ['required', 'integer'],
            'terreno' => ['required', 'integer'],
            'user_id' => ['required', Rule::in([auth()->id()])],
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la propiedad es requerido',
            'arriendo.required' => 'El valor de arriendo es requerido',
            'arriendo.integer' => 'El valor de arriendo debe ser un numero entero',
            'venta.required' => 'El valor de venta es requerido',
            'venta.integer' => 'El valor de venta debe ser un numero entero',
            'baños.required' => 'La cantidad de baños es requerida',
            'baños.integer' => 'El valor de la cantidad de baños debe ser un numero entero',
            'piezas.required' => 'La cantidad de piezas es requerida',
            'piezas.integer' => 'El valor de la cantidad de piezas debe ser un numero entero',
            'estacionamiento.required' => 'La cantidad de estacionamiento es requerida',
            'estacionamiento.integer' => 'El valor de la cantidad de estacionamiento debe ser un numero entero',
            'tipo.required' => 'El tipo de la propiedad es requerido',
            'tipo.in' => 'El tipo de propiedad solo puede ser "Oficina","Departamento" o "Casa"',
            'construido.required' => 'La cantidad de de metros construidos es requerida',
            'construido.integer' => 'La cantidad de metros construidos debe ser un numero entero',
            'terreno.required' => 'La cantidad de de metros de terreno es requerida',
            'terreno.integer' => 'La cantidad de metros de terreno debe ser un numero entero',
        ];
    }
}
