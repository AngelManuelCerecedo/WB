<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormaPagoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Clave' => $this->faker->randomElement(['Clv1', 'Clv2']),
            'Nombre' => $this->faker->randomElement(['PPD', 'PUE']),
        ];
    }
}
