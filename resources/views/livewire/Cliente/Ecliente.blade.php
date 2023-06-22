<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl font-[Raleway]-semibold leading-tight mr-96">Clientes</h2>
            <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Catálogos <i
                    class="bi bi-chevron-right"></i> Clientes</label>
        </div>
        <div class="panel">
            <!-- PRIMER BLOQUE DE DATOS -->
            <div class="flex">
                <label class="datos mt-4 ml-4">Generales</label>
                <div class="ml-16">
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col mr-16">
                            <label class="etiqueta">Tipo de Cliente</label>
                            <select wire:model='TC' class="inputS">
                                <option value="">Seleccione una Opción</option>
                                <option value="Sin Tipo">Sin Tipo</option>
                                <option value="Mostrador">Mostrador</option>
                                <option value="Gobierno">Gobierno</option>
                                <option value="Distribucion">Distribucion</option>
                            </select>
                        </div>
                        <div class="flex flex-col mr-16">
                            <label class="etiqueta">Clasificación del Cliente</label>
                            <select wire:model='CC' class="inputS">
                                <option value="">Seleccione una Opción</option>
                                <option value="Hospital">Hospital</option>
                                <option value="Medico General">Medico General</option>
                                <option value="Persona">Persona</option>
                                <option value="Clinica">Clinica</option>
                                <option value="Veterinaria">Veterinaria</option>
                                <option value="Laboratorio">Laboratorio</option>
                                <option value="Gobierno">Gobierno</option>
                                <option value="Distribuidor">Distribuidor</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Nombre Comercial</label>
                            <input type="text" wire:model='NCOM' class="inputN" placeholder="Nombre Comercial" />
                        </div>
                        <div class="flex flex-col ml-8">
                            <label class="etiqueta">Domicilio Fiscal</label>
                            <input type="text" wire:model='DomF' class="inputL" placeholder="Domicilio Fiscal" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Regimen Fiscal</label>
                            <select wire:model='RF' class="inputL">
                                <option value="">Seleccione una Opción</option>
                                <option value="601">601 - Ley General de Personas Morales</option>
                                <option value="603">603 - Personas Morales con fines no lucrativos</option>
                                <option value="605">605 - Sueldos y Salarios e Ingresos Asimilados a Salarios
                                </option>
                                <option value="606">606 - Arrendamiento</option>
                                <option value="608">608 - Demás Ingresos</option>
                                <option value="609">609 - Consolidación</option>
                                <option value="610">610 - Residentes en el Extranjero sin Establecimiento
                                    Permanente en México</option>
                                <option value="611">611 - Ingresos por Dividendos (socios y accionistas)
                                </option>
                                <option value="612">612 - Personas Fisicas con Actividades Empresariales y
                                    Profesionales</option>
                                <option value="614">614 - Ingresos por Intereses</option>
                                <option value="616">616 - Sin Obligaciones Fiscales</option>
                                <option value="620">620 - Sociedades Cooperativas de Producción que optan por
                                    diferir sus Ingresos</option>
                                <option value="621">621 - Incoorporación Fiscal</option>
                                <option value="622">622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras
                                </option>
                                <option value="623">623 - Opcional para Grupos de Sociedades</option>
                                <option value="624">624 - Coordinados</option>
                                <option value="628">628 - Hidrocarburos</option>
                                <option value="607">607 - Régimen en Enajenación o Adquisición de Bienes</option>
                                <option value="629">629 - De los Regímenes Fiscales Preferentes y de las
                                    Empresas Multinacionales</option>
                            </select>
                        </div>
                        <div class="flex flex-col ml-8">
                            <label class="etiqueta">Uso de CFDI</label>
                            <select wire:model='CFDI' class="inputN">
                                <option value="">Seleccione una Opción</option>
                                <option value="G03">G03 - Gastos en general</option>
                                <option value="G01">G01 - Adquisición de mercancias</option>
                                <option value="P01">P01 - Por difinir</option>
                                <option value="D01">D01 - Honorarios médicos, dentales y gastos hospitalarios
                                </option>
                                <option value="D02">D02 - Gastos médicos por incapacidad o discapacidad</option>
                                <option value="D03">D03 - Gastos funerales</option>
                                <option value="D04">D04 - Donativos</option>
                                <option value="D07">D07 - Primas por seguros de gastos médicos</option>
                                <option value="I02">I02 - Mobiliario y equipo de oficina por inversiones</option>
                                <option value="I08">I08 - Otra maquinaria y equipo</option>
                                <option value="S01">S01 - Sin efectos fiscales</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="flex flex-col mr-16">
                            <label class="etiqueta">Tipo Persona</label>
                            <select wire:model='TP' class="inputS">
                                <option value="">Seleccione una Opción</option>
                                <option value="Sin Tipo">Sin Tipo</option>
                                <option value="Fisica">Fisica</option>
                                <option value="Moral">Moral</option>
                            </select>
                        </div>
                        <div class=" flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="etiqueta">RFC</label>
                            <input type="text" wire:model='RFC' class="input" placeholder="RFC" />
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
                            <label class="etiqueta">Nombre</label>
                            <input type="text" wire:model='N' class="inputN" placeholder="Nombre" />
                        </div>
                        <div class=" flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="etiqueta">Apellido Paterno</label>
                            <input type="text" wire:model='ApP' class="input" placeholder="Apellido Paterno" />
                        </div>
                        <div class="flex flex-col ml-8">
                            <label class="etiqueta">Apellido Materno</label>
                            <input type="text" wire:model='ApM' class="input" placeholder="Apellido Materno" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
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
                            <input type="text" wire:model='CE' class="inputS" placeholder="Correo" />
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
                            <input type="text" wire:model='EST' class="input" placeholder="Estado" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Municipio</label>
                            <input type="text" wire:model='MUN' class="inputN" placeholder="Municipio" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Colonia</label>
                            <input type="text" wire:model='COL' class="input" placeholder="Colonia" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Calle</label>
                            <input type="text" wire:model='CALLE' class="input" placeholder="Calle" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                            <label class="etiqueta">Número Ext.</label>
                            <input type="text" wire:model='NEXT' class="inputM" placeholder="Número Ext" />
                        </div>
                        <div class="flex flex-col md: md:mt-0 mt-4">
                            <label class="etiqueta">Número Int.</label>
                            <input type="text" wire:model='NINT' class="inputM" placeholder="Número Int" />
                        </div>
                    </div>
                    <div class="md:flex items-center mt-6">
                        <div class="w-full md:w-1/4 flex flex-col mr-24">
                            <label class="etiqueta">Referencias</label>
                            <input type="text" wire:model='REF' class="inputL" placeholder="Referencias" />
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
                <label class="datos mt-16 ml-4"> Crédito</label>
                <div class="ml-24 mt-16">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-24">
                            <label class="etiqueta">Limite de Crédito</label>
                            <input type="text" wire:model='LIMC' class="input" placeholder="Limite Crédito" />
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            <a href="{{ route('Clientes') }}">
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