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
                    <h2 class="text-xl  font-bold ml-3 mb-3 mt-3 text-center">CLIENTES</h2>
                    <div class="p-8 mt-6 lg:mt-0 rounded shadow">
                        <div class="items-center justify-center">
                            <div class="md:mt-0 mr-8" wire:ignore>
                                <select id="select1" class="inputXL">
                                    <option value="">Seleccione un Cliente</option>
                                    @foreach ($Clientes as $Cliente)
                                        <option value="{{ $Cliente->id }}">
                                            @if ($Cliente->TipoP == 'Moral')
                                                {{ $Cliente->NomCom }}
                                            @else
                                                {{ $Cliente->Nombre }} {{ $Cliente->ApP }} {{ $Cliente->ApM }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-6 border-t border-solid border-slate-200 rounded-b">
                <div class="ml-20">
                    <a href="{{ route('PuntoVentaRcliente') }}">
                        <button class="botoni">
                            Agregar
                        </button>
                    </a>
                </div>
                <div class="ml-96">
                    <button class="botone" wire:click="cerrarModal(2)">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#select1').select2();
        $('#select1').on('change', function(e) {
            let valor = $('#select1').select2("val");
            @this.set('searchCliente', valor);
        });
    });
</script>
