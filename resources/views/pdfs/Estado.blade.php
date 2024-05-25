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
            <td style="width: 10%;" class="t1"> </td>
            <td style="width: 21%;" class="t1">ESTADO DE CUENTA</td>
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
                    UID
                </td>
                <td class="tc2">
                    {{ $cliente->id }}
                </td>
                <td class="tc1">
                    RFC
                </td>
                <td class="tc2">
                    {{ $cliente->RFC }}
                </td>
                <td class="tc1">
                    TIPO DE CLIENTE
                </td>
                <td class="tc2">
                    {{ $cliente->TipoC }}
                </td>
                <td class="tc1">
                    CLASIFICACION DEL CLIENTE
                </td>
                <td class="tc2">
                    {{ $cliente->Clasificacion }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    MOVIL
                </td>
                <td class="tc2">
                    {{ $cliente->Cel }}
                </td>
                <td class="tc1">
                    TELEFONO
                </td>
                <td class="tc2">
                    {{ $cliente->Tel }}
                </td>
                <td class="tc1">
                    CORREO
                </td>
                <td class="tc2" colspan="3">
                    {{ $cliente->Correo }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    NOMBRE
                </td>
                <td class="tc2" colspan="3">
                    {{ $cliente->Nombre }} {{$cliente->ApP}} {{$cliente->ApM}}
                </td>
                <td class="tc1">
                    NOMBRE COMERCIAL
                </td>
                <td class="tc2" colspan="3">
                    {{ $cliente->NomCom }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    DIRECCION
                </td>
                <td class="tc2" colspan="7">
                    {{$cliente->Mun}},{{$cliente->Estado}}, Col{{ $cliente->Col }}, CP{{ $cliente->CP }} Calle {{$cliente->Calle}} NumInt {{$cliente->NumInt}} NumExt {{$cliente->NumExt}}.
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="8">
                    <strong>DETALLES DE CREDITOS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>FOLIO</strong></td>
                <td><strong>SUCURSAL</strong></td>
                <td><strong>FORMA DE PAGO</strong></td>
                <td><strong>METODO DE PAGO</strong></td>
                <td><strong>FECHA DE CREDITO/PAGO</strong></td>
                <td><strong>IMPORTE DEL CREDITO</strong></td>
                <td><strong>IMPORTE PAGADO</strong></td>
                <td><strong>IMPORTE POR PAGAR</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($creditos as $credito)
                <var {{ $tp = 0 }}></var>
                @if($credito->cliente_id == $cliente->id)
                    @foreach ($pagos as $pago)
                        @if($pago->credito_id == $credito->id)
                            <var {{ $tp += $pago->Abono }}></var>
                        @endif
                    @endforeach
                    @if ($aux)
                        <tr class="tt1">
                            <td>
                                {{ $credito->venta_id }}
                            </td>
                            <td style="width: 13%;">
                                {{ $credito->venta->sucursal->Nombre }}
                            </td>
                            <td style="width: 20%;">
                                {{ $credito->venta->forma->Nombre }}
                            </td>
                            <td style="width: 10%;">
                                {{ $credito->venta->metodo_p }}
                            </td>
                            <td>
                                {{ $credito->venta->Fecha }}
                            </td>
                            <td style="width: 15%;">
                                ${{ number_format($credito->Total, 2) }}
                            </td>
                            <td style="width: 10%;">
                                ${{ number_format($tp, 2) }}
                            </td>
                            <td style="width: 25%;">
                                ${{ number_format($credito->Total - $tp, 2); }}
                            </td>
                        </tr>
                        @foreach ($pagos as $pago)
                            @if($pago->credito_id == $credito->id)
                                <tr class="tt1">
                                    <td>
                                        {{ $pago->credito->venta_id }}
                                    </td>
                                    <td>
                                        <strong>PAGO</strong>
                                    </td>
                                    <td>
                                        {{ $pago->forma->Nombre }}
                                    </td>
                                    <td>
                                        {{ $pago->metodoP }}
                                    </td>
                                    <td>
                                        {{ $pago->created_at->format('Y-m-d') }}
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        ${{ number_format($pago->Abono, 2) }}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <var {{ $aux = false }}></var>
                    @else
                        <tr class="tt2">
                            <td>
                                {{ $credito->venta_id }}
                            </td>
                            <td>
                                {{ $credito->venta->sucursal->Nombre }}
                            </td>
                            <td>
                                {{ $credito->venta->forma->Nombre }}
                            </td>
                            <td>
                                {{ $credito->venta->metodo_p }}
                            </td>
                            <td>
                                {{ $credito->venta->Fecha }}
                            </td>
                            <td>
                                ${{ number_format($credito->Total, 2) }}
                            </td>
                            <td>
                                ${{ number_format($tp, 2) }}
                            </td>
                            <td>
                                ${{number_format($credito->Total - $tp, 2); }}
                            </td>
                        </tr>
                        @foreach ($pagos as $pago)
                            @if($pago->credito_id == $credito->id)
                                <tr class="tt2">
                                    <td>
                                        {{ $pago->credito->venta_id }}
                                    </td>
                                    <td>
                                        <strong>PAGO</strong>
                                    </td>
                                    <td>
                                        {{ $pago->forma->Nombre }}
                                    </td>
                                    <td>
                                        {{ $pago->metodoP }}
                                    </td>
                                    <td>
                                        {{ $pago->created_at->format('Y-m-d') }}
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        ${{ number_format($pago->Abono, 2) }}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <var {{ $aux = true }}></var>
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
        <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="6">
                    <strong>DETALLES DE VENTAS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>FOLIO</strong></td>
                <td><strong>SUCURSAL</strong></td>
                <td><strong>FORMA DE PAGO</strong></td>
                <td><strong>TIPO DE VENTA</strong></td>
                <td><strong>FECHA</strong></td>
                <td><strong>IMPORTE</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                    @if ($aux)
                        <tr class="tt1">
                            <td style="width: 10%;">
                                {{ $venta->id }}
                            </td>
                            <td style="width: 13%;">
                                {{ $venta->sucursal->Nombre }}
                            </td>
                            <td style="width: 20%;">
                                {{ $venta->forma->Nombre }}
                            </td>
                            <td style="width: 20%;">
                                @if($venta->metodo_p == 'PPD')
                                    Credito
                                 @else
                                    Contado
                                 @endif
                            </td>
                            <td style="width: 10%;">
                                {{ $venta->Fecha }}
                            </td>
                            <td style="width: 15%;">
                                ${{ number_format($venta->Importes, 2) }}
                            </td>
                        </tr>
                        <var {{ $aux = false }}></var>
                    @else
                        <tr class="tt2">
                            <td>
                                {{ $venta->id }}
                            </td>
                            <td>
                                {{ $venta->sucursal->Nombre }}
                            </td>
                            <td>
                                {{ $venta->forma->Nombre }}
                            </td>
                            <td>
                                @if($venta->metodo_p == 'PPD')
                                    Credito
                                 @else
                                    Contado
                                 @endif
                            </td>
                            <td>
                                {{ $venta->Fecha }}
                            </td>
                            <td>
                                ${{ number_format($venta->Importes, 2) }}
                            </td>
                        </tr>
                        <var {{ $aux = true }}></var>
                    @endif
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