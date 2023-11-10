<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-96">Roles</h2>
            <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Configuración <i
                    class="bi bi-chevron-right"></i> Roles</label>
        </div>
        <div class="panel">
            <div class="  items-center justify-center pb-3 ml-3 ">
                <div class="grid w-auto ">
                    <h2 class="text-lg mb-10 font-bold"></h2>
                    {!! Form::open(['route' => 'GRoles']) !!}
                    {!! Form::label('name', 'Nombre', ['class' => 'mb-2,mb-10']) !!}
                    <br>
                    {!! Form::text('name', null, [
                        'class' => 'py-2 px-3, mt-5 rounded-lg border-2 text-base  w-11/12',
                        'form-control',
                        'placeholder' => 'Ingrese el nombre del rol',
                    ]) !!}

                    <br>
                    <br>
                    <h3 class="text-lg font-semibold mb-2">
                        Lista de permisos
                    </h3>
                    @foreach ($permissions2 as $permission)
                        <div>
                            <label>
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                {{ $permission->description }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                                <button class="botonr" wire:click="regresar()">
                                    <i class="bi bi-chevron-left"></i>
                                    Regresar
                                </button>
                        </div>
                        <div class=" ml-64">
                            
                            {!! Form::button('<i class="bi bi-journal-bookmark"></i> Guardar', [
                                'type'=>'submit', 
                                'class' => 'botond',
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
