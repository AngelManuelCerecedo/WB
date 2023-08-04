@extends('layouts.app')
@section('title', 'Resgistrar Producto')
@section('content')
@livewire('producto.rproducto')
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