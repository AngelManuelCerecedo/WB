<!DOCTYPE html>
<meta charset="UTF-8" data-lt-installed="true">
<style type="text/css">
    @page {
        margin: .5cm .5cm;
    }

    .i1 {
        width: 140px;
        height: 140px;
        margin-left: 5px;
    }

    .t1 {
        font-family: 'Raleway', sans-serif;
        font-size: 25px;

        font-weight: bold;
    }

    .linea {
        margin-top: -50px;
        margin-bottom: 30px;
        color: #2EC0DF;
    }

    .ttt {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: left;
        height: 15px;
    }

    .tt1 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: center;
        background-color: white;
        height: 10px;
    }

    .tt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: center;
        background-color: rgb(223, 239, 247);
        height: 10px;
    }

    .tc1 {
        font-family: 'Raleway', sans-serif;
        font-size: 11px;
        text-align: left;
        font-style:
    }

    .tc2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        background-color: rgb(223, 239, 247);
        height: 10px;
    }

    .TTT {
        font-family: 'Raleway', sans-serif;
        font-size: 17px;
        color: white;
        background-color: rgb(0, 125, 192);
        text-align: center;
    }

    .headt td {
        height: 27px;
    }

    .leyenda {
        font-family: 'Raleway', sans-serif;
        font-size: 11px;
        text-align: left;
        color: gray
    }

    .a {
        outline: none;
        text-decoration: none;
        color: gray;
    }

    .firmas {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: center;
    }
</style>
<table style="width: 100%; border-collapse: collapse; margin-top: -6%">
    <tbody>
        <tr>
            <td style="width: 25%;">
                <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/Logo-Name.png" class="i1">
            </td>
            <td style="width: 20%;" class="t1"> </td>
            <td style="width: 15%;" class="t1">KARDEX</td>
        </tr>
    </tbody>
</table>
<div class="linea">
    <hr>
</div>

<body>
    <table style="width: 100%; margin-top: -1%">
        <tbody>
            <tr>
                <td class="tc1">
                    NOMBRE DEL PRODUCTO
                </td>
                <td class="tc2" colspan="5">
                    {{ $Prod->Nombre }}
                </td>
            </tr>
            <tr>
                <td class="tc1" style="width: 19%;">
                    CODIGO DE BARRAS
                </td>
                <td class="tc2">
                    {{ $Prod->CodigoB }}
                </td>
                <td class="tc1">
                    CLAVE DEL SAT
                </td>
                <td class="tc2">
                    {{ $Prod->Clv2 }}
                </td>
                <td class="tc1">
                    CLAVE DEL SECTOR SALUD
                </td>
                <td class="tc2">
                    {{ $Prod->Clv1 }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    CATEGORIA
                </td>
                <td class="tc2">
                    {{ $Prod->categoria->Nombre }}
                </td>
                <td class="tc1">
                    UNIDAD DE MEDIDA
                </td>
                <td class="tc2">
                    {{ $Prod->unidad->Nombre }}
                </td>
                <td class="tc1">
                    MARCA
                </td>
                <td class="tc2">
                    {{ $Prod->marca->Nombre }}
                </td>
            </tr>

        </tbody>
    </table>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="6">
                    <strong>RESUMEN DE COMPRAS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>FOLIO</strong></td>
                <td><strong>ALMACEN</strong></td>
                <td><strong>ESTADO DEL MOVIMIENTO</strong></td>
                <td><strong>FECHA DE REGISTRO</strong></td>
                <td><strong>PRECIO DE COMPRA</strong></td>
                <td><strong>CANTIDAD</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Compras as $compra)
                @if ($aux)
                    <tr class="tt1">
                        <td style="width: 10%;">
                            {{ $compra->Folio }}
                        </td>
                        <td style="width: 15%;">
                            {{ $compra->almacen->Nombre }}
                        </td>
                        <td style="width: 20%;">
                            {{ $compra->Estatus }}
                        </td>
                        <td style="width: 15%;">
                            {{ $compra->Fecha }}
                        </td>
                        <td style="width: 10%;">
                            {{ $compra->PrecioC }}
                        </td>
                        <td style="width: 10%;">
                            {{ $compra->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tt2">
                        <td style="width: 10%;">
                            {{ $compra->Folio }}
                        </td>
                        <td style="width: 15%;">
                            {{ $compra->almacen->Nombre }}
                        </td>
                        <td style="width: 15%;">
                            {{ $compra->Estatus }}
                        </td>
                        <td style="width: 15%;">
                            {{ $compra->Fecha }}
                        </td>
                        <td style="width: 10%;">
                            {{ $compra->PrecioC }}
                        </td>
                        <td style="width: 10%;">
                            {{ $compra->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = true }}></var>
                @endif
            @endforeach
        </tbody>
    </table>
    <var {{ $aux = true }}></var>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="6">
                    <strong>RESUMEN DE TRASPASOS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>FOLIO</strong></td>
                <td><strong>FECHA DE REGISTRO</strong></td>
                <td><strong>ESTADO DEL MOVIMIENTO</strong></td>
                <td><strong>ALMACEN ORIGEN</strong></td>
                <td><strong>ALMACEN DESTINO</strong></td>
                <td><strong>CANTIDAD</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Traspasos as $traspaso)
                @if ($aux)
                    <tr class="tt1">
                        <td style="width: 10%;">
                            {{ $traspaso->Folio }}
                        </td>
                        <td style="width: 15%;">
                            {{ $traspaso->created_at }}
                        </td>
                        <td style="width: 20%;">
                            {{ $traspaso->Estatus }}
                        </td>
                        <td style="width: 20%;">
                            @switch($traspaso->almacenO_id)
                                @case(1)
                                    Emilio Carranza
                                @break

                                @case(2)
                                    MelchorOcampo
                                @break

                                @case(3)
                                    Fuerza Aérea
                                @break

                                @case(4)
                                    Puebla Sur
                                @break

                                @case(5)
                                    E-Commerce
                                @break

                                @case(6)
                                    Gobierno
                                @break

                                @case(7)
                                    Almacen General
                                @break
                            @endswitch
                        </td>
                        <td style="width: 20%;">
                            @switch($traspaso->almacenD_id)
                                @case(1)
                                    Emilio Carranza
                                @break

                                @case(2)
                                    MelchorOcampo
                                @break

                                @case(3)
                                    Fuerza Aérea
                                @break

                                @case(4)
                                    Puebla Sur
                                @break

                                @case(5)
                                    E-Commerce
                                @break

                                @case(6)
                                    Gobierno
                                @break

                                @case(7)
                                    Almacen General
                                @break
                            @endswitch
                        </td>
                        <td style="width: 10%;">
                            {{ $traspaso->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tt2">
                        <td style="width: 10%;">
                            {{ $traspaso->Folio }}
                        </td>
                        <td style="width: 15%;">
                            {{ $traspaso->created_at }}
                        </td>
                        <td style="width: 20%;">
                            {{ $traspaso->Estatus }}
                        </td>
                        <td style="width: 20%;">
                            @switch($traspaso->almacenO_id)
                                @case(1)
                                    Emilio Carranza
                                @break

                                @case(2)
                                    MelchorOcampo
                                @break

                                @case(3)
                                    Fuerza Aérea
                                @break

                                @case(4)
                                    Puebla Sur
                                @break

                                @case(5)
                                    E-Commerce
                                @break

                                @case(6)
                                    Gobierno
                                @break

                                @case(7)
                                    Almacen General
                                @break
                            @endswitch
                        </td>
                        <td style="width: 20%;">
                            @switch($traspaso->almacenD_id)
                                @case(1)
                                    Emilio Carranza
                                @break

                                @case(2)
                                    MelchorOcampo
                                @break

                                @case(3)
                                    Fuerza Aérea
                                @break

                                @case(4)
                                    Puebla Sur
                                @break

                                @case(5)
                                    E-Commerce
                                @break

                                @case(6)
                                    Gobierno
                                @break

                                @case(7)
                                    Almacen General
                                @break
                            @endswitch
                        </td>
                        <td style="width: 10%;">
                            {{ $traspaso->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = true }}></var>
                @endif
            @endforeach
        </tbody>
    </table>
    <var {{ $aux = true }}></var>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="7">
                    <strong>RESUMEN DE VENTAS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>FOLIO</strong></td>
                <td><strong>FECHA DE VENTA</strong></td>
                <td><strong>VENDEDOR</strong></td>
                <td><strong>SUCURSAL</strong></td>
                <td><strong>PRECIO</strong></td>
                <td><strong>LOTE</strong></td>
                <td><strong>CANTIDAD</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Ventas as $venta)
                @if ($aux)
                    <tr class="tt1">
                        <td style="width: 10%;">
                            {{ $venta->venta->id }}
                        </td>
                        <td style="width: 20%;">
                            {{ $venta->venta->created_at }}
                        </td>
                        <td style="width: 20%;">
                            {{ $venta->venta->empleado->Nombre }}
                        </td>
                        <td style="width: 20%;">
                            {{ $venta->venta->sucursal->Nombre }}
                        </td>
                        <td style="width: 15%;">
                            ${{ $venta->Precio }}
                        </td>
                        <td style="width: 20%;">
                            {{ $venta->lote->Numero }}
                        </td>
                        <td style="width: 10%;">
                            {{ $venta->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tt2">
                        <td style="width: 10%;">
                            {{ $venta->venta->id }}
                        </td>
                        <td style="width: 20%;">
                            {{ $venta->venta->created_at }}
                        </td>
                        <td style="width: 20%;">
                            {{ $venta->venta->empleado->Nombre }}
                        </td>
                        <td style="width: 20%;">
                            {{ $venta->venta->sucursal->Nombre }}
                        </td>
                        <td style="width: 15%;">
                            ${{ $venta->Precio }}
                        </td>
                        <td style="width: 20%;">
                            {{ $venta->lote->Numero }}
                        </td>
                        <td style="width: 10%;">
                            {{ $venta->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = true }}></var>
                @endif
            @endforeach
        </tbody>
    </table>
    <var {{ $aux = true }}></var>
    <!--<table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="6">
                    <strong>RESUMEN DE LOTES</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>NUMERO</strong></td>
                <td><strong>SUCURSAL</strong></td>
                <td><strong>FOLIO COMPRA</strong></td>
                <td><strong>TOTAL COMPRADO</strong></td>
                <td><strong>TOTAL VENDIDO</strong></td>
                <td><strong>EXISTENCIAS</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Lotes as $lote)
                @if ($aux)
                    <tr class="tt1">
                            <td style="width: 10%;">
                            {{ $lote->Numero }}
                        </td>
                        <td style="width: 20%;">
                            {{ $lote->almacen->Nombre }}
                        </td>
                        <td style="width: 20%;">
                            @if ($lote->compra)
                                {{ $lote->compra->Folio }}
                            @endif
                        </td>
                        <td style="width: 20%;">
                            @if ($lote->compra)
                                {{ $lote->compra->Cantidad }}
                            @endif
                        </td>
                        <td style="width: 15%;">
                            @if ($lote->almacen_id == 7)
                            @else
                                 @foreach ($Ventas as $venta)
                                    {{$cantv += $venta->Cantidad}}
                                @endforeach
                            @endif
                        </td>
                        <td style="width: 20%;">
                            {{ $lote->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tt2">
                        <td style="width: 10%;">
                            {{ $lote->Numero }}
                        </td>
                        <td style="width: 20%;">
                            {{ $lote->almacen->Nombre }}
                        </td>
                        <td style="width: 20%;">
                            @if ($lote->compra)
                                {{ $lote->compra->Folio }}
                            @endif
                        </td>
                        <td style="width: 20%;">
                            @if ($lote->compra)
                                {{ $lote->compra->Cantidad }}
                            @endif
                        </td>
                        <td style="width: 15%;">
                            @if ($lote->almacen_id == 7)
                            @else
                                 @foreach ($Ventas as $venta)
                                    {{$cantv += $venta->Cantidad}}
                                @endforeach
                            @endif
                        </td>
                        <td style="width: 20%;">
                            {{ $lote->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = true }}></var>
                @endif
            @endforeach
        </tbody>
    </table>-->
</body>
<footer style="margin-top: 10%;">
    <div class="linea">
        <hr>
    </div>
    <p style="margin-top: -3.5%;">
        <a class="a" href="https://www.doctorshome.com.mx"> © www.doctorshome.com.mx </a>
    </p>
    <p class="leyenda" style="margin-top: -6%; text-align: right;">
        Fecha de Impresión: {{ date('d-m-Y') }}
    </p>
</footer>
