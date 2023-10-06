<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-96">Cotizacion</h2>
            <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Operación <i
                    class="bi bi-chevron-right"></i> Cotizacion</label>
        </div>
        <div class="panel">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="ml-4 mt-16 flex-col">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Folio de Cotizacion</label>
                            <input type="text" wire:model='Folio' class="inpuS" disabled="false" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                            <label class="etiqueta">Sucursal</label>
                            <select wire:model='SO' class="input">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($Sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4" wire:ignore>
                            <label class="etiqueta">Cliente</label>
                            <select id="select1" class="input">
                                <option value="">Seleciona una Opción</option>
                                <option value="Publico">Publico en General</option>
                                @foreach ($Clientes as $cliente)
                                    @if ($cliente->TipoP == 'Fisica')
                                        <option value="{{ $cliente->id }}">
                                            {{ $cliente->Nombre }} {{ $cliente->ApP }} {{ $cliente->ApM }}
                                        </option>
                                    @else
                                        <option value="{{ $cliente->id }}">
                                            {{ $cliente->NomCom }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @if ($Cliente_id == 'Publico')
                            <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                                <label class="etiqueta">Nombre del Cliente</label>
                                <input type="text" wire:model='NombreCliente' class="inputL"/>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            <a href="{{ route('Cotizaciones') }}">
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
            @this.set('Cliente_id', valor);
        });
    });
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function(e) {
            let valor = $('#select2').select2("val");
            @this.set('producto', valor);
        });
    });
</script>
