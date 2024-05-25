<table>
    <thead>
        <tr>
            <th>CodigoB</th>
            <th>Nombre</th>
            <th>Clave CB</th>
            <th>Clave SAT</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Unidad Medida</th>
            <th>Precio Base</th>
            <th>Primera Escala</th>
            <th>Segunda Escala</th>
            <th>Tercera Escala</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <th>{{$producto->CodigoB}}</th>
                <th>{{$producto->Nombre}}</th>
                <th>{{$producto->Clv1}}</th>
                <th>{{$producto->Clv2}}</th>
                <th>{{$producto->marca->Nombre}}</th>
                <th>{{$producto->categoria->Nombre}}</th>
                <th>{{$producto->unidad->Nombre}}</th>
                <th>{{$producto->Precio}}</th>
                <th>{{$producto->P1}}</th>
                <th>{{$producto->P2}}</th>
                <th>{{$producto->P3}}</th>
            </tr>
        @endforeach
    </tbody>
</table>