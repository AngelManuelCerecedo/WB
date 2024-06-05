<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ALIAS' => $this->faker->randomElement(['ALIAS','ALIAS','ALIAS','ALIAS','ALIAS']),
            'NOMBRE' => $this->faker->randomElement(['NOMBRE','NOMBRE','NOMBRE','NOMBRE','NOMBRE']),
            'RS' => $this->faker->randomElement(['601','603','605','606','608']),
            'RFC' => $this->faker->randomElement(['G03','G01','P01','D01','D02']),
            'CFDI' => $this->faker->randomElement(['Sin Tipo','Mostrador','Gobierno','Distribucion']),
            'REG' => $this->faker->randomElement(['REG','REG','REG','REG','REG']),
            'DOMF' => $this->faker->randomElement(['DOMF','DOMF','DOMF','DOMF','DOMF']),
            'CP' => $this->faker->randomElement(['CP','CP','CP','CP','CP']),
            'COMTOT' => $this->faker->randomElement(['10','5']),
            'COMFINTECH' => $this->faker->randomElement(['35','35']),
            'COMEXT1' => $this->faker->randomElement(['1','2','3','4','5']),
            'COMEXT2' => $this->faker->randomElement(['1','2','3','4','5']),
            'COMEXT3' => $this->faker->randomElement(['1','2','3','4','5']),
            'COMEXT4' => $this->faker->randomElement(['1','2','3','4','5']),
            'COMEXT5' => $this->faker->randomElement(['1','2','3','4','5']),
            'COMISIONISTA1' => $this->faker->randomElement(['ANGEL','MANUEL','CERECEDO','TOLEDO','HORTENSIA']),
            'COMISIONISTA2' => $this->faker->randomElement(['ANGEL','MANUEL','CERECEDO TOLEDO','HORTENSIA']),
            'COMISIONISTA3' => $this->faker->randomElement(['ANGEL','MANUEL','CERECEDO','TOLEDO','HORTENSIA']),
            'COMISIONISTA4' => $this->faker->randomElement(['ANGEL','MANUEL','CERECEDO','TOLEDO','HORTENSIA']),
            'COMISIONISTA5' => $this->faker->randomElement(['ANGEL','MANUEL','CERECEDO','TOLEDO','HORTENSIA']),
        ];
    }
}
