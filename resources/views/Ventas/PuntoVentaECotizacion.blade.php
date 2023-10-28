@extends('layouts.app1')
@section('title', 'Punto Venta - Cotizaciones')
@section('content')
@livewire('cotizacion.ecotizacion', ['ide' => $id])
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