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
        height: 15px;
    }

    .tt1 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        background-color: white;
        height: 10px;
    }

    .tt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        background-color: rgb(223, 239, 247);
        height: 10px;
    }

    .tc1 {
        font-family: 'Raleway', sans-serif;
        font-size: 16px;
        text-align: left;
        color: white;
        background-color: rgb(28, 117, 199);
    }

    .tc2 {
        font-family: 'Raleway', sans-serif;
        font-size: 13px;
        background-color: white;
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
</style>
    <table style="width: 100%; border-collapse: collapse; margin-top: -6%">
        <tbody>
            <tr>
                <td style="width: 25%;">
                    <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/Logo-Name.png"
                        class="i1">
                </td>
                <td style="width: 25%;" class="t1"> </td>
                <td style="width: 25%;" class="t1">ORDEN DE VENTA</td>
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
                <td style="width: 25%;">
                    <table
                        style="width: 100%; border-collapse: collapse; border: rgb(28, 117, 199) 1.5px solid; margin-top: -1%">
                        <thead>
                            <tr class="tc1">
                                <td>CLIENTE</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tc2">
                                @if ($venta->cliente_id != '101')
                                    <td style="">RFC : <strong>{{ $venta->cliente->RFC }}</strong></td>
                                @else
                                    <td style="">RFC : <strong>XXXX000000X00</strong></td>
                                @endif
                            </tr>
                            <tr class="tc2">
                                @if ($venta->cliente_id)
                                    @if ($venta->cliente->TipoP == 'Moral')
                                        <td>NOMBRE: {{ $venta->cliente->NomCom }}</td>
                                    @else
                                        <td style="">NOMBRE: {{ $venta->cliente->Nombre }} {{ $venta->cliente->ApP }}
                                            {{ $venta->cliente->ApM }}</td>
                                    @endif
                                @else
                                    <td style="">NOMBRE: {{ $venta->Cliente }}</td>
                                @endif
                            </tr>
                            <tr class="tc2">
                                @if ($venta->cliente_id != '101')
                                    <td style="">DOMICILIO: {{ $venta->cliente->Calle }} #{{ $venta->cliente->NumExt }}, COL
                                        {{ $venta->cliente->Col }}<br>
                                        {{ $venta->cliente->Mun }}, {{ $venta->cliente->Estado }} C.P.
                                        {{ $venta->cliente->CP }}
                                    </td>
                                @else
                                    <td style="">DOMICILIO: CONOCIDO</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width: 10%;"></td>
                <td style="width: 25%;">
                    <table
                        style="width: 100%; border-collapse: collapse; border: rgb(132, 143, 154) 1px solid; margin-top: -1%; height: px;">
                        <tbody class="tc2">
                            <tr style="border-collapse: collapse; border: rgb(132, 143, 154) 1px solid;" class="headt">
                                <td><strong>FOLIO :</strong> {{ $venta->id }}</td>
                            </tr>
                            <tr style="border-collapse: collapse; border: rgb(132, 143, 154) 1px solid;" class="headt">
                                <td><strong>FECHA :</strong> {{ $venta->Fecha }}</td>
                            </tr>
                            <tr style="border-collapse: collapse; border: rgb(132, 143, 154) 1px solid;" class="headt">
                                <td><strong>SUCURSAL :</strong> {{ $venta->sucursal->Nombre }}</td>
                            </tr>
                            <tr style="border-collapse: collapse; border: rgb(132, 143, 154) 1px solid;" class="headt">
                                <td><strong>VENDEDOR :</strong> {{ $venta->empleado->Nombre }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%; margin-top: 2%; border-top:1px solid #000000;">
        <thead class="ttt">
            <tr style="border-bottom:1px solid #000000;">
                <td><strong>CLAVE</strong></td>
                <td><strong>NOMBRE</strong></td>
                <td style="text-align: center;"><strong>UNIDAD</strong></td>
                <td style="text-align: center;"><strong>PRECIO U</strong></td>
                <td style="text-align: center;"><strong>CANTIDAD</strong></td>
                <td style="text-align: center;"><strong>IMPORTE</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                @if ($aux)
                    <tr class="tt1" style="border-top:1px solid #000000;">
                        <td style="width:12%;">
                            {{ $producto->producto->CodigoB }}
                        </td>
                        <td style="width:40%;">
                            {{ $producto->producto->Nombre }}
                        </td>
                        <td style="width: 10%; text-align: center;">
                            {{ $producto->producto->unidad->Nombre }}
                        </td>
                        <td style="width: 10%; text-align: center;">
                            ${{ number_format($producto->Precio, 2) }}
                        </td>
                        <td style="width: 10%; text-align: center;">
                            {{ $producto->Cantidad }}
                        </td>
                        <td style="width: 10%; text-align: center;">
                            ${{ number_format($producto->Cantidad * $producto->Precio, 2) }}
                        </td>
                    </tr>
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tt2" style="border-top:1px solid #000000;">
                        <td>
                            {{ $producto->producto->CodigoB }}
                        </td>
                        <td>
                            {{ $producto->producto->Nombre }}
                        </td>
                        <td style="text-align: center;">
                            {{ $producto->producto->unidad->Nombre }}
                        </td>
                        <td style="text-align: center;">
                           ${{ number_format($producto->Precio, 2) }}
                        </td>
                        <td style="text-align: center;">
                            {{ $producto->Cantidad }}
                        </td>
                        <td style="text-align: center;">
                            ${{ number_format($producto->Cantidad * $producto->Precio, 2) }}
                        </td>
                    </tr>
                    <var {{ $aux = true }}></var>
                @endif
            @endforeach
            <tr class="tt1">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>SUBTOTAL</strong></td>
                <td>${{ number_format($venta->Importes, 2) }}</td>
            </tr>
            <tr class="tt1">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>IVA</strong></td>
                <td>$0.00</td>
            </tr>
            <tr class="tt1">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>TOTAL</strong></td>
                <td>${{ number_format($venta->Importes, 2) }}</td>
            </tr>
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
