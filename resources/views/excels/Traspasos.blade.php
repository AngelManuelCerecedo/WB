<table>
    <thead>
        <tr>
            <th>Folio</th>
            <th>Sucursal Origen</th>
            <th>Sucursal Destino</th>
            <th>Estatus</th>
            <th>Fecha</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        @if($traspasos)
        @foreach ($traspasos as $traspaso)
            <tr>
                <th>{{$traspaso->Folio}}</th>
                <th>
                    @switch($traspaso->almacenO_id)
                        @case(1)
                            Emilio Carranza
                        @break

                        @case(2)
                            MelchorOcampo
                        @break

                        @case(3)
                            Fuerza Aérea
                        @break

                        @case(4)
                            Puebla Sur
                        @break

                        @case(5)
                            E-Commerce
                        @break

                        @case(6)
                            Gobierno
                        @break

                        @case(7)
                            Almacen General
                        @break
                    @endswitch
                </th>
                <th>
                    @switch($traspaso->almacenD_id)
                        @case(1)
                            Emilio Carranza
                        @break

                        @case(2)
                            MelchorOcampo
                        @break

                        @case(3)
                            Fuerza Aérea
                        @break

                        @case(4)
                            Puebla Sur
                        @break

                        @case(5)
                            E-Commerce
                        @break

                        @case(6)
                            Gobierno
                        @break

                        @case(7)
                            Almacen General
                        @break
                    @endswitch
                </th>
                <th>{{$traspaso->Estatus}}</th>
                <th>{{$traspaso->created_at}}</th>
                <th>{{$traspaso->Obs}}</th>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>