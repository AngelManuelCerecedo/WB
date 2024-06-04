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
            'COMEXT1' => $this->faker->randomElement(['1@gmail.com','2@gmail.com','3@gmail.com','4@gmail.com','5@gmail.com']),
            'COMEXT2' => $this->faker->randomElement(['23115','9111','635','83454','9511']),
            'COMEXT3' => $this->faker->randomElement(['Oaxaca','Puebla','Veracruz','Guerrero','Chiapas']),
            'COMEXT4' => $this->faker->randomElement(['Municipio1','Municipio2','Municipio3','Municipio4','Municipio5']),
            'COMEXT5' => $this->faker->randomElement(['Colonia1','Colonia2','Colonia3','Colonia4','Colonia5']),
            'COMISIONISTA1' => $this->faker->randomElement(['Calle1','Calle2','Calle3','Calle4','Calle5']),
            'COMISIONISTA2' => $this->faker->randomElement(['Moral','Fisica','Sin Tipo']),
            'COMISIONISTA3' => $this->faker->randomElement(['wqrqrqr','asdsadasdad','zxczczxc','uyiyuiyuiyui','ghkghkghk']),
            'COMISIONISTA4' => $this->faker->randomElement(['1','2','3','4','5']),
            'COMISIONISTA5' => $this->faker->randomElement(['6','7','8','9','20']),
        ];
    }
}
