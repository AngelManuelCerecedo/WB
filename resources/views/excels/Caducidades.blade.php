<table>
    <thead>
        <tr>
            <th>CodigoB</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Lotes</th>
            <th>Cantidades</th>
            <th>Fecha de Caducidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <th>{{$producto->producto->CodigoB}}</th>
                <th>{{$producto->producto->Nombre}}</th>
                <th>{{$producto->producto->marca->Nombre}}</th>
                <th>{{$producto->Numero}}</th>
                <th>{{$producto->Cantidad}}</th>
                <th>{{$producto->Fecha}}</th>
            </tr>
        @endforeach
    </tbody>
</table>