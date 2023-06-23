<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Clave' => $this->faker->randomElement(['Cl1','Cl2','Cl3','Cl4','Cl5']),
            'Nombre' => $this->faker->randomElement(['Cat1','Cat2','Cat3','Cat4','Cat5']),
        ];
    }
}
