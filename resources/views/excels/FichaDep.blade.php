<table>
    <thead>
        <tr>
            <th style="width: 100px; text-align: center; border: 1px solid black; background-color: #d1cece;"><b>CLIENTE:</b></th>
            <th style="width: 280px; text-align: center; border: 1px solid black; ">{{ $Ficha->cliente->ALIAS }}</th>
            <th style="width: 100px; text-align: center; border: 1px solid black; background-color: #d1cece;"><b>FECHA:</b></th>
            <th style="width: 100px; text-align: center; border: 1px solid black;">{{ $Ficha->Fecha }}</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th style="text-align: center; border: 1px solid black;" colspan="2"><b>FOLIO: {{ $Ficha->Folio }}</b></th>
        </tr>
    </thead>
    <tbody>
        @php
            $Total = 0; // Inicializa la variable Total
        @endphp
        <tr>
            <th style="border: 1px solid black; background-color: #d1cece;"><b>MONTO</b></th>
            <th style="text-align: center; border: 1px solid black; background-color: #d1cece;"><b>EMPRESA</b></th>
            <th style="border: 1px solid black;" colspan="2"></th>
        </tr>
        @if ($Ficha->CRT)
            @php
                $Total = $Ficha->Reintegro; // Inicializa la variable Total
            @endphp
        @else
            @foreach ($Mov as $movimiento)
                <tr>
                    <th style="text-align: right; border: 1px solid black;">$
                        {{ number_format($movimiento->Total, 2, '.', ',') }}</th>
                    <th style="border: 1px solid black;">{{ $movimiento->empresa->NCorto }} -
                        {{ $movimiento->banco->Nombre }} -
                        {{ $movimiento->banco->Cuenta }}</th>
                    <th style="border: 1px solid black;" colspan="2"></th>
                    @php
                        $Total += $movimiento->Total; // Inicializa la variable Total
                    @endphp
                </tr>
            @endforeach
        @endif
        <tr>
            <th style="border: 1px solid black;" colspan="4"></th>
        </tr>
        <tr>
            <th style="text-align: right; border: 1px solid black; background-color: #dbf1db;"><b>${{ number_format($Total, 2, '.', ',') }}</b>
            </th>
            <th style="border: 1px solid black;" colspan="3"></th>
        </tr>
        <tr>
            <th style="border: 1px solid black;"></th>
            <th style="border: 1px solid black; background-color: #d1cece;"><b>COMISIONES</b></th>
            <th style="border: 1px solid black; background-color: #d1cece;"><b>PORCENTAJE</b></th>
            <th style="border: 1px solid black;"></th>
        </tr>
        <tr>
            <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>TOTAL:</b></th>
            <th style="border: 1px solid black;">$ {{ number_format(($Ficha->Comision * $Total) / 100, 2, '.', ',') }}
            </th>
            <th style="border: 1px solid black;"><b>{{ $Ficha->Comision }} %</b></th>
            <th style="border: 1px solid black;"></th>
        </tr>
        <tr>
            <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>COM. FINTECH:</b></th>
            <th style="border: 1px solid black;">$ {{ number_format(($Ficha->GastosF * $Total) / 100, 2, '.', ',') }}
            </th>
            <th style="border: 1px solid black;"><b>{{ $Ficha->GastosF }} %</b></th>
            <th style="border: 1px solid black;"></th>
        </tr>
        <tr>
            <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>COM. WB 1:</b></th>
            <th style="border: 1px solid black;">$
                {{ number_format((($Ficha->ComisionWB * $Total) / 100)/2, 2, '.', ',') }}</th>
            <th style="border: 1px solid black;"><b>{{ number_format(($Ficha->ComisionWB /2), 2, '.', ',') }} %</b></th>
            <th style="border: 1px solid black;"></th>
        </tr>
        <tr>
            <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>COM. WB 2:</b></th>
            <th style="border: 1px solid black;">$
                {{ number_format((($Ficha->ComisionWB * $Total) / 100)/2, 2, '.', ',') }}</th>
            <th style="border: 1px solid black;"><b>{{ number_format(($Ficha->ComisionWB /2), 2, '.', ',')}} %</b></th>
            <th style="border: 1px solid black;"></th>
        </tr>
        @if ($Ficha->comis1_id != '')
            <tr>
                <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>COM. EXT. I:</b></th>
                <th style="border: 1px solid black;">$ {{ number_format(($Ficha->Tot1 * $Total) / 100, 2, '.', ',') }}
                </th>
                <th style="border: 1px solid black;"><b>{{ $Ficha->Tot1 }} %</b></th>
                <th style="border: 1px solid black;">{{ $Ficha->comisionista1->Nombre }}</th>
            </tr>
        @endif
        @if ($Ficha->comis2_id != '')
            <tr>
                <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>COM. EXT. II:</b></th>
                <th style="border: 1px solid black;">$ {{ number_format(($Ficha->Tot2 * $Total) / 100, 2, '.', ',') }}
                </th>
                <th style="border: 1px solid black;"><b>{{ $Ficha->Tot2 }} %</b></th>
                <th style="border: 1px solid black;">{{ $Ficha->comisionista2->Nombre }}</th>
            </tr>
        @endif
        @if ($Ficha->comis3_id != '')
            <tr>
                <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>COM. EXT. III:</b></th>
                <th style="border: 1px solid black;">$ {{ number_format(($Ficha->Tot3 * $Total) / 100, 2, '.', ',') }}
                </th>
                <th style="border: 1px solid black;"><b>{{ $Ficha->Tot3 }} %</b></th>
                <th style="border: 1px solid black;">{{ $Ficha->comisionista3->Nombre }}</th>
            </tr>
        @endif
        @if ($Ficha->comis4_id != '')
            <tr>
                <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>COM. EXT. IV:</b></th>
                <th style="border: 1px solid black;">$ {{ number_format(($Ficha->Tot4 * $Total) / 100, 2, '.', ',') }}
                </th>
                <th style="border: 1px solid black;"><b>{{ $Ficha->Tot4 }} %</b></th>
                <th style="border: 1px solid black;">{{ $Ficha->comisionista4->Nombre }}</th>
            </tr>
        @endif
        @if ($Ficha->comis5_id != '')
            <tr>
                <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>COM. EXT. V:</b></th>
                <th style="border: 1px solid black;">$ {{ number_format(($Ficha->Tot5 * $Total) / 100, 2, '.', ',') }}
                </th>
                <th style="border: 1px solid black;"><b>{{ $Ficha->Tot5 }} %</b></th>
                <th style="border: 1px solid black;">{{ $Ficha->comisionista5->Nombre }}</th>
            </tr>
        @endif
        @if ($Ficha->CRT)
            <tr>
                <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>REINTEGRO:</b></th>
                <th style="text-align: right; border: 1px solid black; background-color: #f1dede;">
                    <b>$ {{ number_format($Ficha->Reintegro, 2, '.', ',') }}</b>
                </th>
                <th style="border: 1px solid black;" colspan="2"></th>
            </tr>        
        @else
            <tr>
                <th style="text-align: right; border: 1px solid black; background-color: #d1cece;"><b>REINTEGRO:</b></th>
                <th style="text-align: right; border: 1px solid black; background-color: #f1dede;">
                    <b>$ {{ number_format($Total - ($Ficha->Comision * $Total) / 100, 2, '.', ',') }}</b>
                </th>
                <th style="border: 1px solid black;" colspan="2"></th>
            </tr>
        @endif
    </tbody>
</table>
