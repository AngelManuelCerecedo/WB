<div>
    @if ($modalMOV)
        @include('livewire.credito.modalMOV')
    @endif
    <div class="container">
        @if (auth()->user()->empleado->Rol == 'Mostrador')
            <div class="py-8 ml-32 mt-8">
            @else
                <div class="py-8">
        @endif
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-80">Créditos</h2>
            <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Contabilidad <i
                    class="bi bi-chevron-right"></i> Créditos</label>
        </div>
        <div class="panel">
            <div class="flex">
                <label class="datos mt-16 ml-4"> Datos</label>
                <div class="ml-12 mt-16">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Folio Venta</label>
                            <input type="text" wire:model='FV' class="inputM" disabled="false" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                            <label class="etiqueta">Importe del Crédito</label>
                            <input type="text" wire:model='IC' class="input" placeholder="Código de Barras"
                                disabled="false" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                            <label class="etiqueta">Importe Pagado</label>
                            <input type="text" wire:model='IP' class="input" placeholder="Calve del Producto"
                                disabled="false" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                            <label class="etiqueta">Importe Pendiente</label>
                            <input type="text" wire:model='IPE' class="input" placeholder="Calve del Producto"
                                disabled="false" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Cliente</label>
                            <input type="text" wire:model='CLI' class="input" placeholder="Calve del Producto"
                                disabled="false" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="ml-32 mt-8 ">
                    <div class="md:flex items-center">
                        <button class="botonL" wire:click="abrirModal()">
                            <i class="bi bi-plus"></i>
                            Agregar Movimiento
                        </button>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="tableFixHeadLOT mt-4">
                            <table class="tablaLOT">
                                <thead class="etiqueta">
                                    <tr class="text-center">
                                        <th class="px-10 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                            Movimiento
                                        </th>
                                        <th class="px-10 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                            Fecha
                                        </th>
                                        <th class="px-4 py-1 border border-gray-100 bg-sky-200  tracking-wider ">
                                            Importe
                                        </th>
                                        <th class="px-40 py-1 border border-gray-100 bg-sky-200 tracking-wider ">
                                            Observaciones
                                        </th>
                                    </tr>
                                </thead>
                                @if ($Pagos)
                                    @foreach ($Pagos as $Pago)
                                        <tbody>
                                            <tr class="text-center">
                                                <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                    <p class="text-black whitespace-no-wrap">
                                                        Abono
                                                </td>
                                                <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                    <p class="text-black whitespace-no-wrap">
                                                        {{ $Pago->Fecha }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-3 border border-gray-200">
                                                    <p class="whitespace-no-wrap" style="color: #00ACAC">
                                                        <b>{{ $Pago->Abono }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                    <p class="text-black whitespace-no-wrap">
                                                        {{ $Pago->Observaciones }}
                                                    </p>
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
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            @if (auth()->user()->empleado->Rol == 'Mostrador')
                                <a href="{{ route('PuntoVenta') }}">
                                @else
                                    <a href="{{ route('Creditos') }}">
                            @endif
                            <button class="botonr">
                                <i class="bi bi-chevron-left"></i>
                                Regresar
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
