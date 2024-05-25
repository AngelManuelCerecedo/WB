<!DOCTYPE html>
<meta charset="UTF-8">
<style type="text/css">
    @page {
        margin: -.2cm -.2cm;
        width: 10mm;

    }

    .i1 {
        width: 250px;
        height: 250px;
        margin-left: 40px;
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
        font-size: 12px;
        text-align: center;
        margin-top: -70px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .tt1 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: center;
        font-weight: bold;
    }

    .tt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: left;
        font-weight: bold;
        margin-left: 30px;
        margin-top: 5px
    }

    .tt3 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        margin-left: 30px;
        margin-top: 55px
    }

    .tt4 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: left;
        margin-left: 160px;
        margin-top: 5px
    }

    .tt41 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: right;
        margin-right: 33px;
        margin-top: -50px
    }

    .pt {
        font-family: 'Raleway', sans-serif;
        font-size: 17px;
        margin-left: 30px;
        margin-top: -5px;
        margin-bottom: -5px;
    }
</style>
<table style="width: 100%; border-collapse: collapse; margin-top: -15%">
    <tbody>
        <tr>
            <td style="">
                <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/Logo-Name.png" class="i1">
            </td>
        </tr>
    </tbody>
</table>
<div class="ttt">
    CARATTOZA S.A. DE C.V. <br>
    RFC CAR140909KM4 <br>
    COLONIA REFORMA <br>
    OAXACA DE JUAREZ, OAXACA. <br>
    CP 68050 <br>
    TEL: {{ $venta->Sucursal->Telefono }}
</div>
<div class="tt1">
    *********** VENTA ***********
    <br>
</div>
<div class="tt2">
    Folio: {{ $venta->id }}<br>
    Fecha y Hora: {{ $venta->created_at }}<br>
    Sucursal: {{ $venta->Sucursal->Nombre }}<br>
    Vendedor: {{ $venta->Empleado->Nombre }}<br>
    Cliente:
    @if ($venta->Cliente->TipoP == 'Moral')
        {{ $venta->Cliente->NomCom }}
    @else
        {{ $venta->Cliente->Nombre }}
    @endif
    <br>
    Forma de Pago: {{ $venta->Forma->Nombre }} <br>
</div>
<div class="tt3">
    <table style="width: 110%; border-collapse: collapse; margin-top: -13%">
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td style="width: 70%;">
                        {{ $producto->producto->CodigoB }} <br>
                        {{ $producto->producto->Nombre }} <br>
                        {{ $producto->Cantidad }} x ${{ number_format($producto->Precio, 2) }}
                    </td>
                    <td style="width: 30%;">
                        <br>
                        ${{ number_format($producto->Precio, 2) }}<br><br>
                        ${{ number_format($producto->Cantidad * $producto->Precio, 2) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pt">
    . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
</div>
<div class="tt4">
    SUBTOTAL <br>
    ENVIO <br>
    TOTAL
</div>
<div class="tt41">
    ${{ number_format($venta->Importes, 2) }}<br>
    $0.00<br>
    ${{ number_format($venta->Importes, 2) }}
</div>
<div class="pt">
    . . . . . . . . . . . . . . . . . . . . . . . . . . . . .
</div>
<div class="tt4">
    RECIBE <br>
    CAMBIO
</div>
<div class="tt41">
    ${{ number_format($venta->Recibe, 2) }}<br>
    ${{ number_format($venta->Recibe - $venta->Importes, 2) }}<br>
</div>
<div class="tt1">
    <br>
    ******* GRACIAS POR SU COMPRA ********<br>
    <br>
    ESTE TICKET FORMA PARTE DE LA FACTURA <br> GLOBAL DIARIA<br><br>
    NO SE ACEPTAN NI CAMBIOS NI DEVOLUCIONES,<br> MÉTODO DE PAGO, ENVÍO.
    <br>
</div>
