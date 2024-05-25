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

    .t2 {
        font-family: 'Raleway', sans-serif;
        font-size: 25px;
        text-align: right;
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
        background-color: rgb(223, 239, 247);
        height: 10px;
    }

    .tt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        background-color: white;
        height: 10px;
    }

    .tc1 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: left;
        background-color: rgb(220, 219, 219);
        height: 10px;
    }

    .tc2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: left;
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
            <td style="width: 5%;" class="t1"> </td>
            <td style="width: 15%;" class="t2">RESUMEN DIARIO <br>{{ auth()->user()->empleado->sucursal->Nombre }}
            </td>
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
                <td class="tc1" style="width: 10%; background-color: white;">
                    SUCURSAL
                </td>
                <td class="tc2">
                    {{ auth()->user()->empleado->sucursal->Nombre }}
                </td>
                <td class="tc1" style="width: 20%; background-color: white;">
                    FECHA DE CONSULTA
                </td>
                <td class="tc2">
                    {{ $fecha }}
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="4">
                    <strong>RESUMEN</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td style="text-align: left;"><strong>FORMA DE PAGO</strong></td>
                <td><strong>VENTAS</strong></td>
                <td><strong>PAGOS</strong></td>
                <td><strong>TOTAL</strong></td>
            </tr>
        </thead>
        <tbody>
            <tr class="tt1">
                <td style="width: 60%;">
                    Efectivo
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($E,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($EP,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($E + $EP,2) }}
                </td>
            </tr>
            <tr class="tt2">
                <td style="width: 10%;">
                    Cheque Nominativo
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($CN,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($CNP,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($CN + $CNP,2) }}
                </td>
            </tr>
            <tr class="tt1">
                <td style="width: 10%;">
                    Transferencia Electrónica de Fondos (inc. SPEI)
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TE,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TEP,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TE + $TEP,2) }}
                </td>
            </tr>
            <tr class="tt2">
                <td style="width: 10%;">
                    Tarjeta de Crédito
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TC,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TCP,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TC + $TCP,2) }}
                </td>
            </tr>
            <tr class="tt1">
                <td style="width: 10%;">
                    Tarjeta de Débito
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TD,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TDP,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TD + $TDP,2) }}
                </td>
            </tr>
            <tr class="tt2">
                <td style="width: 10%;">
                    Por Definir
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($PD,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($PDP,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($PD + $PDP,2) }}
                </td>
            </tr>
            <tr class="tc1">
                <td style="width: 10%; background-color: white;">
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TV,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TP,2) }}
                </td>
                <td style="width: 10%; text-align: center;">
                    ${{ number_format($TT,2) }}
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="5">
                    <strong>VENTAS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>FOLIO</strong></td>
                <td><strong>VENDEDOR</strong></td>
                <td><strong>FORMA DE PAGO</strong></td>
                <td><strong>FACTURA</strong></td>
                <td><strong>TOTAL</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Ventas as $venta)
                <tr class="tt1">
                    <td style="width: 10%; text-align: center;">
                        <strong>{{$venta->id}}</strong>
                    </td>
                    <td  style="width: 15%; text-align: center;">
                        {{$venta->empleado->Nombre}} {{$venta->empleado->ApP}} {{$venta->empleado->ApM}}
                    </td>
                    <td style="width: 10%; text-align: center;">
                        {{ $venta->forma->Nombre }}
                    </td>
                    <td style="width: 5%; text-align: center;">
                        {{$venta->FFolio}}
                    </td>
                    <td style="width: 5%; text-align: center;">
                        <strong>${{$venta->Importes}}</strong>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="4">
                    <strong>PRODUCTOS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>NOMBRE</strong></td>
                <td><strong>CANTIDAD</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Productos as $producto){
                <tr class="tt1">
                    <td style="width: 80%;">
                        {{$producto->nombre}}
                    </td>
                    <td  style="width: 20%; text-align: center;">
                        {{$producto->cantidad}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
