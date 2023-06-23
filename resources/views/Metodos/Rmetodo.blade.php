@extends('layouts.app')
@section('title', 'Resgistrar MetodoPago')
@section('content')
@livewire('metodo.rmetodo')
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