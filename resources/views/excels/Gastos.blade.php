<table>
    <thead>
        <tr>
            <th style="text-align: center; border: 1px solid black; background-color: #8EA9DB; font-size: 22px;" colspan="6">
                <b>{{$Periodo}}</b>
            </th>
        </tr>
        <tr>
            <th style="width: 100px; text-align: center; border: 1px solid black; background-color: #8EA9DB; font-size: 17px;">
                <b>FECHA:</b>
            </th>
            <th style="width: 300px; text-align: center; border: 1px solid black; background-color: #8EA9DB; font-size: 17px;">
                <b>NOMBRE BENEFICIARIO:</b>
            </th>
            <th style="width: 300px; text-align: center; border: 1px solid black; background-color: #8EA9DB; font-size: 17px;">
                <b>CONCEPTO:</b>
            </th>
            <th style="width: 100px; text-align: center; border: 1px solid black; background-color: #8EA9DB; font-size: 17px;">
                <b>MONTO:</b>
            </th>
            <th style="width: 150px; text-align: center; border: 1px solid black; background-color: #8EA9DB; font-size: 17px;">
                <b>EMPRESA:</b>
            </th>
            <th style="width: 200px; text-align: center; border: 1px solid black; background-color: #8EA9DB; font-size: 17px;">
                <b>CUENTA DEPOSITO:</b>
            </th>
        </tr>
    </thead>
    <tbody>
        @php
            $fechaAnterior = null;
        @endphp
        
        <tr>
            <th style="text-align: left; border: 1px solid black; background-color: #70AD47;" colspan="6"></th>
        </tr>
        
        @foreach ($Gastos as $gasto)
            @php
                $fechaActual = \Carbon\Carbon::parse($gasto->Fecha)->format('Y-m-d');
            @endphp
        
            @if ($fechaAnterior !== $fechaActual)
                @if ($fechaAnterior !== null)
                    <tr>
                        <th style="text-align: left; border: 1px solid black; background-color: #70AD47;" colspan="6"></th>
                    </tr>
                @endif
        
                @php
                    $fechaAnterior = $fechaActual;
                @endphp
            @endif
        
            <tr>
                <th style="text-align: center; border: 1px solid black;">{{ $gasto->Fecha }}</th>
                <th style="text-align: center; border: 1px solid black;">{{ $gasto->beneficiario->Nombre }}</th>
                <th style="border: 1px solid black;">{{ $gasto->Obs }}</th>
                <th style="text-align: right; border: 1px solid black;">${{ number_format($gasto->Total, 2) }}</th>
                <th style="text-align: center; border: 1px solid black;">{{ $gasto->empresa->NCorto }}</th>
                <th style="text-align: left; border: 1px solid black;">{{ $gasto->Cuenta }}</th>
            </tr>
        @endforeach
    </tbody>
</table>
