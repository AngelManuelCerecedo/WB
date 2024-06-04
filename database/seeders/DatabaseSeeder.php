<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\FormaPago;
use App\Models\MetodoPago;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cliente::factory(100)->create();
        Empresa::factory(100)->create();
        FormaPago::factory(10)->create();
        MetodoPago::factory(10)->create();
    }
}
