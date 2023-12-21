<div class="container">
    @if (auth()->user()->empleado->Rol == 'Mostrador')
        <div class="py-8 ml-32 mt-8">
        @else
            <div class="py-8">
    @endif
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-96">Traspaso</h2>
            <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Almacén <i
                    class="bi bi-chevron-right"></i> Traspasos</label>
        </div>
        <div class="panel">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="ml-4 mt-16 flex-col">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Folio de Traspaso</label>
                            <input type="text" wire:model='Folio' class="inpuS" disabled="false" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                            <label class="etiqueta">Estado</label>
                            <input type="text" wire:model='Estatus' class="inpuS" disabled="false" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Sucursal Origen</label>
                            <select wire:model='SO' class="input">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($Sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                                @endforeach
                                <option value="7">Almacén General</option>
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Sucursal Destino</label>
                            <select wire:model='SD' class="input">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($Sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                                @endforeach
                                <option value="7">Almacén General</option>
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                            <label class="etiqueta">Observaciones</label>
                            <input type="text" wire:model='Obs' class="inputL" placeholder="Observaciones" />
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            @if (auth()->user()->empleado->Rol == 'Mostrador')
                                <a href="{{ route('PuntoVenta') }}">
                                @else
                                    <a href="{{ route('Traspasos') }}">
                            @endif
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
