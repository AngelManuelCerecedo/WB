<div class="container">
    @if (true)
        <div class="py-8 ml-32 mt-8">
        @else
            <div class="py-8 mt-8">
    @endif
    <div class="flex mb-4">
        <h2 class="text-4xl titulos mr-96">Venta</h2>
        <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Operación <i class="bi bi-chevron-right"></i>
            Venta</label>
    </div>
    <div class="panel">
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="ml-4 mt-16 flex-col">
                <div class="md:flex items-center">
                    <div class="flex flex-col  md:mt-0 mr-8">
                        <label class="etiqueta">Folio de Venta</label>
                        <input type="text" wire:model='Folio' class="input" disabled="false" />
                    </div>
                    <div class="flex flex-col  md:mt-0 mr-8">
                        <label class="etiqueta">Empleado</label>
                        <input type="text" wire:model='Empleado' class="input" disabled="false" />
                    </div>
                    <div class="flex flex-col  md:mt-0 mr-8 ">
                        <label class="etiqueta">Sucursal</label>
                        <input type="text" wire:model='Sucursal' />
                    </div>
                    <div class="flex flex-col  md:mt-0 mt-4">
                        <label class="etiqueta">Forma de Pago</label>
                        <input type="text" wire:model='FP' />
                    </div>
                </div>
                <div class="md:flex items-center mt-2">
                    <div class="flex flex-col  md:mt-0 mr-8">
                        <label class="etiqueta">Fecha</label>
                        <input type="text" wire:model='Fecha' disabled="false" />
                    </div>
                </div>
                <hr class="my-4">
            </div>
        </div>
        @if ($ListaFT)
            <div class="tableFixHead ml-4">
                <table class="tablaPV mt-2">
                    <thead class="etiqueta">
                        <tr>
                            <th class="px-6 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                Cantidad
                            </th>
                            <th class="px-10 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                Unidad
                            </th>
                            <th class="px-44 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                Producto
                            </th>
                            <th class="px-6 py-1 border border-gray-100 bg-sky-200  tracking-wider ">
                                Descuento
                            </th>
                            <th class="px-8 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                Precio
                            </th>
                            <th class="px-8 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                Total
                            </th>
                        </tr>
                    </thead>
                    @if ($ListaFT)
                        @foreach ($ListaFT as $Producto)
                            <var {{ $Total += $Producto->Cantidad * $Producto->Precio - $Producto->Descuento }} />
                            <var {{ $TArt += $Producto->Cantidad }} />
                            <tbody>
                                <tr class="text-center">
                                    <td class=" py-2 border border-gray-200">
                                        <p class="text-black whitespace-no-wrap">{{ $Producto->Cantidad }}</p>
                                    </td>
                                    <td class=" py-3 border border-gray-200">
                                        <p class="text-black whitespace-no-wrap">
                                            {{ $Producto->Producto->Unidad->Nombre }}</p>
                                    </td>
                                    <td class=" py-3 border border-gray-200 text-left">
                                        <p class="text-black whitespace-no-wrap ml-1">
                                            {{ $Producto->Producto->Nombre }}</p>
                                    </td>
                                    <td class=" py-3 border border-gray-200">
                                        <p class="text-black whitespace-no-wrap">{{ $Producto->Descuento }}</p>
                                    </td>
                                    <td class=" py-3 border border-gray-200">
                                        <p class="text-black whitespace-no-wrap">{{ $Producto->Precio }}</p>
                                    </td>
                                    <td class=" py-3 border border-gray-200">
                                        <p class="text-black whitespace-no-wrap">
                                            ${{ number_format($Producto->Cantidad * $Producto->Precio - $Producto->Descuento, 2) }}
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    @endif
                    <tfoot class="border border-gray-200 border-top">
                        <tr>
                            <td class="etiquetaT">
                                <b>
                                    <p class="text-center">{{ $TArt }}</p>
                                </b>
                            </td>
                            <td class="">
                            </td>
                            <td class="">
                            </td>
                            <td class="">
                            </td>
                            <td class="etiquetaT">
                            </td>
                            <td class="etiquetaT">
                                <b>
                                    <p class="text-center">${{ number_format($Total, 2) }}</p>
                                </b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @else
            <div class="px-6 py-4 mt-20">
                <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
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
        <hr class="mt-12 my-2 text-white">
        <div class="flex">
            <div class="ml-12 mt-4 mb-4">
                <div class="md:flex items-center">
                    <div class="flex flex-col mr-96">
                        @if (true)
                            <a href="{{ route('PuntoVenta') }}">
                            @else
                                <a href="{{ route('Ventas') }}">
                        @endif
                        <button class="botonr">
                            <i class="bi bi-chevron-left"></i>
                            Regresar
                        </button>
                        </a>
                    </div>
                    <div class="ml-10">
                        <button class="botonCP" wire:click="ingresar()">
                            <i class="bi bi-receipt"></i>
                            Imprimir Ticket
                        </button>
                    </div>
                    <div class="ml-10 ">
                        <button class="botonRC" wire:click="rechazar()">
                            <i class="bi bi-file-earmark-ruled"></i>
                            Realizar Factura
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
