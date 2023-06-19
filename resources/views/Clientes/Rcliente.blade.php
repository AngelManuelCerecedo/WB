@extends('layouts.app')
@section('title', 'Resgistrar Cliente')
@section('content')
@livewire('cliente.rcliente')
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