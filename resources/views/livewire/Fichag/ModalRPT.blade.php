<form>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
        <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    
            <!-- Fondo oscuro del modal -->
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
    
            <!-- Contenido del modal -->
            <div class="inline-block bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl md:max-w-5xl"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    
                <!-- Encabezado del modal -->
                <div class="p-6 mt-2">
                    <h2 class="text-xl font-bold mb-3 text-center">Reporte de Gastos</h2>
                </div>
    
                <!-- Contenido principal del modal -->
                <div class="p-6">
                    <div class="sm:col-span-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Fecha Inicio</label>
                        <div class="mt-2">
                            <input type="date" wire:model='Fecha1'
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Fecha Fin</label>
                        <div class="mt-2">
                            <input type="date" wire:model='Fecha2'
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
    
                <!-- Pie del modal -->
                <div class="flex items-center justify-center p-6 border-t border-solid border-slate-200 rounded-b">
                    <button type="button" wire:click="cerrarModal()"
                        class="mr-20 rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">
                        Regresar
                    </button>
                    <a href="{{ route('ReporteGXLS', ['Fecha1' => $this->Fecha1, 'Fecha2' => $this->Fecha2]) }}" target="_blank">
                        <button type="button"
                            class="rounded-md bg-green-500 px-2 py-1 text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">
                            <i class="bi bi-filetype-xls text-2xl"></i>
                        </button>
                    </a>
                </div>
    
            </div>
        </div>
    </div>
</form>
