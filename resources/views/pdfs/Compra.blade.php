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
        text-align: left;
        background-color: white;
        height: 10px;
    }

    .tt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: left;
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
            <td style="width: 30%;" class="t1">COMPRA DE MATERIAL</td>
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
                    FOLIO DE LA COMPRA
                </td>
                <td class="tc2">
                    {{ $Com->Folio }}
                </td>
                <td class="tc1">
                    FECHA DE LA COMPRA
                </td>
                <td class="tc2">
                    {{ $Com->Fecha }}
                </td>
                <td class="tc1">
                    ESTADO DE LA COMPRA
                </td>
                <td class="tc2">
                    {{ $Com->Estatus }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    SUCURSAL DESTINO
                </td>
                <td colspan="2" class="tc2">
                    {{ $Com->almacen->Nombre }}
                </td>
                <td class="tc1">
                    PROVEEDOR
                </td>
                <td colspan="2" class="tc2">
                    {{ $Com->proveedor->RFC }} - {{ $Com->proveedor->Nombre }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    TIPO DE LA COMPRA
                </td>
                <td class="tc2">
                    {{ $Com->TipoC }}
                </td>
                <td class="tc1">
                    COSTO ENVIO
                </td>
                <td class="tc2">
                    ${{ number_format($Envio, 5) }}
                </td>
                <td class="tc1">
                    IMPORTE DE LA COMPRA
                </td>
                <td class="tc2">
                    ${{ number_format($Com->ImporteTot, 5) }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    SUB TOTAL
                </td>
                <td class="tc2">
                    ${{ number_format($Com->ImporteC, 5) }}
                </td>
                <td class="tc1">
                    TOTAL DE I.V.A.
                </td>
                <td class="tc2">
                    ${{ number_format($IVA, 5) }}
                </td>
                <td class="tc1">
                    DESCUENTO
                </td>
                <td class="tc2">
                    ${{ number_format($Com->Desc, 5) }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    FECHA DEL CREDITO
                </td>
                <td class="tc2">
                    {{ $Com->FechaC }}
                </td>
                <td class="tc1">
                    FECHA LIMITE DE PAGO
                </td>
                <td class="tc2">
                    {{ $Com->FechaL }}
                </td>
                <td class="tc1">
                    IMPORTE POR PAGAR
                </td>
                <td class="tc2">
                    ${{ number_format($Com->ImporteporPagar, 5) }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    IMPORTE PAGADO
                </td>
                <td class="tc2">
                    {{ $Com->ImportePag }}
                </td>
                <td class="tc1">
                    OBSERVACIONES
                </td>
                <td colspan="3" class="tc2">
                    {{ $Com->Obs }}
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt" style="border-top:1px solid #000000;">
            <tr style="border-bottom:1px solid #000000;">
                <td><strong>CLAVE</strong></td>
                <td><strong>NOMBRE</strong></td>
                <td><strong>UNIDAD DE MEDIDA</strong></td>
                <td><strong>PRECIO SIN IVA</strong></td>
                <td><strong>PRECIO CON IVA</strong></td>
                <td><strong>CANTIDAD</strong></td>
                <td><strong>DESCUENTO</strong></td>
                <td><strong>IMPORTE</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Productos as $producto)
                @if ($aux)
                    <tr class="tt1">
                        <td style="width: 10%;">
                            {{ $producto->producto->CodigoB }}
                        </td>
                        <td style="width: 35%;">
                            {{ $producto->producto->Nombre }}
                        </td>
                        <td style="text-align: center;">
                            {{ $producto->producto->unidad->Nombre }}
                        </td>
                        <td style="width: 10%; text-align: center;">
                            ${{ $producto->PrecioC }}
                        </td>
                        <td style="width: 15%;">
                            ${{ $producto->PrecioC + ($producto->PrecioC * $producto->Producto->IVA * 0.01) }}
                        </td>
                        <td style="width: 10%; text-align: center;">
                            {{ $producto->Cantidad }}
                        </td>
                        <td style="width: 20%;">
                            ${{ $producto->Desc }}
                        </td>
                        <td style="width: 10%;">
                            ${{ number_format($producto->PrecioC * $producto->Cantidad, 5) }}
                        </td>
                    </tr>
                    @foreach ($Lotes as $lote)
                        @if($lote->producto_id == $producto->producto->id)
                            <tr class="tt1">
                            <td colspan="3" style="width: 10%; text-align: center;">
                                <strong>NUERO</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ $lote->Numero }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>CADUCIDAD</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$lote->Fecha}}
                            </td>
                            <td colspan="2" style="width: 15%; text-align: center;">
                                <strong>CANTIDAD</strong>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <strong>{{ $lote->Cantidad }}</strong>
                            </td>
                            <td colspan="2" style="width: 20%;">
                            </td>
                            </tr>
                        @endif
                    @endforeach
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tt2">
                        <td style="width: 10%;">
                            {{ $producto->producto->CodigoB }}
                        </td>
                        <td style="width: 25%;">
                            {{ $producto->producto->Nombre }}
                        </td>
                        <td style="text-align: center;">
                            {{ $producto->producto->unidad->Nombre }}
                        </td>
                        <td style="text-align: center;">
                            ${{ $producto->PrecioC }}
                        </td>
                        <td style="width: 15%;">
                            ${{ $producto->PrecioC + $producto->PrecioC * $producto->Producto->IVA * 0.01 }}
                        </td>
                        <td style= "text-align: center;">
                            {{ $producto->Cantidad }}
                        </td>
                        <td>
                            ${{ $producto->Desc }}
                        </td>
                        <td>
                            ${{ number_format($producto->PrecioC * $producto->Cantidad, 5) }}
                        </td>
                    </tr>
                    @foreach ($Lotes as $lote)
                        @if($lote->producto_id == $producto->producto->id)
                            <tr class="tt2">
                            <td colspan="3" style="width: 10%; text-align: center;">
                                <strong>NUMERO</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ $lote->Numero }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>CADUCIDAD</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$lote->Fecha}}
                            </td>
                            <td colspan="2" style="width: 15%; text-align: center;">
                                <strong>CANTIDAD</strong>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <strong>{{ $lote->Cantidad }}</strong>
                            </td>
                            <td colspan="2" style="width: 20%;">
                            </td>
                            </tr>
                        @endif
                    @endforeach
                    <var {{ $aux = true }}></var>
                @endif
            @endforeach
            <tr class="tt1">
                <td style="width: 10%;"></td>
                <td style="width: 30%;"></td>
                <td style="width: 20%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;">
                    <strong>
                        SUBTOTAL
                    </strong>
                </td>
                <td style="width: 5%;">
                    ${{ number_format($Com->ImporteC, 5) }}
                </td>
            </tr>
            <tr class="tt1">
                <td style="width: 10%;">
                </td>
                <td style="width: 30%;">
                </td>
                <td style="width: 20%;">
                </td>
                <td style="width: 5%;">
                </td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;">
                    <Strong>IVA</Strong>
                </td>
                <td style="width: 5%;">
                    ${{ number_format($IVA, 5) }}
                </td>
            </tr>
            <tr class="tt1">
                <td style="width: 10%;"></td>
                <td style="width: 30%;"></td>
                <td style="width: 20%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;"></td>
                <td style="width: 5%;">
                    <strong>DESCUENTO</strong>
                </td>
                <td style="width: 5%;">
                    ${{ number_format($Com->Desc, 5) }}
                </td>
            </tr>
            <tr class="tt1">
                <td style="width: 10%;">
                </td>
                <td style="width: 30%;">
                </td>
                <td style="width: 20%;">
                </td>
                <td style="width: 5%;">
                </td>
                <td style="width: 5%;"></td>
                <td style="width: 5%; text-align: right;" colspan="2">
                    <strong>IMPORTE TOTAL</strong>
                </td>
                <td style="width: 5%;">
                    ${{ number_format($Com->ImporteTot, 5) }}
                </td>
            </tr>
        </tbody>
    </table>
</body>
<table style="width: 100%; margin-top: 5%; text-align: center;">
    <tbody class="firmas">
        <tr>
            <td>
                ELABORÓ
            </td>
            <td>
                REVISÓ
            </td>
            <td>
                AUTORIZÓ
            </td>
        </tr>
        <tr>
            <td>
                __________________________________
            </td>
            <td>
                __________________________________
            </td>
            <td>
                __________________________________
            </td>
        </tr>
        <tr>
            <td>
                C.P. ALEJANDRA HERNANDEZ JUAREZ
            </td>
            <td>
                C.P. MARICELA CRUZ HERNANDEZ
            </td>
            <td>
                LIC. DAVID CASTILLO ANAYA
            </td>
        </tr>
    </tbody>
</table>
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
