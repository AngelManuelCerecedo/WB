<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <!-- Fondo oscuro del modal -->
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Contenido del modal -->
        <div class="inline-block bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl md:max-w-7xl"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <!-- Encabezado del modal -->
            <div class="p-6">
                <h2 class="text-xl font-bold mb-3 text-center">Movimientos</h2>
            </div>
            <!-- Contenido principal del modal -->
            <div class="p-6">
                <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Ingresos y Egresos</h2>
                <div class="tableFixHeadCOT">
                    <table class="tablaPV w-full">
                        <thead class="etiqueta">
                            <tr class="text-center">
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Folio de Ficha</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Movimiento</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Fecha</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Importe</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Beneficiario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($this->BIAUX == 72)
                                @foreach ($movimientos as $movimiento)
                                    @if ($movimiento->Movimiento == 'Deposito' || $movimiento->Movimiento == 'Gasto')
                                        <tr class="text-center">
                                            @if ($movimiento->fichaG_id)
                                                @if ($movimiento->fichaG_id == 72)
                                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->fichaG->Folio }}</td>
                                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Movimiento }}</td>
                                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Fecha }}</td>
                                                    @if ($movimiento->fichaG_id)
                                                        <td class="px-6 py-4 whitespace-no-wrap">$ {{ number_format($movimiento->Total, 2) }}</td>
                                                    @endif
                                                    @if ($movimiento->fichaD_id)
                                                        <td class="px-6 py-4 whitespace-no-wrap">$ {{ number_format(($movimiento->fichaI->ComisionWB * $movimiento->fichaI->Total) / 100,2)  }}</td>
                                                    @endif
                                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Beneficiario }}</td>
                                                @endif
                                            @elseif ($movimiento->fichaI->Folio != $this->AUXFOLIO)
                                                <?php 
                                                    $this->AUXFOLIO = $movimiento->fichaI->Folio;
                                                    $this->CERO = ($movimiento->fichaI->ComisionWB * $movimiento->fichaI->Total) / 100;
                                                ?>
                                                @if ($this->CERO)
                                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->fichaI->Folio }}</td>
                                                    <td class="px-6 py-4 whitespace-no-wrap">Comisiones</td>
                                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Fecha }}</td>
                                                    @if ($movimiento->fichaG_id)
                                                        <td class="px-6 py-4 whitespace-no-wrap">$ {{ number_format($movimiento->Total, 2) }}</td>
                                                    @endif
                                                    @if ($movimiento->fichaD_id)
                                                        <td class="px-6 py-4 whitespace-no-wrap">$ {{ number_format(($movimiento->fichaI->ComisionWB * $movimiento->fichaI->Total) / 100,2)  }}</td>
                                                    @endif
                                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Beneficiario }}</td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($movimientos as $movimiento)
                                    @if ($movimiento->Movimiento != 'Transferencia')
                                        <tr class="text-center">
                                            @if ($movimiento->fichaG_id)
                                                <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->fichaG->Folio }}</td>
                                            @endif
                                            @if ($movimiento->fichaD_id)
                                                <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->fichaI->Folio }}</td>
                                            @endif
                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Movimiento }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Fecha }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap">$ {{ number_format($movimiento->Total, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Beneficiario }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Transferencias Interbancarias</h2>
                <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Transferencias Enviadas</h2>
                <div class="tableFixHeadCOT">
                    <table class="tablaPV w-full">
                        <thead class="etiqueta">
                            <tr class="text-center">
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Id</th>
                                <th class="px-8 py-2 bg-sky-200 border border-gray-100">Fecha</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Cuenta Destino</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Concepto</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Importe</th>
                                <th class="px-2 py-2 bg-sky-200 border border-gray-100">Empleado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($this->BIAUX == 72)
                                @foreach ($movimientos as $movimiento)
                                    @if ($movimiento->Movimiento == 'Transferencia' && $movimiento->banco_id == 72)
                                        <tr class="text-center">
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->id }}</td>
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->Fecha }}</td>
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->empresaD->NCorto }} - {{ $movimiento->bancoD->Cuenta }}</td>
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->Concepto }}</td>                                        
                                            <td class="py-4 whitespace-no-wrap">${{ number_format($movimiento->Total, 2) }}</td>
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->empleado->Nombre }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($movimientos as $movimiento)
                                    @if ($movimiento->Movimiento == 'Transferencia' )
                                        <tr class="text-center">
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->id }}</td>
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->Fecha }}</td>
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->empresaD->NCorto }} - {{ $movimiento->bancoD->Cuenta }}</td>
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->Concepto }}</td>                                        
                                            <td class="py-4 whitespace-no-wrap">${{ number_format($movimiento->Total, 2) }}</td>
                                            <td class="py-4 whitespace-no-wrap">{{ $movimiento->empleado->Nombre }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Transferencias Recibidas</h2>
                <div class="tableFixHeadCOT">
                    <table class="tablaPV w-full">
                        <thead class="etiqueta">
                            <tr class="text-center">
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Id</th>
                                <th class="px-8 py-2 bg-sky-200 border border-gray-100">Fecha</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Cuenta Origen</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Concepto</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Importe</th>
                                <th class="px-2 py-2 bg-sky-200 border border-gray-100">Empleado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientosR as $movimiento)
                                @if ($movimiento->Movimiento == 'Transferencia')
                                    <tr class="text-center">
                                        <td class="py-4 whitespace-no-wrap">{{ $movimiento->id }}</td>
                                        <td class="py-4 whitespace-no-wrap">{{ $movimiento->Fecha }}</td>
                                        <td class="py-4 whitespace-no-wrap">{{ $movimiento->empresa->NCorto }} - {{ $movimiento->banco->Cuenta }}</td>
                                        <td class="py-4 whitespace-no-wrap">{{ $movimiento->Concepto }}</td>                                        
                                        <td class="py-4 whitespace-no-wrap">${{ number_format($movimiento->Total, 2) }}</td>
                                        <td class="py-4 whitespace-no-wrap">{{ $movimiento->empleado->Nombre }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pie del modal -->
            <div class="flex items-center justify-center p-6 border-t border-solid border-slate-200 rounded-b">
                <button type="button" wire:click="cerrarModal()"
                    class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">
                    Regresar
                </button>
            </div>
        </div>
    </div>
</div>
