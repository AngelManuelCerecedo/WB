<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 ">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 ">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block  align-bottom bg-white rounded-lg text-left  shadow-xl transform transition-all sm:my-8 sm:align-middle sm: max-w-lg md:max-w-4xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <div class="  items-center justify-center  pb-3 ml-3">
                <div class="grid    w-auto ">
                    <h2 class="text-xl  font-bold ml-3 mb-3 mt-3 text-center">AGREGAR LOTE</h2>
                    <p class="text-xl ml-3 mb-3 mt-3 text-center"><b>PRODUCTO:</b> {{ $Producto->Nombre }} </p>
                    <div class="p-8 mt-6 lg:mt-0 rounded shadow">
                        <div class="md:flex items-center justify-center">
                            <div class="flex flex-col  md:mt-0 mr-8">
                                <label class="etiqueta">Numero de Lote</label>
                                <input type="text" wire:model='NumLot' class="input" />
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-8">
                                <label class="etiqueta">Fecha de Caducidad</label>
                                <input type="date" wire:model='FechaCad' class="input" />
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-8">
                                <label class="etiqueta">Cantidad</label>
                                <input type="number" wire:model='AUXCANTIDAD' class="input" />
                            </div>
                        </div>
                        <div class="ml-12">
                            @if ($Lotes)
                                <table class="mt-4">
                                    <thead class="etiqueta">
                                        <tr>
                                            <th
                                                class="px-20 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                                Lote
                                            </th>
                                            <th
                                                class="px-20 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                                Fecha de Caducidad
                                            </th>
                                            <th
                                                class="px-20 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                                Cantidad
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="block md:table-row-group etiquetaTABLACOMP ">
                                        @foreach ($Lotes as $Lote)
                                            <tr>
                                                <td class="py-4 border border-gray-200 bg-white text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $Lote->Numero }}
                                                    </p>
                                                </td>
                                                <td class="border border-gray-200 bg-white ">
                                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                                        {{ $Lote->Fecha }}
                                                    </p>
                                                </td>
                                                <td class="border border-gray-200 bg-white ">
                                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                                        {{ $Lote->Cantidad }}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="px-6 py-4 mt-20">
                                    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700"
                                        role="alert">
                                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <span class="font-medium">Info: </span> Lista vacia
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-6 border-t border-solid border-slate-200 rounded-b">
                <div class="ml-20">
                    <button class="botoni" wire:click="guardarlote()">
                        Guardar
                    </button>
                </div>
                <div class="ml-96">
                    <button class="botone" wire:click="cerrarModal()">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
