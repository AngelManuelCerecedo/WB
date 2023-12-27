@extends('layouts.app')
@if (auth()->user()->empleado->Rol == 'Mostrador')
    @section('title', 'Punto Venta')
    @section('content')
        @livewire('venta.puntoventa')
    @endsection
    @section('js')
        <script>
            window.addEventListener('swal', event => {
                Swal.fire({
                    position: 'mid',
                    icon: event.detail.type,
                    title: event.detail.title,
                    showConfirmButton: true,
                })
            });
        </script>
@else
    @section('title', "Doctor's Home - Dashboard")
    @section('content')
        <div class="mt-[20px] text-[50px] text-center"> Dashboard PRUEBA
        </div>
@endif
@endsection
