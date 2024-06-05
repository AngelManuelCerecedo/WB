<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre' => $this->faker->randomElement(['Empresa1','Empresa2','Empresa3','Empresa4','Empresa5']),
            'NCorto' => $this->faker->randomElement(['Emp1','Emp2','Emp3','Emp4','Emp5']),
            'RFC' => $this->faker->randomElement(['RFC1','RFC2','RFC3','RFC4','RFC5']),
            'Giro' => $this->faker->randomElement(['Giro1','Giro2','Giro3','Giro4','Giro5']),
        ];
    }
}
