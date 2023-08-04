@extends('layouts.app')
@section('title', 'Resgistrar Sucursal')
@section('content')
@livewire('sucursal.rsucursal')
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