<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-80">Empleados</h2>
            <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Administración <i
                    class="bi bi-chevron-right"></i> Empleados</label>
        </div>
        <div class="panel">
            <!-- PRIMER BLOQUE DE DATOS -->
            <div class="flex">
                <label class="datos mt-4 ml-4">Generales</label>
                <div class="ml-16">
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col mr-16">
                            <label class="etiqueta">CURP</label>
                            <input type="text" wire:model='CURP' class="inputN" placeholder="CURP" />
                        </div>
                        <div class="flex flex-col mr-16">
                            <label class="etiqueta">RFC</label>
                            <input type="text" wire:model='RFC' class="inputN" placeholder="RFC" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Nombre</label>
                            <input type="text" wire:model='Nombre' class="input" placeholder="Nombre" />
                        </div>
                        <div class="flex flex-col ml-8">
                            <label class="etiqueta">Apellido Paterno</label>
                            <input type="text" wire:model='ApP' class="input" placeholder="Apellido Paterno" />
                        </div>
                        <div class="flex flex-col ml-8">
                            <label class="etiqueta">Apellido Materno</label>
                            <input type="text" wire:model='ApM' class="input" placeholder="Apellido Materno" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- SEGUNDO BLOQUE DE DATOS -->
            <div class="flex">
                <label class="datos mt-16 ml-4">Contacto</label>
                <div class="ml-20 mt-16">
                    <div class="md:flex items-center ">
                        <div class="flex flex-col mr-6">
                            <label class="etiqueta">Celular</label>
                            <input type="text" wire:model='Cel' class="inputN" placeholder="Celular" />
                        </div>
                        <div class=" flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="etiqueta">Teléfono</label>
                            <input type="text" wire:model='Tel' class="input" placeholder="Teléfono" />
                        </div>
                        <div class="flex flex-col ml-8">
                            <label class="etiqueta">Correo</label>
                            <input type="text" wire:model='Correo' class="input" placeholder="Correo" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- TERCERO BLOQUE DE DATOS -->
            <div class="flex">
                <label class="datos mt-16 ml-4"> Domicilio</label>
                <div class="ml-20 mt-16">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Codigo Postal</label>
                            <input type="text" wire:model='CP' class="input" placeholder="Codigo Postal" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Estado</label>
                            <input type="text" wire:model='Estado' class="input" placeholder="Estado" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Municipio</label>
                            <input type="text" wire:model='Mun' class="inputN" placeholder="Municipio" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Colonia</label>
                            <input type="text" wire:model='Col' class="input" placeholder="Colonia" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Calle</label>
                            <input type="text" wire:model='Calle' class="input" placeholder="Calle" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Número Ext.</label>
                            <input type="text" wire:model='NumExt' class="inputM" placeholder="Número Ext" />
                        </div>
                        <div class="flex flex-col md: md:mt-0 mt-4">
                            <label class="etiqueta">Número Int.</label>
                            <input type="text" wire:model='NumInt' class="inputM" placeholder="Número Int" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="w-full md:w-1/4 flex flex-col mr-24">
                            <label class="etiqueta">Referencias</label>
                            <input type="text" wire:model='Referencia' class="inputL"
                                placeholder="Referencias" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <label class="datos mt-16 ml-4"> Referencias</label>
                <div class="ml-12 mt-16">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-10">
                            <label class="etiqueta">Nombre</label>
                            <input type="text" wire:model='NomRF' class="inputN" placeholder="Nombre" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Parentesco</label>
                            <input type="text" wire:model='ParenRF' class="input" placeholder="Parentesco" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Teléfono</label>
                            <input type="text" wire:model='TelRF' class="input" placeholder="Teléfono" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="flex flex-col mr-24">
                            <label class="etiqueta">Domicilio</label>
                            <input type="text" wire:model='DomRF' class="inputL" placeholder="Domicilio" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- CUARTO BLOQUE DE DATOS -->
            <div class="flex">
                <label class="datos mt-16 ml-4"> Credenciales</label>
                <div class="ml-8 mt-16">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-24">
                            <label class="etiqueta">Sucursal</label>
                            <select wire:model='sucursal_id' class="input">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Rol</label>
                            <input type="text" wire:model='Rol' class="input" placeholder="Rol" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Estatus</label>
                            <select wire:model='Estatus' class="input">
                                <option value="">Seleciona una Opción</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col mr-24">
                            <label class="etiqueta">Usuario</label>
                            <input type="text" wire:model='Usu' class="input" placeholder="Usuario" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Contraseña</label>
                            <input type="text" wire:model='Pwd' class="input" placeholder="Contraseña" />
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            <a href="{{ route('Empleados') }}">
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
