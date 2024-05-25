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
            <td style="width: 25%;" class="t1">REPORTE DE TRASPASOS</td>
        </tr>
    </tbody>
</table>
<div class="linea">
    <hr>
</div>
<table style="width: 100%;">
    <thead class="ttt">
        <tr>
            <td><strong>Folio</strong></td>
            <td><strong>Sucursal Origen</strong></td>
            <td><strong>Sucursal Destino</strong></td>
            <td><strong>Estatus</strong></td>
            <td><strong>Fecha</strong></td>
            <td style="width: 10px;"><strong>Observaciones</strong></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($Traspasos as $tras)
            @if ($aux)
                <tr class="tt1">
                    <td style="text-align: center;">
                        {{ $tras->Folio }}
                    </td>
                    <td style="text-align: center;">
                    @switch($tras->almacenO_id)
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
                    <td style="text-align: center;">
                    @switch($tras->almacenD_id)
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
                    <td style="text-align: center;">
                        {{ $tras->Estatus }}
                    </td>
                    <td style="text-align: center;">
                        {{ $tras->created_at }}
                    </td>
                    <td>
                        {{ $tras->Obs }}
                    </td>
                </tr>
                <var {{ $aux = false }}></var>
            @else
                <tr class="tt2">
                   <td style="text-align: center;">
                        {{ $tras->Folio }}
                    </td>
                    <td style="text-align: center;">
                    @switch($tras->almacenO_id)
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
                    <td style="text-align: center;">
                    @switch($tras->almacenD_id)
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
                    <td style="text-align: center;">
                        {{ $tras->Estatus }}
                    </td>
                    <td style="text-align: center;">
                        {{ $tras->created_at }}
                    </td>
                    <td>
                        {{ $tras->Obs }}
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
