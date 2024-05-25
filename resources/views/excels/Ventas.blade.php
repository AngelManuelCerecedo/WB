<table>
    <thead>
        <tr>
            <td>Sucursal</td>
            <td>Tipo Ingreso</td>
            <td>Folio</td>
            <td>Fecha</td>
            <td>Tipo</td>
            <td>Importe</td>
            <td>Forma de Pago</td>
            <td>Serie Fiscal</td>
            <td>Folio Fiscal</td>
            <td>UUID</td>
            <td>Vendedor</td>
        </tr>
    </thead>
    <tbody>
        @if($ventas)
            @foreach ($ventas as $venta)
                <tr>
                    <td>
                        {{$venta->sucursal->Nombre}}
                    </td>
                    <td>
                        VENTA
                    </td>
                    <td>
                        {{ $venta->id }}
                    </td>
                    <td>
                        {{$venta->Fecha}}
                    </td>
                    <td>
                        {{$venta->metodo_p}}
                    </td>
                    <td>
                        {{$venta->Importes}}
                    </td>
                    <td>
                        {{ $venta->forma->Nombre }}
                    </td>
                    <td>
                        {{ $venta->sucursal->SerieF }}
                    </td>
                    <td>
                        {{ $venta->FFolio }}
                    </td>
                    <td>
                        {{ $venta->FolioFiscal }}
                    </td>
                    <td>
                        {{ $venta->empleado->Nombre }}
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
