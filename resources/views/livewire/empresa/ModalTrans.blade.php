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
                <h2 class="text-xl font-bold mb-3 text-center">Transferencia de Recursos</h2>
            </div>

            <!-- Contenido principal del modal -->
            <div class="p-6">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Fecha</label>
                        <input type="date" wire:model='Fecha'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Monto</label>
                        <input type="number" wire:model='Monto'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="sm:col-span-3 sm:col-start-1">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Empresa</label>
                        <div class="mt-1" wire:ignore>
                            <select id="select6" class="buscador" wire:model="empresaSeleccionadaId">
                                <option value="">Seleccione una Empresa</option>
                                @foreach ($Empresas as $empresa)
                                    <option value="{{ $empresa->id }}">
                                        {{ $empresa->NCorto }}
                                        -
                                        {{ $empresa->Nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label class="block text-sm font-medium leading-6 text-gray-900">Banco</label>
                        <select wire:model='Banco'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Seleccione una Opción</option>
                            @if ($BancosModal)
                                @foreach ($BancosModal as $banco)
                                    <option value="{{ $banco->id }}">
                                        {{ $banco->Nombre }}
                                        -
                                        {{ $banco->Cuenta }}
                                        -
                                        ${{ number_format($banco->Total, 2) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Concepto</label>
                        <input type="text" wire:model='Concepto'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>

            <!-- Pie del modal -->
            <div class="flex items-center justify-center p-6 border-t border-solid border-slate-200 rounded-b">
                <button type="button" wire:click="cerrarModalTrans()"
                    class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">
                    Regresar
                </button>
                <button type="button" wire:click="transferir()"
                    class="ml-2 rounded-md bg-green-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-300">
                    Realizar Transferencia
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#select6').select2();
        $('#select6').on('change', function(e) {
            let valor = $('#select6').select2("val");
            @this.set('searchE', valor);
        });
    });
</script>
