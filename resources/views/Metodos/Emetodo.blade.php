@extends('layouts.app')
@section('title', 'Editar MetodoPago')
@section('content')
    @livewire('metodo.emetodo',['ide' => $id])
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