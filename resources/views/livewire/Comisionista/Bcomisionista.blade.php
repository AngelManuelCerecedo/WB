<div class="w-full">
    <div class="bg-white border border-gray-200 rounded p-4">
        <div class=" flex sm:flex-row flex-col">
            <input type="text" placeholder="Buscar" wire:model="search"
                class="block  sm:w-full lg:w-1/2 xl:w-1/2 rounded-md border-0  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <div class="sm:ml-8 mt-1">
                <select wire:model="cantidad"
                    class="appearance-none h-full rounded-l border block lg:w-full bg-white border-gray-400 text-gray-700 py-2 px-5 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="sm:ml-8 mt-1">
                <a href="{{ route('RComisionistas') }}">
                    <button class="botoNUEVOSR">
                        <i class="bi bi-plus-lg text-lg"></i>
                        <span class="ml-2">Nuevo Comisionista</span>
                    </button>
                </a>
            </div>
            <div class="sm:ml-8 mt-2">
                <label><i class="bi bi-house-door-fill"></i> <i class="bi bi-chevron-right"></i> Catálogos <i
                        class="bi bi-chevron-right"></i> Comisionistas</label>
            </div>
        </div>
        <div class=" overflow-x-auto mt-4">
            @if ($comisionistas->count())
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Nombre</th>
                            <th>Comision Total</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comisionistas as $comisionista)
                            @php
                                $Taux = 0;
                                $Pagos = \App\Models\Movimientos::where([['comisionista_id', $comisionista->id],['Movimiento','Pago Comision']])->get();
                                foreach ($Pagos as $pago) {
                                    $Taux += $pago->Total;
                                }
                            @endphp
                            <tr>
                                <td data-label="ACCIONES :" class="lg:w-1/12">
                                    <a href="{{ route('EComisionista', [$comisionista->id]) }}">
                                        <button class="botonDETALLES">
                                            <i class="bi bi-layout-text-sidebar-reverse"></i>
                                            <span class="ml-2 ">Detalles</span>
                                        </button>
                                    </a>
                                </td>
                                <td data-label="NOMBRE :">{{ $comisionista->Nombre }}</td>
                                <td data-label="COM TOTAL :">${{ number_format($comisionista->Total, 2) }}</td>
                                <td data-label="SALDO :">${{ number_format($comisionista->Total - $Taux, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $comisionistas->links() }} <!-- Mostrar enlaces de paginación -->
            @else
                <div class="px-6 py-4">
                    <div class="flex font-sans bg-[#FA5C7C] rounded-lg p-4 mb-4 text-sm text-white" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <span class="font-medium">Info: </span> No se encontró ningún registro.
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
