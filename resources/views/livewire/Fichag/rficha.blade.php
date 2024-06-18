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
                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Beneficiario</label>
                    <input type="text" wire:model='Bene' @if ($Estatus == 'Ingresada') disabled @endif
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="sm:col-span-1 sm:col-start-1">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Movimientos</h2>
                </div>
                <div class="sm:col-span-1 sm:col-start-1">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Forma de
                        Pago</label>
                    <select wire:model='FormaP'
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
                <div class="sm:col-span-1 sm:col-start-1">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Gasto con
                        Factura</label>
                    <div class="relative inline-block w-12 h-6 rounded-full border-2  bg-white-200 px-1.5">
                        <input type="checkbox" id="toggle" wire:model="Factura" class="absolute opacity-0 w-0 h-0">
                        <label for="toggle"
                            class="toggle-label block h-full overflow-hidden cursor-pointer bg-white rounded-full shadow-sm transform transition-transform duration-300">
                            <span class="block w-6 h-5 rounded-full bg-indigo-600 transform translate-x-0"></span>
                        </label>
                    </div>
                    <span class="ml-2 text-sm text-gray-900 leading-6">No / Si</span>
                </div>
                @if ($Factura)
                    <div class="sm:col-span-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Folio de Factura</label>
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
        @endif
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function(e) {
            let valor = $('#select2').select2("val");
            @this.set('searchE', valor);
        });
    });
</script>
