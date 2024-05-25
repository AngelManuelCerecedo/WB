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
            <td style="width: 15%;" class="t1">HISTORICO</td>
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
                    <strong>RESUMEN DE ACTUALIZACIONES</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>FECHA</strong></td>
                <td><strong>PRIMERAS EXISTENCIAS</strong></td>
                <td><strong>ACTUALIZACION</strong></td>
                <td><strong>RESPONSABLE DEL MOVIMIENTO</strong></td>
                <td><strong>ALMACEN</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Actualizaciones as $actualizacion)
                @if ($aux)
                    <tr class="tt1">
                        <td style="width: 10%;">
                            {{ $actualizacion->Fecha }}
                        </td>
                        <td style="width: 25%;">
                            {{ $actualizacion->Existencias }}
                        </td>
                        <td style="width: 20%;">
                            {{ $actualizacion->Actualizacion }}
                        </td>
                        <td style="width: 30%;">
                            {{ $actualizacion->empleado->Nombre }}
                        </td>
                        <td style="width: 15%;">
                            {{ $actualizacion->almacen->Nombre }}
                        </td>
                    </tr>
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tt2">
                        <td style="width: 10%;">
                            {{ $actualizacion->Fecha }}
                        </td>
                        <td style="width: 25%;">
                            {{ $actualizacion->Existencias }}
                        </td>
                        <td style="width: 20%;">
                            {{ $actualizacion->Actualizacion }}
                        </td>
                        <td style="width: 30%;">
                            {{ $actualizacion->empleado->Nombre }}
                        </td>
                        <td style="width: 15%;">
                            {{ $actualizacion->almacen->Nombre }}
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
                    <strong>EXISTENCIAS ACTUALES</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td><strong>ALMACEN</strong></td>
                <td><strong>EXISTENCIAS</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($Existencias as $existencia)
                @if ($aux)
                    <tr class="tt1">
                        <td style="width: 50%;">
                            {{ $existencia->almacen->Nombre }}
                        </td>
                        <td style="width: 50%;">
                            {{ $existencia->Stock }}
                        </td>
                    </tr>
                    <var {{ $aux = false }}></var>
                @else
                    <tr class="tt2">
                        <td style="width: 50%;">
                            {{ $existencia->almacen->Nombre }}
                        </td>
                        <td style="width: 55%;">
                            {{ $existencia->Stock }}
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