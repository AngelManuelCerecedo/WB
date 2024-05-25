<table>
    <thead>
        <tr>
            <th>CodigoB</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Lotes</th>
            <th>Fecha Caducidad</th>
            <th>Cantidades</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <th>{{$producto->producto->CodigoB}}</th>
                <th>{{$producto->producto->Nombre}}</th>
                <th>{{$producto->producto->marca->Nombre}}</th>
                <th>{{$producto->Numero}}</th>
                <th>{{$producto->Fecha}}</th>
                <th>{{$producto->Cantidad}}</th>
                <th></th>
            </tr>
        @endforeach
    </tbody>
</table>