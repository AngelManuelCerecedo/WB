<div class="fixed z-10 inset-0 overflow-y-auto  ease-out duration-400 ">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 ">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block  align-bottom bg-white rounded-lg text-left  shadow-xl transform transition-all sm:my-8 sm:align-middle sm: max-w-lg md:max-w-4xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <div class="  items-center justify-center  pb-3 ">
                <div class=" w-auto ">
                    <h2 class="text-xl  font-bold  mb-3 mt-3 text-center">SELECCIONA UN RANGO DE FECHAS</h2>
                    <div class="p-8 mt-6 lg:mt-0 ">
                        <div class="items-center justify-center">
                                <label class="etiqueta ml-32 mr-2">Fecha :</label>
                                <input type="date" wire:model='fecha1' class="input" />
                                <label class="etiqueta ml-2 mr-2">Fecha :</label>
                                <input type="date" wire:model='fecha2' class="input" />
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="flex p-6">
                <div class="ml-2">
                    <a href="{{ route('ListaVentas', ['fecha1' => $fecha1, 'fecha2' => $fecha2]) }}" target="_blank">
                        <button class="botonei">
                            <i class="bi bi-filetype-pdf text-2xl"></i>
                        </button>
                    </a>
                </div>
                <div class=" ml-2">
                    <a href="{{ route('ListaVentasxls', ['fecha1' => $fecha1, 'fecha2' => $fecha2]) }}" target="_blank">
                        <button class="botoneAL">
                            <i class="bi bi-filetype-xls text-2xl"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
