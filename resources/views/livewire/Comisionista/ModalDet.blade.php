<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <!-- Fondo oscuro del modal -->
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Contenido del modal -->
        <div class="inline-block bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl md:max-w-5xl"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <!-- Encabezado del modal -->
            <div class="p-6">
                <h2 class="text-xl font-bold mb-3 text-center">Pagar Reintegro</h2>
            </div>

            <!-- Contenido principal del modal -->
            <div class="p-6">
                <div class="w-full mt-4">
                    <div class="tableFixHead">
                        <table class="tabla">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Beneficiario</th>
                                    <th>Concepto</th>
                                    <th>Empresa</th>
                                    <th>Cuenta</th>
                                    <th>Forma de Pago</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($Movimientos)
                                    @foreach ($Movimientos as $movimiento)
                                        <tr>
                                            <td data-label="Fecha :">{{ $movimiento->Fecha }}</td>
                                            <td data-label="Total :">$
                                                {{ number_format($movimiento->Total, 2, '.', ',') }}</td>
                                            <td data-label="Benefi. :">{{ $movimiento->Beneficiario }}</td>
                                            <td data-label="Concep. :">{{ $movimiento->Concepto }}</td>
                                            <td data-label="Emp. :">{{ $movimiento->empresa->NCorto }}</td>
                                            <td data-label="Cuenta :">{{ $movimiento->banco->Nombre }} -
                                                {{ $movimiento->Banco->Cuenta }}</td>
                                            <td data-label="FormaP. :">{{ $movimiento->formap->Nombre }}</td>
                                            <td data-label="Usu. :">{{ $movimiento->empleado->Nombre }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pie del modal -->
            <div class="flex items-center justify-center p-6 border-t border-solid border-slate-200 rounded-b">
                <button type="button" wire:click="cerrarModalDet()"
                    class="mr-20 rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">
                    Regresar
                </button>
                <button type="button" wire:click="cerrarModalDet()"
                    class="ml-2 rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-300">
                    Descargar
                </button>
            </div>

        </div>
    </div>
</div>
