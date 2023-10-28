@extends('layouts.app1')
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
@endsection
