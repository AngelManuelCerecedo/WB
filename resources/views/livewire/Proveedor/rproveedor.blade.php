<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<!--FONT GOOGLE-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">

<body class="barra antialiased font-[Raleway] bg-gray-200" style="overflow-x: hidden">
    <div class="container">
        <div class="py-8">
            <div class="flex mb-4">
                <h2 class="text-4xl font-[Raleway]-semibold leading-tight mr-64">Proveedores</h2>
                <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Catálogos <i class="bi bi-chevron-right"></i> Proveedores</label>
            </div>
            <div class="panel">
                <!-- PRIMER BLOQUE DE DATOS -->
                <div class="flex">
                    <label class="datos mt-4 ml-4">Generales</label>
                    <div class="ml-16">
                        <div class="md:flex items-center mt-4">
                            <div class="w-full md:w-1/4 flex flex-col mr-12">
                                <label class="etiqueta">Tipo Persona</label>
                                <select wire:model='TP' class="inputS">
                                    <option value="">Seleccione una Opción</option>
                                    <option value="Sin">Sin Tipo</option>
                                    <option value="Fisica">Fisica</option>
                                    <option value="Moral">Moral</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/4 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label class="etiqueta">RFC</label>
                                <input type="text" wire:model='RFC' class="input" placeholder="RFC" />
                            </div>
                        </div>
                        <div class="md:flex items-center mt-6">
                            <div class="w-full md:w-1/4 flex flex-col mr-24">
                                <label class="etiqueta">Nombre</label>
                                <input type="text" wire:model='N' class="inputN" placeholder="Nombre" />
                            </div>
                            <div class="w-full md:w-1/4 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label class="etiqueta">Apellido Paterno</label>
                                <input type="text" wire:model='ApP' class="input" placeholder="Apellido Paterno" />
                            </div>
                            <div class="w-full md:w-1/4 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label class="etiqueta">Apellido Materno</label>
                                <input type="text" wire:model='ApM' class="input" placeholder="Apellido Materno"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SEGUNDO BLOQUE DE DATOS -->
                <div class="flex">
                    <label class="datos mt-16 ml-4">Contacto</label>
                    <div class="ml-20 mt-16">
                        <div class="md:flex items-center">
                            <div class="w-full md:w-1/4 flex flex-col mr-8">
                                <label class="etiqueta">Celular</label>
                                <input type="text" wire:model='Cel' class="inputS" placeholder="Celular" />
                            </div>
                            <div class="w-full md:w-1/4 flex flex-col mr-10 md:ml-6 md:mt-0 mt-4">
                                <label class="etiqueta">Teléfono</label>
                                <input type="text" wire:model='Tel' class="inputS" placeholder="Teléfono" />
                            </div>
                            <div class="w-full md:w-1/4 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label class="etiqueta">Correo</label>
                                <input type="text" wire:model='CE' class="inputS" placeholder="Correo"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TERCERO BLOQUE DE DATOS -->
                <div class="flex">
                    <label class="datos mt-16 ml-4"> Domicilio</label>
                    <div class="ml-20 mt-16">
                        <div class="md:flex items-center">
                            <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                                <label class="etiqueta">Codigo Postal</label>
                                <input type="text" wire:model='CP' class="inputM" placeholder="Codigo Postal" />
                            </div>
                            <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                                <label class="etiqueta">Estado</label>
                                <input type="text" wire:model='EST' class="input" placeholder="Estado"/>
                            </div>
                            <div class="flex flex-col  md:mt-0 mt-4">
                                <label class="etiqueta">Municipio</label>
                                <input type="text" wire:model='MUN' class="inputN" placeholder="Municipio" />
                            </div>
                        </div>
                        <div class="md:flex items-center mt-6">
                            <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                                <label class="etiqueta">Colonia</label>
                                <input type="text" wire:model='COL' class="input" placeholder="Colonia"/>
                            </div>
                            <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                                <label class="etiqueta">Calle</label>
                                <input type="text" wire:model='CALLE' class="input" placeholder="Calle" />
                            </div>
                            <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                                <label class="etiqueta">Número Ext.</label>
                                <input type="text" wire:model='CALLE' class="inputM" placeholder="Número Ext" />
                            </div>
                            <div class="flex flex-col md: md:mt-0 mt-4">
                                <label class="etiqueta">Número Int.</label>
                                <input type="text" wire:model='CALLE' class="inputM" placeholder="Número Int"/>
                            </div>
                        </div>
                        <div class="md:flex items-center mt-6">
                            <div class="w-full md:w-1/4 flex flex-col mr-24">
                                <label class="etiqueta">Referencias</label>
                                <input type="text" wire:model='FER' class="inputL" placeholder="Referencias" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CUARTO BLOQUE DE DATOS -->
                <div class="flex">
                    <label class="datos mt-16 ml-4"> Crédito</label>
                    <div class="ml-24 mt-16">
                        <div class="md:flex items-center">
                            <div class="w-full md:w-1/4 flex flex-col mr-24">
                                <label class="etiqueta">Limite de Crédito</label>
                                <input type="text" wire:model='LIMC' class="input" placeholder="Limite Crédito"/>
                            </div>
                            <div class="w-full md:w-1/4 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label class="etiqueta">Dias de Crédito</label>
                                <input type="text" wire:model='DCRED' class="input" placeholder="Dias de Crédito"/>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-12 my-2 text-white">
                <div class="flex">
                    <div class="ml-12 mt-4 mb-4">
                        <div class="md:flex items-center">
                            <div class="flex flex-col mr-96">
                                <button class="botonr" wire:click="">
                                    <i class="bi bi-chevron-left"></i>
                                    Regresar
                                </button>
                            </div>
                            <div class=" ml-64">
                                <button class="botond" wire:click="">
                                    <i class="bi bi-clipboard-plus"></i>
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
