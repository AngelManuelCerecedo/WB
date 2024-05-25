<table>
    <thead>
        <tr>
            <td>Nombre</td>
            <td>Cantidad Vendida</td>
            <td>Existencias</td>
            <td>Sugerencia</td>
            <td>Promedio</td>
            <td>Desviacion</td>
            <td>Reabastecimiento</td>
            <td>Stock Minimo</td>
            <td>Stock Maximo</td>
        </tr>
    </thead>
    <tbody>
        @php
            $productosMap = $productos->keyBy('nombre_producto');
            $existenciasMap = $existencias->keyBy('nombre_producto');

            $allProductNames = $productosMap->keys()->merge($existenciasMap->keys())->unique();
        @endphp

        @foreach ($allProductNames as $nombre_producto)
            <tr>
                <td>{{ $nombre_producto }}</td>
                <td>{{ $productosMap->has($nombre_producto) ? $productosMap->get($nombre_producto)->cantidad_total : 0 }}</td>
                <td>{{ $existenciasMap->has($nombre_producto) ? $existenciasMap->get($nombre_producto)->total_existencias : 0 }}</td>
                <td>{{ $productosMap->has($nombre_producto) ? max((round((round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)+((round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)*7))*2)-$existenciasMap->get($nombre_producto)->total_existencias,(round((round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)+((round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)*7)))-$existenciasMap->get($nombre_producto)->total_existencias) : 0 }}</td>
                <td>{{ $productosMap->has($nombre_producto) ? round($productosMap->get($nombre_producto)->cantidad_total/30,2) : 0 }}</td>
                <td>{{ $productosMap->has($nombre_producto) ? round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7 : 0 }}</td>
                <td>{{ $productosMap->has($nombre_producto) ? (round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)*7 : 0 }}</td>
                <td>{{ $productosMap->has($nombre_producto) ? round((round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)+((round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)*7)) : 0 }}</td>
                <td>{{ $productosMap->has($nombre_producto) ? round((round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)+((round($productosMap->get($nombre_producto)->cantidad_total/30,2)*7)*7))*2 : 0 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

