@extends('layouts.app1')
@section('title', 'Punto Venta - Creditos')
@section('content')
@livewire('credito.ecredito', ['ide' => $id])
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