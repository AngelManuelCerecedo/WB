<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-80">Productos</h2>
            <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Almacén <i
                    class="bi bi-chevron-right"></i> Productos</label>
        </div>
        <div class="panel">
            <div class="flex">
                <label class="datos mt-16 ml-4"> Datos</label>
                <div class="ml-12 mt-16">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Nombre</label>
                            <input type="text" wire:model='NOM' class="inputN" placeholder="Nombre" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Código de Barras</label>
                            <input type="text" wire:model='CB' class="input" placeholder="Código de Barras" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Calve del Producto</label>
                            <input type="text" wire:model='C1' class="input" placeholder="Calve del Producto" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Categoría</label>
                            <select wire:model='AUXC'class="input">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($cat as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Marca</label>
                            <select wire:model='AUXM' class="input">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Unidad de Medida</label>
                            <select wire:model='AUXU' class="input">
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
                            <input type="text" wire:model='SMX' class="inputM" placeholder="Stock Max" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Stock Minimo</label>
                            <input type="text" wire:model='SMN' class="inputM" placeholder="Stock Min" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Estatus</label>
                            <select wire:model='EST' class="input">
                                <option value="">Selecciona una Opción</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">IVA</label>
                            <select wire:model='IVA' class="input">
                                <option value="">Selecciona una Opción</option>
                                <option value="0">Excento</option>
                                <option value="8">8%</option>
                                <option value="16">16%</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Precio Base</label>
                            <input type="text" wire:model='P' class="input" placeholder="Precio Base" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <label class="datos mt-12 ml-4">Escalas</label>
                <div class="ml-6 mt-12">
                    <div class="md:flex items-center ">
                        <div class="flex flex-col mr-6">
                            <button class="botonCP" wire:click="registrar()">
                                <i class="bi bi-gear"></i>
                                Calcular Precios
                            </button>
                        </div>
                        <div class=" flex flex-col md:ml-6 md:mt-0 mt-4">
                            <button class="botonGP" wire:click="registrar()">
                                <i class="bi bi-journal-bookmark"></i>
                                Guardar Precios
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="mt-12 ml-6">
                    <table class="tablaesc">
                        <thead class="etiqueta">
                            <tr>
                                <th class="px-5 py-1 text-left font-[Raleway]-semibold text-black ">
                                    Escala de Precio
                                </th>
                                <th class="px-5 py-1 text-left font-[Raleway]-semibold text-black ">
                                    Incremento al Producto
                                </th>
                                <th class="px-5 py-1 text-left font-[Raleway]-semibold text-black ">
                                    Precio
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-5 py-3 bg-white ">
                                    <p class="text-black whitespace-no-wrap">PUBLICO EN GENERAL</p>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <input type="text" wire:model='E1' class="inputM" />
                                    <i class="bi bi-percent"></i>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <i class="bi bi-currency-dollar"></i>
                                    <input type="text" wire:model='P1' class="inputSML" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3  bg-white ">
                                    <p class="text-black whitespace-no-wrap">MEDICOS</p>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <input type="text" wire:model='E2' class="inputM" />
                                    <i class="bi bi-percent"></i>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <i class="bi bi-currency-dollar"></i>
                                    <input type="text" wire:model='P2' class="inputSML" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3  bg-white ">
                                    <p class="text-black whitespace-no-wrap">CLINICAS,HOSPITALES</p>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <input type="text" wire:model='E3' class="inputM" />
                                    <i class="bi bi-percent"></i>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <i class="bi bi-currency-dollar"></i>
                                    <input type="text" wire:model='P3' class="inputSML" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3  bg-white ">
                                    <p class="text-black whitespace-no-wrap">ESCALA 4</p>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <input type="text" wire:model='E4' class="inputM" />
                                    <i class="bi bi-percent"></i>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <i class="bi bi-currency-dollar"></i>
                                    <input type="text" wire:model='P4' class="inputSML" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3  bg-white ">
                                    <p class="text-black whitespace-no-wrap">ESCALA 5</p>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <input type="text" wire:model='E5' class="inputM" />
                                    <i class="bi bi-percent"></i>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <i class="bi bi-currency-dollar"></i>
                                    <input type="text" wire:model='P5' class="inputSML" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3  bg-white ">
                                    <p class="text-black whitespace-no-wrap">DISTRIBUCIONES</p>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <input type="text" wire:model='E6' class="inputM" />
                                    <i class="bi bi-percent"></i>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <i class="bi bi-currency-dollar"></i>
                                    <input type="text" wire:model='P6' class="inputSML" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3  bg-white ">
                                    <p class="text-black whitespace-no-wrap">GOBIERNO</p>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <input type="text" wire:model='E7' class="inputM" />
                                    <i class="bi bi-percent"></i>
                                </td>
                                <td class="px-5 py-3 bg-white ">
                                    <i class="bi bi-currency-dollar"></i>
                                    <input type="text" wire:model='P7' class="inputSML" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            <a href="{{ route('Productos') }}">
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
