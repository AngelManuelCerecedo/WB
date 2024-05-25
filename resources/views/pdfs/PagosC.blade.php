<!DOCTYPE html>
<meta charset="UTF-8" data-lt-installed="true">
<style type="text/css">
    @page {
        margin: 1.5cm .5cm;
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
        font-size: 12px;
    }

    .tc2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        background-color: rgb(223, 239, 247);
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
            <td style="width: 20%;" class="t1">PAGOS A COMPRAS</td>
        </tr>
    </tbody>
</table>
<div class="linea">
    <hr>
</div>

<body>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="5">
                    <strong>DETALLES DE CREDITOS</strong>
                </td>
            </tr>
            @foreach ($Compras as $compra)
            <tr class="ttt">
                <td style="text-align: center;"><strong>FOLIO</strong></td>
                <td style="text-align: center;"><strong>PROVEEDOR</strong></td>
                <td style="text-align: center;"><strong>FECHA LIMITE</strong></td>
                <td style="text-align: center;"><strong>FACTURA</strong></td>
                <td style="text-align: center;"><strong>IMPORTE</strong></td>
            </tr>
        </thead>
        <tbody>
                <tr class="tc1">
                    <td style=" text-align: center; width: 15%;">
                        {{ $compra->Folio }}
                    </td>
                    <td style="text-align: center; width: 20%;">
                        {{$compra->proveedor->NEMP}}
                    </td>
                    <td style="text-align: center;">
                        {{ $compra->FechaL }}
                    </td>
                    <td style="text-align: center;">
                        {{ $compra->Factura }}
                    </td>
                    <td style=" text-align: center; width: 20%;">
                        ${{ number_format($compra->ImporteTot,5) }}
                    </td>
                </tr>
                <tr class="ttt">
                    <td style=" text-align: center;"><strong>FECHA DE PAGO</strong></td>
                    <td style=" text-align: center;"><strong>FORMA DE PAGO</strong></td>
                    <td style=" text-align: center;"><strong>IMPORTE</strong></td>
                    <td style=" text-align: center;"><strong>TOTAL PAGADO</strong></td>
                    <td style=" text-align: center; "><strong>IMPORTE RESTANTE</strong></td>
                </tr>
                @foreach ($Pagos as $pago)
                    @if($pago->compra_id == $compra->id)
                        @if ($aux)
                            <tr class="tc1">
                                <td style=" text-align: center;">
                                    {{ $pago->Fecha }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $pago->forma->Nombre }}
                                </td>
                                <td style=" text-align: center;">
                                    ${{ number_format($pago->Abono, 2) }}
                                    <var {{ $sm += $pago->Abono }}></var>
                                </td>
                                <td style=" text-align: center;">
                                    ${{ number_format($sm, 2) }}
                                </td>
                                <td style=" text-align: center;">
                                    ${{number_format($compra->ImporteTot - $sm,5)}}
                                </td>
                            </tr>
                            <var {{ $aux = false }}></var>
                        @else
                            <tr class="tc2">
                                <td style=" text-align: center;">
                                    {{ $pago->Fecha }}
                                </td>                                
                                 <td style="text-align: center;">
                                    {{ $pago->forma->Nombre }}
                                </td>
                                <td style=" text-align: center;">
                                    ${{ number_format($pago->Abono, 2) }}
                                    <var {{ $sm += $pago->Abono }}></var>
                                </td>
                                <td style=" text-align: center;">
                                    ${{ number_format($sm, 2) }}
                                </td>
                                <td style=" text-align: center;">
                                    ${{number_format($compra->ImporteTot - $sm,5)}}
                                </td>
                            </tr>
                            <var {{ $aux = true }}></var>
                        @endif
                    @endif
                @endforeach
                <var {{ $sm = 0 }}></var>
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