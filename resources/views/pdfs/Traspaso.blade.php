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
        font-size: 12px;
        text-align: left;
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
            <td style="width: 25%;" class="t1">TRASPASO DE MATERIAL</td>
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
                <td class="tc1" style="width: 10%;">
                    FOLIO DEL TRASPASO
                </td>
                <td class="tc2">
                    {{ $Tras->Folio }}
                </td>
                <td class="tc1" style="width: 19%;">
                    SUCURSAL ORIGEN
                </td>
                <td class="tc2">
                    @switch($Tras->almacenO_id)
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
                <td class="tc1">
                    SUCURSAL DESTINO
                </td>
                <td class="tc2">
                    @switch($Tras->almacenD_id)
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
            </tr>
            <tr>
                <td class="tc1">
                    ESTATUS
                </td>
                <td class="tc2">
                    {{ $Tras->Estatus }}
                </td>
                <td class="tc1">
                    OBSERVACIONES
                </td>
                <td class="tc2" colspan="3">
                    {{ $Tras->Obs }}
                </td>
            </tr>

        </tbody>
    </table>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="6">
                    <strong>PRODUCTOS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: left;">
                <td><strong>CLAVE</strong></td>
                <td><strong>NOMBRE DEL PRODUCTO</strong></td>
                <td><strong>MARCA</strong></td>
                <td><strong>LOTE</strong></td>
                <td><strong>FECHA CAD</strong></td>
                <td><strong>CANTIDAD</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Productos as $producto)
                @if ($aux)
                    <tr class="tc1">
                        <td style="width: 10%;">
                            {{ $producto->producto->CodigoB }}
                        </td>
                        <td style="width: 40%;">
                            {{ $producto->producto->Nombre }}
                        </td>
                        <td style="width: 15%;">
                            {{ $producto->producto->marca->Nombre }}
                        </td>
                        <td style="width: 10%;">
                            @if($producto->lote_id)
                                {{ $producto->lote->Numero }}
                            @endif
                        </td>
                        <td style="width: 10%;">
                            @if($producto->lote_id)
                                {{ $producto->lote->Fecha }}
                            @endif
                        </td>
                        <td style="width: 10%;">
                            {{ $producto->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tc2">
                        <td style="width: 10%;">
                            {{ $producto->producto->CodigoB }}
                        </td>
                        <td style="width: 40%;">
                            {{ $producto->producto->Nombre }}
                        </td>
                        <td style="width: 15%;">
                            {{ $producto->producto->marca->Nombre }}
                        </td>
                        <td style="width: 10%;">
                            @if($producto->lote_id)
                                {{ $producto->lote->Numero }}
                            @endif
                        </td>
                        <td style="width: 10%;">
                            @if($producto->lote_id)
                                {{ $producto->lote->Fecha }}
                            @endif
                        </td>
                        <td style="width: 10%;">
                            {{ $producto->Cantidad }}
                        </td>
                    </tr>
                    <var {{ $aux = true }}></var>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
<table style="width: 100%; margin-top: 5%; text-align: center;">
    <tbody class="firmas">
        <tr>
            <td>
                __________________________________
            </td>
            <td>
                __________________________________
            </td>
        </tr>
        <tr>
            <td>
                Nombre y firma de quien entrega
            </td>
            <td>
                Nombre y firma de quien recibe
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
