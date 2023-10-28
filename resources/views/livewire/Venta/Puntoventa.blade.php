<div>
    @if ($ModalP)
        @include('livewire.venta.ModalP')
    @endif
    @if ($ModalC)
        @include('livewire.venta.ModalC')
    @endif
    @if ($ModalCOT)
        @include('livewire.venta.ModalCOT')
    @endif
    @if ($ModalV)
        @include('livewire.venta.ModalV')
    @endif
    @if ($ModalCobro)
        @include('livewire.venta.ModalCobrar')
    @endif
    <div class="container mt-14 ml-2">
        <div class="panelPV etiqueta">
            <table>
                <tr>
                    <th class="px-2 bg-white">
                        <div class="etiquetaI">
                            <i class="bi bi-person"></i>
                        </div>
                    </th>
                    <th class="bg-white">
                        <input type="text" wire:model='Emp' class="inputCB" placeholder="EMPLEADO" disabled="false" />
                    </th>
                    <th class="px-2 bg-white">
                        <div class="etiquetaI">
                            <i class="bi bi-person"></i>
                        </div>
                    </th>
                    <th class="bg-white">
                        <input type="text" wire:model='Cli' class="inputCB" placeholder="CLIENTE" disabled="false" />
                    </th>
                </tr>
            </table>
            <div class="flex">
                <div class="tableFixHead">
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
                                    Acciones
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
                                            <button class="botonei" wire:click="eliminarP({{ $Producto->id }})">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="ml-10">
                    <table class="tablaPVBOT">
                        <tr>
                            <th class=" text-center tracking-wider" colspan="2">
                                <button class="botonPVPROMO" wire:click="">
                                    <img
                                        src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/p1.jpg">
                                </button>
                            </th>
                        </tr>
                        <tr class="datosT text-center ">
                            <td class="py-4">
                                <button class="botonPV" wire:click="abrirModal(1)">
                                    <img
                                        src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/lupa.png">
                                    <p>Productos</p>
                                </button>
                            </td>
                            <td class="">
                                <button class="botonPV" wire:click="abrirModal(2)">
                                    <img
                                        src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/persona.png">
                                    <p>Clientes</p>
                                </button>
                            </td>
                        </tr>
                        <tr class="datosT text-center">
                            <td class="py-4">
                                <button class="botonPV " wire:click="abrirModal(3)">
                                    <img
                                        src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/recibo.png">
                                    <p>Cotización</p>
                                </button>
                            </td>
                            <td class="">
                                <button class="botonPV " wire:click="">
                                    <img
                                        src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/venta.png">
                                    <p>Ventas</p>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="panelPVBOT pb-2">
                <table class="ml-4 mt-1">
                    <tr class="datosT text-center">
                        <td class="px-4 py-2 border border-black">
                            <b>
                                <p class="text-black whitespace-no-wrap">ARTICULOS: {{ $TArt }}</p>
                            </b>
                        </td>
                        <td class=" border border-black" rowspan="2">
                            <b>
                                <button class="botonCOB " wire:click="abrirModal(5)">
                                    <img
                                        src="https://raw.githubusercontent.com/AngelManuelCerecedo/LOGO-CBTIS/main/Cobrar.png">
                                    <p>COBRAR</p>
                                </button>
                            </b>
                        </td>
                        <td class="px-28 py-2 border border-black" rowspan="2">
                            <b>
                                <p class="etiquetaTP whitespace-no-wrap">TOTAL: ${{ $Total }}
                                <p>
                            </b>
                        </td>
                    </tr>
                    <tr class="datosT text-left">
                        <td class="px-16 py-2 border border-black">
                            <b>
                                <p class="text-black whitespace-no-wrap"></p>
                            </b>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
