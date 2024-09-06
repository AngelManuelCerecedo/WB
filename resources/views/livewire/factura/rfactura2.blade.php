<form>
    <div class="space-y-12 ml-8 mr-8">
        <div class="border-b border-gray-900/10 pb-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Registro de Factura</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-1">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Fecha</label>
                    <div class="mt-2">
                        <input type="date" wire:model='Fecha' autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Folio</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Folio'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Solicitud</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Solicitud'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="first-name"
                        class="block text-sm font-medium leading-6 text-gray-900">Observaciones</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Observaciones' autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1 sm:col-start-1">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Producto o
                        Servicio</label>
                    <div class="mt-2">
                        <select wire:model="Concepto" class="w-full rounded-lg">
                            <option value="">Seleccione un Producto</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Obra">Obra</option>
                            <option value="Producto">Producto</option>
                            <option value="Servicio">Servicio</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">CFDI</label>
                    <div class="mt-2">
                        <select wire:model="CFDI" class="w-full rounded-lg">
                            <option value="">Seleccione un CFDI</option>
                            <option value="Mexico">México</option>
                            <option value="Morelia">Morelia</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Puerto Escondido">Puerto Escondido</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Estatus</label>
                    <div class="mt-2">
                        <select wire:model="Estatus" class="w-full rounded-lg">
                            <option value="">Seleccione un Estatus</option>
                            <option value="Facturada">Facturada</option>
                            <option value="Cancelada">Cancelada</option>
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Metodo de
                        Pago</label>
                    <div class="mt-2">
                        <select wire:model="Metodo" class="w-full rounded-lg">
                            <option value="">Seleccione un Metodo</option>
                            @foreach ($Metodos as $metodo)
                                <option value="{{ $metodo->Clave }}">
                                    {{ $metodo->Clave }}
                                    -
                                    {{ $metodo->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Forma de
                        Pago</label>
                    <div class="mt-2">
                        <select wire:model="Forma" class="w-full rounded-lg">
                            <option value="">Seleccione una Forma</option>
                            @foreach ($Formas as $forma)
                                <option value="{{ $forma->id }}">
                                    {{ $forma->Clave }}
                                    -
                                    {{ $forma->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-3 sm:col-start-1">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Empresa</label>
                    <div class="mt-2" wire:ignore>
                        <select id="select1" class="buscador" wire:model="empresaSeleccionadaId">
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
                <div class="sm:col-span-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Total de la
                        Factura</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Total'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 mb-2 flex items-center justify-end gap-x-6 mr-8">
        <a href="{{ route('Facturas') }}">
            <button type="button"
                class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Regresar</button>
        </a>
        <button type="button" wire:click="registrar()"
            class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">Guardar</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#select1').select2();
        $('#select1').on('change', function(e) {
            let valor = $('#select1').select2("val");
            @this.set('searchE', valor);
        });
    });
    $(document).ready(function() {
        $('#select1').select2();
        $('#select1').on('change', function(e) {
            let valor = $('#select1').select2("val");
            @this.set('empresaSeleccionadaId', valor);
        });
    });
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function(e) {
            let valor = $('#select2').select2("val");
            @this.set('searchC', valor);
        });
    });
    $(document).ready(function() {
        $('#select3').select2();
        $('#select3').on('change', function(e) {
            let valor = $('#select3').select2("val");
            @this.set('searchMRS', valor);
        });
    });
</script>
