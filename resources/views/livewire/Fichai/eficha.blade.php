<form>
    <div class="space-y-12 ml-8 mr-8">
        <div class="border-b border-gray-900/10 pb-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Registro de Fichas</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-1">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Folio</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Folio' disabled
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Fecha</label>
                    <div class="mt-2">
                        <input type="date" wire:model='Fecha' disabled
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Estatus</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Estatus' disabled
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="first-name"
                        class="block text-sm font-medium leading-6 text-gray-900">Observaciones</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Obs' @if ($Estatus == 'Ingresada') disabled @endif
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Cliente</label>
                        <div class="mt-3" wire:ignore>
                            <select id="select1" class="buscador">
                                <option value="">Seleccione un Cliente</option>
                                @foreach ($Clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ $searchC == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->ALIAS }} - {{ $cliente->NOMBRE }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Cliente</label>
                        <div class="mt-2">
                            <input type="text" wire:model='Cliente' disabled
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                @endif
                <div class="sm:col-span-1 sm:col-start-1">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Movimientos</h2>
                </div>
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-1 sm:col-start-1">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Fecha del
                            Movimiento</label>
                        <input type="date" wire:model='FechaDep'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="sm:col-span-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Monto</label>
                        <input type="number" wire:model='Monto'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    <div class="sm:col-span-1">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Empresa</label>
                        <div class="mt-1" wire:ignore>
                            <select id="select2" class="buscador">
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
                    <div class="mt-1">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Banco</label>
                        <select wire:model='Banco'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Seleccione una Opción</option>
                            @if ($searchE && $Bancos)
                                @foreach ($Bancos as $banco)
                                    <option value="{{ $banco->id }}">
                                        {{ $banco->Nombre }}
                                        -
                                        {{ $banco->Cuenta }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="sm:col-span-1">
                        <div class="mt-7">
                            <button type="button" wire:click="agregarMov()"
                                class="rounded-md bg-blue-500 px-20 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400">Agregar</button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="w-full mt-4">
                <div class="tableFixHead">
                    <table class="tabla">
                        <thead>
                            <tr>
                                <th>Acciones</th>
                                <th>Fecha</th>
                                <th>Folio de Factura</th>
                                <th>Fecha de Factura</th>
                                <th>Empresa</th>
                                <th>Banco</th>
                                <th>Cuenta</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($Depositos)
                                @foreach ($Depositos as $deposito)
                                    <tr>
                                        @if ($Estatus == 'Registro')
                                            <td data-label="ACCIONES :" class="lg:w-1/12">
                                                <div style="display: flex; justify-content: center;">
                                                    <button type="button" wire:click="eliminarDep({{ $deposito->id }})"
                                                        class="rounded-md bg-red-500 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-400">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        @else
                                            <td data-label="ACCIONES :" class="lg:w-1/12">
                                            </td>
                                        @endif

                                        <td data-label="Fecha :">{{ $deposito->Fecha }}</td>
                                        <td data-label="Fh. Factura :">{{ $deposito->FechaF }}</td>
                                        <td data-label="F. Factura :">{{ $deposito->FolioF }}</td>
                                        <td data-label="Empresa :">{{ $deposito->empresa->Nombre }}</td>
                                        <td data-label="Banco :">{{ $deposito->banco->Nombre }}</td>
                                        <td data-label="Cuenta :">{{ $deposito->banco->Cuenta }}</td>
                                        <td data-label="Monto :" class="total-column">
                                            ${{ number_format($deposito->Total, 2, '.', ',') }}</td>
                                        <var {{ $Total += $deposito->Total }} />
                                    </tr>
                                @endforeach
                            @endif
                            <tr>
                                <td colspan="8" data-label="Total :" class="total-column">$
                                    {{ number_format($Total, 2, '.', ',') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mt-4">
                <div class="sm:col-span-1 sm:col-start-1">
                    <h2 class="text-base font-semibold leading-3 text-gray-900"></h2>
                </div>
                <div class="sm:col-span-1">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Comisiones</h2>
                </div>
                <div class="sm:col-span-1">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Porcentaje</h2>
                </div>
                <div class="sm:col-span-1">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Nombres o Claves</h2>
                </div>
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="number-base font-semibold leading-3 text-gray-900">Total</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='CT' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1">
                    <input type="number" wire:model='PT' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Gastos Fintech</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='GFT' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1">
                    <input type="number" wire:model='GFP' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Comision WB</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='CWB' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1">
                    <input type="number" wire:model='PWB' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Comisionista Externo I</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='CET1' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1">
                    <input type="number" wire:model='CEP1' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-1" wire:ignore>
                        <select id="select3" class="buscador" style="width: 100%;" wire:model="comis1_id">
                            <option value="NULL">Seleccione un Comisionista</option>
                            @foreach ($Comisionistas as $comisionista)
                                <option value="{{ $comisionista->id }}">
                                    {{ $comisionista->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="sm:col-span-1">
                        <input type="text" wire:model='NomC1' disabled
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                @endif
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="number-base font-semibold leading-3 text-gray-900">Comisionista Externo II</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='CET2' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1">
                    <input type="number" wire:model='CEP2' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-1" wire:ignore>
                        <select id="select4" class="buscador" style="width: 100%;" wire:model="comis2_id">
                            <option value="NULL">Seleccione un Comisionista</option>
                            @foreach ($Comisionistas as $comisionista)
                                <option value="{{ $comisionista->id }}">
                                    {{ $comisionista->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="sm:col-span-1">
                        <input type="text" wire:model='NomC2' disabled
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                @endif
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="number-base font-semibold leading-3 text-gray-900">Comisionista Externo III</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='CET3' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1">
                    <input type="number" wire:model='CEP3' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-1" wire:ignore>
                        <select id="select5" class="buscador" style="width: 100%;" wire:model="comis3_id">
                            <option value="NULL">Seleccione un Comisionista</option>
                            @foreach ($Comisionistas as $comisionista)
                                <option value="{{ $comisionista->id }}">
                                    {{ $comisionista->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="sm:col-span-1">
                        <input type="text" wire:model='NomC3' disabled
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                @endif
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="number-base font-semibold leading-3 text-gray-900">Comisionista Externo IV</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='CET4' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1">
                    <input type="number" wire:model='CEP4' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-1" wire:ignore>
                        <select id="select6" class="buscador" style="width: 100%;" wire:model="comis4_id">
                            <option value="NULL">Seleccione un Comisionista</option>
                            @foreach ($Comisionistas as $comisionista)
                                <option value="{{ $comisionista->id }}">
                                    {{ $comisionista->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="sm:col-span-1">
                        <input type="text" wire:model='NomC4' disabled
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                @endif
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Comisionista Externo V</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='CET5' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1">
                    <input type="number" wire:model='CEP5' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-1" wire:ignore>
                        <select id="select7" class="buscador" style="width: 100%;" wire:model="comis5_id">
                            <option value="NULL">Seleccione un Comisionista</option>
                            @foreach ($Comisionistas as $comisionista)
                                <option value="{{ $comisionista->id }}">
                                    {{ $comisionista->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="sm:col-span-1">
                        <input type="text" wire:model='NomC5' disabled
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                @endif
                <div class="sm:col-span-1 sm:col-start-1 mt-3">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">TOTAL DE REINTEGRO</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='TOTALRINT' disabled
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1  mt-3">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">SUMA DE COMISIONES</h2>
                </div>
                <div class="sm:col-span-1">
                    <input type="text" wire:model='SumCom' disabled
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 mb-2 flex items-center justify-end gap-x-6 mr-8">
        <a href="{{ route('FichasI') }}">
            <button type="button"
                class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Regresar</button>
        </a>
        @if ($Estatus == 'Registro')
            <button type="button" wire:click="guardar()"
                class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">Guardar</button>
            <button type="button" wire:click="ingresar()"
                class="rounded-md bg-yellow-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">Ingresar</button>
        @endif
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#select1').select2();
        $('#select1').on('change', function(e) {
            let valor = $('#select1').select2("val");
            @this.set('searchC', valor);
        });
    });
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function(e) {
            let valor = $('#select2').select2("val");
            @this.set('searchE', valor);
        });
    });
    document.addEventListener('livewire:load', function() {
        function initializeSelect(selectId, wireModel) {
            $(selectId).select2();
            $(selectId).on('change', function(e) {
                let valor = $(selectId).select2("val");
                @this.set(wireModel, valor);
            });
        }

        initializeSelect('#select3', 'comis1_id');
        initializeSelect('#select4', 'comis2_id');
        initializeSelect('#select5', 'comis3_id');
        initializeSelect('#select6', 'comis4_id');
        initializeSelect('#select7', 'comis5_id');
    });

    Livewire.hook('message.processed', (message, component) => {
        $('#select3').select2();
        $('#select4').select2();
        $('#select5').select2();
        $('#select6').select2();
        $('#select7').select2();
    });
</script>
