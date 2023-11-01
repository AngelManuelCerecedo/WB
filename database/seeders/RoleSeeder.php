<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Administrador']);
        $finanzas = Role::create(['name' => 'Finanzas']);
        $compras = Role::create(['name' => 'Compras']);
        $direccion = Role::create(['name' => 'Direccion']);
        $sistemas = Role::create(['name' => 'Sistemas']);
        $almacen = Role::create(['name' => 'Almacén']);
        $mostrador = Role::create(['name' => 'Mostador']);
        $gobierno = Role::create(['name' => 'Gobierno']);
        $encargado_sucursal = Role::create(['name' => 'Encargado de Sucursal']);

         //Dashboard
         $permission = Permission::create(['name' => 'dashboard', 'description' => 'Dashboard'])->syncRoles([$admin, $finanzas, $compras, $direccion, $sistemas, $almacen, $mostrador, $gobierno, $encargado_sucursal]);

         //Modulos
       
    }
}
