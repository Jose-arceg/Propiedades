<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Propiedad;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propiedad>
 */
class PropiedadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $estado = $this->faker->randomElement(['En arriendo', 'En venta', 'En espera']);
        $tipo = $this->faker->randomElement(['Casa', 'Departamento', 'Oficina']);
        $condicion = $this->faker->randomElement(['new', 'used', 'not_specified']);
        $construido = $this->faker->numberBetween(80, 300);
        $terreno = $this->faker->numberBetween(100, 400);
        while ($terreno <= $construido) {
            $terreno = $this->faker->numberBetween(100, 400);
        }
        return [
            'user_id' => User::factory(),
            'nombre' => $this->faker->name(),
            'condicion' => $condicion,
            'arriendo' => $this->faker->numberBetween(100000, 1000000),
            'venta' => $this->faker->numberBetween(10000000, 50000000),
            'estado' => $estado,
            'baños' => $this->faker->numberBetween(1, 5),
            'piezas' => $this->faker->numberBetween(1, 5),
            'estacionamiento' => $this->faker->numberBetween(1, 2),
            'tipo' => $tipo,
            'construido' => $construido,
            'terreno' => $terreno,
            
        ];
    }
}
