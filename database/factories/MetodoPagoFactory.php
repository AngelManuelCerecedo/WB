<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MetodoPagoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Clave' => $this->faker->randomElement(['Clv1', 'Clv2', 'Clv3', 'Clv4', 'Clv5']),
            'Nombre' => $this->faker->randomElement(['E', 'TD', 'TC', 'TRF', 'DEPO']),
        ];
    }
}
