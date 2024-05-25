<!DOCTYPE html>
<meta charset="UTF-8">
<style type="text/css">
    @page {
        margin: .5cm .5cm;
    }

    .i1 {
        width: 180px;
        height: 180px;
        margin-left: 5px;
    }

    .t1 {
        font-family: 'Raleway', sans-serif;
        font-size: 25px;

        font-weight: bold;
    }

    .linea {
        margin-top: -60px;
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
        background-color:  rgb(223, 239, 247)
        height: 10px;
    }
    .tt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: left;
        background-color: white;
        height: 10px;
    }
</style>
<table style="width: 100%; border-collapse: collapse; margin-top: -5%">
    <tbody>
        <tr>
            <td style="width: 25%;">
                <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/Logo-Name.png" class="i1">
            </td>
            <td style="width: 25%;" class="t1"> </td>
            <td style="width: 25%;" class="t1">LISTA DE CLIENTES</td>
        </tr>
    </tbody>
</table>
<div class="linea">
    <hr>
</div>
<table style="width: 100%;">
    <thead class="ttt">
        <tr>
            <td ><strong>RFC</strong></td>
            <td ><strong>NOMBRE</strong></td>
            <td ><strong>TIPO PERSONA</strong></td>
            <td ><strong>TIPO CLIENTE</strong></td>
            <td ><strong>CELULAR</strong></td>
            <td ><strong>CORREO</strong></td>
            <td ><strong>TOTAL DE COMPRAS</strong></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
            @if ($aux)
                <tr class="tt1">
                    <td >
                        {{ $cliente->RFC }}
                    </td>
                    <td >
                        @if ($cliente->TipoP == 'Moral')
                            {{ $cliente->NomCom }}
                        @else
                            {{ $cliente->Nombre }} {{ $cliente->ApP }}
                            {{ $cliente->ApM }}
                        @endif
                    </td>
                    <td >
                        {{ $cliente->TipoP }}
                    </td>
                    <td >
                        {{ $cliente->TipoC }}
                    </td>
                    <td >
                        {{ $cliente->Cel }}
                    </td>
                    <td >
                        {{ $cliente->Correo }}
                    </td>
                    <td >
                        {{ $cliente->total_ventas }}
                    </td>
                </tr>
                <var {{$aux = false}}></var>
            @else
                <tr class="tt2">
                    <td >
                        {{ $cliente->RFC }}
                    </td>
                    <td >
                        @if ($cliente->TipoP == 'Moral')
                            {{ $cliente->NomCom }}
                        @else
                            {{ $cliente->Nombre }} {{ $cliente->ApP }}
                            {{ $cliente->ApM }}
                        @endif
                    </td>
                    <td >
                        {{ $cliente->TipoP }}
                    </td>
                    <td >
                        {{ $cliente->TipoC }}
                    </td>
                    <td >
                        {{ $cliente->Cel }}
                    </td>
                    <td >
                        {{ $cliente->Correo }}
                    </td>
                    <td >
                        {{ $cliente->total_ventas }}
                    </td>
                </tr>
                <var {{$aux = true}}></var>
            @endif
        @endforeach
    </tbody>
</table>
