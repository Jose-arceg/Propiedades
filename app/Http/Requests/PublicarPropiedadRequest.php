<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PublicarPropiedadRequest extends FormRequest
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
            'venta' => ['required', 'integer'],
            'condicion' => ['required', Rule::in(['new', 'used', 'not_specified'])],
            'vendedor' => ['required', 'string'],
            'info' => ['required', 'string'],
            'telefono' => ['required', 'integer'],
            'email' => ['required', 'email'],
            'direccion' => ['required', 'string'],
            'Barrio' => ['required', 'string'],
            'latitude' => ['required', 'string'],
            'longitude' => ['required', 'string'],
            'piezas' => ['required', 'integer'],
            'baños' => ['required', 'integer'],
            'estacionamiento' => ['required', 'integer'],
            'dormitorios' => ['required', 'integer'],
            'construido' => ['required', 'integer'],
            'terreno' => ['required', 'integer'],
        ];
    }
    /*public function message()
{
return [
'nombre.required' => 'El nombre de la propiedad es requerido',
'venta.required' => 'El valor de venta es requerido',
'venta.integer' => 'El valor de la propiedad debe ser un numero entero',
'condicion.required' => 'La condicion de la propiedad es requerida',
'vendedor.required' => 'El nommbre del vendedor es requerido',
'info.required' => 'La informacion adicional de la propiedad es requerida',
'telefono.required' => 'El numero de telefono es requerido',
'telefono.integer' => 'El numero de telefono debe ser un numero',
'email.required' => 'El email es requerido',
'email.email' => 'El email debe tener un formato de email valido',
'direccion.required' => 'La direccion de la propiedad es requerida',
'Barrio.required' => 'El barrio de la propiedad es requerido',
'piezas.required' => 'La cantidad de piezas es requerida',
'piezas.integer' => 'La cantidad de las piezas debe ser un numero entero',
'baños.required' => 'La cantidad de baños es requerida',
'baños.integer' => 'La cantidad de los baños debe ser un numero entero',
'estacionamiento.required' => 'La cantidad de estacionamientos es requerida',
'estacionamiento.integer' => 'La cantidad de estacionamientos debe ser un numero entero',
'dormitorios.required' => 'La cantidad de dormitorios es requerida',
'dormitorios.integer' => 'La cantidad de dormitorios debe ser un numero entero',
'construido.required' => 'La cantidad de metros construios es requerida',
'construido.integer' => 'La cantidad de metros constuidos debe ser un numero entero',
'terreno.required' => 'La cantidad de metros de terreno es requerido',
'terreno.integer' => 'La cantidad de metros de terreno debe ser un numero entero',
];
}*/
}
