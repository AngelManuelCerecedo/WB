<table>
    <thead>
        <tr>
            <th>Folio de Venta</th>
            <th>Fecha de Venta</th>
            <th>Codigo Promocional</th>
            <th>Codigo del Producto</th>
            <th>Nombre del Producto</th>
            <th>Cantidad Vendida</th>
            <th>Ingreso</th>
            <th>Total</th>
            <th>Sucursal</th>
            <th>Nombre del Ejecutivo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <th>{{$producto->venta->id}}</th>
                <th>{{$producto->created_at->format('d-m-Y')}}</th>
                <th>{{$producto->Promo}}</th>
                <th>{{$producto->producto->CodigoB}}</th>
                <th>{{$producto->producto->Nombre}}</th>
                <th>{{$producto->Cantidad}}</th>
                <th>{{$producto->Precio}}</th>
                <th>{{$producto->Precio * $producto->Cantidad}}</th>
                <th>{{$producto->venta->sucursal->Nombre}}</th>
                <th>{{$producto->venta->empleado->Nombre}}</th>
            </tr>
        @endforeach
    </tbody>
</table>