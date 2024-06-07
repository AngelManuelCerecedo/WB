<form>
    <div class="space-y-12 ml-8 mr-8">
        <div class="border-b border-gray-900/10 pb-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Registro de Clientes</h2>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nombre
                        Comcercial/Contacto</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Nom' autocomplete="given-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Nombre/Razón
                        Social</label>
                    <div class="mt-2">
                        <input type="text" wire:model='RS' autocomplete="family-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">RFC</label>
                    <div class="mt-2">
                        <input type="text" wire:model='RFC'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Codigo
                        Postal</label>
                    <div class="mt-2">
                        <input type="text" wire:model='CP'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Domicilio
                        Fiscal</label>
                    <div class="mt-2">
                        <input type="text" wire:model='DomF'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Regimen
                        Fiscal</label>
                    <div class="mt-2">
                        <select wire:model='Reg'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                            <option value="625">625 - Régimen de las actividades empresariales con ingresos a
                                través de plataformas tecnológicas</option>
                            <option value="626">626 - Regimen simplificado de confianza</option>
                            <option value="628">628 - Hidrocarburos</option>
                            <option value="607">607 - Régimen en Enajenación o Adquisición de Bienes</option>
                            <option value="629">629 - De los Regímenes Fiscales Preferentes y de las
                                Empresas Multinacionales</option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Usos de
                        CFDI</label>
                    <div class="mt-2">
                        <select wire:model='CDFI'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                <h2 class="text-base font-semibold leading-3 text-gray-900">Comisiones</h2>
                <div class="sm:col-span-2">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Comision
                        Total</label>
                    <div class="mt-2">
                        <input type="text" wire:model='ComTot'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Fintech</label>
                    <div class="mt-2">
                        <input type="text" wire:model='COMFINTECH'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-1 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Externa
                        1</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Comext1'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="region"
                        class="block text-sm font-medium leading-6 text-gray-900">Comisionista</label>
                    <select id="select1" class="buscador" style="width: 100%;" wire:model="comis1_id">
                        <option value="NULL">Seleccione un Comisionista</option>
                        @foreach ($Comisionistas as $comisionista)
                            <option value="{{ $comisionista->id }}">
                                {{ $comisionista->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="sm:col-span-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Externa
                        2</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Comext2'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="region"
                        class="block text-sm font-medium leading-6 text-gray-900">Comisionista</label>
                    <select id="select2" class="buscador" style="width: 100%;" wire:model="comis2_id">
                        <option value="NULL">Seleccione un Comisionista</option>
                        @foreach ($Comisionistas as $comisionista)
                            <option value="{{ $comisionista->id }}">
                                {{ $comisionista->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-1 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Externa
                        3</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Comext3'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="region"
                        class="block text-sm font-medium leading-6 text-gray-900">Comisionista</label>
                    <select id="select3" class="buscador" style="width: 100%;" wire:model="comis3_id">
                        <option value="NULL">Seleccione un Comisionista</option>
                        @foreach ($Comisionistas as $comisionista)
                            <option value="{{ $comisionista->id }}">
                                {{ $comisionista->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="sm:col-span-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Externa
                        4</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Comext4'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="region"
                        class="block text-sm font-medium leading-6 text-gray-900">Comisionista</label>
                    <select id="select4" class="buscador" style="width: 100%;" wire:model="comis4_id">
                        <option value="NULL">Seleccione un Comisionista</option>
                        @foreach ($Comisionistas as $comisionista)
                            <option value="{{ $comisionista->id }}">
                                {{ $comisionista->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-1 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Externa
                        5</label>
                    <div class="mt-2">
                        <input type="text" wire:model='Comext5'
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="region"
                        class="block text-sm font-medium leading-6 text-gray-900">Comisionista</label>
                    <select id="select5" class="buscador" style="width: 100%;" wire:model="comis5_id">
                        <option value="NULL">Seleccione un Comisionista</option>
                        @foreach ($Comisionistas as $comisionista)
                            <option value="{{ $comisionista->id }}">
                                {{ $comisionista->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 mb-2 flex items-center justify-end gap-x-6 mr-8">
        <a href="{{ route('Clientes') }}">
            <button type="button"
                class="rounded-md bg-gray-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Regresar</button>
        </a>
        <button type="button" wire:click="actualizar()"
            class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-400">Actualizar</button>
    </div>
</form>
<script>
    document.addEventListener('livewire:load', function () {
        function initializeSelect(selectId, wireModel) {
            $(selectId).select2();
            $(selectId).on('change', function(e) {
                let valor = $(selectId).select2("val");
                @this.set(wireModel, valor);
            });
        }

        initializeSelect('#select1', 'comis1_id');
        initializeSelect('#select2', 'comis2_id');
        initializeSelect('#select3', 'comis3_id');
        initializeSelect('#select4', 'comis4_id');
        initializeSelect('#select5', 'comis5_id');
    });

    Livewire.hook('message.processed', (message, component) => {
        $('#select1').select2();
        $('#select2').select2();
        $('#select3').select2();
        $('#select4').select2();
        $('#select5').select2();
    });
</script>
