<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 ">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 ">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div class="inline-block  align-bottom bg-white rounded-lg text-left  shadow-xl transform transition-all sm:my-8 sm:align-middle sm: max-w-lg md:max-w-4xl sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <div class="  items-center justify-center  pb-3 ml-3">
                <div class="grid    w-auto ">
                    <h2 class="text-xl  font-bold ml-3 mb-3 mt-3 text-center">Movimiento</h2>
                    <div class="p-8 mt-6 lg:mt-0 rounded shadow">
                        <div class="items-center justify-center">
                            <div class="flex md:mt-0 ml-4">
                                <div class="">
                                    <label class="etiqueta">Importe</label>
                                </div>
                                <div class="ml-56">
                                    <label class="etiqueta">Forma de Pago</label>
                                </div>
                                <div class="ml-36">
                                    <label class="etiqueta">Fecha</label>
                                </div>
                            </div>
                            <div class="flex md:mt-0 ml-4">
                                <div>
                                    <input type="text" wire:model='IMP' class="input" placeholder="Importe">
                                </div>
                                <div class="ml-4">
                                    <select wire:model='FP' class="input">
                                        <option value="">Seleciona una Opción</option>
                                        @foreach ($formas as $forma)
                                            <option value="{{ $forma->id }}">{{ $forma->Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-4">
                                    <input type="Date" wire:model='DATE' class="input">
                                </div>
                            </div>
                            <div class="flex mt-4 ml-4">
                                <div class="">
                                    <label class="etiqueta">Observaciones</label>
                                </div>
                            </div>
                            <div class="flex ml-4">
                                <div>
                                    <input type="text" wire:model='Obs' class="inputL" placeholder="Observaciones">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-6 border-t border-solid border-slate-200 rounded-b">
                <div class="ml-20">
                    <button class="botoni" wire:click="abonar">
                        Agregar
                    </button>
                </div>
                <div class="ml-96">
                    <button class="botone" wire:click="cerrarModal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
