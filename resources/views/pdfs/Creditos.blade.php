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
        background-color: rgb(255, 230, 150); 
    }
    .ttt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        height: 15px;
                background-color: rgb(223, 239, 247);
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
        height: 10px;
    }

    .tc1 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
    }

    .tc2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        
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
            <td style="width: 20%;" class="t1">PAGOS A CREDITOS</td>
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
                <td class="TTT" colspan="6">
                    <strong>DETALLES DE CREDITOS</strong>
                </td>
            </tr>
            @foreach ($Ventas as $venta)
            <tr class="ttt">
                <td><strong>FOLIO</strong></td>
                <td><strong>CLIENTE</strong></td>
                <td><strong>SUCURSAL</strong></td>
                <td><strong>VENDEDOR</strong></td>
                <td><strong>FECHA INICIO</strong></td>
                <td><strong>IMPORTE</strong></td>
            </tr>
        </thead>
        <tbody style="border-top:1px solid #000000;">
                <tr class="tc1">
                    <td style="width: 15%;">
                        {{ $venta->id }}
                    </td>
                    <td style="width: 20%;">
                        {{$venta->cliente->NomCom}}
                    </td>
                    <td>{{$venta->sucursal->Nombre}}</td>
                    <td>{{$venta->empleado->Nombre}}</td>
                    <td>{{$venta->empleado->created_at->format('d-m-Y')}}</td>
                    <td style="width: 20%;">
                        ${{ number_format($venta->Importes,2) }}
                    </td>
                </tr>
                <tr class="ttt2">
                    <td style=" text-align: center;"><strong>FECHA DE PAGO</strong></td>
                    <td style=" text-align: center;"><strong>FORMA DE PAGO</strong></td>
                    <td style=" text-align: center;"><strong>IMPORTE</strong></td>
                    <td style=" text-align: center;"><strong>TOTAL PAGADO</strong></td>
                    <td style=" text-align: center;"><strong>FOLIO FACTURA</strong></td>
                    <td style=" text-align: center; "><strong>IMPORTE RESTANTE</strong></td>
                </tr>
                @foreach ($Pagos as $pago)
                    @if($pago->credito->venta_id == $venta->id)
                        @if ($aux)
                            <tr class="tc2">
                                <td style=" text-align: center;">
                                    {{ $pago->created_at->format('d-m-Y') }}
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
                                    {{$venta->sucursal->SerieF}}{{$pago->FFolio}}
                                </td>
                                <td style=" text-align: center;">
                                    ${{number_format($venta->Importes - $sm,2)}}
                                </td>
                            </tr>
                            <var {{ $aux = false }}></var>
                        @else
                            <tr class="tc2">
                                <td style=" text-align: center;">
                                    {{ $pago->created_at->format('d-m-Y') }}
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
                                    {{$venta->sucursal->SerieF}}{{$pago->FFolio}}
                                </td>
                                <td style=" text-align: center;">
                                    ${{number_format($venta->Importes - $sm,2)}}
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