<table>
    <thead>
        <tr>
            <th>FOLIO</th>
            <th>PROVEEDOR</th>
            <th>FECHA LIMITE</th>
            <th>FACTURA</th>
            <th>IMPORTE</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($compras as $compra)
            <tr>
                <th>{{ $compra->Folio }}</th>
                <th>{{ $compra->proveedor->NEMP }}</th>
                <th>{{ $compra->FechaL}}</th>
                <th>{{ $compra->Factura}}</th>
                <th>{{ $compra->ImporteTot}}</th>
            </tr>
            <tr>
                <th>FOLIO</th>
                <th>FECHA DE PAGO</th>
                <th>FORMA DE PAGO</th>
                <th>IMPORTE</th>
            </tr>
            @foreach ($pagos as $pago)
                @if($pago->compra_id == $compra->id)
                    <tr>
                        <th>{{$pago->compra->Folio }}</th>
                        <th>{{$pago->Fecha }}</th>
                        <th>{{$pago->forma->Nombre }}</th>
                        <th>{{$pago->Abono}}</th>
                    </tr>
                    @endif
            @endforeach
            <tr>
                <th>TOTAL PAGADO : </th>
                <th>{{$compra->ImportePag}}</th>
                <th>IMPORTE RESTANTE : </th>
                <th>{{$compra->ImporteTot - $compra->ImportePag}}</th>
            </tr>
        @endforeach
    </tbody>
</table>