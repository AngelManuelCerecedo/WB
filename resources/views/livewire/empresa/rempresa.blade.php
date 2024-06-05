<form>
    <div class="space-y-12 ml-8 mr-8">
        <div class="border-b border-gray-900/10 pb-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Registro de Empresas</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Nom' autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Nombre Corto</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Nc' autocomplete="family-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">RFC</label>
                    <div class="mt-2">
                        <input type="text" wire:model='RFC'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Giro</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Giro'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <h2 class="text-base font-semibold leading-3 text-gray-900">Datos Bancarios</h2>
            </div>
        </div>
    </div>
    <div class="mt-2 mb-2 flex items-center justify-end gap-x-6 mr-8">
        <a href="{{ route('Empresas') }}">
            <button type="button"
                class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Regresar</button>
        </a>
        <button type="button" wire:click="registrar()"
            class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">Guardar</button>
    </div>
</form>
