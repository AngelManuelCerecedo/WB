<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create(['Zona' => 'Valles Centrales', 'Clave' => '01', 'Nombre' => 'Emilio Carranza', 'CP' => '68050', 'FolioTicket' => '0', 'FolioFactura' => '0', 'SerieF' => 'ECA', 'Telefono' => '9512057605', 'Direccion' => 'Colonia Reforma Oaxaca de Juarez']);
        Sucursal::create(['Zona' => 'Valles Centrales', 'Clave' => '02', 'Nombre' => 'Melchor Ocampo', 'CP' => '68000', 'FolioTicket' => '0', 'FolioFactura' => '0', 'SerieF' => 'MO', 'Telefono' => '9513902394', 'Direccion' => 'Colonia Centro Oaxaca de Juarez']);
        Sucursal::create(['Zona' => 'Valles Centrales', 'Clave' => '03', 'Nombre' => 'Fuerza Aérea', 'CP' => '68050', 'FolioTicket' => '0', 'FolioFactura' => '0', 'SerieF' => 'FA', 'Telefono' => '9512074356', 'Direccion' => 'Av. Fuerza Aérea Mexicana 302 Col. Reforma Oaxaca de Juarez']);
        Sucursal::create(['Zona' => 'Puebla, Puebla', 'Clave' => '04', 'Nombre' => 'Puebla Sur', 'CP' => '72000', 'FolioTicket' => '0', 'FolioFactura' => '0', 'SerieF' => 'PUE', 'Telefono' => '2229459013', 'Direccion' => 'Colonia Volcanes Puebla de Zaragoza']);
        Sucursal::create(['Zona' => 'Valles Centrales', 'Clave' => '05', 'Nombre' => 'E-Commerce', 'CP' => '68050', 'FolioTicket' => '0', 'FolioFactura' => '0', 'SerieF' => 'ECO', 'Telefono' => '9512057605', 'Direccion' => 'Colonia Centro Oaxaca de Juarez']);
        Sucursal::create(['Zona' => 'Valles Centrales', 'Clave' => '06', 'Nombre' => 'Gobierno', 'CP' => '68000', 'FolioTicket' => '0', 'FolioFactura' => '0', 'SerieF' => 'GOB', 'Telefono' => '9511722918', 'Direccion' => 'Colonia Reforma Oaxaca de Juarez']);
    }
}
