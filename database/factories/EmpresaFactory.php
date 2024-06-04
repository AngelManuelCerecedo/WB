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
            'B1' => $this->faker->randomElement(['B11','B12','B13','B14','B15']),
            'B2' => $this->faker->randomElement(['B11','B12','B13','B14','B15']),
            'B3' => $this->faker->randomElement(['B11','B12','B13','B14','B15']),
            'B4' => $this->faker->randomElement(['B11','B12','B13','B14','B15']),
            'B5' => $this->faker->randomElement(['B11','B12','B13','B14','B15']),
            'C1' => $this->faker->randomElement(['C11','C12','C13','C14','C15']),
            'C2' => $this->faker->randomElement(['C11','C12','C13','C14','C15']),
            'C3' => $this->faker->randomElement(['C11','C12','C13','C14','C15']),
            'C4' => $this->faker->randomElement(['C11','C12','C13','C14','C15']),
            'C5' => $this->faker->randomElement(['C11','C12','C13','C14','C15']),
            
        ];
    }
}
