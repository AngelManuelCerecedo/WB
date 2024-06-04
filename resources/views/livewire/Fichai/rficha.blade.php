<form>
    <div class="space-y-12 ml-8 mr-8">
        <div class="border-b border-gray-900/10 pb-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Registro de Fichas</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-1">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Folio</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Folio' autocomplete="given-name"
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
                        <input type="text" wire:model='Estatus' autocomplete="family-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Cliente</label>
                    <div class="mt-3" wire:ignore>
                        <select id="select1" class="buscador">
                            <option value="">Seleccione un Cliente</option>
                            @foreach ($Clientes as $cliente)
                                <option value="{{ $cliente->id }}">
                                    {{ $cliente->ALIAS }}
                                    -
                                    {{ $cliente->NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="sm:col-span-1 sm:col-start-1">
                    <h2 class="text-base font-semibold leading-3 text-gray-900">Movimientos</h2>
                </div>
                <div class="sm:col-span-1 sm:col-start-1">
                    <div class="mt-6">
                        <button type="button" wire:click="agregarMov()"
                            class="rounded-md bg-blue-500 px-20 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">Agregar</button>
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Tipo
                        Movimiento</label>
                    <select wire:model='TipoMov'
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="">Seleccione una Opción</option>
                        <option value="Deposito">Deposito</option>
                        <option value="Reintegro">Reintegro</option>
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
                                <option value="{{ $cliente->id }}">
                                    {{ $empresa->NCorto }}
                                    -
                                    {{ $empresa->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 mb-2 flex items-center justify-end gap-x-6 mr-8">
        <a href="{{ route('FichasI') }}">
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
            @this.set('searchC', valor);
        });
    });
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function(e) {
            let valor = $('#select1').select2("val");
            @this.set('searchE', valor);
        });
    });
</script>
