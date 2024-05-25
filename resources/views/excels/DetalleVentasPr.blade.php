<table>
    <thead>
        <tr>
            <td>Nombre</td>
            <td>Sucursal</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td>Fecha</td>
            <td>Venta</td>
            <td>Vendedor</td>
        </tr>
    </thead>
    <tbody>
            @foreach ($precios as $precio)
                <tr>
                    <td>{{$precio->nombre_producto}}</td>
                    <td>{{$precio->nombre_sucursal}}</td>
                    <td>{{$precio->cantidad_total}}</td>
                    <td>{{$precio->precio_venta}}</td>
                    <td>{{$precio->fecha_registro ? $precio->fecha_registro : 'Fecha no disponible' }}</td>
                    <td>{{$precio->venta_id }}</td>
                    <td>{{$precio->venta->empleado->Nombre }}</td>
                </tr>
            @endforeach
    </tbody>
</table>