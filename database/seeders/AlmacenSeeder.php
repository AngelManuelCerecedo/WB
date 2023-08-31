<?php

namespace Database\Seeders;

use App\Models\Almacen;
use Illuminate\Database\Seeder;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Almacen::create(['Nombre' => 'Emilio Carranza', 'sucursal_id' => '1']);
        Almacen::create(['Nombre' => 'Melchor Ocampo', 'sucursal_id' => '2']);
        Almacen::create(['Nombre' => 'Fuerza Aérea', 'sucursal_id' => '3']);
        Almacen::create(['Nombre' => 'Puebla Sur', 'sucursal_id' => '4']);
        Almacen::create(['Nombre' => 'E-Commerce', 'sucursal_id' => '5']);
        Almacen::create(['Nombre' => 'Gobierno', 'sucursal_id' => '6']);
        Almacen::create(['Nombre' => 'Almacen General']);
    }
}
