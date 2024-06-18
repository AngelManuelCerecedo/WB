<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <!-- Fondo oscuro del modal -->
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Contenido del modal -->
        <div class="inline-block bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg md:max-w-4xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <!-- Encabezado del modal -->
            <div class="p-6">
                <h2 class="text-xl font-bold mb-3 text-center">Movimientos</h2>
            </div>

            <!-- Contenido principal del modal -->
            <div class="p-6">
                <div class="tableFixHeadCOT">
                    <table class="tablaPV w-full">
                        <thead class="etiqueta">
                            <tr class="text-center">
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Id de Ficha</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Movimiento</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Fecha</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Importe</th>
                                <th class="px-6 py-2 bg-sky-200 border border-gray-100">Empleado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $movimiento)
                                @php
                                    $tipo = $movimiento instanceof App\Models\Gasto ? 'Depósito' : 'Gasto';
                                @endphp
                                <tr class="text-center">
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->ficha_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $tipo }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $movimiento->Fecha }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">${{ number_format($movimiento->Total, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">Empleado</td>
                                </tr>
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
