<?php

namespace Database\Seeders;

use App\Models\Almacen;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Marca;
use App\Models\Proveedor;
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
        $this->call(RoleSeeder::class);
        Proveedor::factory(100)->create();
        Cliente::factory(100)->create();
        Categoria::factory(10)->create();
        Marca::factory(10)->create();
        $this->call(FormaPagoSeeder::class);
        $this->call(MetodoPagoSeeder::class);
    }
}
