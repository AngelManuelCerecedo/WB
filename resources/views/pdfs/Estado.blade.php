<!DOCTYPE html>
<meta charset="UTF-8" data-lt-installed="true">
<style type="text/css">
    @page {
        margin: .5cm .5cm;
    }

    .i1 {
        width: 140px;
        height: 80px;
        margin-bottom: 50px;
    }

    .t1 {
        font-family: 'Raleway', sans-serif;
        font-size: 25px;

        font-weight: bold;
    }

    .linea {
        margin-top: -50px;
        margin-bottom: 30px;
        color: #2EC0DF;
    }

    .ttt {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: left;
        height: 15px;
    }

    .tt1 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: center;
        background-color: white;
        height: 10px;
        border-bottom: 1px solid #ddd;
    }

    .tt2 {
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        text-align: center;
        background-color: rgb(223, 239, 247);
        height: 10px;
    }

    .tc1 {
        font-family: 'Raleway', sans-serif;
        font-size: 13px;
        text-align: left;
        font-weight: bold;
    }

    .tc2 {
        font-family: 'Raleway', sans-serif;
        font-size: 13px;
        background-color: rgb(223, 239, 247);
    }

    .TTT {
        font-family: 'Raleway', sans-serif;
        font-size: 17px;
        color: white;
        background-color: rgb(0, 125, 192);
        text-align: center;
    }

    .headt td {
        height: 27px;
    }
</style>
<table style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 25%;">
                <img src="{{ asset('Imagenes/WB.jpg') }}" class="i1">
            </td>
            <td style="width: 10%;" class="t1"> </td>
            <td style="width: 21%;" class="t1">ESTADO DE CUENTA</td>
        </tr>
    </tbody>
</table>
<div class="linea">
    <hr>
</div>

<body>
    <table style="width: 100%; margin-top: -1%">
        <tbody>
            <tr>
                <td class="tc1">
                    NOMBRE
                </td>
                <td class="tc2">
                    {{ $Empresa->Nombre }}
                </td>
                <td class="tc1">
                    NOMBRE CORTO
                </td>
                <td class="tc2">
                    {{ $Empresa->NCorto }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    BANCO
                </td>
                <td class="tc2">
                    {{ $Banco->Nombre }}
                </td>
                <td class="tc1">
                    CUENTA
                </td>
                <td class="tc2">
                    {{ $Banco->Cuenta }}
                </td>
            </tr>
            <tr>
                <td class="tc1">
                    FECHA
                </td>
                <td class="tc2">
                    {{ date('d-m-Y') }}
                </td>
                <td class="tc1">
                    SALDO
                </td>
                <td class="tc2">
                    -
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%; margin-top: 2%">
        <thead class="ttt">
            <tr>
                <td class="TTT" colspan="7">
                    <strong>DETALLES DE MOVIMIENTOS</strong>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #000000; text-align: center;">
                <td style="width: 10%;"><strong>FECHA</strong></td>
                <td style="width: 10%;"><strong>MOV</strong></td>
                <td style="width: 25%;"><strong>CONCEPTO</strong></td>
                <td style="width: 25%;"><strong>CUENTA D/O</strong></td>
                <td style="width: 10%;"><strong>RETIRO</strong></td>
                <td style="width: 10%;"><strong>DEPÓSITO</strong></td>
                <td style="width: 15%;"><strong>SALDO</strong></td>
            </tr>
        </thead>
        <tbody>
            {{ $Saldo = $Banco->SaldoI }}
            <tr class="tt1">
                <td colspan="6"><strong>SALDO INICIAL EN LA CUENTA</strong></td>
                <td><strong>${{ number_format($Banco->SaldoI, 2) }}</strong></td>
            </tr>
            @foreach ($Movimientos as $movimiento)
                <tr class="tt1">
                    <?php
                        // Asegúrate de que $movimiento->Fecha sea un objeto de tipo DateTime o una cadena de fecha válida
                        $fechaFormateada = \Carbon\Carbon::parse($movimiento->Fecha)->format('d-m-Y');
                    ?>
                    <td>
                        {{ $fechaFormateada }}
                    </td>
                    @if ($movimiento->Movimiento == 'Transferencia')
                        <td>T</td>
                    @endif
                    @if ($movimiento->Movimiento == 'Pago Reintegro') 
                        <td>R ({{ $movimiento->fichaI->Folio }})</td>
                    @endif
                    @if ($movimiento->Movimiento == 'Deposito')
                        <td>D ({{ $movimiento->fichaI->Folio }})</td>
                    @endif
                    @if ($movimiento->Movimiento == 'Gasto')
                        <td>G ({{ $movimiento->fichaG->Folio }})</td>
                    @endif
                    @if ($movimiento->Movimiento == 'Deposito')
                        <td>{{$movimiento->fichaI->cliente->ALIAS}}</td>
                    @else
                        <td>{{ $movimiento->Concepto }}</td>
                    @endif
                    @if ($movimiento->Movimiento == 'Transferencia')
                        @if ($movimiento->bancoD->id == $Banco->id)
                            <td>O:{{ $movimiento->empresa->NCorto }}</td>
                        @else
                            <td>D:{{ $movimiento->empresaD->NCorto }}</td>
                        @endif
                        @if ($movimiento->bancoD->id == $Banco->id)
                            <td></td>
                            <td style="color: green;">
                                ${{ number_format($movimiento->Total, 2) }}
                            </td>
                            {{ $Saldo += $movimiento->Total }}
                        @else
                            <td style="color: red;">
                                ${{ number_format($movimiento->Total, 2) }}
                            </td>
                            <td></td>
                            {{ $Saldo -= $movimiento->Total }}
                        @endif
                    @else
                        @if ($movimiento->Movimiento != 'Deposito')
                            <td>{{$movimiento->Beneficiario}}</td>
                            <td style="color: red;">
                                ${{ number_format($movimiento->Total, 2) }}
                            </td>
                            {{ $Saldo -= $movimiento->Total }}
                            <td></td>
                        @else
                            <td></td>
                            <td></td>
                            <td style="color: green;">
                                ${{ number_format($movimiento->Total, 2) }}
                            </td>
                            {{ $Saldo += $movimiento->Total }}
                        @endif
                    @endif
                    <td>
                        <strong>${{ number_format($Saldo, 2) }}</strong>
                    </td>
                </tr>
                @if ($loop->last)
                    <tr class="tt1">
                        <td colspan="6"><strong>SALDO FINAL EN LA CUENTA</strong></td>
                        <td>
                            <strong>${{ number_format($Saldo, 2) }}</strong>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
