<link href="path/to/select2.min.css" rel="stylesheet" />
<script src="path/to/select2.min.js"></script>
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
                    <h2 class="text-xl font-bold ml-3 mb-3 mt-3 text-center">PRODUCTOS</h2>
                    <div class="p-8 mt-6 lg:mt-0 rounded shadow">
                        <div class="mb-8 flex" wire:ignore>
                            <select id="select2">
                                <option value="">Seleccione un Producto</option>
                                @foreach ($Productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
                                @endforeach
                            </select>
                            <div class="ml-8">
                                <button wire:click="agregarA()" class="botonGP">
                                    <i class="bi bi-plus-lg text-lg"></i>
                                    <span class="ml-2">Añadir Producto</span>
                                </button>
                            </div>
                        </div>
                        @if ($ListaFT)
                            <table class="min-w-full etiqueta ">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-8 py-1 border border-gray-200 bg-gray-100 text-left  font-[Open Sans] text-black  tracking-wider ">
                                            Codigo de Barras
                                        </th>
                                        <th
                                            class="px-8 py-1 border border-gray-200 bg-gray-100 text-left  font-[Open Sans] text-black  tracking-wider ">
                                            Nombre
                                        </th>
                                        <th
                                            class="px-8 py-1 border border-gray-200 bg-gray-100 text-left  font-[Open Sans] text-black  tracking-wider ">
                                            Cantidad
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="block md:table-row-group ">
                                    @foreach ($ListaFT as $Producto)
                                        <tr>
                                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $Producto->CodigoB }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $Producto->Nombre }}
                                                </p>
                                            </td>
                                            <td class="border border-gray-200 bg-white">
                                                <input type="text" wire:model='Cant' class="inpuSML" />
                                            </td>
                                            <td>
                                                <button class="botone" wire:click="eliminarP()">
                                                    <i class="bi bi-layout-text-sidebar-reverse"></i>
                                                    <span class="ml-2 ">Eliminar</span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="px-6 py-4 mt-20">
                                <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div>
                                        <span class="font-medium">Info: </span> Lista vacia
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:click="cerrarModal()" type="button"
                        class="text-white bg-red-500  font-bold px-6 py-3 text-sm  rounded shadow mr-1 mb-1">Cerrar</button>
                </span>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function(e) {
            let valor = $('#select2').select2("val");
            @this.set('search', valor);
        });
    });
</script>
