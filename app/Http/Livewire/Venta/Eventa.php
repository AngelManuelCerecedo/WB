<?php

namespace App\Http\Livewire\Venta;

use App\Models\Venta;
use App\Models\Venta_Producto;
use Livewire\Component;

class Eventa extends Component
{
    public $Folio, $Empleado, $Sucursal, $FP, $Fecha, $ListaFT, $Total, $TArt, $ide, $venta;
    public function render()
    {
        $venta = Venta::where('id', $this->ide)->get();
        return view('livewire.Venta.Eventa', ['venta' => $venta]);
    }
    public function mount()
    {
        $venta = Venta::where('id', $this->ide)->first();
        $this->ListaFT = Venta_Producto::where('venta_id', $this->ide)->get();
        $this->Folio = $venta->Folio;
        $this->Empleado = $venta->empleado->Nombre;
        $this->Sucursal = $venta->sucursal->Nombre;
        $this->FP = $venta->forma->Nombre;
        $this->Fecha = $venta->created_at;
    }
    public function Cliente()
    {
        $facturama = new \Facturama\Client('CerecedoToledo', 'Zorrode9');
        $params = [
            'Id' => '',
            'Rfc' => 'CACX7605101P8',
            'Name' => 'XOCHILT CASAS CHAVEZ',
            'Email' => 'test@facturma.com',
            'FiscalRegime' => '601',
            'CfdiUse' => 'G03',
            'TaxZipCode' => '10740',
            'TaxResidence' => '10740',
            'NumRegIdTrib' => '131494-1055',
            'Address' => [
                'Street' => 'Calle de Pruebas',
                'ExteriorNumber' => '123',
                'InteriorNumber' => '456',
                'Neighborhood' => 'Colombia',
                'ZipCode' => '10740',
                'Locality' => 'Mexico',
                'Municipality' => 'Mexico Mun',
                'State' => 'Cd de Mexico',
                'Country' => 'MX',
            ],
        ];
        $result = $facturama->post('Client', $params);

        printf('<pre>%s<pre>', var_export($result, true));
    }
    public function FacturarPG()
    {
        $facturama = new \Facturama\Client('CerecedoToledo', 'Zorrode9');
        $params =
            [
                "Currency" => "MXN",
                "ExpeditionPlace" => "06800",
                "PaymentConditions" => "CREDITO A SIETE DIAS",
                "Folio" => "100",
                "CfdiType" => "I",
                "PaymentForm" => "03",
                "PaymentMethod" => "PUE",

                "Receiver" => [
                    "Rfc" => "XAXX010101000",
                    "Name" => "PúBLICO EN GENERAL",
                    "CfdiUse" => "S01",
                    "TaxZipCode" => "06800",
                    "FiscalRegime" => "616"
                ],
                "Items" => [
                    [
                        "ProductCode" => "10101504",
                        "IdentificationNumber" => "EDL",
                        "Description" => "Estudios de laboratorio",
                        "Unit" => "NO APLICA",
                        "UnitCode" => "MTS",
                        "UnitPrice" => 50,
                        "Quantity" => 2.0,
                        "Subtotal" => 100,
                        "TaxObject" => "02",
                        "Taxes" => [
                            [
                                "Total" => 16,
                                "Name" => "IVA",
                                "Base" => 100,
                                "Rate" => 0.16,
                                "IsRetention" => false
                            ]
                        ],
                        "Total" => 116

                    ]
                ]
            ];
        //CFDI 4.0 - Tipo Ingreso como Factura a Publico en General
        $result = $facturama->post('3/cfdis', $params);
        printf('<pre>%s<pre>', var_export($result, true));
    }
    public function Facturar(){
        $facturama = new \Facturama\Client('CerecedoToledo', 'Zorrode9');
        $params = [
            'Serie' => 'A',
            'Folio' => '100',
            'Date' => '2023-12-25',
            'PaymentForm' => '01',
            'PaymentConditions' => 'CREDITO A SIETE DIAS',
            'Currency' => 'MXN',
            'CfdiType' => 'I',
            'PaymentMethod' => 'PUE',
            'ExpeditionPlace' => '06800',
            'Receiver' =>
            [
                'Rfc'=> 'CACX7605101P8',
                'CfdiUse'=> 'G03',
                'Name'=> 'XOCHILT CASAS CHAVEZ',
                'FiscalRegime'=> '621',
                'TaxZipCode' => '10740',
                'Address'=>
                [
                    'Street' => 'Calle de Pruebas',
                    'ExteriorNumber' => '123',
                    'InteriorNumber' => '456',
                    'Neighborhood' => 'Colombia',
                    'ZipCode' => '10740',
                    'Locality' => 'Mexico',
                    'Municipality' => 'Mexico Mun',
                    'State' => 'Cd de Mexico',
                    'Country' => 'MX',
                ]
            ],
            'Items' => [
                   [
                        'ProductCode' => '10101504',
                        'IdentificationNumber' => 'EDL',
                        'Description' => 'Estudios de viabilidad',
                        'Unit' => 'NO APLICA',
                        'UnitCode' => 'MTS',
                        'UnitPrice' => 50.001000,
                        'Quantity' => 2.0,
                        'Subtotal' => 100.002000,
                        'TaxObject' => '02',
                        'Taxes' => [
                           [
                               'Total' => 16.000320,
                               'Name' => 'IVA',
                               'Base' => 100.002000,
                               'Rate' => 0.160000,
                               'IsRetention' => false,
                           ],
                        ],
                        'Total' => 116.00232,
                    ],
            ],
        ];
        
        $result = $facturama->post('3/cfdis', $params);
        
        printf('<pre>%s<pre>', var_export($result, true));
        
    }
}
