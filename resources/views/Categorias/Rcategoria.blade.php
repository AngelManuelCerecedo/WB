@extends('layouts.app')
@section('title', 'Resgistrar Categoria')
@section('content')
@livewire('categoria.rcategoria')
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