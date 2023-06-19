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
            'NomCom' => $this->faker->randomElement(['Empresa1','Empresa2','Empresa3','Empresa4','Empresa5']),
            'DomicilioF' => $this->faker->randomElement(['Dom1','Dom2','Dom3','Dom4','Dom5']),
            'Reg' => $this->faker->randomElement(['Reg1','Reg2','Reg3','Reg4','Reg5']),
            'CFDI' => $this->faker->randomElement(['CFDI1','CFDI2','CFDI3','CFDI4','CFDI5']),
            'Nombre' => $this->faker->randomElement(['Angel','Manuel','Raul','Kely','Alexis']),
            'ApP' => $this->faker->randomElement(['Cerecedo','Toledo','Martinez','Hernandez','Flores']),
            'ApM' => $this->faker->randomElement(['Acevedo','Gutierrez','Salinas','Peña','Solis']),
            'Cel' => $this->faker->randomElement(['95118835','95111235','951345635','951183454','95117456']),
            'Tel' => $this->faker->randomElement(['95118835','95111235','951345635','951183454','95117456']),
            'Correo' => $this->faker->randomElement(['1@gmail.com','2@gmail.com','3@gmail.com','4@gmail.com','5@gmail.com']),
            'CP' => $this->faker->randomElement(['23115','9111','635','83454','9511']),
            'Estado' => $this->faker->randomElement(['Oaxaca','Puebla','Veracruz','Guerrero','Chiapas']),
            'Mun' => $this->faker->randomElement(['Municipio1','Municipio2','Municipio3','Municipio4','Municipio5']),
            'Col' => $this->faker->randomElement(['Colonia1','Colonia2','Colonia3','Colonia4','Colonia5']),
            'Calle' => $this->faker->randomElement(['Calle1','Calle2','Calle3','Calle4','Calle5']),
            'TipoP' => $this->faker->randomElement(['Moral','Fisica','Sin Tipo']),
            'RFC' => $this->faker->randomElement(['wqrqrqr','asdsadasdad','zxczczxc','uyiyuiyuiyui','ghkghkghk']),
            'NumExt' => $this->faker->randomElement(['1','2','3','4','5']),
            'NumInt' => $this->faker->randomElement(['6','7','8','9','20']),
            'Credito' => $this->faker->randomElement(['11','12','13','14','15']),
            'Clasificacion' => $this->faker->randomElement(['Clasificacion1','Clasificacion2','Clasificacion3','Clasificacion4','Clasificacion5']),
            'Referencia' => $this->faker->randomElement(['Referencia1','Referencia2','Referencia3','Referencia4','Referencia5','Referencia6','Referencia7','Referencia8','Referencia9']),
            'NomRF' => $this->faker->randomElement(['NomRF1','NomRF2','NomRF3','NomRF4','NomRF5']),
            'ParenRF' => $this->faker->randomElement(['ParenRF1','ParenRF2','ParenRF3','ParenRF4','ParenRF5']),
            'TelRF' => $this->faker->randomElement(['TelRF1','TelRF2','TelRF3','TelRF4','TelRF5']),
            'DomRF' => $this->faker->randomElement(['DomRF1','DomRF2','DomRF3','DomRF4','DomRF5']),
        ];
    }
}
