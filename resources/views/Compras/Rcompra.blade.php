@extends('layouts.app')
@section('title', 'Resgistrar Compra')
@section('content')
@livewire('compra.rcompra')
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