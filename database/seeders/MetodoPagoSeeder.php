<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use Illuminate\Database\Seeder;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetodoPago::create(['Clave' => 'PUE', 'Nombre' => 'Pago en una sola exhibición']);
        MetodoPago::create(['Clave' => 'PPD', 'Nombre' => 'Pago en parcialidades o diferido']);
    }
}
