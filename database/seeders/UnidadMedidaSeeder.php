<?php

namespace Database\Seeders;

use App\Models\UnidadMedida;
use Illuminate\Database\Seeder;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadMedida::create(['Clave' => '00', 'Nombre' => 'Sin Unidad de Medida']);
        UnidadMedida::create(['Clave' => '01', 'Nombre' => 'AMPOLLETA']);
        UnidadMedida::create(['Clave' => '02', 'Nombre' => 'BIDON']);
        UnidadMedida::create(['Clave' => '03', 'Nombre' => 'BOLSA']);
        UnidadMedida::create(['Clave' => '04', 'Nombre' => 'CAJA']);
        UnidadMedida::create(['Clave' => '05', 'Nombre' => 'ENVASE']);
        UnidadMedida::create(['Clave' => '06', 'Nombre' => 'EQUIPO']);
        UnidadMedida::create(['Clave' => '07', 'Nombre' => 'FRASCO']);
        UnidadMedida::create(['Clave' => '08', 'Nombre' => 'GALON']);
        UnidadMedida::create(['Clave' => '09', 'Nombre' => 'GOTERO']);
        UnidadMedida::create(['Clave' => '10', 'Nombre' => 'KIT']);
        UnidadMedida::create(['Clave' => '11', 'Nombre' => 'PAQUETE']);
        UnidadMedida::create(['Clave' => '12', 'Nombre' => 'PAR']);
        UnidadMedida::create(['Clave' => '13', 'Nombre' => 'PIEZA']);
        UnidadMedida::create(['Clave' => '14', 'Nombre' => 'ROLLO']);
        UnidadMedida::create(['Clave' => '15', 'Nombre' => 'SET']);
        UnidadMedida::create(['Clave' => '16', 'Nombre' => 'SOBRE']);
        UnidadMedida::create(['Clave' => '17', 'Nombre' => 'TUBO']);
        UnidadMedida::create(['Clave' => '42', 'Nombre' => 'Botellas de alimentación o accesorios']);
    }
}
