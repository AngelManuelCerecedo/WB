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
        font-size: 30px;

        font-weight: bold;
    }

    .linea {
        margin-top: -60px;
        margin-bottom: 30px;
        color: #2EC0DF;
    }

    .ttt {
        font-family: 'Raleway', sans-serif;
        font-size: 16px;
        text-align: left;
        height: 15px;
    }

    .tt1 {
        width: 100px;
        font-family: 'Raleway', sans-serif;
        font-size: 13px;
        text-align: left;
        background-color: rgb(223, 239, 247) height: 10px;
    }

    .tt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 13px;
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
            <td style="width: 25%;" class="t1">LISTA DE PRODUCTOS</td>
        </tr>
    </tbody>
</table>
<div class="linea">
    <hr>
</div>
<table style="width: 100%;">
    <thead class="ttt">
        <tr>
            <td><strong>Nombre del Producto</strong></td>
            <td ><strong>Codigo de Barras</strong></td>
            <td><strong>Clave Cuadro Basico</strong></td>
            <td><strong>Clave SAT</strong></td>
            <td><strong>Marca</strong></td>
            <td><strong>Categoria</strong></td>
            <td><strong>Unidad Medida</strong></td>
            <td><strong>Precio Base</strong></td>
            <td><strong>Primera Escala</strong></td>
            <td><strong>Segunda Escala</strong></td>
            <td><strong>Tercera Escala</strong></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($Productos as $producto)
            @if ($aux)
                <tr class="tt1">
                    <td>
                        {{ $producto->Nombre }}
                    </td>
                    <td>
                        {{ $producto->CodigoB }}
                    </td>
                    <td>
                        {{ $producto->Clv1 }}
                    </td>
                    <td>
                        {{ $producto->Clv2 }}
                    </td>
                    <td>
                        {{ $producto->marca->Nombre }}
                    </td>
                    <td>
                        {{ $producto->categoria->Nombre }}
                    </td>
                    <td>
                        {{ $producto->unidad->Nombre }}
                    </td>
                    <td>
                        {{ $producto->Precio }}
                    </td>
                    <td>
                        {{ $producto->P1 }}
                    </td>
                    <td>
                        {{ $producto->P2 }}
                    </td>
                    <td>
                        {{ $producto->P3 }}
                    </td>
                </tr>
                <var {{ $aux = false }}></var>
            @else
                <tr class="tt2">
                    <td>
                        {{ $producto->Nombre }}
                    </td>
                    <td>
                        {{ $producto->CodigoB }}
                    </td>
                    <td>
                        {{ $producto->Clv1 }}
                    </td>
                    <td>
                        {{ $producto->Clv2 }}
                    </td>
                    <td>
                        {{ $producto->marca->Nombre }}
                    </td>
                    <td>
                        {{ $producto->categoria->Nombre }}
                    </td>
                    <td>
                        {{ $producto->unidad->Nombre }}
                    </td>
                    <td>
                        {{ $producto->Precio }}
                    </td>
                    <td>
                        {{ $producto->P1 }}
                    </td>
                    <td>
                        {{ $producto->P2 }}
                    </td>
                    <td>
                        {{ $producto->P3 }}
                    </td>
                </tr>
                <var {{ $aux = true }}></var>
            @endif
        @endforeach
    </tbody>
</table>