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
        text-align: center;
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
            <td style="width: 25%;" class="t1">REPORTE DE VENTAS</td>
        </tr>
    </tbody>
</table>
<div class="linea">
    <hr>
</div>
<table style="width: 100%;">
    <thead class="ttt">
        <tr>
            <td style="width: 6%;"><strong>Folio</strong></td>
            <td style="width: 10%;"><strong>Sucursal</strong></td>
            <td style="width: 10%;"><strong>Fecha</strong></td>
            <td style="width: 5%;"><strong>Importe</strong></td>
            <td style="width: 15%;"><strong>Forma de Pago</strong></td>
            <td style="width: 10%;"><strong>Factura</strong></td>
            <td style="width: 15%;"><strong>Vendedor</strong</strong></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($Ventas as $venta)
            @if ($aux)
                <tr class="tt1">
                    <td style="text-align: center;">
                        {{ $venta->Folio }}
                    </td>
                    <td style="text-align: center;">
                        {{$venta->sucursal->Nombre}}
                    </td>
                    <td>
                        {{$venta->updated_at}}
                    </td>
                    <td style="text-align: center;">
                        ${{$venta->Importes}}
                    </td>
                    <td style="text-align: center;">
                        {{ $venta->forma->Nombre }}
                    </td>
                    <td>
                        {{ $venta->Factura }}
                    </td>
                    <td>
                        {{ $venta->empleado->Nombre }}
                    </td>
                </tr>
                <var {{ $aux = false }}></var>
            @else
                <tr class="tt2">
                    <td style="text-align: center;">
                        {{ $venta->Folio }}
                    </td>
                    <td style="text-align: center;">
                        {{$venta->sucursal->Nombre}}
                    </td>
                    <td>
                        {{$venta->updated_at}}
                    </td>
                    <td style="text-align: center;">
                        ${{$venta->Importes}}
                    </td>
                    <td style="text-align: center;">
                        {{ $venta->forma->Nombre }}
                    </td>
                    <td>
                        {{ $venta->Factura }}
                    </td>
                    <td>
                        {{ $venta->empleado->Nombre }}
                    </td>
                </tr>
                <var {{ $aux = true }}></var>
            @endif
        @endforeach
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
