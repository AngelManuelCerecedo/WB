<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Clave' => $this->faker->randomElement(['MR1','MR2','MR3','MR4','MR5']),
            'Nombre' => $this->faker->randomElement(['Marca1','Marca2','Marca3','Marca4','Marca5']),
        ];
    }
}
