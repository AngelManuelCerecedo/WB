@extends('layouts.app1')
@section('title', 'Punto Venta - Clientes')
@section('content')
@livewire('venta.puntoventa-r-cliente')
@endsection
@section('js')
    <script>
        window.addEventListener('swal', event => {
            Swal.fire({
                position: 'mid',
                icon: event.detail.type,
                title: event.detail.title,
                showConfirmButton: false,
            })
        });
    </script>
@endsection
