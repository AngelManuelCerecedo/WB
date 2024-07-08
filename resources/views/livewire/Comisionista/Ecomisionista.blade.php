<form>
    <div>
        @if ($ModalPag)
            @include('livewire.Comisionista.ModalPag')
        @endif
        <div class="space-y-12 ml-8 mr-8">
            <div class="border-b border-gray-900/10 pb-8">
                <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Registro de Comisionistas</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                        <div class="mt-2">
                            <input type="text" wire:model='Nom' autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                <div class="w-full mt-4">
                    <div class="tableFixHead">
                        <table class="tabla">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Folio Ficha</th>
                                    <th>Total Comisión</th>
                                    <th>Total Pagado</th>
                                    <th>Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($Comisiones)
                                    @foreach ($Comisiones as $comision)
                                        <tr>
                                            @foreach ($PagosCom as $pago)
                                                @if ($comision->id == $pago->fichaD_id)
                                                    <var {{ $AuxCom += $pago->Total }}>
                                                @endif
                                            @endforeach
                                            @if ($comision->comis1_id == $ide)
                                                <var
                                                    {{ $AuxComPendiente = ($comision->Tot1 * $comision->Total) / 100 }}>
                                            @endif
                                            @if ($comision->comis2_id == $ide)
                                                <var
                                                    {{ $AuxComPendiente = ($comision->Tot2 * $comision->Total) / 100 }}>
                                            @endif
                                            @if ($comision->comis3_id == $ide)
                                                <var
                                                    {{ $AuxComPendiente = ($comision->Tot3 * $comision->Total) / 100 }}>
                                            @endif
                                            @if ($comision->comis4_id == $ide)
                                                <var
                                                    {{ $AuxComPendiente = ($comision->Tot4 * $comision->Total) / 100 }}>
                                            @endif
                                            @if ($comision->comis5_id == $ide)
                                                <var
                                                    {{ $AuxComPendiente = ($comision->Tot5 * $comision->Total) / 100 }}>
                                            @endif
                                            @if ($AuxComPendiente == $AuxCom)
                                                <td data-label="ACCIONES :" class="lg:w-1/12">
                                                    <div style="display: flex; justify-content: center;">
                                                        <button class="botonDETALLES" type="button"
                                                            wire:click="abrirModal({{ $comision->id }})">
                                                            <i class="bi bi-layout-text-sidebar-reverse"></i>
                                                            <span class="ml-2 ">Detalles</span>
                                                        </button>
                                                    </div>
                                                </td>
                                            @else
                                                <td data-label="ACCIONES :" class="lg:w-1/12">
                                                    <div style="display: flex; justify-content: center;">
                                                        <button class="botonDETALLES" type="button"
                                                            wire:click="abrirModal({{ $comision->id }})">
                                                            <i class="bi bi-layout-text-sidebar-reverse"></i>
                                                            <span class="ml-2 ">Detalles</span>
                                                        </button>
                                                        <button class="botonPAGOS ml-2" type="button"
                                                            wire:click="abrirModal({{ $comision->id }})">
                                                            <i class="bi bi-cash-stack"></i>
                                                            <span class="ml-2 ">Pagar</span>
                                                        </button>
                                                    </div>
                                                </td>
                                            @endif
                                            <td data-label="Folio :">{{ $comision->Folio }}</td>
                                            <td data-label="Total Com:">$
                                                {{ number_format($AuxComPendiente, 2, '.', ',') }}
                                            </td>
                                            <td data-label="Total Pag :">$ {{ number_format($AuxCom, 2, '.', ',') }}
                                            </td>
                                            @if ($AuxComPendiente == $AuxCom)
                                                <td data-label="Estatus :">Comision Pagada</td>
                                            @else
                                                <td data-label="Estatus :">Pendiente</td>
                                            @endif
                                        </tr>
                                        <var {{ $AuxCom = 0 }}>
                                            <var {{ $AuxComPendiente = 0 }}>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2 mb-2 flex items-center justify-end gap-x-6 mr-8">
            <a href="{{ route('Comisionistas') }}">
                <button type="button"
                    class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Regresar</button>
            </a>
            <button type="button" wire:click="actualizar()"
                class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">Guardar</button>
        </div>
    </div>
</form>
