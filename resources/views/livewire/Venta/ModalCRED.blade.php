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
                    <h2 class="text-xl  font-bold ml-3 mb-3 mt-3 text-center">CREDITOS</h2>
                    <div class="p-8 mt-6 lg:mt-0 rounded shadow">
                        <div class="items-center justify-center">
                            <div class="md:mt-0 mr-8">
                                <div class=" ml-4">
                                    <input placeholder="Buscar" wire:model="searchCRED"
                                        class="input appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                                </div>
                                <div class="flex">
                                    <div class="tableFixHeadCOT mt-4">
                                        <table class="tablaPV">
                                            <thead class="etiqueta">
                                                <tr class="text-center">
                                                    <th
                                                        class="px-16 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                                        Acciones
                                                    </th>
                                                    <th
                                                        class="px-16 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                                        Folio
                                                    </th>
                                                    <th
                                                        class="px-16 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                                        Importe
                                                    </th>
                                                    <th
                                                        class="px-16 py-1 border border-gray-100 bg-sky-200  tracking-wider ">
                                                        Cliente
                                                    </th>
                                                </tr>
                                            </thead>
                                            @if ($Creditos)
                                                @foreach ($Creditos as $credito)
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td class="px-3 py-2 border border-gray-200 bg-white">
                                                                <div class="flex">
                                                                    <div class="flex-shrink-0 w-10 h-10 ml-8">
                                                                        <a
                                                                            href="{{ route('PECredito', [$credito->id]) }}">
                                                                            <button class="botonm  mt-1">
                                                                                <i
                                                                                    class="bi bi-layout-text-sidebar-reverse"></i>
                                                                                <span class="ml-2 ">Detalles</span>
                                                                            </button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                                <p class="text-black whitespace-no-wrap">
                                                                    {{ $credito->Folio }}
                                                                </p>
                                                            </td>
                                                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                                <p class="whitespace-no-wrap" style="color: #00ACAC">
                                                                    <b>${{ $credito->Total }}
                                                            </td>
                                                            <td class="px-5 py-3 border border-gray-200">
                                                                @if ($credito->Cliente->TipoP == 'Moral')
                                                                    <p>{{ $credito->Cliente->NomCom }}</p>
                                                                @else
                                                                    <p>{{ $credito->Cliente->Nombre }}
                                                                        {{ $credito->Cliente->ApP }}
                                                                        {{ $credito->Cliente->ApM }}</p>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-6 border-t border-solid border-slate-200 rounded-b">
                <div class="ml-20">
                </div>
                <div class="ml-96">
                    <button class="botone" wire:click="cerrarModal(7)">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
