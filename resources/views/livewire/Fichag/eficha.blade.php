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
                        <input type="date" wire:model='Fecha'
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
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Acreedor</label>
                        <div class ="mt-2">
                            <select wire:model='Acreedor' class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="">Selecciona un Acreedor</option>
                                @foreach ($Acreedores as $acreedor)
                                    <option value="{{ $acreedor->id }}">{{ $acreedor->Nombre }}</option>
                                @endforeach
                                <option value="4">GASTOS WB</option>
                            </select>
                        </div>
                    </div>
                @else
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Beneficiario</label>
                        <div class="mt-2">
                            <input type="text" wire:model='Bene' disabled
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                @endif
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Beneficiario</label>
                        <div class="mt-2" wire:ignore>
                            <select id="select1" class="buscador">
                                <option value="">Seleccione un Beneficiario</option>
                                @foreach ($Beneficiarios as $beneficiario)
                                    <option value="{{ $beneficiario->id }}"
                                        {{ $searchC == $beneficiario->id ? 'selected' : '' }}>
                                        {{ $beneficiario->Nombre }}                                    
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @else
                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Beneficiario</label>
                        <div class="mt-2">
                            <input type="text" wire:model='Bene' disabled
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                @endif
                <div class="sm:col-span-1 sm:col-start-1">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Movimientos</h2>
                </div>
                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Forma de
                        Pago</label>
                    <select wire:model='FormaP' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @foreach ($FormasP as $forma)
                            <option value="{{ $forma->id }}">
                                {{ $forma->Clave }}
                                -
                                {{ $forma->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="sm:col-span-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Monto</label>
                    <input type="text" wire:model='Monto' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-3 sm:col-start-1">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Empresa</label>
                    <div class="mt-1" wire:ignore>
                        <select id="select2" class="buscador" wire:model="empresaSeleccionadaId"
                            @if ($Estatus == 'Ingresada') disabled @endif>
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
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Banco</label>
                    <select wire:model='Banco' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="">Seleccione una Opción</option>
                        @foreach ($Bancos as $banco)
                            <option value="{{ $banco->id }}">
                                {{ $banco->Nombre }}
                                -
                                {{ $banco->Cuenta }}
                                -
                                ${{ number_format($banco->Total, 2) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($Estatus == 'Registro')
                    <div class="sm:col-span-1 sm:col-start-1">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Gasto con
                            Factura</label>
                        <div class="relative inline-block w-12 h-6 rounded-full border-2  bg-white-200 px-1.5">
                            <input type="checkbox" id="toggle" wire:model="Factura"
                                class="absolute opacity-0 w-0 h-0">
                            <label for="toggle"
                                class="toggle-label block h-full overflow-hidden cursor-pointer bg-white rounded-full shadow-sm transform transition-transform duration-300">
                                <span class="block w-6 h-5 rounded-full bg-indigo-600 transform translate-x-0"></span>
                            </label>
                        </div>
                        <span class="ml-2 text-sm text-gray-900 leading-6">No / Si</span>
                    </div>
                @endif
                @if ($Factura)
                    <div class="sm:col-span-1 mt-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Folio de
                            Factura</label>
                        <input type="text" wire:model='FF'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="mt-2 mb-2 flex items-center justify-end gap-x-6 mr-8">
        <a href="{{ route('FichasG') }}">
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
</script>
