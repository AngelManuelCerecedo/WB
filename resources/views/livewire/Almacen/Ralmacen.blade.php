<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-80">Almacen</h2>
            @if ($almacen->sucursal)
                <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Almacén <i
                        class="bi bi-chevron-right"></i> {{ $almacen->sucursal->Nombre }}</label>
            @else
                <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Almacén <i
                        class="bi bi-chevron-right"></i> Almacén General</label>
            @endif
        </div>
        <div class="panel">
            <div class="flex">
                <label class="datos mt-16 ml-4"> Datos</label>
                <div class="ml-12 mt-16">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Nombre</label>
                            <input type="text" wire:model='NOM' class="inputXL" placeholder="Nombre" disabled="false"/>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Código de Barras</label>
                            <input type="text" wire:model='CB' class="input" placeholder="Código de Barras" disabled="false"/>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Calve del Producto</label>
                            <input type="text" wire:model='C1' class="input" placeholder="Calve del Producto" disabled="false"/>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Categoría</label>
                            <select wire:model='AUXC'class="input" disabled="false">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($cat as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Marca</label>
                            <select wire:model='AUXM' class="input" disabled="false">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Unidad de Medida</label>
                            <select wire:model='AUXU' class="input" disabled="false">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($unidades as $unidad)
                                    <option value="{{ $unidad->id }}">{{ $unidad->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Stock Maximo</label>
                            <input type="text" wire:model='SMX' class="inputM" placeholder="Stock Max" disabled="false"/>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Stock Minimo</label>
                            <input type="text" wire:model='SMN' class="inputM" placeholder="Stock Min" disabled="false"/>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Estatus</label>
                            <select wire:model='EST' class="input" disabled="false">
                                <option value="">Selecciona una Opción</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">IVA</label>
                            <select wire:model='IVA' class="input" disabled="false">
                                <option value="">Selecciona una Opción</option>
                                <option value="0">Excento</option>
                                <option value="8">8%</option>
                                <option value="16">16%</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Proveedor</label>
                            <select wire:model='AUXP' class="input" disabled="false">
                                <option value="AUXP">Seleciona una Opción</option>
                                @foreach ($provs as $prov)
                                    @if ($prov->TipoP == 'Moral')
                                        <option value="{{ $prov->id }}">{{ $prov->NEMP }}</option>
                                    @else
                                        <option value="{{ $prov->id }}">{{ $prov->Nombre }} {{ $prov->ApP }}
                                            {{ $prov->ApM }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Precio Base</label>
                            <input type="text" wire:model='P' class="input" placeholder="Precio Base" disabled="false"/>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Existencia</label>
                            <input type="text" wire:model='E' class="input" placeholder="Existencias" />
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            <a href="{{ route('EAlmacen', [$almacen->id]) }}">
                                <button class="botonr">
                                    <i class="bi bi-chevron-left"></i>
                                    Regresar
                                </button>
                            </a>
                        </div>
                        <div class=" ml-64">
                            <button class="botond" wire:click="GE()">
                                <i class="bi bi-journal-bookmark"></i>
                                Guardar Existencias
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
