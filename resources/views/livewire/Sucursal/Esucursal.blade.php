<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-72">Sucursales</h2>
            <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Administración <i
                    class="bi bi-chevron-right"></i> Sucursales</label>
        </div>
        <div class="panel">
            <div class="flex">
                <label class="datos mt-16 ml-4"> Datos</label>
                <div class="ml-12 mt-16">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Zona</label>
                            <select wire:model='ZN' class="inputS">
                                <option value="">Seleccione una Opción</option>
                                <option value="VALLES CENTRALES, OAXACA">VALLES CENTRALES, OAXACA</option>
                                <option value="PUEBLA, PUEBLA">PUEBLA, PUEBLA</option>
                                <option value="OAXACA">OAXACA</option>
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Clave de la Sucursal</label>
                            <input type="text" wire:model='CLV' class="input" placeholder="Clave de la Sucursal" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Nombre de la Sucursal</label>
                            <input type="text" wire:model='Nombre' class="inputN" placeholder="Nombre de la Sucursal" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Codigo Postal</label>
                            <input type="text" wire:model='CP' class="input" placeholder="Codigo Postal" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Folio Ticket</label>
                            <input type="text" wire:model='FT' class="inputM" placeholder="Folio Ticket" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Folio Factura</label>
                            <input type="text" wire:model='FF' class="inputM" placeholder="Folio Factura" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Serie Factura</label>
                            <input type="text" wire:model='SF' class="inputM" placeholder="Serie Factura" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Teléfono</label>
                            <input type="text" wire:model='TEL' class="input" placeholder="Teléfono" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Dirección</label>
                            <input type="text" wire:model='DIR' class="inputL" placeholder="Dirección" />
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            <a href="{{ route('Sucursales') }}">
                                <button class="botonr">
                                    <i class="bi bi-chevron-left"></i>
                                    Regresar
                                </button>
                            </a>
                        </div>
                        <div class=" ml-64">
                            <button class="botond" wire:click="actualizar()">
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