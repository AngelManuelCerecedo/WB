<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-96">Compra</h2>
            <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Operación <i
                    class="bi bi-chevron-right"></i> Compra</label>
        </div>
        <div class="panel">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="ml-4 mt-16 flex-col">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mr-8">
                            <label class="etiqueta">Folio de Cotizacion</label>
                            <input type="text" wire:model='Folio' class="input" disabled="false" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mr-8">
                            <label class="etiqueta">Estatus</label>
                            <input type="text" wire:model='Estatus' class="input" disabled="false" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mr-8 ">
                            <label class="etiqueta">Fecha</label>
                            <input type="date" wire:model='Fecha' />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Sucursal Destino</label>
                            <select wire:model='SD' class="input">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($Sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Tipo de Compra</label>
                            <select wire:model='TC' class="input">
                                <option value="">Seleciona una Opción</option>
                                <option value="Contado">Contado</option>
                                <option value="Credito">Credito</option>
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4" wire:ignore>
                            <label class="etiqueta">Proveedor</label>
                            <select id="select1" class="inputL">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($Proveedores as $proveedor)
                                    @if ($proveedor->TipoP == 'Fisica')
                                        <option value="{{ $proveedor->id }}">
                                            {{ $proveedor->RFC }} - {{ $proveedor->Nombre }} {{ $proveedor->ApP }}
                                        </option>
                                    @else
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->RFC }} -
                                            {{ $proveedor->NEMP }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Tipo de Costo de Envío</label>
                            <select wire:model='TCE' class="inputM">
                                <option value="">Ninguno</option>
                                <option value="Compra">Compra</option>
                                <option value="Producto">Producto</option>
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Costo de Envío</label>
                            @if ($TCE == 'Compra')
                                <div class=" border  border-[2px] flex rounded-md">
                                    <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                        <i class="bi bi-currency-dollar"></i>
                                    </button>
                                    <b>
                                        <input type="text" wire:model='CE' class="inputImporteDesblo text-right">
                                    </b>
                                </div>
                            @else
                                <div class=" border  border-[2px] flex rounded-md">
                                    <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                        <i class="bi bi-currency-dollar"></i>
                                    </button>
                                    <b>
                                        <input type="text" wire:model='CE' class="inputImportes text-right bgcolor-black" 
                                            disabled="false"  />
                                    </b>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mr-4">
                            <label class="etiqueta">Importe de la Compra</label>
                            <div class=" border  border-[2px] flex rounded-md">
                                <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                    <i class="bi bi-currency-dollar"></i>
                                </button>
                                <b>
                                    <input type="text" wire:model='IC' class="inputImportes text-right font-weight: bold">
                                </b>
                            </div>
                        </div>
                        <div class="flex flex-col  md:mt-0 mr-4" wire:ignore>
                            <label class="etiqueta">Importe Total</label>
                            <div class=" border  border-[2px] flex rounded-md">
                                <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                    <i class="bi bi-currency-dollar"></i>
                                </button>
                                <b>
                                    <input type="text" wire:model='IT' class="inputImportes text-right">
                                </b>
                            </div>
                        </div>
                        <div class="flex flex-col  md:mt-0 mr-4">
                            <label class="etiqueta">Descuento</label>
                            <div class=" border  border-[2px] flex rounded-md">
                                <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                    <i class="bi bi-currency-dollar"></i>
                                </button>
                                <b>
                                    <input type="text" wire:model='DESC' class="inputImporteDesblo text-right">
                                </b>
                            </div>
                        </div>
                        <div class="flex flex-col  md:mt-0 mr-4" wire:ignore>
                            <label class="etiqueta">Importe Pagado</label>
                            <div class=" border  border-[2px] flex rounded-md">
                                <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                    <i class="bi bi-currency-dollar"></i>
                                </button>
                                <b>
                                    <input type="text" wire:model='IP' class="inputImportes text-right">
                                </b>
                            </div>
                        </div>
                        <div class="flex flex-col  md:mt-0 mr-4" wire:ignore>
                            <label class="etiqueta">Importe por Pagar</label>
                            <div class=" border  border-[2px] flex rounded-md">
                                <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                    <i class="bi bi-currency-dollar"></i>
                                </button>
                                <b>
                                    <input type="text" wire:model='IporP' class="inputImportes text-right">
                                </b>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mr-8">
                            <label class="etiqueta">Fecha del Credito</label>
                            @if ($TC == 'Credito')
                                <input type="date" wire:model='FC' class="inputImporteDesblo" />
                            @else
                                <input type="date" wire:model='FC' class="inputImportes" disabled="false" />
                            @endif
                        </div>
                        <div class="flex flex-col  md:mt-0 mr-8">
                            <label class="etiqueta">Fecha limite de Pago</label>
                            @if ($TC == 'Credito')
                                <input type="date" wire:model='FLC' class="inputImporteDesblo"/>
                            @else
                                <input type="date" wire:model='FLC' class="inputImportes" disabled="false" />
                            @endif
                        </div>
                        <div class="flex flex-col  md:mt-0 mr-8 ">
                            <label class="etiqueta">Observaciones</label>
                            <input type="text" wire:model='Obs' class="inputL" placeholder="Observaciones de la Compra" />
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            <a href="{{ route('Compras') }}">
                                <button class="botonr">
                                    <i class="bi bi-chevron-left"></i>
                                    Regresar
                                </button>
                            </a>
                        </div>
                        <div class=" ml-64">
                            <button class="botond" wire:click="registrar()">
                                <i class="bi bi-journal-bookmark"></i>
                                Guardar
                            </button>
                        </div>
                    </div>
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
            @this.set('Proveedor_id', valor);
        });
    });
</script>
