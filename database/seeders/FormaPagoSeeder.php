<?php

namespace Database\Seeders;

use App\Models\FormaPago;
use Illuminate\Database\Seeder;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaPago::create(['Clave' => '01', 'Nombre' => 'Efectivo']);
        FormaPago::create(['Clave' => '02', 'Nombre' => 'Cheque Nominativo']);
        FormaPago::create(['Clave' => '03', 'Nombre' => 'Transferencia Electrónica de Fondos (inc. SPEI)']);
        FormaPago::create(['Clave' => '04', 'Nombre' => 'Tarjeta de Crédito']);
        FormaPago::create(['Clave' => '28', 'Nombre' => 'Tarjeta de Débito']);
        FormaPago::create(['Clave' => '99', 'Nombre' => 'Por Definir']);
    }
}
