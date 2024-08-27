<table>
    <thead>
        <tr>
            <th style="width: 500px; text-align: left; border: 1px solid black; background-color: #d1cece;">
                <b>EMPRESA:</b>
            </th>
            <th style="width: 200px; text-align: left; border: 1px solid black; background-color: #d1cece;">
                <b>NOMBRE CORTO:</b>
            </th>
            <th style="width: 200px; text-align: center; border: 1px solid black; background-color: #d1cece;">
                <b>SALDO:</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Empresas as $empresa)
            @php
                $Taux = 0;
                $Cuentas = \App\Models\Banco::where([['empresa_id', $empresa->id]])->get();
                foreach ($Cuentas as $cuenta) {
                    $Taux += $cuenta->Total;
                }
            @endphp
            <tr>
                <th style="text-align: right; border: 1px solid black;">{{ $empresa->Nombre }}</th>
                <th style="border: 1px solid black;">{{ $empresa->NCorto }}</th>
                <th style="border: 1px solid black;">${{ number_format($Taux, 2) }}</th>
            </tr>
        @endforeach
    </tbody>
</table>
